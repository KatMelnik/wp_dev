<?php


namespace gamma\gutenberg\block;


class Example extends BaseGutenbergBlock
{
	protected function getName(): string
	{
		return 'example';
	}

	protected function getTitle(): string
	{
		return 'Example Block';
	}

	protected function getDescription(): string
	{
		return 'Example page block';
	}

    protected function getPreview(): string {
	    return 'hero-v1.png';
	}

}
