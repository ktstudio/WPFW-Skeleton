<?php

class KT_ZZZ_References_Presenter extends KT_Presenter_Base
{
    const DEFAULT_COUNT = 12;

    private $posts;
    private $postsCount;

    public function __construct()
    {
        parent::__construct();
    }

    // --- getry & setry ------------------------------

    /** @return array */
    public function getPosts()
    {
        if (isset($this->posts)) {
            return $this->posts;
        }
        $this->initPosts();
        return $this->posts;
    }

    /** @return int */
    public function getPostsCount()
    {
        if (isset($this->postsCount)) {
            return $this->postsCount;
        }
        $this->initPosts();
        return $this->postsCount;
    }

    // --- veřejné metody ------------------------------

    /** @return boolean */
    public function hasPosts()
    {
        return $this->getPostsCount() > 0;
    }

    public function thePosts()
    {
        if ($this->hasPosts()) {
            $clearfixes = [
                2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
                3 => "<div class=\"visible-lg-block visible-md-block clearfix\"></div>" // za každým 3. záznamem
            ];
            self::theItemsLoops($this->getPosts(), KT_ZZZ_REFERENCE_KEY, null, null, $clearfixes);
        }
    }

    // --- neveřejné metody ------------------------------

    private function initPosts()
    {
        $args = [
            "post_type" => KT_ZZZ_REFERENCE_KEY,
            "post_status" => "publish",
            "posts_per_page" => self::DEFAULT_COUNT,
            "orderby" => "menu_order title",
            "order" => KT_Repository::ORDER_ASC,
        ];
        $query = new WP_Query();
        $posts = $query->query($args);
        if (KT::arrayIssetAndNotEmpty($posts)) {
            $this->posts = $posts;
            $this->postsCount = count($posts);
        } else {
            $this->posts = [];
            $this->postsCount = 0;
        }
    }
}
