<?php

	namespace gamma\gutenberg\block;

	use gamma\gutenberg\GutenbergInterface;
	use gamma\gutenberg\category\GutenbergCategory;

	abstract class BaseGutenbergBlock implements GutenbergInterface
	{

	    const PREVIEW_IMG_URL = TEMPLATE_URI_IMG.'/gutenberg_block_previews/';

		abstract protected function getName(): string;

		abstract protected function getTitle(): string;

		abstract protected function getDescription(): string;


		public function getSettings(): array
		{
			$settings = [
				'name'              => $this->getName(),
				'title'             => $this->getTitle(),
				'description'       => $this->getDescription(),
				'render_template'   => $this->getRenderTemplate(),
				'category'          => $this->getCategory(),
				'icon'              => $this->getIcon(),
				'keywords'          => $this->getKeywords(),
				'post_types'        => $this->getPostTypes(),
                'mode'              => 'edit',
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => array(
                            'is_preview'    => true,
                            'preview_img_src' => self::PREVIEW_IMG_URL.$this->getPreview()
                        )
                    ]
                ]
				/*'enqueue_style'     => $this->getEnqueueStyle(),
				'enqueue_script'    => $this->getEnqueueScript(),*/
			];

			if(is_admin()){
				$settings['enqueue_style'] = $this->getEnqueueStyle();
				$settings['enqueue_script'] = $this->getEnqueueScript();
			}

			return $settings;
		}

        /**
         * @return string Image Src
         */
        protected function getPreview(): ?string
        {
		    return null;
        }

		protected function getTemplate(): string
		{
			return $this->getName();
		}

        protected function getRenderTemplate(): string
		{
			return VIEW_PATH.'gutenberg_block/'.$this->getTemplate().'.php';
		}

		protected function getCategory(): string
		{
			return GutenbergCategory::SLUG;
		}

		protected function getIcon(): string
		{
			return 'admin-post';
		}

		protected function getKeywords(): array
		{
			return [];
		}

		protected function getPostTypes(): array
		{
			return getPostTypesForBlocks();
		}

        protected function getEnqueueStyle(): ?string
        {
            return null;//get_template_directory_uri() . '/assets/css/gutenberg_block/admin.css';
        }

        protected function getEnqueueScript(): ?string
        {
            return null; //get_template_directory_uri() . '/assets/js/gutenberg_block/admin.js';
        }
	}
