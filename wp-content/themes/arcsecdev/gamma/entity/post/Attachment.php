<?php


namespace gamma\entity\post;


class Attachment {
	private $id;

	public function __construct($post)
	{
        if($post instanceof \WP_Post)
		    $this->id = get_post_thumbnail_id($post);
        elseif (is_numeric($post))
            $this->id = intval($post);
        else
            $this->id = 0;
	}

	public function exist()
	{
		return $this->id ? true:false;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getSrc($size = 'full')
	{
		return $this->exist() ? wp_get_attachment_image_src($this->id, $size)[0] : $this->getIfNotExist();
	}

	public function getAlt()
	{
		return $this->exist() ? get_post_meta($this->id, '_wp_attachment_image_alt', true) : $this->getDefaultAlt();
	}

	public function getTitle()
	{
		return $this->exist() ? get_the_title($this->id) : $this->getDefaultAlt();
	}

    public function generateImage($attr = [], $size = 'full')
    {
        return $this->exist() ? wp_get_attachment_image($this->id, $size, false, $attr): getRenderView('common/img', ['imgData' => $this->getDefaultImageData($attr)]);
    }

    protected function getDefaultImageData($attr = [])
    {
        return [
            'url'    => TEMPLATE_URI_IMG.'/default.jpg',
            'alt'    => 'Image',
            'title'  => 'Image',
            'width'  => '1200',
            'height' => '800',
            'attr'   => wp_parse_args($attr, [
                'id'         => '',
                'class'      => '',
                'aria-label' => '',
            ])
        ];
    }

	protected function getIfNotExist()
	{
		return null;
	}

    protected function getDefaultAlt()
    {
        return 'Image';
    }

}
