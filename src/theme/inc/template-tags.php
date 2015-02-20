<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package RP3
 */

if ( ! function_exists( 'rp3_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function rp3_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'rp3' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'rp3' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'rp3' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'rp3_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function rp3_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'rp3' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'rp3' ), true );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'rp3' ), true );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'rp3_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function rp3_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span>', 'rp3' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);

	// Only add an author to blog posts (not news)
	if ( has_category( 'blog' ) ) {
		printf( __( '<span class="byline"> by %1$s</span>', 'rp3' ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
	}
}
endif;

if ( ! function_exists( 'rp3_output_the_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date.
 */
function rp3_output_the_date() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span>', 'rp3' ),
		sprintf( '%1$s', $time_string )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rp3_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rp3_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rp3_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rp3_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rp3_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rp3_categorized_blog.
 */
function rp3_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'rp3_categories' );
}
add_action( 'edit_category', 'rp3_category_transient_flusher' );
add_action( 'save_post',     'rp3_category_transient_flusher' );



/**
 * Custom "Written by..." template tag
 *
 * $type: news (default) or blog. news posts have (sub)categories, blogs have tags.
 * 
 * $page_type: if 'single', link the author(s) and categories (if any).
 * Otherwise, assume this is an archive page and don't link them
 * (because the whole tile will be linked to the article)
 */
if ( ! function_exists( 'rp3_byline' ) ) {

	function rp3_byline( $type = 'news', $page_type = false ) {

		// Author(s)

		$byline = 'By ';

		if ( $page_type == 'single' ) {
			// Check if we're using Co-Authors Plus
			if ( class_exists( 'CoAuthorsIterator' ) ) {
				$i = new CoAuthorsIterator();
				$i->iterate();
				$byline .= get_the_author_meta( 'display_name' );
				while($i->iterate()){
					$byline .= $i->is_last() ? '<span> and </span>' : '<span>, </span>';
					$byline .= get_the_author_meta( 'display_name' );
				}
			} else {
				$byline .= get_the_author_meta( 'display_name' );
			}
		} else {
			if ( class_exists( 'CoAuthorsIterator' ) ) {
				$i = new CoAuthorsIterator();
				$i->iterate();
				$byline .= get_the_author();
				while($i->iterate()){
					$byline .= $i->is_last() ? '<span> and </span>' : '<span>, </span>';
					$byline .= get_the_author();
				}
			} else {
				$byline .= get_the_author();
			}
		}

		// Date

		$byline .= ' on ' . get_the_date() . '.';

		// Taxonomy

		// if ( $type == 'blog' ) {
		// 	$byline .= ' in ';

		// 	$tags = get_the_tags();

		// 	$counter = 0;

		// 	if ( $page_type == 'single' ) {
		// 		foreach( $tags as $tag ) {
		// 			if ( $counter > 0 ) {
		// 				$byline .= ', <a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a>';
		// 			} else {
		// 				$byline .= '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . $tag->name . '</a>';
		// 			}

		// 			$counter++;
		// 		}
		// 	} else {
		// 		foreach( $tags as $tag ) {
		// 			if ( $counter > 0 ) {
		// 				$byline .= ', ' . $tag->name;
		// 			} else {
		// 				$byline .= $tag->name;
		// 			}

		// 			$counter++;
		// 		}
		// 	}

		// 	$byline .= '.';
		// } else {
		// 	$byline .= ' in [categories TK].';
		// }

		return $byline;
	}

}


if ( ! function_exists( 'rp3_link_to_author_posts' ) ) {
	function rp3_link_to_author_posts( $id ) {
		$link  = '<a href="' . esc_url( get_author_posts_url( $id ) ) . '">';
		$link .= get_the_author_meta( 'user_firstname' ) . ' ' . get_the_author_meta( 'user_lastname' );
		$link .= '</a>';

		return $link;
	}
}

/*
<?php the_time( get_option('date_format') ); ?>
<span><?php _e('by', 'rp3') ?></span> 
<?php
?>
*/

/**
 * Create a picture element
 */
if ( ! function_exists( 'rp3_picture_element' ) ) {
	function rp3_picture_element( $id, $size_tag, $title = '' ) {

		$bp_small	= 321 / 16;
		$bp_medium	= 600 / 16;

		$size_tags = array( 'large', 'medium', 'small' );
		$images = array();

		foreach ( $size_tags as $tag ) {
			$images[] = wp_get_attachment_image_src( $id, $size_tag . '-' . $tag );
			$images[] = wp_get_attachment_image_src( $id, $size_tag . '-' . $tag . '-2x' );
		}

		$picture  = '<picture>';
		$picture .= '<!--[if IE 9]><video style="display: none;"><![endif]-->'; // For IE9 compatibility + Picturefill.js
		$picture .= sprintf( '<source srcset="%s, %s 2x" media="(min-width: ' . $bp_medium . 'em)">', $images[0][0], $images[1][0] );
		$picture .= sprintf( '<source srcset="%s, %s 2x" media="(min-width: ' . $bp_small . 'em)">', $images[2][0], $images[3][0] );
		$picture .= sprintf( '<source srcset="%s, %s 2x">', $images[4][0], $images[5][0] );
		$picture .= '<!--[if IE 9]></video><![endif]-->';
		$picture .= sprintf( '<img srcset="%s, %s 2x" alt="%s">', $images[4][0], $images[5][0], esc_attr( $title ) );
		$picture .= '</picture>';

		return $picture;
	}
}


/**
 * Full Bleed Hero Image
 */
if ( ! function_exists( 'rp3_full_bleed_hero_image' ) ) {
	function rp3_full_bleed_hero_image( $image_id, $args ) {

		$defaults = array(
			'id'			=> '',
			'classes'		=> 'hero-image',
			'permalink'		=> '',
			'image_size'	=> 'home-page-hero',
			'title'			=> '',
			'client'		=> ''
		);

		$args = wp_parse_args( $args, $defaults );

		$html = '';

		if ( '' != $args['id'] ) {
			$html = '<section id="' . esc_attr( $args['id'] ) . '" class="' . esc_attr( $args['id'] ) . ' hero ' . esc_attr( $args['classes'] ) . '">' . "\n";
		} else {
			$html = '<section class="hero ' . esc_attr( $args['classes'] ) . '">' . "\n";
		}

		// <a>
		if ( '' != $args['permalink'] ) {
			$html .= '<a href="' . esc_url( $args['permalink'] ) . '" class="hero__container">';
		} else {
			$html .= '<div class="hero__container">';
		}

		$html .= '<div class="hero__image">' . rp3_picture_element( $image_id, $args['image_size'], $args['title'] ) . '</div>';

		if ( ( '' != $args['title'] ) && ( '' != $args['client'] ) ) {
			$html .= '<div class="wrapper"><div class="hero__headline"><h1>' . $args['title'] . '</h1>for <strong>' . $args['client'] . '</strong></div></div>';
		}

		// </a>
		if ( '' != $args['permalink'] ) {
			$html .= '</a>';
		} else {
			$html .= '</div>';
		}

		// </section>
		$html .= '</section>';

		return $html;

	}
}



// Output the hero images for the work & case study pages
function rp3_case_study_hero_image( $image_id, $tall = false ) {

	$image_size = 'case-study';
	$classes = 'hero-image case-study-hero-image';

    if ( $tall ) {
        $image_size .= '-tall';
        $classes .= '-tall';
    }

	echo rp3_full_bleed_hero_image( $image_id, array(
		'image_size'	=> $image_size,
		'classes'		=> $classes
	) );
}



/**
 * Custom function to return an excerpt with an inline "Continue Reading" tag
 */
if ( ! function_exists( 'rp3_get_the_excerpt' ) ) {

	function rp3_get_the_excerpt() {
		global $post;

		$excerpt = get_the_content() . ' <span class="link continue">Continue Reading</span>';

		$excerpt = apply_filters( 'get_the_excerpt', $excerpt );

		return $excerpt;
	}
}
