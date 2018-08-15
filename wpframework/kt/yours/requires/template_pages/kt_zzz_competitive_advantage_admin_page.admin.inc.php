<?php

$template = new KT_Custom_Metaboxes_Page(
    __("Správa a nastavení konkurečních výhod", "ZZZ_DOMAIN"), __("Konkureční výhody", "ZZZ_DOMAIN"), "manage_categories", KT_ZZZ_Competitive_Advantage_Model::PREFIX, "dashicons-awards", 30
);

// --- definice crud listu ------------------

$crudList = KT_Catalog_Base_Config::getCatalogCrudList(
    "KT_ZZZ_Competitive_Advantage_Model", KT_ZZZ_Competitive_Advantage_Model::TABLE, __("Přehled konkurečních výhod", "ZZZ_DOMAIN")
);

$crudList->getColumnByName(KT_ZZZ_Competitive_Advantage_Model::TITLE_COLUMN)
    ->setDeletable(true);

$template->setCrudList($crudList);
$crudList->setNewItemButton()->setSortable();

// --- registrace stránky ------------------

$template->setDefaultCallBackFunction(KT_Custom_Metaboxes_Base::CRUD_LIST_SCREEN)
    ->addScreenFunctionForAction("action", "update", KT_Custom_Metaboxes_Base::METABOX_SCREEN)
    ->addScreenFunctionForAction("action", "create", KT_Custom_Metaboxes_Base::METABOX_SCREEN)
    ->setRenderSaveButton()->register();
