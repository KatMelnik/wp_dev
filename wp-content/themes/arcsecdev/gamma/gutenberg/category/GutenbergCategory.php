<?php

	namespace gamma\gutenberg\category;


	use gamma\gutenberg\GutenbergInterface;

	class GutenbergCategory implements GutenbergInterface
	{
		const SLUG = THEME_NAME;

		private $data;

		public function __construct()
		{
			$this->data = [
				'slug'  => self::SLUG,
				'title' => ucfirst(self::SLUG),
				'icon'  => 'admin-site',
			];
		}

		public function getSettings(): array
		{
			return $this->data;
		}
	}
