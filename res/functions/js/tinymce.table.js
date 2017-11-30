tinymce.PluginManager.add('silencio_table', function (editor, url) {
    editor.addButton('silencio_table', {
        type: 'listbox',
        text: 'Table Layout',
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
            {text: 'table', value: 'table'},
            {text: 'table head', value: 'table_head'},
            {text: 'table row', value: 'tr'},
            {text: 'table head cell', value: 'th'},
            {text: 'table body', value: 'table_body'},
            {text: 'table body cell', value: 'td'}
        ]
    });
});
