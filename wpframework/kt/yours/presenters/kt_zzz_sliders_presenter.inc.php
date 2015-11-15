<?php

/**
 * Model pro obsluhu, resp. výpis sliderů
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Sliders_Presenter extends KT_Presenter_Base {

    const DEFAULT_COUNT = 3;

    private $posts = null;

    public function __construct() {
        parent::__construct();
    }

    // --- getry & setry ------------------------

    /**
     * @return array
     */
    public function getPosts() {
        if (KT::issetAndNotEmpty($this->posts)) {
            return $this->posts;
        }
        return $this->initPosts();
    }

    // --- veřejné metody ------------------------

    public function isPosts() {
        $posts = $this->getPosts();
        return KT::arrayIssetAndNotEmpty($posts);
    }

    public function theIndicators() {
        if ($this->isPosts()) {
            $number = 0;
            foreach ($this->getPosts() as $post) {
                $classPart = ($number === 0) ? " class=\"active\"" : "";
                echo "<li data-target=\"#carousel\" data-slide-to=\"$number\"$classPart></li>";
                $number++;
            }
        }
    }

    public function theInners() {
        if ($this->isPosts()) {
            $number = 0;
            foreach ($this->getPosts() as $post) {
                $activePart = ($number === 0) ? " active" : "";
                $imageSrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), KT_ZZZ_IMAGE_SIZE_SLIDER);
                if (KT::arrayIssetAndNotEmpty($imageSrc)) {
                    $imageUrl = $imageSrc[0];
                    echo "<div class=\"item$activePart\">";
                    echo "<img src=\"$imageUrl\" alt=\"{$post->post_title}\" class=\"img-responsive\">";
                    echo "</div>";
                }
                $number++;
            }
        }
    }

    // --- neveřejné metody ------------------------

    private function initPosts() {
        $args = array(
            "post_type" => KT_ZZZ_SLIDER_KEY,
            "post_status" => "publish",
            "post_parent" => 0,
            "posts_per_page" => self::DEFAULT_COUNT,
            "orderby" => "menu_order title",
            "order" => "ASC",
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
            return $this->posts = $query->get_posts();
        }
        return $this->posts = array();
    }

}
