<?php


namespace gamma\entity\post;


use gamma\entity\BaseEntity;
use gamma\entity\User;
use gamma\helpers\ArrayHelper;
use gamma\helpers\StringHelper;

class Post extends BaseEntity implements \JsonSerializable
{

	protected $attachment;
	protected $tags;
	protected $author;
	protected $categories;


	/**
	 * @inheritDoc
	 */
	public function setId( $entityId ): void
	{
		if($entityId instanceof \WP_Post)
			$this->id = $entityId->ID;
		elseif ($entityId = absint($entityId))
			$this->id = $entityId;
		else
			throw new \InvalidArgumentException('Post ID not correctly!!!!');


	}

    /**
     * WP_Post or WP_User etc.
     * @return object
     */
    public function setEntity($entityId): void
    {
        $post = get_post($this->getId());

        if($post instanceof \WP_Post)
        	$this->entity = $post;
		else
	        throw new \InvalidArgumentException('Post with ID:'.$entityId.' do not exist!!!!');
    }

    /**
     * Return type for object 'post', 'user' etc.
     * @return string
     */
    public function setEntityType(): void
    {
	    $this->entityType = $this->entity->post_type;
    }

    /**
     * Return All metas which isset for current entity
     * @return array
     */
    protected function setEntityMetas(): void
    {
        $metas = get_fields($this->id);
	    $metas = $metas ? $metas:[];
        $this->metas = array_merge($metas, []) ;
    }


	public function getLink(): string
	{
		return get_permalink($this->entity);
	}

	public function getMainAttachment(): Attachment
	{
		if(is_null($this->attachment))
			$this->attachment = new Attachment($this->entity);

		return $this->attachment;
	}

	public function getDate($format = 'm.d.Y')
	{
		return get_the_date($format, $this->entity);
	}

	public function getAuthor(): User
	{
		if(is_null($this->author))
			$this->author = (new User($this->post_author));

		return $this->author;
	}

    public function getExcerpt()
    {
        return StringHelper::length(trim($this->post_excerpt)) ? strimString($this->post_excerpt, 120):strimString($this->post_content, 120);
    }

	public function getTags(): array
	{
		$tags = get_terms( [
			'taxonomy'      => ['post_tag'],
			'object_ids'    => [$this->id],
		] );

		if(!$tags)
			return [];

		return tagFactory()->convertTags($tags);
	}

	public function getCategories(): array
	{
		if(is_null($this->categories))
			$this->categories = wp_get_post_categories( $this->id, ['fields' => 'all_with_object_id'] );

        return categoryFactory()->convertCategories($this->categories);
	}

	public function getCategoriesFields(string $fieldName): array
	{
		return ArrayHelper::getColumn($this->getCategories(), $fieldName);
	}

	public function getRelatedPosts(): array
	{
		$categoryIds = wp_get_post_categories( $this->id, ['fields' => 'ids'] );

		$posts = get_posts([
			'numberposts' => 3,
			'category' => $categoryIds,
			'exclude' => $this->id,
		]);

		if(!$posts)
			return [];

		return postFactory()->convertPosts($posts);
	}

    public function getRelatedEntityByTax($taxonomy, $args = []): array
    {
        $defaults = array( 'fields' => 'ids' );

        $args     = wp_parse_args( $args, $defaults );

        $terms = wp_get_object_terms( $this->id, $taxonomy, $args );

        $posts = postFactory( getEntityByPostType( $this->getEntityType() ) )->getPosts([
            'post_type' => $this->getEntityType(),
            'posts_per_page' => 3,
            'post__not_in' => [$this->getId()],
            'tax_query' => [
                [
                    'taxonomy' => $taxonomy,
                    'terms'    => $terms
                ]
            ]
        ]);

        return $posts;
    }


	public function getMeta($key, $single = true, $default = null)
	{
		$metaValue = get_post_meta($this->id, $key, $single);

		if(!is_null($metaValue)){
			$this->metas[$key] = $metaValue;
			return $metaValue;
		}

		return $default;
	}


	/**
	 * @inheritDoc
	 */
	public function jsonSerialize()
	{
        return [
            'id' => $this->id,
            'title' => strimString($this->post_title, 50),
            'content' => strimString($this->post_content, 125),
            'link' => $this->getLink(),
            'img_url' => $this->getMainAttachment()->getSrc('full'),
        ];
	}
}
