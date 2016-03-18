<?php
/*
Plugin Name: Really Simple Twitter Feed Widget
Plugin URI: http://www.whiletrue.it/
Description: Displays your public Twitter messages in the sidbar of your blog. Simply add your username and all your visitors can see your tweets!
Author: Dabelon, tanaylakhani
Version: 3.1.1
Author URI: http://www.whiletrue.it/
*/
/*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2, 
    as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

/**
 * ReallySimpleTwitterWidget Class
 */
class ReallySimpleTwitterWidget extends WP_Widget {
  private /** @type {string} */ $languagePath;

  /** constructor */
  function ReallySimpleTwitterWidget() {
    $this->languagePath = basename(dirname(__FILE__)).'/languages';
    load_plugin_textdomain('rstw', 'false', $this->languagePath);

    $this->options = array(
      array(
        'label' => __( 'Twitter Authentication', 'rstw' ),
        'type'  => 'separator',   'notes' => __('Get them creating your Twitter Application', 'rstw' ).' <a href="https://dev.twitter.com/apps" target="_blank">'.__('here', 'rstw' ).'</a>'  ),
      array(
        'name'  => 'consumer_key',  'label'  => 'Consumer Key',
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'consumer_secret',  'label'  => 'Consumer Secret',
        'type'  => 'password',  'default' => ''      ),
      array(
        'name'  => 'access_token',  'label'  => 'Access Token',
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'access_token_secret',  'label'  => 'Access Token Secret',
        'type'  => 'password',  'default' => ''      ),
      array(
        'label' => __( 'Twitter Data', 'rstw' ),
        'type'  => 'separator'      ),
      array(
        'name'  => 'username',    'label'  => __( 'Twitter Username', 'rstw' ),
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'num',      'label'  => __( 'Show # of Tweets', 'rstw' ),
        'type'  => 'text',  'default' => '5'      ),
      array(
        'name'  => 'skip_text',    'label'  => __( 'Skip tweets containing this text', 'rstw' ),
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'skip_replies',    'label'  => __( 'Skip replies', 'rstw' ),
        'type'  => 'checkbox',  'default' => true  ),
      array(
        'name'  => 'skip_retweets',    'label'  => __( 'Skip retweets', 'rstw' ),
        'type'  => 'checkbox',  'default' => false  ),
      array(
        'name'  => 'show_favorites',    'label'  => __( 'Show instead the account Favorites feed', 'rstw' ),
        'type'  => 'checkbox',  'default' => false  ),
      array(
        'code' => '<h2>'.__( 'Advanced Options', 'rstw' ).' 
              <button class="button" style="margin-left:20px;" onclick="javascript:jQuery(\'.rstw_advanced\').toggle(); return false;">'.__('Click to show / hide', 'rstw' ).'</button>
            </h2>
            <div class="rstw_advanced" style="display:none;">',
        'type'  => 'separator'      ),
      array(
        'label' => __( 'Widget Title', 'rstw' ),
        'type'  => 'separator'      ),
      array(
        'name'  => 'title',  'label'  => __( 'Title', 'rstw' ),
        'type'  => 'text',  'default' => __( 'Last Tweets', 'rstw' )      ),
      array(
        'name'  => 'title_icon',  'label'  => __( 'Show Twitter icon on title', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'title_thumbnail',  'label'  => __( 'Show account thumbnail on title', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'link_title',  'label'  => __( 'Link above Title with Twitter user', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'label' => __( 'Widget Footer', 'rstw' ),
        'type'  => 'separator'      ),
      array(
        'name'  => 'link_user',    'label'  => __( 'Show a link to the Twitter user profile', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'link_user_text',  'label'  => __( 'Link text', 'rstw' ),
        'type'  => 'text',  'default' => 'See me on Twitter'      ),
      array(
        'name'  => 'button_follow',    'label'  => __( 'Show a Twitter Follow Me button', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'label' => __( 'Items and Links', 'rstw' ),
        'type'  => 'separator'      ),
      array(
        'name'  => 'linked',    'label'  => __( 'Show this linked text at the end of each Tweet', 'rstw' ),
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'thumbnail',  'label'  => __( 'Include thumbnail before tweets', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),      
      array(
        'name'  => 'thumbnail_retweets',  'label'  => __( 'Use author thumb for retweets', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),      
      array(
        'name'  => 'hyperlinks',  'label'  => __( 'Find and show hyperlinks', 'rstw' ),
        'type'  => 'checkbox',  'default' => true      ),
      array(
        'name'  => 'replace_link_text',  'label'  => __( 'Replace hyperlinks text with fixed text (e.g. "-->")', 'rstw' ),
        'type'  => 'text',  'default' => ''      ),
      array(
        'name'  => 'twitter_users',  'label'  => __( 'Find Replies in Tweets', 'rstw' ),
        'type'  => 'checkbox',  'default' => true      ),
      array(
        'name'  => 'link_target_blank',  'label'  => __( 'Create links on new window / tab', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'label' => __( 'Timestamp', 'rstw' ),
        'type'  => 'separator',  ),
      array(
        'name'  => 'update',  'label'  => __( 'Show timestamps', 'rstw' ),
        'type'  => 'checkbox',  'default' => true      ),
      array(
        'name'  => 'date_link',  'label'  => __( 'Link timestamp to the actual tweet', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'date_format',  'label'  => __( 'Timestamp format (e.g. M j )', 'rstw' ).' <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">?</a>',
        'type'  => 'text',  'default' => 'M j'      ),
      array(
        'label' => __( 'Debug', 'rstw' ),
        'type'  => 'separator',    'notes' =>   __('Use them only for a few minutes, when having issues', 'rstw')  ),
      array(
        'name'  => 'debug',  'label'  => __( 'Show debug info', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'erase_cached_data',  'label'  => __( 'Erase cached data', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'name'  => 'encode_utf8',  'label'  => __( 'Force UTF8 Encode', 'rstw' ),
        'type'  => 'checkbox',  'default' => false      ),
      array(
        'code' => '</div>', // CLOSE ADVANCED OPTIONS DIV
        'type'  => 'separator'      ),
      array(
        'type'  => 'donate'      ),
    );

    $control_ops = array('width' => 500);
    parent::__construct(false, 'Really Simple Twitter', array(), $control_ops);  
  }

  /** @see WP_Widget::widget */
  function widget($args, $instance) {    
    extract( $args );
    $title = apply_filters('widget_title', $instance['title']);
    echo $before_widget;  
    if ( $title != '') {
      echo $before_title;
      $title_icon = ($instance['title_icon']) ? '<img src="'.WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)).'/twitter_small.png" alt="'.$title.'" title="'.$title.'" /> ' : '';
      $title_thumb = '';
      if (isset($instance['title_thumbnail']) && $instance['title_thumbnail']) {
        $transient_name = 'twitter_thumb_'.$instance['username'];
        $twitter_thumb = get_transient($transient_name);
        if ($twitter_thumb=='') {
          if ($instance['consumer_key'] == '' || $instance['consumer_secret'] == '' || $instance['access_token'] == '' || $instance['access_token_secret'] == '') {
            return __('Twitter Authentication data is incomplete','rstw');
          } 
          if (!$this->cb) {
            $this->really_simple_twitter_codebird_set ($instance);
          }
          $user_data =  $this->cb->users_show(array('screen_name'=>$instance['username']));
          $twitter_thumb = $user_data['profile_image_url'];
          set_transient($transient_name, $twitter_thumb, 60*60*24); // 1 day
        }
        if ($twitter_thumb!='') {
          $title_thumb = '<img src="'.$twitter_thumb.'" alt="'.$title.'" title="'.$title.'" class="really_simple_twitter_author" /> ';
        }
      }
      if ( $instance['link_title'] === true ) {
        $link_target = ($instance['link_target_blank']) ? ' target="_blank" ' : '';
        echo '<a href="http://twitter.com/' . $instance['username'] . '" class="twitter_title_link" '.$link_target.'>'. $title_icon . $title_thumb . $title . '</a>';
      } else {
        echo $title_icon . $title_thumb . $title;
      }
      echo $after_title;
    }
    echo $this->really_simple_twitter_messages($instance);
    echo $after_widget;
  }

  /** @see WP_Widget::update */
  function update($new_instance, $old_instance) {        
    $instance = $old_instance;
    
    foreach ($this->options as $val) {
      if (!isset($val['type']) || !isset($val['name'])) {
        continue;
      }
      if ($val['type']=='text' || $val['type']=='password') {
        $instance[$val['name']] = (isset($new_instance[$val['name']])) ? strip_tags($new_instance[$val['name']]) : '';
      } else if ($val['type']=='checkbox') {
        $instance[$val['name']] = (isset($new_instance[$val['name']]) && $new_instance[$val['name']]=='on') ? true : false;
      }
    }
    return $instance;
  }

  /** @see WP_Widget::form */
  function form($instance) {
    if (empty($instance)) {
      foreach ($this->options as $val) {
        if (!isset($val['type']) || $val['type']=='separator') {
          continue;
        }
        if (!isset($val['name']) || !isset($val['default'])) {
          continue;
        }
        $instance[$val['name']] = $val['default'];
      }
    }          
  
    // CHECK AUTHORIZATION
    if (!function_exists('curl_init')) {
      echo __('CURL extension not found. You need enable it to use this Widget');
      return;
    }
    
    echo '<div class="rstw_form">';

    foreach ($this->options as $val) {
      if ($val['type']=='separator') {
        if (isset($val['label']) && $val['label']!='') {
          echo '<h3>'.$val['label'].'</h3>';
        } else if (isset($val['code']) && $val['code']!='') {
          echo $val['code'];
        } else {
          echo '<hr />';
        }
        if (isset($val['notes']) && $val['notes']!='') {
          echo '<div class="description">'.$val['notes'].'</div>';
        }
      } else if (isset($val['type']) && ($val['type']=='text' || $val['type']=='password')) {
        echo '
          <input class="widefat" id="'.$this->get_field_id($val['name']).'"  name="'.$this->get_field_name($val['name']).'" type="'.$val['type'].'" value="'.esc_attr(isset($instance[$val['name']]) ? $instance[$val['name']] : '').'" />
          <label for="'.$this->get_field_id($val['name']).'">'.$val['label'].'</label>
          <div class="rstw_clear"></div>';
      } else if (isset($val['type']) && $val['type']=='checkbox') {
        $checked = (isset($instance[$val['name']]) && $instance[$val['name']]) ? 'checked="checked"' : '';
        echo '
          <div class="rstw_checkbox"><input id="'.$this->get_field_id($val['name']).'" name="'.$this->get_field_name($val['name']).'" type="checkbox" '.$checked.' /></div>
          <label for="'.$this->get_field_id($val['name']).'">'.$val['label'].'</label>
          <div class="rstw_clear"></div>';
      } else if (isset($val['type']) && $val['type']=='donate') {
        echo '<p style="text-align:center; font-weight:bold;">
            '.__('Do you like it? I\'m supporting it, please support me!', 'rstw').'<br />
            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=giu%40formikaio%2eit&item_name=WhileTrue&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_LG%2egif%3aNonHosted" target="_blank">
               <img alt="PayPal - The safer, easier way to pay online!" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" > 
            </a>
          </p>';
      }
    }
    echo '
      </div>
      <style>
      .rstw_form h2, .rstw_form h3, .rstw_form .description { text-align:center; margin-top:1em; margin-bottom:0.5em; }
      .rstw_form input[type="text"], .rstw_form input[type="password"] { float:left; width:200px; }
      .rstw_form .rstw_checkbox { float:left; width:200px; text-align:right; }
      .rstw_form label { width:270px; padding-left:5px; }
      .rstw_form .rstw_clear { clear:both; height:2px; margin-bottom:1px; border-bottom:1px solid #eee; }
      </style>';
  }


  protected function debug ($options, $text) {
    if ($options['debug']) {
      echo 'RSTW '.$text."<br>\n";
    }
  }
  
  
  public function really_simple_twitter_codebird_set ($options) {
    if (!class_exists('Codebird')) {
      require ('lib/codebird.php');
    }
    Codebird::setConsumerKey($options['consumer_key'], $options['consumer_secret']); 
    $this->cb = Codebird::getInstance();  
    $this->cb->setToken($options['access_token'], $options['access_token_secret']);
    
    // From Codebird documentation: For API methods returning multiple data (like statuses/home_timeline), you should cast the reply to array
    $this->cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
  }
  

  // Display Twitter messages
  public function really_simple_twitter_messages($options) {
    if ($options['debug']) {
      ini_set('display_errors', '1');
      error_reporting(E_ALL);
      $this->debug($options, 'Debug info enabled');
    }
  
    // CHECK OPTIONS

    if (!isset($options['skip_retweets'] ) ) {
      $options['skip_retweets'] = false;
    }
    if (!isset($options['thumbnail_retweets']) ) {
      $options['thumbnail_retweets'] = false;
    }
    if (!isset($options['button_follow']) ) {
      $options['button_follow'] = false;
    }
    if (!isset($options['date_format']) ) {
      $options['date_format'] = 'M j';
    }
    if ($options['username'] == '') {
      return __('Twitter username is not configured','rstw');
    } 
    if (!is_numeric($options['num']) || $options['num'] <= 0) {
      return __('Number of tweets is not valid','rstw');
    }
    if ($options['consumer_key'] == '' || $options['consumer_secret'] == '' || $options['access_token'] == '' || $options['access_token_secret'] == '') {
      return __('Twitter Authentication data is incomplete','rstw');
    } 
    if (!isset($this->cb) ) {
      $this->really_simple_twitter_codebird_set ($options);
    }

    // SET THE NUMBER OF ITEMS TO RETRIEVE - IF "SKIP TEXT" IS ACTIVE, GET MORE ITEMS
    $max_items_to_retrieve = $options['num'];
    if ($options['skip_text']!='' || $options['skip_replies'] || $options['skip_retweets']) {
      $max_items_to_retrieve *= 4;
    }
    // TWITTER API GIVES MAX 200 TWEETS PER REQUEST
    if ($max_items_to_retrieve>200) {
      $max_items_to_retrieve = 200;
    }
  
    $transient_name = 'twitter_data_'.$options['username'].$options['skip_text'].'_'.$options['num'];

    if ($options['erase_cached_data']) {
      $this->debug($options, '"Erase cached data" and fetch from Twitter');
      delete_transient($transient_name);
      delete_transient($transient_name.'_status');
      delete_option($transient_name.'_valid');
      
      try {
        if (isset($options['show_favorites']) && $options['show_favorites']) {
          $twitter_data =  $this->cb->favorites_list(array(
                'screen_name'=>$options['username'], 
                'count'=>$max_items_to_retrieve,
            ));
        } else {
          $twitter_data =  $this->cb->statuses_userTimeline(array(
                'screen_name'=>$options['username'], 
                'count'=>$max_items_to_retrieve,
                'exclude_replies'=>$options['skip_replies'],
                'include_rts'=>(!$options['skip_retweets'])
            ));
        }
      } catch (Exception $e) {
        $this->debug($options, $e->getMessage());
        return __('Error retrieving tweets','rstw'); 
      }

    } else {
  
      // USE TRANSIENT DATA AS LOCAL CACHE, TO MINIMIZE REQUESTS TO THE TWITTER FEED
  
      $timeout       = 10 * 60; // 10m
      $error_timeout =  5 * 60; // 5m
    
      $twitter_data   = get_transient($transient_name);
      $twitter_status = get_transient($transient_name.'_status');
    
      // Twitter Status
      if(!$twitter_status || !isset($twitter_status['resources']) || !$twitter_data) {
        $this->debug($options, 'Retrieving API rate limit');
        try {
          $twitter_status = $this->cb->application_rateLimitStatus();
          set_transient($transient_name."_status", $twitter_status, $error_timeout);
        } catch (Exception $e) { 
          $this->debug($options, 'Error retrieving API rate limit');
        }
      }
    
      // IF THE CACHE IS EMPTY OR CONTAINS ERRORS, RETRIEVE NEW DATA

      if (empty($twitter_data) || count($twitter_data)<1 || isset($twitter_data['errors'])) {
        if (isset($twitter_status['resources'])) {
          $remaining     = (int)$twitter_status['resources']['statuses']['/statuses/user_timeline']['remaining'];
          $calls_limit   = (int)$twitter_status['resources']['statuses']['/statuses/user_timeline']['limit'];
          $reset_seconds = (int)$twitter_status['resources']['statuses']['/statuses/user_timeline']['reset'] - time();
  
          $this->debug($options, $remaining.' of '.$calls_limit.' API calls left, reset in '.$reset_seconds.'s');
  
          if($remaining <= 7 && $reset_seconds > 0) {
            $timeout       = $reset_seconds;
            $error_timeout = $reset_seconds;
          }
        }

        $this->debug($options, 'Fetching '.$max_items_to_retrieve.' items from Twitter');
        try {
          $twitter_data =  $this->cb->statuses_userTimeline(array(
              'screen_name'     => $options['username'], 
              'count'           => $max_items_to_retrieve, 
              'exclude_replies' => $options['skip_replies'],
              'include_rts'     => (!$options['skip_retweets'])
            ));
        } catch (Exception $e) { return __('Error retrieving tweets','rstw'); }

        if (!isset($twitter_data['errors']) && count($twitter_data) > 0) {
          // Clean Unicode four-byte chars (including some emoji) causing database errors on MySQL utf8 columns
          foreach($twitter_data as $key => $message) {
            if (!is_array($message) || !isset($message['text'])) {
              continue;
            }
            // four byte utf8: 11110www 10xxxxxx 10yyyyyy 10zzzzzz
            $twitter_data[$key]['text'] = preg_replace('/[\xF0-\xF7][\x80-\xBF]{3}/', '', $message['text']);
          }

          set_transient($transient_name, $twitter_data, $timeout);
          update_option($transient_name."_valid", $twitter_data);
        } else {
          set_transient($transient_name, array(), $error_timeout);
          $this->debug($options, 'Invalid data: wait 5 minutes before trying again');
        }
      } else {
        $this->debug($options, 'Using cached Twitter data');
      }
    }

    if (isset($twitter_data['errors'])) {
      // STORE ERROR FOR DISPLAY
      $error_code    = (isset($twitter_data['errors'][0]['code']   )) ? $twitter_data['errors'][0]['code']    : '';
      $error_message = (isset($twitter_data['errors'][0]['message'])) ? $twitter_data['errors'][0]['message'] : '';
      if ($error_code != '' || $error_message != '') {
        $this->debug($options, 'Twitter API error ['.$error_code.'] '.$error_message);
      } else {
        $this->debug($options, 'Twitter API error: '.print_r($twitter_data['errors'], true));
      }
      if ($error_code == '32') {
        $this->debug($options, 'Twitter API authentication error: try to regenerate your API access token');
      } else if ($error_code == '135') {
        $this->debug($options, 'Server Timestamp error: ensure that your system clock is accurate and not running behind or ahead');
      } else {
        $this->debug($options, 'Twitter username: '.$options['username']);
      }
    }
    
    // IF DATE IS EMPTY OR THERE IS AN ERROR, TRY TO RETRIEVE THE SAFE CACHE
    if (!$options['erase_cached_data'] && (empty($twitter_data) || isset($twitter_data['errors']))) {
      $this->debug($options, 'Twitter data is empty, retrieving Safe Cache');
      $twitter_data = get_option($transient_name."_valid");
      if (!is_array($twitter_data) || empty($twitter_data) || count($twitter_data) == 0) {
        $this->debug($options, 'Safe Cache is also empty');
      }
    }

    if (!is_array($twitter_data) || empty($twitter_data) || count($twitter_data) == 0) {
        return __('Unable to get tweets','rstw');
    }
    $link_target = ($options['link_target_blank']) ? ' target="_blank" ' : '';
    
    $out = '
      <ul class="really_simple_twitter_widget">';

    $i = 0;
    foreach($twitter_data as $message) {
      if (!is_array($message) || !isset($message['text'])) {
        continue;
      }

      // CHECK THE NUMBER OF ITEMS SHOWN
      if ($i>=$options['num']) {
        break;
      }

      $msg = $message['text'];
      
      // RECOVER ORIGINAL MESSAGE FOR RETWEETS
      if (!isset($message['retweeted_status']) ) {
        $message['retweeted_status'] = array();
      }
      if (count($message['retweeted_status'])>0) {
        $msg = 'RT @'.$message['retweeted_status']['user']['screen_name'].': '.$message['retweeted_status']['text'];

        if ($options['thumbnail_retweets']) {
          $message = $message['retweeted_status'];
        }
      }
    
      if ($msg=='') {
        continue;
      }
      if ($options['skip_text']!='' && strpos($msg, $options['skip_text'])!==false) {
        continue;
      }
      if($options['encode_utf8']) $msg = utf8_encode($msg);
        
      $out .= '<li>';
      
      // TODO: LINK
      if ($options['thumbnail'] && $message['user']['profile_image_url_https']!='') {
        $out .= '<img src="'.$message['user']['profile_image_url_https'].'" alt="'.htmlspecialchars($message['user']['name']).'" title="'.htmlspecialchars($message['user']['name']).'" />';
      }
      if ($options['hyperlinks']) {
        if ($options['replace_link_text']!='') {
          // match protocol://address/path/file.extension?some=variable&another=asf%
          $msg = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\" ".$link_target." title=\"$1\">".$options['replace_link_text']."</a>", $msg);
          // match www.something.domain/path/file.extension?some=variable&another=asf%
          $msg = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\" ".$link_target." title=\"$1\">".$options['replace_link_text']."</a>", $msg);    
        } else {
          // match protocol://address/path/file.extension?some=variable&another=asf%
          $msg = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);
          // match www.something.domain/path/file.extension?some=variable&another=asf%
          $msg = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);    
        }
        // match name@address
        $msg = preg_replace('/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i',"<a href=\"mailto://$1\" class=\"twitter-link\" ".$link_target.">$1</a>", $msg);
        //OLD mach #trendingtopics
        //$msg = preg_replace('/#([\w\pL-.,:>]+)/iu', '<a href="http://twitter.com/#!/search/\1" class="twitter-link">#\1</a>', $msg);
        //$msg = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="http://twitter.com/#!/search/%23\2" class="twitter-link" '.$link_target.'>#\2</a>', $msg);
        //NEW mach #trendingtopics
        $msg = preg_replace('/(^|\s)#([\w\pL.]*[\pLa-zA-Z_]+[\w\pL.]*)/iu', '\1<a href="http://twitter.com/#!/search?q=%23\2" class="twitter-link" '.$link_target.'>#\2</a>', $msg);
      }
      if ($options['twitter_users'])  { 
        $msg = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\" ".$link_target.">@$2</a>$3 ", $msg);
      }
                    
      $link = 'http://twitter.com/'.$options['username'].'/status/'.$message['id_str'];
      if($options['linked'] == 'all')  { 
        $msg = '<a href="'.$link.'" class="twitter-link" '.$link_target.'>'.$msg.'</a>';  // Puts a link to the status of each tweet 
      } else if ($options['linked'] != '') {
        $msg = $msg . ' <a href="'.$link.'" class="twitter-link" '.$link_target.'>'.$options['linked'].'</a>'; // Puts a link to the status of each tweet
      } 
      $out .= $msg;
    
      if($options['update']) {        
        $time = strtotime($message['created_at']);
        $h_time = ( ( abs( time() - $time) ) < 86400 ) ? sprintf( __('%s ago', 'rstw'), human_time_diff( $time )) : date($options['date_format'], $time);
        if ($options['date_link']) {
          $h_time = '<a href="'.$link.'" target="_blank">'. $h_time . '</a>';
        }
        $out .= '<span class="rstw_comma">,</span> <span class="twitter-timestamp" title="' . date(__('Y/m/d H:i', 'rstw'), $time) . '">' . $h_time . '</span>';
      }          
                  
      $out .= '</li>';
      $i++;
    }
    $out .= '</ul>';
  
    if ($options['link_user']) {
      $original_link_user = '<div class="rstw_link_user"><a href="http://twitter.com/' . $options['username'] . '" '.$link_target.'>'.$options['link_user_text'].'</a></div>';
      $out .= apply_filters( 'rstw_link_user', $original_link_user, $options );
    }
    if ($options['button_follow']) {
      $original_button_follow = '
        <a href="https://twitter.com/' . $options['username'] . '" class="twitter-follow-button" data-show-count="false">Follow @'.$options['username'].'</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>';
      $out .= apply_filters( 'rstw_button_follow', $original_button_follow, $options );
    }
    // BASIC STYLE FOR THUMBNAILS
    if ($options['thumbnail']) {
      $out .= '
        <style>
        .really_simple_twitter_widget img { float: left; margin-top: 5px; margin-right: 5px; }
        .really_simple_twitter_widget li  { clear: both; }
        </style>';
    }
    return apply_filters( 'rstw_output', $out, $options );
  }

} // class ReallySimpleTwitterWidget


// SHORTCODE FUNCTION
function really_simple_twitter_shortcode ($atts) {
  // e.g. [really_simple_twitter username="" consumer_key="" consumer_secret="" access_token="" access_token_secret=""]
  
  $rstw = new ReallySimpleTwitterWidget();

  $default_options = array();
  foreach ($rstw->options as $val) {
    if ($val['type']=='separator') {
      continue;
    }
    $default_options[$val['name']] = $val['default'];
  }
  $atts = shortcode_atts( $default_options , $atts );

  // CLEAN CHECKBOX BOOLEAN VALUES
  foreach ($rstw->options as $val) {
    if ($val['type']=='checkbox' && $atts[$val['name']]==="true") {
      $atts[$val['name']] = true;
    }
    if ($val['type']=='checkbox' && $atts[$val['name']]==="false") {
      $atts[$val['name']] = false;
    }
  }

  return $rstw->really_simple_twitter_messages($atts);
}


// register ReallySimpleTwitterWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ReallySimpleTwitterWidget");'));

add_shortcode( 'really_simple_twitter', 'really_simple_twitter_shortcode' );

if( file_exists(plugin_dir_path( __FILE__ ).'/readygraph-extension.php' )) {
if (get_option('readygraph_deleted') && get_option('readygraph_deleted') == 'true'){}
else{
include "readygraph-extension.php";
}
if(get_option('readygraph_application_id') && strlen(get_option('readygraph_application_id')) > 0){
register_deactivation_hook( __FILE__, 'rstw_readygraph_plugin_deactivate' );
}
function rstw_readygraph_plugin_deactivate(){
	$app_id = get_option('readygraph_application_id');
	update_option('readygraph_deleted', 'false');
	wp_remote_get( "http://readygraph.com/api/v1/tracking?event=email_newsletter_plugin_uninstall&app_id=$app_id" );
	rstw_delete_rg_options();
}
}
function rstw_rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           rstw_rrmdir($dir."/".$object); 
        else unlink   ($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
  $del_url = plugin_dir_path( __FILE__ );
  unlink($del_url.'/readygraph-extension.php');
 $setting_url="admin.php?page=";
  echo'<script> window.location="'.admin_url().'"; </script> ';
}
function rstw_delete_rg_options() {
delete_option('readygraph_access_token');
delete_option('readygraph_application_id');
delete_option('readygraph_refresh_token');
delete_option('readygraph_email');
delete_option('readygraph_settings');
delete_option('readygraph_delay');
delete_option('readygraph_enable_sidebar');
delete_option('readygraph_auto_select_all');
delete_option('readygraph_enable_notification');
delete_option('readygraph_enable_popup');
delete_option('readygraph_enable_branding');
delete_option('readygraph_send_blog_updates');
delete_option('readygraph_send_real_time_post_updates');
delete_option('readygraph_popup_template');
delete_option('readygraph_upgrade_notice');
delete_option('readygraph_adsoptimal_secret');
delete_option('readygraph_adsoptimal_id');
delete_option('readygraph_connect_anonymous');
delete_option('readygraph_connect_anonymous_app_secret');
delete_option('readygraph_tutorial');
delete_option('readygraph_site_url');
delete_option('readygraph_enable_monetize');
delete_option('readygraph_monetize_email');
delete_option('readygraph_plan');
}