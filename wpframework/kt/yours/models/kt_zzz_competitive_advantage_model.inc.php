<?php

/**
 * Model pro definici konkurenční výhody
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Competitive_Advantage_Model extends KT_Catalog_Model_Base {

    const TABLE = "kt_zzz_competitive_advantages";
    const ORDER_COLUMN = self::MENU_ORDER_COLUMN;
    const PREFIX = "kt_competitive_advantage";
    const FORM_PREFIX = "kt-competitive-advantages";

    public function __construct($rowId = null) {
        parent::__construct(self::TABLE, self::ID_COLUMN, null, $rowId);
    }

    // --- getry & setry ------------------------

    public function getCssClass() {
        return $this->getCode();
    }

    // --- veřejné metody ------------------------

    /**
     * @return boolean
     */
    public function isCssClass() {
        return KT::issetAndNotEmpty($this->getCssClass());
    }

}
