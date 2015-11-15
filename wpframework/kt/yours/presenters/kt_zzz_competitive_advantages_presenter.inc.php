<?php

/**
 * Model pro obsluhu, resp. výpis konkurečních výhod
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Competitive_Advantages_Presenter extends KT_Presenter_Base {

    private $items = null;

    public function __construct() {
        parent::__construct();
    }

    // --- getry & setry ------------------------

    /**
     * @return array
     */
    public function getItems() {
        if (KT::issetAndNotEmpty($this->items)) {
            return $this->items;
        }
        return $this->initItems();
    }

    // --- veřejné metody ------------------------

    public function isItems() {
        return KT::arrayIssetAndNotEmpty($this->getItems());
    }

    public function theItems() {
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

    private function initItems() {
        $items = array();
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
        return $this->items = $items;
    }

}
