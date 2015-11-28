<?php

add_action("init", "kt_zzz_register_slider_post_type");

function kt_zzz_register_slider_post_type() {

    // --- post type ------------------------

    $labels = array(
        "name" => __("Slidery", KT_DOMAIN),
        "singular_name" => __("Slider", KT_DOMAIN),
        "add_new" => __("Přidat slider", KT_DOMAIN),
        "add_new_item" => __("Přidat nový slider", KT_DOMAIN),
        "edit_item" => __("Změnit slider", KT_DOMAIN),
        "new_item" => __("Nový slider", KT_DOMAIN),
        "view_item" => __("Zobrazit slider", KT_DOMAIN),
        "all_items" => __("Všechny slidery", KT_DOMAIN),
        "search_items" => __("Hledat slidery", KT_DOMAIN),
        "not_found" => __("Žádné slidery nenalezeny", KT_DOMAIN),
        "not_found_in_trash" => __("Žádné slidery v koši", KT_DOMAIN),
        "menu_name" => __("Slidery", KT_DOMAIN),
    );

    $args = array(
        "labels" => $labels,
        "public" => false,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "capability_type" => "post",
        "query_var" => true,
        "rewrite" => array("slug" => KT_ZZZ_SLIDER_SLUG, "with_front" => false),
        "has_archive" => false,
        "hierarchical" => false,
        "menu_position" => 4,
        "menu_icon" => "dashicons-images-alt",
        "supports" => array(
            KT_WP_POST_TYPE_SUPPORT_TITLE_KEY,
            KT_WP_POST_TYPE_SUPPORT_THUMBNAIL_KEY,
            KT_WP_POST_TYPE_SUPPORT_EXCERPT_KEY,
            KT_WP_POST_TYPE_SUPPORT_PAGE_ATTRIBUTES_KEY,
        ),
    );

    register_post_type(KT_ZZZ_SLIDER_KEY, $args);
}

// --- admin sloupce ---------------------------

if (is_admin()) { // vlastní sloupce v administraci
    $giftAdminColumns = new KT_Admin_Columns(KT_ZZZ_SLIDER_SLUG);
    $giftAdminColumns->addColumn("post_thumbnail", array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Foto", ZZZ_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::THUMBNAIL_TYPE_KEY,
        KT_Admin_Columns::INDEX_PARAM_KEY => 0,
            )
    );
}
