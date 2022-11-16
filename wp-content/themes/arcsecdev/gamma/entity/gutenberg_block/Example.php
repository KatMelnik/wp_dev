<?php

namespace gamma\entity\gutenberg_block;

class Example extends BaseBlock
{

	/**
	 * String
	 * @var string
	 */
	public $title;

	/**
	 * Text
	 * @var string
	 */
	public $description;

	/**
	 * Image URL
	 * @var string
	 */
	public $image;


	public function __construct()
	{
		$this->title = $this->getField('title');

		$this->description = $this->getField('description');

		$this->image = $this->getField('image');
	}


	public function getTitle()
	{
		return 'Hahahahhaha';
	}
}
