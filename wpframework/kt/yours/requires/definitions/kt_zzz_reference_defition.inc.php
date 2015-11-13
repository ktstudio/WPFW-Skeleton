<?php

// --- post type ------------------------

add_action("init", "kt_zzz_register_reference_post_type");

function kt_zzz_register_reference_post_type() {
    $labels = array(
        "name" => __("Reference", ZZZ_DOMAIN),
        "singular_name" => __("Reference", ZZZ_DOMAIN),
        "add_new" => __("Přidat referenci", ZZZ_DOMAIN),
        "add_new_item" => __("Přidat novou referenci", ZZZ_DOMAIN),
        "edit_item" => __("Změnit referenci", ZZZ_DOMAIN),
        "new_item" => __("Nová reference", ZZZ_DOMAIN),
        "view_item" => __("Zobrazit reference", ZZZ_DOMAIN),
        "all_items" => __("Všechny reference", ZZZ_DOMAIN),
        "search_items" => __("Hledat reference", ZZZ_DOMAIN),
        "not_found" => __("Žádné reference nenalezeny", ZZZ_DOMAIN),
        "not_found_in_trash" => __("Žádné reference v koši", ZZZ_DOMAIN),
        "menu_name" => __("Reference", ZZZ_DOMAIN),
    );
    $args = array(
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "capability_type" => "post",
        "query_var" => true,
        "rewrite" => array("slug" => KT_ZZZ_REFERENCE_SLUG, "with_front" => false),
        "has_archive" => false,
        "hierarchical" => false,
        "menu_position" => 4,
        "menu_icon" => "dashicons-portfolio",
        "supports" => array(
            KT_WP_POST_TYPE_SUPPORT_TITLE_KEY,
            KT_WP_POST_TYPE_SUPPORT_EDITOR_KEY,
            KT_WP_POST_TYPE_SUPPORT_THUMBNAIL_KEY,
            KT_WP_POST_TYPE_SUPPORT_EXCERPT_KEY,
            KT_WP_POST_TYPE_SUPPORT_PAGE_ATTRIBUTES_KEY,
        ),
    );
    register_post_type(KT_ZZZ_REFERENCE_KEY, $args);
}

// --- admin sloupce ---------------------------

if (is_admin()) { // vlastní sloupce v administraci
    $giftAdminColumns = new KT_Admin_Columns(KT_ZZZ_REFERENCE_KEY);
    $giftAdminColumns->addColumn("post_thumbnail", array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Foto", ZZZ_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::THUMBNAIL_TYPE_KEY,
        KT_Admin_Columns::INDEX_PARAM_KEY => 0,
            )
    );
    $giftAdminColumns->addColumn(KT_ZZZ_Reference_Config::PARAMS_DATE, array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Datum", ZZZ_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::POST_META_TYPE_KEY,
        KT_Admin_Columns::METAKEY_PARAM_KEY => KT_ZZZ_Reference_Config::PARAMS_DATE,
        KT_Admin_Columns::SORTABLE_PARAM_KEY => true,
        KT_Admin_Columns::INDEX_PARAM_KEY => 3,
    ));
    $giftAdminColumns->addColumn(KT_ZZZ_Reference_Config::PARAMS_CLIENT, array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Klient", ZZZ_DOMAIN),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::POST_META_TYPE_KEY,
        KT_Admin_Columns::METAKEY_PARAM_KEY => KT_ZZZ_Reference_Config::PARAMS_CLIENT,
        KT_Admin_Columns::ORDERBY_PARAM_KEY => KT_Admin_Columns::METAKEY_VALUE_NUM_KEY,
        KT_Admin_Columns::SORTABLE_PARAM_KEY => true,
        KT_Admin_Columns::INDEX_PARAM_KEY => 4,
    ));
}
