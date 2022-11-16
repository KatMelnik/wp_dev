<?php


namespace gamma\useCases;

use gamma\entity\post\Post;
use gamma\helpers\StringHelper;

class PostFactory {

    protected $postType;

    public function __construct($postType = 'post')
    {
        $this->postType = $postType;
    }

	/**
	 * @param $post \WP_Post object or integer
	 * @return Post
	 */
    public function create($wpPost)
    {
        $className = StringHelper::className($this->postType);
        $postObject = 'gamma\entity\post\\'.$className;

        return (new $postObject($wpPost));
    }

    public function getPosts($args = []): array
    {
        $args = $this->parseArgs($args);

        $wpQuery = new \WP_Query($args);

        return $this->convertPosts($wpQuery->posts);
    }

    public function getCountPost($args = [])
    {
        $args = $this->parseArgs($args);

        $wpQuery = new \WP_Query($args);

        return $wpQuery->found_posts;
    }

	public function convertPosts(array $posts): array
	{
		$gammaPosts = [];

		foreach ($posts as $post){
			$gammaPosts[] = $this->create($post);
		}

		return $gammaPosts;
	}

	public function getStickyPosts($args = [])
	{

        $args = $this->parseArgs([
            'post__in'  => get_option( 'sticky_posts' ),
        ]);

		$wpQuery = new \WP_Query( $args );

		return $this->convertPosts($wpQuery->posts);
	}

    protected function parseArgs($args)
    {
        return wp_parse_args($args, [
            'post_type'    => $this->postType,
            'post_status'  => 'publish'
        ]);
    }
}
