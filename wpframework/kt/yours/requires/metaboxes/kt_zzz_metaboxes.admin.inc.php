<?php

// --- theme ------------------------

$themeSettings = new KT_Custom_Metaboxes_Subpage(
        "themes.php", __("Nastavení šablony", ZZZ_DOMAIN), __("Nastavení šablony", ZZZ_DOMAIN), "update_core", KT_WP_Configurator::THEME_SETTING_PAGE_SLUG);
$themeSettings->setRenderSaveButton()->register();

KT_MetaBox::createMultiple(KT_ZZZ_Theme_Config::getAllGenericFieldsets(), KT_WP_Configurator::getThemeSettingSlug(), KT_MetaBox_Data_Type_Enum::OPTIONS);

// --- post ------------------------

KT_MetaBox::createMultiple(KT_ZZZ_Post_Config::getAllGenericFieldsets(), KT_WP_POST_KEY, KT_MetaBox_Data_Type_Enum::POST_META);

// --- page ------------------------

KT_MetaBox::createMultiple(KT_ZZZ_Page_Config::getAllGenericFieldsets(), KT_WP_PAGE_KEY, KT_MetaBox_Data_Type_Enum::POST_META);

// --- reference ------------------------

KT_MetaBox::createMultiple(KT_ZZZ_Reference_Config::getAllGenericFieldsets(), KT_ZZZ_REFERENCE_KEY, KT_MetaBox_Data_Type_Enum::POST_META);

// --- content ------------------------

foreach (array(KT_WP_POST_KEY, KT_WP_PAGE_KEY) as $postType) {
    $pageShortcodesMetabox = KT_MetaBox::createCustom("kt-zzz-$postType-shortcodes-metabox", __("Obsahové zktratky", ZZZ_DOMAIN), $postType, "kt_zzz_content_shortcodes_metabox_callback", false);
    $pageShortcodesMetabox->setContext(KT_MetaBox::CONTEXT_SIDE);
    $pageShortcodesMetabox->setPriority(KT_MetaBox::PRIORITY_LOW);
    $pageShortcodesMetabox->register();
}

function kt_zzz_content_shortcodes_metabox_callback() {
    echo "<ol>";
    echo "<li><b>[zzz_row_start]</b> - <i>začátek řádku</i></li>";
    echo "<li><b>[zzz_column_start]</b> - <i>začátek sloupce</i></li>";
    echo "<li><b>[zzz_column_end]</b> - <i>konec sloupce</i></li>";
    echo "<li><b>[zzz_row_end]</b> - <i>konec řádku</i></li>";
    echo "<li><b>[zzz_clearfix]</b> - <i>reset rendrování UI</i></li>";
    echo "</ol>";
}
