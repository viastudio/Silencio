jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.grid', {
        init : function(ed, url) {
        },

        // Create our dropdown
        createControl: function(controlName, controlManager) {
            var gridShortcodes = [
                'row',
                'col1',
                'col2',
                'col3',
                'col4',
                'col5',
                'col6',
                'col7',
                'col8',
                'col9',
                'col10',
                'col11',
                'col12'
            ];

            if (controlName === 'silencio_grid') {
                var grid_select = controlManager.createListBox('silencio_grid', {
                     title: 'Grid Layout',
                     onselect: function(shortcode) {
                        var content = tinyMCE.activeEditor.selection.getContent();

                        if (content !== '') {
                            tinyMCE.activeEditor.selection.setContent('[' + shortcode + ']' + content + '[/' + shortcode + ']');
                        }

                        return false; // reset value after click
                     }
                });

                for (var i = 0; i < gridShortcodes.length; i++) {
                    grid_select.add(gridShortcodes[i], gridShortcodes[i]);
                }

                return grid_select;
            }

            return null;
        }
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('silencio_grid', tinymce.plugins.grid);
});
