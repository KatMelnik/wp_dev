<?php

namespace gamma\useCases;


class BreadcrumbsService
{

    /**
     * Return array with links
     * ['name' => 'ssssss', 'url' => 'eeee', 'current' => bool]
     * @return array
     */
    public function getPageCrumbs(): array
    {
        global $wp_query;

        $crumbs = [];

        if(!$wp_query->is_page)
            return $crumbs;

        $page = $wp_query->posts[0];

        $pageParents = $this->getPageParents($page);

        $pageParents = array_reverse($pageParents);
        array_push ($pageParents, [
            'title' => $page->post_title,
            'url' => get_permalink($page),
            'current' => true
        ]);


        return $pageParents;
    }

    protected function getPageParents(\WP_Post $page)
    {
        static $pageParents = [];

        if($page->post_parent === 0)
            return $pageParents;

        $pageParent = get_post($page->post_parent);

        $pageParents[] = [
            'title' => $pageParent->post_title,
            'url' => get_permalink($pageParent),
            'current' => false
        ];

        return $this->getPageParents($pageParent);
    }
}
