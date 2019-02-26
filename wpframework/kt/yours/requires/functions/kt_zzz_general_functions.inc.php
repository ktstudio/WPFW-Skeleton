<?php

// --- posts: archive & taxonomy/category ------------------------

add_action("wp_ajax_kt_zzz_load_more_posts", "kt_zzz_load_more_posts_callback");
add_action("wp_ajax_nopriv_kt_zzz_load_more_posts", "kt_zzz_load_more_posts_callback");

function kt_zzz_load_more_posts_callback()
{
    if (KT::arrayIssetAndNotEmpty($_REQUEST)) {
        $presenter = new KT_ZZZ_Posts_Presenter();
        die($presenter->getPostsOutput());
    }
    die(false);
}


// --- media: link & gallery ------------------------

add_filter("media_view_settings", "kt_zzz_media_view_settings_filter");

function kt_zzz_media_view_settings_filter($settings)
{
    $settings["galleryDefaults"]["link"] = "file";
    $settings["galleryDefaults"]["columns"] = 4;
    return $settings;
}


// --- yoast: disable JSON+LD ------------------------

add_filter("wpseo_json_ld_output", "__return_empty_array", 99);

// --- Wordpress gallery styles disable

add_filter('use_default_gallery_style', '__return_false');

// --- clear empty <b> strong p a and br from shortcode ------------------------

add_filter('the_content', 'KT_ZZZ_shortcode_empty_paragraph_callback');

function KT_ZZZ_shortcode_empty_paragraph_callback($content)
{

    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        '<strong>[' => '[',
        ']</strong>' => ']',
        '<b>[' => '[',
        ']</b>' => ']',
        ']<br />' => ']'
    );
    return strtr($content, $array);

}