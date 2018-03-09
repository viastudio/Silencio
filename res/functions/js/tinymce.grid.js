jQuery(document).ready(function ($) {
    tinymce.PluginManager.add('silencio_grid', function (editor, url) {
        editor.addButton('silencio_grid', {
            type: 'listbox',
            text: 'Grid Layout',
            icon: false,
            fixedWidth: true,
            minWidth: 80,
            onselect: function (e) {
                var content = tinymce.activeEditor.selection.getContent();

                if (content !== '') {
                    tinymce.activeEditor.selection.setContent('[' + this.value() + ']' + content + '[/' + this.value() + ']');
                } else {
                    tinymce.activeEditor.selection.setContent('[' + this.value() + '][/' + this.value() + ']');
                }

                this.value(null);
            },
            values: [
                {text: 'row', value: 'row'},
                {text: 'column', value: 'column'},
                {text: 'column 1/2', value: 'column-50'},
                {text: 'column 1/3', value: 'column-33'},
                {text: 'column 2/3', value: 'column-66'},
                {text: 'column 1/4', value: 'column-25'},
                {text: 'column 3/4', value: 'column-75'}
            ]
        });
    });
});
