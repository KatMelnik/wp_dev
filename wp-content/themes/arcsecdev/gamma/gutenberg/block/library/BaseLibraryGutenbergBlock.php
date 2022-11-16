<?php


namespace gamma\gutenberg\block\library;

use gamma\gutenberg\block\BaseGutenbergBlock;

abstract class BaseLibraryGutenbergBlock extends BaseGutenbergBlock
{


    protected function getRenderTemplate(): string
    {
        return VIEW_PATH.'gutenberg_block/library/'.$this->getTemplate().'.php';
    }


}
