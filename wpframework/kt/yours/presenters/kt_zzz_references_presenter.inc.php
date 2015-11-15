<?php

/**
 * Model pro obsluhu, resp. výpis referencí
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_References_Presenter extends KT_Presenter_Base {

    const DEFAULT_COUNT = 12;

    private $query;

    public function __construct() {
        parent::__construct();
    }

    // --- getry & setry ------------------------------

    /**
     * @return WP_Query
     */
    public function getQuery() {
        if (KT::issetAndNotEmpty($this->query)) {
            return $this->query;
        }
        return $this->initQuery();
    }

    /**
     * @return bool
     */
    public function isQuery() {
        return KT::issetAndNotEmpty($this->getQuery()) && $this->getQuery()->have_posts();
    }

    // --- veřejné metody ------------------------------

    public function theQuery() {
        if ($this->isQuery()) {
            $clearfixes = array(
                2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
                3 => "<div class=\"visible-lg-block visible-md-block clearfix\"></div>" // za každým 3. záznamem
            );
            self::theQueryLoops($this->getQuery(), KT_ZZZ_REFERENCE_KEY, $clearfixes);
        }
    }

    // --- neveřejné metody ------------------------------

    private function initQuery() {
        return $this->query = new WP_Query(array(
            "post_type" => KT_ZZZ_REFERENCE_KEY,
            "post_status" => "publish",
            "posts_per_page" => self::DEFAULT_COUNT,
            "orderby" => "menu_order title",
            "order" => KT_Repository::ORDER_DESC,
        ));
    }

}
