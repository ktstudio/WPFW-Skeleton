<?php

add_action("init", "kt_zzz_register_slider_post_type");

function kt_zzz_register_slider_post_type() {

    // --- post type ------------------------

    $labels = array(
        "name" => __("Slidy", ZZZ_DOMAIN),
        "singular_name" => __("Slide", ZZZ_DOMAIN),
        "add_new" => __("Přidat slide", ZZZ_DOMAIN),
        "add_new_item" => __("Přidat nový slide", ZZZ_DOMAIN),
        "edit_item" => __("Změnit slide", ZZZ_DOMAIN),
        "new_item" => __("Nový slide", ZZZ_DOMAIN),
        "view_item" => __("Zobrazit slide", ZZZ_DOMAIN),
        "all_items" => __("Všechny slidy", ZZZ_DOMAIN),
        "search_items" => __("Hledat slidy", ZZZ_DOMAIN),
        "not_found" => __("Žádné slidy nenalezeny", ZZZ_DOMAIN),
        "not_found_in_trash" => __("Žádné slidy v koši", ZZZ_DOMAIN),
        "menu_name" => __("Slidy", ZZZ_DOMAIN),
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
    $sliderColumns = new KT_Admin_Columns(KT_ZZZ_SLIDER_SLUG);
    $sliderColumns->addColumn("post_thumbnail", array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Foto", ZZZ_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::THUMBNAIL_TYPE_KEY,
        KT_Admin_Columns::INDEX_PARAM_KEY => 0,
            )
    );
    $sliderColumns->addColumn("menu_order", array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Pořadí", HB_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::POST_PROPERTY_TYPE_KEY,
        KT_Admin_Columns::PROPERTY_PARAM_KEY => "menu_order",
        KT_Admin_Columns::SORTABLE_PARAM_KEY => true,
        KT_Admin_Columns::INDEX_PARAM_KEY => 3,
    ));
}
