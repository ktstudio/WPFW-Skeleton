<?php

class KT_XYZ_Index_Presenter extends KT_Presenter_Base {

    private $newsQuery;

    public function __construct() {
        parent::__construct();
    }

    // --- getry & setry ------------------------

    /**
     * @return \WP_Query
     */
    public function getNewsQuery() {
        if (KT::issetAndNotEmpty($this->newsQuery)) {
            return $this->newsQuery;
        }
        return $this->initNewsQuery();
    }

    // --- veřejné metody ------------------------

    public function theNewsQuery() {
        self::theQueryLoops($this->getNewsQuery(), KT_WP_POST_KEY);
    }

    // --- neveřejné metody ------------------------

    private function initNewsQuery() {
        $args = array(
            "post_type" => KT_WP_POST_KEY,
            "post_status" => "publish",
            "post_parent" => 0,
            "posts_per_page" => 4,
            "orderby" => "date",
            "order" => "DESC",
            "cat" => KT_XYZ::getThemeModel()->getCategoryNewsId(),
        );
        return $this->newsQuery = new WP_Query($args);
    }

}
