<?php

namespace gamma\useCases;


use gamma\entity\post\Category;

class CategoryFactory {
	/**
	 * @param $post \WP_Term object or integer
	 * @return Category
	 */
	public function create($wpTerm): Category
	{
		return (new Category($wpTerm));
	}

	public function convertCategories(array $categories): array
	{
		$gammaCategories = [];

		foreach ($categories as $category){
			$gammaCategories[] = $this->create($category);
		}

		return $gammaCategories;
	}

	public function getCategories(array $args = null)
	{
		$categories = is_array($args) && count($args) ? get_categories($args):get_categories();

		return $this->convertCategories($categories);
	}
}
