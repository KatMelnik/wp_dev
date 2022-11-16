<?php
/**
 * echo content page
 */
function gammaPageContent()
{
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    endif;
}

function renderView($viewPath, $data = [])
{
    \gamma\View::render($viewPath, $data);
}

function getRenderView($viewPath, $data = [])
{
    return \gamma\View::getRender($viewPath, $data);
}

//Wrap for wp_nav_menu
function gammaHeaderMenu()
{
    wp_nav_menu([
        'container'      => '',
        'menu_id'        => 'mainnav-menu',
        'menu_class'     => 'header_menu main-navigation-menu',
        'theme_location' => 'primary_menu',
        'walker'         => new \gamma\walker\GammaNavWalker(),
    ]);
}

function gammaFooterMenu()
{
    wp_nav_menu([
        'theme_location' => 'footer_menu',
    ]);
}

function postFactory($postType = 'post'): \gamma\useCases\PostFactory
{
    return (new \gamma\useCases\PostFactory($postType));
}

function tagFactory(): \gamma\useCases\TagFactory
{
    return (new \gamma\useCases\TagFactory());
}

function categoryFactory(): \gamma\useCases\CategoryFactory
{
    return (new \gamma\useCases\CategoryFactory());
}

function userFactory(): \gamma\useCases\UserFactory
{
    return \gamma\useCases\UserFactory::getInstance();
}

function optionsFactory($optionsClass): \gamma\entity\options\BaseOptions
{
    $className = '\\gamma\\entity\\options\\'.$optionsClass;

    if(!class_exists($className))
        throw new Exception("Options Class $optionsClass do not exists!!!");

    return (new $className());
}

function strimString($string, int $length, $append = '...')
{
    $string = wp_strip_all_tags($string);
    $string = trim($string);
    return mb_strimwidth($string, 0, $length, $append);
}

function isPluginActive($pathPlugin)
{
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    return is_plugin_active($pathPlugin);
}

function arrGetValue($array, $key, $default = null)
{
    return \gamma\helpers\ArrayHelper::getValue($array, $key, $default);
}

function isNotEmpty($value)
{
    if(is_array($value)){
        return count($value);
    }
    else{
        return !empty($value);
    }
}

//existArrParam('key', $array)
function existArrParam($key, $haystack)
{
    return is_array($haystack) && isset($haystack[$key]) && !empty($haystack[$key]);
}


function generateAcfLink($data, $attr = [])
{
    $linkData = [
        'url'    => $data['url'] ?? '#',
        'target' => isset($data['target']) && !empty($data['target']) ? $data['target'] : '_self',
        'title'  => $data['title'] ?? '',
        'attr'   => wp_parse_args($attr, [
            'id'         => '',
            'class'      => '',
            'aria-label' => '',
        ])
    ];

    renderView('common/link', compact('linkData'));
}

function generateAcfImage($data, $attr = [])
{
    $attachmentID = isset($data['ID']) && is_numeric($data['ID']) ? $data['ID']:0;

    echo (new \gamma\entity\post\Attachment($attachmentID))->generateImage($attr);
}

function generateTitleTag(array $data, array $attr = [])
{
    $defaultArgs = [
        'title_text' => 'Title',
        'title_tag' => 'div',
        'attr' => $attr
    ];

    if (isset($data['title'])){
        $data = wp_parse_args($data['title'], $defaultArgs);
    }
    else{
        $data = $defaultArgs;
    }

    renderView('common/tag', compact('data'));
}

function redirect404() {
    global $wp_query;
    $wp_query->set_404();
    status_header( 404 );
    get_template_part( 404 );
    exit();
}

function getBlogPage(): \gamma\entity\BlogPage
{
    return new \gamma\entity\BlogPage();
}

/**
 * Recursively sort an array of taxonomy terms hierarchically. Child categories will be
 * placed under a 'children' member of their parent term.
 * @param Array   $cats     taxonomy term objects to sort
 * @param integer $parentId the current parent ID to put them in
 */
function sort_terms_hierarchicaly(Array $cats, $parentId = 0)
{
    $into = [];
    foreach ($cats as $i => $cat) {
        if ($cat->parent == $parentId) {
            $cat->children = sort_terms_hierarchicaly($cats, $cat->term_id);
            $into[$cat->term_id] = $cat;
        }
    }
    return $into;
}

function getEntityByPostType($postType)
{
    $relation = [
        'post' => 'Post',
        /*'event' => 'Event',
        'coach' => 'Coach',
        'case_study' => 'CaseStudy',
        'partners' => 'Partner'*/
    ];

    return $relation[$postType];
}

function getPostTypesForBlocks(): array
{
    $postTypes = ['post', 'page'];
    /*$customPostTypes =  get_post_types( [
        'public'   => true,
        '_builtin' => false
    ], 'names', 'and' );

    if ($customPostTypes){
        $postTypes = array_merge($postTypes, array_values($customPostTypes));
    }*/

    return $postTypes;
}

