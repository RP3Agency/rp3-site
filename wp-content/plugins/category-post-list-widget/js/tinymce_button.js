(function() {
    tinymce.create('tinymce.plugins.cplw_posts', {
        init : function(ed, url) {
             ed.addButton('CPLWPosts', {
                title : 'Add posts to list',
                cmd : 'CPLWPosts',
                image : url + '/../images/icon.png'
            });

            ed.addCommand('CPLWPosts', function() {
                ed.windowManager.open(
                    {
                        file : ajaxurl+'?action=show_CPLW_diaglogbox',
                        width : 500,
                        height : 550,
                        inline : 1
                    },
                    {
                        plugin_url : url,                        
                    }
                );                  
            });
        },
        
    });

    tinymce.PluginManager.add('cplwPosts', tinymce.plugins.cplw_posts);
})();