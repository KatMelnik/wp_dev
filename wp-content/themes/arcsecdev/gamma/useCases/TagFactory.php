<?php


namespace gamma\useCases;

use gamma\entity\post\Tag;

class TagFactory {
	/**
	 * @param $post \WP_Term object or integer
	 * @return Tag
	 */
	public function create($wpTerm): Tag
	{
		return (new Tag($wpTerm));
	}

	public function convertTags(array $tags): array
	{
		$gammaTags = [];

		foreach ($tags as $tag){
			$gammaTags[] = $this->create($tag);
		}

		return $gammaTags;
	}
}
