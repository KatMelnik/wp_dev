<?php


namespace gamma\gutenberg;

use gamma\helpers\StringHelper;

final class GutenbergBlockFactory
{
    private $options;

    //Namespace for block classes
    const BASE_NAMESPACE_BLOCK = '\\gamma\\gutenberg\\block\\';

    //Path to block classes
    private $baseBlockPath;

    //Path to view templates
    private $baseViewPath;

    //Path to blocks scss files
    private $baseScssPath;

    //Path to code templates
    private $baseCodeTemplatePath;



    public function __construct(){

        $this->baseBlockPath = INC_PATH.'/gutenberg/block/';

        $this->baseViewPath = VIEW_PATH.'gutenberg_block/';

        $this->baseScssPath = THEME_ROOT_PATH.'/assets/css/gutenberg_block/';

        $this->baseCodeTemplatePath = INC_PATH.'/gutenberg/template/';
    }

    /**
     * @param string $blockName Uniq block name
     * @return bool
     */
    public function existBlock(string $blockName): bool
    {
        $filePath = $this->baseBlockPath.$this->getBlockName($blockName).'.php';

        return file_exists( $filePath );
    }

    /**
     * @param string $blockName Uniq block name
     * @return string Block class name with namespace
     */
    public function getBlockClassName(string $blockName): string
    {
        return self::BASE_NAMESPACE_BLOCK.$this->getBlockName($blockName);
    }

    /**
     * @param array $options Options for create block
     * @return bool created class name or failed to create class
     */
    public function createBlock(array $options): bool
    {
        $this->options = $options;

        $this->createBlockScss();

        return  $this->createBlockView() && $this->createBlockClass();
    }


    /**
     * Create block class
     * @return bool Created or not file class
     */
    private function createBlockClass(): bool
    {
        $classContent = $this->getBlockClassContent();

        $blockPath = $this->baseBlockPath.$this->getBlockName($this->options['block_name']).'.php';

        return file_put_contents($blockPath, $classContent) !== false;
    }

    /**
     * Create view template for block
     * @return bool Created or not view file
     */
    private function createBlockView(): bool
    {

        $filePath = $this->baseViewPath.$this->getBlockId($this->options['block_name']).'.php';

        if ( file_exists( $filePath ) )
            return false;

        $codePath = $this->baseCodeTemplatePath.'block_view.tpl';

        $content = file_get_contents($codePath);

        return file_put_contents($filePath, $content) !== false;

    }

    /**
     * Create scss file for block
     * @return bool Created or not scss file
     */
    private function createBlockScss(): bool
    {

        $filePath = $this->baseScssPath.$this->getBlockId($this->options['block_name']).'.scss';
        $baseBlocksPath = $this->baseScssPath.'base_blocks.scss';

        if ( file_exists( $filePath ) )
            return false;
        //Write path to main scss
        //@import "gutenberg_block/blocks";
        if(file_put_contents($filePath, '') !== false){
            file_put_contents($baseBlocksPath, '@import "'.$this->options['block_name'].'";', FILE_APPEND | LOCK_EX);
        }
        return true;

    }

    /**
     * Create view template for block
     * @return string Content for block class
     */
    private function getBlockClassContent(): string
    {
        $codePath = $this->baseCodeTemplatePath.'block_class.tpl';

        $content = file_get_contents($codePath);

        return sprintf($content, $this->getBlockName($this->options['block_name']), $this->getBlockId($this->options['block_name']), $this->options['block_title'], $this->options['block_description'], $this->options['block_preview'], $this->options['block_icon']);
    }

    /**
     * @param string $nameString
     * @return string
     */
    private function getBlockName(string $nameString): string
    {
        return StringHelper::className($nameString);
    }

    /**
     * @param string $idString
     * @return string
     */
    private function getBlockId(string $idString): string
    {
        return StringHelper::snake($idString);
    }

}
