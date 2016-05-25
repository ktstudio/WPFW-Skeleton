<?php

class KT_ZZZ_Sidebar_Presenter extends KT_Presenter_Base {

    const DEFAULT_LIMIT = 10;

    private $pages;
    private $pagesCount;
    private $categories;
    private $categoriesCount;
    private $currentSidebarKey;
    private $currentSidebarName;

    public function __construct() {
        parent::__construct();
        $this->initCurrentSidebar();
    }

    // --- getry & setry ------------------------------

    /** @return array */
    public function getPages() {
        if (isset($this->pages)) {
            return $this->pages;
        }
        $this->initPages();
        return $this->pages;
    }

    /** @return int */
    public function getPagesCount() {
        if (isset($this->pagesCount)) {
            return $this->pagesCount;
        }
        $this->initPages();
        return $this->pagesCount;
    }

    /** @return array */
    public function getCategories() {
        if (isset($this->categories)) {
            return $this->categories;
        }
        $this->initCategories();
        return $this->categories;
    }

    /** @return int */
    public function getCategoriesCount() {
        if (isset($this->categoriesCount)) {
            return $this->categoriesCount;
        }
        $this->initCategories();
        return $this->categoriesCount;
    }

    /** @return string */
    public function getCurrentSidebarKey() {
        return $this->currentSidebarKey;
    }

    private function setCurrentSidebarKey($value) {
        $this->currentSidebarKey = $value;
        return $this;
    }

    /** @return string */
    public function getCurrentSidebarName() {
        return $this->currentSidebarName;
    }

    private function setCurrentSidebarName($value) {
        $this->currentSidebarName = $value;
        return $this;
    }

    // --- veřejné metody ------------------------------

    /** @return boolean */
    public function isPages() {
        return $this->getPagesCount() > 0;
    }

    /** @return boolean */
    public function isCategories() {
        return $this->getCategoriesCount() > 0;
    }

    public function render() {
        // pages & categories
        $post = get_post();
        $isSingular = is_singular(KT_WP_POST_KEY);
        if (is_page()) {
            if ($this->isPages()) {
                $currentId = $post->ID;
                echo "\n<div class=\"widget\">";
                echo "<h2 class=\"widgettitle\">" . __("Stránky", "ZZZ_DOMAIN") . "</h2>";
                echo "<ul class=\"nav nav-pills nav-stacked\">";
                foreach ($this->getPages() as $page) {
                    $postModel = new KT_WP_Post_Base_Model($page);
                    $classAttribute = ($postModel->getPostId() == $currentId) ? " class=\"active\"" : "";
                    echo "<li$classAttribute><a href=\"{$postModel->getPermalink()}\" title=\"{$postModel->getTitleAttribute()}\">{$postModel->getTitle()}</a></li>";
                }
                echo "</ul></div>\n";
            }
        } elseif (is_category() || $isSingular) {
            $currentId = get_queried_object_id();
            $postModel = new KT_WP_Post_Base_Model($post);
            $categoriesIds = $postModel->getCategoriesIds() ? : array();
            echo "\n<div class=\"widget\">";
            echo "<h2 class=\"widgettitle\">" . __("Kategorie", "ZZZ_DOMAIN") . "</h2>";
            echo "<ul class=\"nav nav-pills nav-stacked\">";
            foreach ($this->getCategories() as $term) {
                $termModel = new KT_WP_Term_Base_Model($term);
                if ($isSingular) {
                    $classAttribute = (in_array($termModel->getId(), $categoriesIds)) ? " class=\"active\"" : "";
                } else {
                    $classAttribute = ($termModel->getId() == $currentId) ? " class=\"active\"" : "";
                }
                echo "<li$classAttribute><a href=\"{$termModel->getPermalink()}\" title=\"{$termModel->getName()}\">{$termModel->getName()}</a></li>";
            }
            echo "</ul></div>\n";
        }
        // dynamic sidebar
        if (is_active_sidebar($this->getCurrentSidebarKey())) {
            dynamic_sidebar($this->getCurrentSidebarKey());
        }
    }

    // --- neveřejné metody ------------------------------

    private function initPages() {
        /* @var $post WP_Post */
        global $post;
        $args = array(
            "post_type" => KT_WP_PAGE_KEY,
            "post_status" => "publish",
            "post_parent" => $post->ID,
            "posts_per_page" => self::DEFAULT_LIMIT,
            "orderby" => "menu_order title",
            "order" => KT_Repository::ORDER_ASC,
        );
        $query = new WP_Query();
        $posts = $query->query($args);
        if (KT::arrayIssetAndNotEmpty($posts)) {
            $this->pages = $posts;
            $this->pagesCount = count($posts);
            return;
        } elseif ($post->post_parent > 0) {
            $args = array(
                "post_type" => KT_WP_PAGE_KEY,
                "post_status" => "publish",
                "post_parent" => $post->post_parent,
                "posts_per_page" => self::DEFAULT_LIMIT,
                "orderby" => "menu_order title",
                "order" => KT_Repository::ORDER_ASC,
            );
            $query = new WP_Query();
            $posts = $query->query($args);
            if (KT::arrayIssetAndNotEmpty($posts)) {
                $this->pages = $posts;
                $this->pagesCount = count($posts);
                return;
            }
        }
        $this->pages = array();
        $this->pagesCount = 0;
    }

    private function initCategories() {
        $categories = get_categories();
        if (KT::arrayIssetAndNotEmpty($categories)) {
            $this->categories = $categories;
            $this->categoriesCount = count($categories);
        } else {
            $this->categories = array();
            $this->categoriesCount = 0;
        }
    }

    /** @return KT_ZZZ_Sidebar_Presenter */
    private function initCurrentSidebar() {
        global $wp_registered_sidebars;
        $sidebarKey = KT_ZZZ_SIDEBAR_DEFAULT;
        if (KT::arrayIssetAndNotEmpty($wp_registered_sidebars)) {
            foreach ($wp_registered_sidebars as $key => $values) {
                if ($key === $sidebarKey) {
                    $this->setCurrentSidebarName(KT::arrayTryGetValue($values, "name"));
                    break;
                }
            }
        }
        return $this->setCurrentSidebarKey($sidebarKey);
    }

}
