<?php

class KT_ZZZ_Posts_Presenter extends KT_Presenter_Base {

    const DEFAULT_COUNT = 12;

    private $results;
    private $count;
    private $maxCount;
    private $offset;
    private $categoryId;

    public function __construct($maxCount = self::DEFAULT_COUNT, $withInitParams = true) {
        parent::__construct();
        $this->maxCount = KT::tryGetInt($maxCount) ? : self::DEFAULT_COUNT;
        if ($withInitParams) {
            $this->initParams();
        }
    }

    // --- getry & setry ------------------------------

    /** @return array */
    public function getResults() {
        if (KT::issetAndNotEmpty($this->results)) {
            return $this->results;
        }
        return $this->initResults();
    }

    /** @return int */
    public function getCount() {
        if (isset($this->count)) {
            return $this->count;
        }
        $results = $this->getResults();
        if (KT::arrayIssetAndNotEmpty($results)) {
            return $this->count = count($results);
        }
        return $this->count = 0;
    }

    /** @return int */
    public function getMaxCount() {
        return $this->maxCount;
    }

    /** @return int */
    public function getOffset() {
        return $this->offset;
    }

    /** @return int */
    public function getInitialOffset() {
        return $this->getOffset() ? : self::DEFAULT_COUNT;
    }

    private function setOffset($value) {
        $this->offset = KT::tryGetInt($value);
        return $this;
    }

    /** @return int */
    public function getCategoryId() {
        return $this->categoryId;
    }

    private function setCategoryId($value) {
        $this->categoryId = KT::tryGetInt($value);
        return $this;
    }

    public static function getClearfixes() {
        return array(
            2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
            3 => "<div class=\"visible-md-block clearfix\"></div>", // za každým 3. záznamem
            4 => "<div class=\"visible-lg-block clearfix\"></div>", // za každým 4. záznamem
        );
    }

    // --- veřejné metody ------------------------------

    /** @return boolean */
    public function isResults() {
        return $this->getCount() > 0;
    }

    public function theResults() {
        if ($this->isResults()) {
            self::theItemsLoops($this->getResults(), KT_WP_POST_KEY, null, null, self::getClearfixes());
        }
    }

    public function theFirstResult() {
        if ($this->isResults()) {
            self::theItemsLoops($this->getResults(), KT_WP_POST_KEY . "-top", 1, 0, self::getClearfixes());
        }
    }

    public function theOthersResults() {
        if ($this->isResults()) {
            self::theItemsLoops($this->getResults(), KT_WP_POST_KEY, ($this->getMaxCount() - 1), 1, self::getClearfixes());
        }
    }

    public function getResultsOutput() {
        if ($this->isResults()) {
            ob_start();
            $this->theResults();
            $output = ob_get_clean();
            return $output;
        } elseif ($this->getOffset() >= $this->getMaxCount()) {
            return false;
        } else {
            return $this->getNoResultsMessage();
        }
    }

    public function getNoResultsMessage() {
        return "<p class=\"center\">" . __("Zde nejsou žádné příspěvky...", "ZZZ_DOMAIN") . "</p>";
    }

    /** @return boolean */
    public function isOffset() {
        return KT::isIdFormat($this->getOffset());
    }

    /** @return boolean */
    public function isCategoryId() {
        return KT::isIdFormat($this->getCategoryId());
    }

    // --- neveřejné metody ------------------------------

    private function initParams() {
        $this->setOffset(KT::arrayTryGetValue($_REQUEST, "kt_offset"));
        $queriedObject = get_queried_object();
        if (KT::issetAndNotEmpty($queriedObject)) {
            if (property_exists($queriedObject, "term_id")) {
                $this->setCategoryId($queriedObject->term_id);
            }
        } else {
            $this->setCategoryId(KT::arrayTryGetValue($_REQUEST, "kt_category_id"));
        }
    }

    private function initResults() {
        $args = array(
            "post_type" => KT_WP_POST_KEY,
            "post_status" => "publish",
            "posts_per_page" => $this->getMaxCount(),
            "orderby" => "date",
            "order" => KT_Repository::ORDER_DESC,
        );
        // except himself
        if (is_single()) {
            $args["post__not_in"] = array(get_the_ID());
        }
        // offset
        if ($this->isOffset()) {
            $args["offset"] = $this->getOffset();
        }
        // category
        $taxQuery = array("relation" => "AND");
        if ($this->isCategoryId()) {
            array_push($taxQuery, array(
                "taxonomy" => KT_WP_CATEGORY_KEY,
                "field" => "term_id",
                "terms" => array($this->getCategoryId()),
            ));
        }
        $args["tax_query"] = $taxQuery;
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            return $this->results = $query->get_posts();
        }
        return $this->results = null;
    }

}
