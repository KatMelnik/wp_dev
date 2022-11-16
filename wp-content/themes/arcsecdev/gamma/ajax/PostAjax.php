<?php

namespace gamma\ajax;


use gamma\helpers\ArrayHelper;

class PostAjax extends GammaAjax
{

    public function newsroomLoadMore()
    {
        $this->prepare('newsroom_load_more_posts');

        $methodName = $this->pageType.'LoadPosts';

        return $this->$methodName();

    }

    private function blogLoadPosts()
    {
        $blogPage = getBlogPage();

        $posts = $blogPage->getPosts(intval($this->page));

        $data = [
            'html'          => $this->getPostsHtml($posts),
            'count'         => $this->getCountPosts(),
        ];

        $this->sendResponse($data);
    }

    private function categoryLoadPosts()
    {

        $posts = $this->getPosts([
            'paged'     => intval($this->page),
            'cat'       => $this->taxId
        ]);

        $data = [
            'html'          => $this->getPostsHtml($posts),
            'count'         => $this->getCountPosts([
                                    'cat' => $this->taxId
                                ]),
        ];

        $this->sendResponse($data);
    }

    private function tagLoadPosts()
    {

        $posts = $this->getPosts([
            'paged'     => intval($this->page),
            'tag_id'    => $this->taxId
        ]);

        $data = [
            'html'          => $this->getPostsHtml($posts),
            'count'         => $this->getCountPosts([
                                    'tag_id'         => $this->taxId
                                ]),
        ];

        $this->sendResponse($data);

    }

    private function getCountPosts($args = [])
    {
        $args = wp_parse_args($args, [
            'posts_per_page' => -1,
            'post_type'      => 'post',
        ]);

        return postFactory()->getCountPost($args);
    }

    private function getPosts($args = [])
    {
        $args = wp_parse_args($args, [
            'post_type'      => 'post',
        ]);

        return postFactory()->getPosts($args);
    }

    private function getPostsHtml($posts = [])
    {
        $html = '';
        foreach ($posts as $post) {
            $html .= getRenderView('components/cards/post-card', compact('post'));
        }

        return $html;
    }
}
