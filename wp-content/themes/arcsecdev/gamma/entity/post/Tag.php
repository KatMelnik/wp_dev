<?php


namespace gamma\entity\post;


use gamma\entity\BaseEntity;
use gamma\entity\BaseTerm;

class Tag extends BaseTerm {

    /**
     * @inheritDoc
     */
    public function setEntityType(): void
    {
        $this->entityType = 'post_tag';
    }


    public function getPosts($limit = 0)
    {

        if(is_null($this->posts)){
            $args = array(
                'numberposts'      => $limit,
                'tag_id'         => $this->id,
            );

            $posts = get_posts($args);

            $this->posts = postFactory()->convertPosts($posts);
        }

        return $this->posts;
    }

    public function getCountPost()
    {
        $wpQuery = new \WP_Query([
            'tag_id'       => $this->id,
            'posts_per_page' => -1,
        ]);

        return $wpQuery->found_posts;
    }

}
