<?php

class KT_ZZZ_Sliders_Presenter extends KT_Presenter_Base
{
    const DEFAULT_COUNT = 3;

    private $posts = null;
    private $postsCount;

    public function __construct()
    {
        parent::__construct();
    }

    // --- getry & setry ------------------------

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

    // --- veřejné metody ------------------------

    /** @return boolean */
    public function hasPosts()
    {
        return $this->getPostsCount() > 0;
    }

    public function theIndicators()
    {
        if ($this->hasPosts()) {
            $number = 0;
            foreach ($this->getPosts() as $post) {
                $classPart = ($number === 0) ? " class=\"active\"" : "";
                echo "<li data-target=\"#carousel\" data-slide-to=\"$number\"$classPart></li>";
                $number++;
            }
        }
    }

    public function theInners()
    {
        if ($this->hasPosts()) {
            $number = 0;
            foreach ($this->getPosts() as $post) {
                $activePart = ($number === 0) ? " active" : "";
                $imageSrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), KT_ZZZ_IMAGE_SIZE_SLIDER);
                if (KT::arrayIssetAndNotEmpty($imageSrc)) {
                    $imageUrl = $imageSrc[0];
                    $transparentUrl = KT::imageGetTransparent();
                    echo "<div class=\"item$activePart\">";
                    echo "<img data-src=\"$imageUrl\" src=\"$transparentUrl\" alt=\"{$post->post_title}\" class=\"img-responsive\">";
                    echo "</div>";
                }
                $number++;
            }
        }
    }

    // --- neveřejné metody ------------------------

    private function initPosts()
    {
        $args = [
            "post_type" => KT_ZZZ_SLIDER_KEY,
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
