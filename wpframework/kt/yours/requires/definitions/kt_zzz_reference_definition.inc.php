<?php

// --- post type ------------------------

add_action("init", "kt_zzz_register_reference_post_type");

function kt_zzz_register_reference_post_type()
{
    $labels = [
        "name" => __("Reference", "ZZZ_ADMIN_DOMAIN"),
        "singular_name" => __("Reference", "ZZZ_ADMIN_DOMAIN"),
        "menu_name" => __("Reference", "ZZZ_ADMIN_DOMAIN"),
        "name_admin_bar" => __("Reference", "ZZZ_ADMIN_DOMAIN"),
        "archives" => __("Archív referencí", "ZZZ_ADMIN_DOMAIN"),
        "attributes" => __("Atributy", "ZZZ_ADMIN_DOMAIN"),
        "parent_item_colon" => __("Nadřazená reference", "ZZZ_ADMIN_DOMAIN"),
        "all_items" => __("Všechny reference", "ZZZ_ADMIN_DOMAIN"),
        "add_new_item" => __("Přidat novou referenci", "ZZZ_ADMIN_DOMAIN"),
        "add_new" => __("Přidat novou", "ZZZ_ADMIN_DOMAIN"),
        "new_item" => __("Přidat referenci", "ZZZ_ADMIN_DOMAIN"),
        "edit_item" => __("Upravit referenci", "ZZZ_ADMIN_DOMAIN"),
        "update_item" => __("Aktualizovat referenci", "ZZZ_ADMIN_DOMAIN"),
        "view_item" => __("Zobrazit referenci", "ZZZ_ADMIN_DOMAIN"),
        "view_items" => __("Zobrazit reference", "ZZZ_ADMIN_DOMAIN"),
        "search_items" => __("Hledat reference", "ZZZ_ADMIN_DOMAIN"),
        "not_found" => __("Nenalezeno", "ZZZ_ADMIN_DOMAIN"),
        "not_found_in_trash" => __("Nenalezeno v koši", "ZZZ_ADMIN_DOMAIN"),
        "featured_image" => __("Obrázek", "ZZZ_ADMIN_DOMAIN"),
        "set_featured_image" => __("Zvolit obrázek", "ZZZ_ADMIN_DOMAIN"),
        "remove_featured_image" => __("Odstranit obrázek", "ZZZ_ADMIN_DOMAIN"),
        "use_featured_image" => __("Zvolit obrázek", "ZZZ_ADMIN_DOMAIN"),
        "insert_into_item" => __("Vložit k referenci", "ZZZ_ADMIN_DOMAIN"),
        "uploaded_to_this_item" => __("Nahrát k referenci", "ZZZ_ADMIN_DOMAIN"),
        "items_list" => __("Seznam referencí", "ZZZ_ADMIN_DOMAIN"),
        "items_list_navigation" => __("Seznam referencí menu", "ZZZ_ADMIN_DOMAIN"),
        "filter_items_list" => __("Filtrovat reference", "ZZZ_ADMIN_DOMAIN"),
    ];
    $args = [
        "label" => __("Reference", "ZZZ_ADMIN_DOMAIN"),
        "description" => __("Entita reference", "ZZZ_ADMIN_DOMAIN"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "capability_type" => KT_WP_POST_KEY,
        "query_var" => true,
        "rewrite" => ["slug" => KT_ZZZ_REFERENCE_SLUG, "with_front" => false],
        "has_archive" => KT_ZZZ_REFERENCES_SLUG,
        "hierarchical" => false,
        "menu_position" => 4,
        "menu_icon" => "dashicons-portfolio",
        "supports" => [
            KT_WP_POST_TYPE_SUPPORT_TITLE_KEY,
            KT_WP_POST_TYPE_SUPPORT_EDITOR_KEY,
            KT_WP_POST_TYPE_SUPPORT_THUMBNAIL_KEY,
            KT_WP_POST_TYPE_SUPPORT_EXCERPT_KEY,
            KT_WP_POST_TYPE_SUPPORT_PAGE_ATTRIBUTES_KEY,
        ],
    ];
    register_post_type(KT_ZZZ_REFERENCE_KEY, $args);
}

// --- taxonomie ---------------------------

add_action("init", "kt_zzz_register_reference_taxonomy");

function kt_zzz_register_reference_taxonomy()
{
    $labels = [
        "name" => __("Kategorie", "ZZZ_ADMIN_DOMAIN"),
        "singular_name" => __("Kategorie", "ZZZ_ADMIN_DOMAIN"),
        "menu_name" => __("Kategorie", "ZZZ_ADMIN_DOMAIN"),
        "all_items" => __("Všechny kategorie", "ZZZ_ADMIN_DOMAIN"),
        "parent_item" => __("Nadřazená kategorie", "ZZZ_ADMIN_DOMAIN"),
        "parent_item_colon" => __("Nadřazená kategorie:", "ZZZ_ADMIN_DOMAIN"),
        "new_item_name" => __("Nová kategorie", "ZZZ_ADMIN_DOMAIN"),
        "add_new_item" => __("Přidat novou kategorii", "ZZZ_ADMIN_DOMAIN"),
        "edit_item" => __("Upravit kategorii", "ZZZ_ADMIN_DOMAIN"),
        "update_item" => __("Aktualizovat kategorii", "ZZZ_ADMIN_DOMAIN"),
        "view_item" => __("Zobrazit kategorii", "ZZZ_ADMIN_DOMAIN"),
        "separate_items_with_commas" => __("Oddělte kategorie čárkami", "ZZZ_ADMIN_DOMAIN"),
        "add_or_remove_items" => __("Přidat nebo odebrat kategorie", "ZZZ_ADMIN_DOMAIN"),
        "choose_from_most_used" => __("Vybrat z nejpouživanějších", "ZZZ_ADMIN_DOMAIN"),
        "popular_items" => __("Populární kategorie", "ZZZ_ADMIN_DOMAIN"),
        "search_items" => __("Hledat kategorie", "ZZZ_ADMIN_DOMAIN"),
        "not_found" => __("Nenalezeno", "ZZZ_ADMIN_DOMAIN"),
        "no_terms" => __("Žádné kategorie", "ZZZ_ADMIN_DOMAIN"),
        "items_list" => __("Seznam kategorií", "ZZZ_ADMIN_DOMAIN"),
        "items_list_navigation" => __("Seznam kategorií menu", "ZZZ_ADMIN_DOMAIN"),
    ];
    $args = [
        "labels" => $labels,
        "hierarchical" => true,
        "public" => false,
        "show_ui" => true,
        "show_admin_column" => true,
        "show_in_nav_menus" => true,
        "show_tagcloud" => false,
        "rewrite" => [
            "slug" => KT_ZZZ_REFERENCE_CATEGORY_SLUG,
            "with_front" => true,
            "hierarchical" => false,
        ],
    ];
    register_taxonomy(KT_ZZZ_REFERENCE_CATEGORY_KEY, [KT_ZZZ_REFERENCE_KEY], $args);
}

// --- admin sloupce ---------------------------

if (is_admin()) { // vlastní sloupce v administraci
    $referenceAdminColumns = new KT_Admin_Columns(KT_ZZZ_REFERENCE_KEY);
    $referenceAdminColumns->addColumn("post_thumbnail", [
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Foto", "ZZZ_ADMIN_DOMAIN"),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::THUMBNAIL_TYPE_KEY,
        KT_Admin_Columns::INDEX_PARAM_KEY => 0,
    ]);
    $referenceAdminColumns->addColumn(KT_ZZZ_Reference_Config::PARAMS_DATE, [
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Datum", "ZZZ_ADMIN_DOMAIN"),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::POST_META_TYPE_KEY,
        KT_Admin_Columns::METAKEY_PARAM_KEY => KT_ZZZ_Reference_Config::PARAMS_DATE,
        KT_Admin_Columns::SORTABLE_PARAM_KEY => true,
        KT_Admin_Columns::INDEX_PARAM_KEY => 3,
    ]);
    $referenceAdminColumns->addColumn(KT_ZZZ_Reference_Config::PARAMS_CLIENT, [
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Klient", "ZZZ_ADMIN_DOMAIN"),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::POST_META_TYPE_KEY,
        KT_Admin_Columns::METAKEY_PARAM_KEY => KT_ZZZ_Reference_Config::PARAMS_CLIENT,
        KT_Admin_Columns::ORDERBY_PARAM_KEY => KT_Admin_Columns::METAKEY_VALUE_NUM_KEY,
        KT_Admin_Columns::SORTABLE_PARAM_KEY => true,
        KT_Admin_Columns::INDEX_PARAM_KEY => 4,
    ]);
}
