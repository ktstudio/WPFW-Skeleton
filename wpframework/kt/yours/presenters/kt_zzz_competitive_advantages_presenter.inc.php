<?php

class KT_ZZZ_Competitive_Advantages_Presenter extends KT_Presenter_Base
{
    private $items = null;
    private $count = null;

    public function __construct()
    {
        parent::__construct();
    }

    // --- getry & setry ------------------------

    /** @return array */
    public function getItems()
    {
        if (isset($this->items)) {
            return $this->items;
        }
        $this->initItems();
        return $this->items;
    }

    /** @return array */
    public function getCount()
    {
        if (isset($this->count)) {
            return $this->count;
        }
        $this->initItems();
        return $this->count;
    }

    // --- veřejné metody ------------------------

    public function isItems()
    {
        return $this->getCount() > 0;
    }

    public function theItems()
    {
        if ($this->isItems()) {
            /* @var $item \KT_ZZZ_Competitive_Advantage_Model */
            foreach ($this->getItems() as $item) {
                echo "<article class=\"col-sm-4 {$item->getCssClass()}\">";
                echo "<p><strong>{$item->getTitle()}</strong></p>";
                echo "<p>{$item->getDescription()}</p>";
                echo "</article>";
            }
        }
    }

    // --- neveřejné metody ------------------------

    private function initItems()
    {
        $items = [];
        $repository = new KT_Repository("KT_ZZZ_Competitive_Advantage_Model", KT_ZZZ_Competitive_Advantage_Model::TABLE);
        $repository->addWhereParam(KT_ZZZ_Competitive_Advantage_Model::VISIBILITY_COLUMN, KT_Switch_Field::YES)
            ->addWhereParam(KT_ZZZ_Competitive_Advantage_Model::CODE_COLUMN, "", "!=")
            ->addOrder(KT_ZZZ_Competitive_Advantage_Model::MENU_ORDER_COLUMN)
            ->addOrder(KT_ZZZ_Competitive_Advantage_Model::TITLE_COLUMN);
        if (KT_ZZZ::getThemeModel()->isCompetitiveAdvantagesMaxCount()) {
            $repository->setLimit(KT_ZZZ::getThemeModel()->getCompetitiveAdvantagesMaxCount());
        }
        $repository->selectData();
        if ($repository->haveItems()) {
            foreach ($repository->getItems() as $item) {
                $items[$item->getId()] = $item;
            }
        }
        $this->items = $items;
        $this->count = count($items);
    }
}
