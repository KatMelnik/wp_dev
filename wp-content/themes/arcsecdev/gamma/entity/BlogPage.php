<?php

namespace gamma\entity;


use gamma\entity\post\Category;
use gamma\helpers\ArrayHelper;

class BlogPage
{
    private $pageId;

    private $mainCategories = [];

    private $allPosts = [];
    /**
     * BlogPage constructor.
     * @param \WP_Post $post Blog page object
     */
    public function __construct()
    {
        $this->pageId = get_option( 'page_for_posts' );;
    }


    public function getMainCategories(): array
    {

        if(count($this->mainCategories))
            return $this->mainCategories;

        $categories = get_field('main_categories', $this->pageId);

        if(!$categories)
            return [];

        $this->mainCategories = categoryFactory()->convertCategories($categories);

        return $this->mainCategories;
    }

    public function getMainCategoriesIds(): array
    {

        $catIds = [];

        foreach ($this->getMainCategories() as $mainCategory) {
            $catIds[] = $mainCategory->getId();
        }

        return $catIds;
    }

    public function getPosts(int $page = 1)
    {

        return postFactory()->getPosts([
            'post_type'    => 'post',
            'paged'        => $page,
        ]);
    }

    public function getPostsByCategories(int $page = 1)
    {

        return postFactory()->getPosts([
            'post_type'    => 'post',
            'paged'        => $page,
            'category__in' => $this->getMainCategoriesIds(),
        ]);
    }

    public function getSidebarBlocks(): array
    {
        $blocks = get_field('sidebar_categories', $this->pageId);

        if(!$blocks)
            return [];

        foreach ($blocks as &$block) {
            $block['posts'] = is_array($block['posts']) ? $block['posts']:[];
            $block['posts'] = postFactory()->convertPosts($block['posts']);

        }
        unset($block);
        return $blocks;
    }

    public function getLink()
    {
        return get_permalink($this->pageId);
    }

}
