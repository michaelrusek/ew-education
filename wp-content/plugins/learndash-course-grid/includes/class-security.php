<?php
namespace LearnDash\Course_Grid;

if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

class Security
{
    public function __construct()
    {
        add_filter( 'wp_kses_allowed_html', [ $this, 'filter_allowed_html' ], 10, 2 );
    }

    /**
     * Filter to allow HTML tags for course grid meta box
     * 
     * @param  array  $tags    List of HTML tags
     * @param  string $context String of context
     * @return array           New allowed HTML tags
     */
    function filter_allowed_html( $tags, $context )
    {
        if ( 'learndash_course_grid_embed_code' == $context ) {
            $tags['iframe'] = [
                'allowfullscreen' => true,
                'frameborder' => true,
                'height' => true,
                'src' => true,
                'width' => true,
                'allow' => true,
                'class' => true,
                'data-playerid' => true,
                'allowtransparency' => true,
                'style' => true,
                'name' => true,
                'watch-type' => true,
                'url-params' => true,
                'scrolling' => true,
            ];

            $tags['video'] = [
                'controls' => true,
                'autoplay' => true,
                'height' => true,
                'width' => true,
                'src' => true,
            ];

            $tags['source'] = [
                'src' => true,
                'media' => true,
                'sizes' => true,
                'type' => true,
            ];

            $tags['track'] = [
                'default' => true,
                'src' => true,
                'srclang' => true,
                'kind' => true,
                'label' => true,
            ];
        }

        return $tags;
    }
}
