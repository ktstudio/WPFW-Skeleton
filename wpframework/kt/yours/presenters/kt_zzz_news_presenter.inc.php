<?php

class KT_ZZZ_News_Presenter extends KT_Presenter_Base {

    private $query;

    public function __construct() {
        parent::__construct();
    }

    // --- getry & setry ------------------------------

    /**
     * @return \WP_Query
     */
    public function getQuery() {
        if (KT::issetAndNotEmpty($this->query)) {
            return $this->query;
        }
        return $this->initQuery();
    }

    // --- veřejné metody ------------------------------

    public function isQuery() {
        $query = $this->getQuery();
        return KT::issetAndNotEmpty($query) && $query->have_posts();
    }

    public function theQuery() {
        if ($this->isQuery()) {
            self::theQueryLoops($this->getQuery(), KT_WP_POST_KEY);
        }
    }

    // --- neveřejné metody ------------------------------

    private function initQuery() {
        $args = array(
            "post_type" => KT_WP_POST_KEY,
            "post_status" => "publish",
            "post_parent" => 0,
            "posts_per_page" => 4,
            "orderby" => "date",
            "order" => KT_Repository::ORDER_DESC,
            "cat" => KT_ZZZ::getThemeModel()->getCategoryNewsId(),
        );
        return $this->query = new WP_Query($args);
    }

}
