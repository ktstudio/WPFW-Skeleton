<?php

/**
 * Presenter pro obsluhu stránky
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Page_Presenter extends KT_WP_Post_Base_Presenter {

    function __construct(KT_ZZZ_Page_Model $model) {
        parent::__construct($model);
    }

    // --- getry & setry ------------------------------

    /**
     * @return \KT_ZZZ_Page_Model
     */
    public function getModel() {
        return parent::getModel();
    }

    // --- veřejné metody ------------------------------
    // TODO
}
