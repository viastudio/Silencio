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
                }

                this.value(null);
            },
            values: [
                {text: 'row', value: 'row'},
                {text: 'col1', value: 'col1'},
                {text: 'col2', value: 'col2'},
                {text: 'col3', value: 'col3'},
                {text: 'col4', value: 'col4'},
                {text: 'col5', value: 'col5'},
                {text: 'col6', value: 'col6'},
                {text: 'col7', value: 'col7'},
                {text: 'col8', value: 'col8'},
                {text: 'col9', value: 'col9'},
                {text: 'col10', value: 'col10'},
                {text: 'col11', value: 'col11'},
                {text: 'col12', value: 'col12'}
            ]
        });
    });
});
