wp.domReady(() => {
    let unregisterBlocks = [
        'core/gallery',
        //'core/shortcode',
        'core/archives',
        //'core/audio',
        //'core/button',
        //'core/buttons',
        'core/calendar',
        'core/categories',
        'core/columns',
        'core/column',
        'core/cover',
        //'core/embed',
        //'core/file',
        'core/group',
        'core/freeform',
        'core/media-text',
        'core/latest-comments',
        'core/latest-posts',
        'core/missing',
        'core/more',
        'core/nextpage',
        'core/page-list',
        'core/pullquote',
        'core/rss',
        'core/search',
        'core/separator',
        'core/block',
        'core/social-links',
        'core/social-link',
        'core/spacer',
        'core/tag-cloud',
        'core/text-columns',
        'core/verse',
        //'core/video',
        'core/site-logo',
        'core/site-tagline',
        'core/site-title',
        'core/query',
        'core/post-template',
        'core/query-title',
        'core/query-pagination',
        'core/query-pagination-next',
        'core/query-pagination-numbers',
        'core/query-pagination-previous',
        'core/post-title',
        'core/post-content',
        'core/post-date',
        'core/post-excerpt',
        'core/post-featured-image',
        'core/post-terms',
        'core/loginout',
    ];

    wp.blocks.getBlockTypes().forEach((block) => {

        if (unregisterBlocks.includes(block.name)) {
            wp.blocks.unregisterBlockType( block.name );
        }
    });
    /*wp.blocks.getBlockTypes().forEach((block) => {
        console.log(block.name);
    });*/
});
