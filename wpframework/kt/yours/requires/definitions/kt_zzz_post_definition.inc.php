<?php

// --- admin sloupce ---------------------------

if (is_admin()) { // vlastní sloupce v administraci
    $postAdminColumns = new KT_Admin_Columns(KT_WP_POST_KEY);
    $postAdminColumns->addColumn("post_thumbnail", array(
        KT_Admin_Columns::LABEL_PARAM_KEY => __("Foto", "ZZZ_ADMIN_DOMAIN"),
        KT_Admin_Columns::TYPE_PARAM_KEY => KT_Admin_Columns::THUMBNAIL_TYPE_KEY,
        KT_Admin_Columns::INDEX_PARAM_KEY => 0,
            )
    );
    $postAdminColumns->removeColumn("comments");
    $postAdminColumns->removeColumn("tags");
}
