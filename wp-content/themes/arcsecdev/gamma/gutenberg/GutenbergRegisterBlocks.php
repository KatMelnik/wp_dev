<?php


namespace gamma\gutenberg;


use gamma\gutenberg\block as block;
use gamma\gutenberg\category\GutenbergCategory;

class GutenbergRegisterBlocks
{

    private $blocksOptions = [
        /*[
            'block_name'        => 'Example Block', //uniq string!!!! Required!!!!! can contain one or more words
            'block_title'       => 'Example Block Title', //string - Required!!!!! Title block in editor. Can contain one or more words
            'block_description' => 'Example Block Description', // string -Required!!!!! Description block in editor. Can contain one or more words
            'block_preview'     => 'preview.jpg', // string -Required!!!!!, Image for preview block, should be in folder assets/images/gutenberg_block_previews
            'block_icon'        => '<svg class="svg-icon" viewBox="0 0 20 20"><path d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z"></path></svg>', // string SVG -Required!!!!!, Image for icon block, should be string svg
        ],*/
    ];

    private $blocks = [
        block\library\Accordion::class,
        block\library\CarouselSlider::class,
        block\library\Columns::class,
        block\library\ContentWithImage::class,
        block\library\FlexibleSpacer::class,
        block\library\FlipCards::class,
        block\library\FullSlider::class,
        block\library\Hero::class,
        block\library\IconContentItems::class,
        block\library\LastPosts::class,
        block\library\PopupCards::class,
        block\library\Tabs::class,
    ];

    private $categories = [
        THEME_NAME => GutenbergCategory::class,
    ];

    public function __construct()
    {
        //Register blocks
        add_action('acf/init', [$this, 'register']);

        //Register category blocks
        add_filter( 'block_categories_all', [$this, 'registerCategory'], 10, 2 );

    }


    /**
     * Register All Blocks
     */
    public function register()
    {
        $this->createBlocks();

        $blocks = apply_filters('gamma_register_gutenberg_blocks', $this->blocks);

        foreach($blocks as $block){
            $this->boot($this->resolve($block));
        }
    }


    /**
     * Create All Blocks
     */
    private function createBlocks()
    {
        $blockFactory = new GutenbergBlockFactory();

        foreach ($this->blocksOptions as $blockOptions){
            if($blockFactory->existBlock($blockOptions['block_name'])){
                $this->blocks[] = $blockFactory->getBlockClassName($blockOptions['block_name']);
                continue;
            }

            if($blockFactory->createBlock($blockOptions))
                $this->blocks[] = $blockFactory->getBlockClassName($blockOptions['block_name']);
        }
    }


    /**
     * Boot Block
     */
    private function boot(GutenbergInterface $block)
    {
        if( function_exists('acf_register_block_type') ) {

            // Register a block.
            acf_register_block_type($block->getSettings());
        }
    }


    /**
     * Resolve Block Class
     */
    private function resolve($className): GutenbergInterface
    {
        return new $className();
    }

    /**
     * Register Category Blocks
     */
    public function registerCategory($categories, $block_editor_context)
    {
        $postTypesForBlocks = getPostTypesForBlocks();

        if(!in_array($block_editor_context->post->post_type, $postTypesForBlocks))
            return $categories;

        $selfCategories = [];

        foreach ($this->categories as $categoryClassName){
            $category = $this->resolve($categoryClassName);
            $selfCategories[] = $category->getSettings();
        }

        return array_merge(
            $categories,
            $selfCategories
        );
    }
}
