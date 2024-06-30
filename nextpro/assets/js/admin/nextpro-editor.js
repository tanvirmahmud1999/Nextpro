(function ($) {
    'use strict';

    function nextpro_add_container_wrapper_class() {
        let container = $('#container').val();
        if ('container' !== container) {
            $('body').addClass('editor-styles-wrapper-full');
            console.log('full-container #######');
        } else {
            $('body').removeClass('editor-styles-wrapper-full');
            console.log('container #######')
        }
    }

    function init() {
        if ($('#container').length) {
            $(document).on('change', '#container', function () {
                nextpro_add_container_wrapper_class();
            });
            $('#container').trigger('change');
        }

    }

    // Container Margin options
    function nextproMarginAfterOptions(marginAfterOptions) {
        marginAfterOptions = nextproEditor.margin;
        return marginAfterOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.container.marginAfterOptions',
        'myplugin/wp-bootstrap-blocks/container/marginAfterOptions',
        nextproMarginAfterOptions
    );

    // Horizontal gutters for row
    function nextproRowHorizontalGuttersOptions(horizontalGuttersOptions) {
        horizontalGuttersOptions = nextproEditor.gutterX;
        return horizontalGuttersOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.horizontalGuttersOptions',
        'myplugin/wp-bootstrap-blocks/row/horizontalGuttersOptions',
        nextproRowHorizontalGuttersOptions
    );

    // Vertical gutters for row
    function nextproRowVerticalGuttersOptions(verticalGuttersOptions) {
        verticalGuttersOptions = nextproEditor.gutterY;
        return verticalGuttersOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.verticalGuttersOptions',
        'myplugin/wp-bootstrap-blocks/row/verticalGuttersOptions',
        nextproRowVerticalGuttersOptions
    );

    // Column paddings
    function nextproColumnPaddingOptions(paddingOptions) {
        paddingOptions = nextproEditor.padding;
        return paddingOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.column.paddingOptions',
        'myplugin/wp-bootstrap-blocks/column/paddingOptions',
        nextproColumnPaddingOptions
    );


    function nextproRowTemplates(templates) {
        nextproEditor.columnTemplates.forEach(function (template) {
            templates.push(template);
        });

        return templates;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.row.templates',
        'myplugin/wp-bootstrap-blocks/row/templates',
        nextproRowTemplates
    );


    function nextproColumnBgColorOptions(bgColorOptions) {
        bgColorOptions = nextproEditor.colors;
        return bgColorOptions;
    }
    wp.hooks.addFilter(
        'wpBootstrapBlocks.column.bgColorOptions',
        'myplugin/wp-bootstrap-blocks/column/bgColorOptions',
        nextproColumnBgColorOptions
    );



    // Run when a document ready on the front end.
    $(document).ready(init);

})(jQuery);