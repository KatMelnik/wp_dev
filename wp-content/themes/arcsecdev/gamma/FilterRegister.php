<?php


namespace gamma;


class FilterRegister
{
    public function __construct() {
        add_filter('the_content', [$this, 'cleanString']);
    }

    public function cleanString($content)
    {
        return str_replace("&nbsp;",'', $content);
    }
}
