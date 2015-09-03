<?php

// --- theme ------------------------

$themeSettings = new KT_Custom_Metaboxes_Subpage(
        "themes.php", __("Nastavení šablony", XYZ_DOMAIN), __("Nastavení šablony", XYZ_DOMAIN), "update_core", KT_WP_Configurator::THEME_SETTING_PAGE_SLUG);
$themeSettings->setRenderSaveButton()->register();

KT_MetaBox::createMultiple(KT_XYZ_Theme_Config::getAllGenericFieldset(), KT_WP_Configurator::getThemeSettingSlug(), KT_MetaBox_Data_Type_Enum::OPTIONS);

// --- post ------------------------

KT_MetaBox::createMultiple(KT_XYZ_Post_Config::getAllGenericFieldset(), KT_WP_POST_KEY, KT_MetaBox_Data_Type_Enum::POST_META);

