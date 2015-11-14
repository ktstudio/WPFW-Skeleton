<?php

class KT_ZZZ_Reference_Presenter extends KT_WP_Post_Base_Presenter {

    public function __construct(WP_Post $post) {
        parent::__construct(new KT_ZZZ_Reference_Model($post));
    }

    // --- getry & setry ------------------------------

    /**
     * @return KT_ZZZ_Reference_Model
     */
    public function getModel() {
        return parent::getModel();
    }

    // --- veřejné funkce ------------------------------

    public function renderParamTypes() {
        $selectedTypesValue = $this->getModel()->getParamTypes();
        if (KT::issetAndNotEmpty($selectedTypesValue) && KT::arrayIsSerialized($selectedTypesValue)) {
            $selectedTypes = unserialize($selectedTypesValue);
            $results = array();
            $allTypes = new KT_ZZZ_Reference_Type_Enum();
            $translates = $allTypes->getTranslates();
            foreach ($allTypes->getAllKeyValues() as $key => $value) {
                if (in_array($value, $selectedTypes)) {
                    $class = strtolower($key);
                    $translate = $translates[$value];
                    array_push($results, "<span class=\"$class\" title=\"$translate\">$translate</span>");
                }
            }
            echo implode(" | ", $results);
        }
    }

    public function renderParamDateCreation() {
        if ($this->getModel()->isParamDateCreation()) {
            $label = __("Datum:", ZZZ_DOMAIN);
            echo "<p>$label <span>{$this->getModel()->getParamDateCreation()}</span></p>";
        }
    }

    public function renderParamClientName() {
        if ($this->getModel()->isParamClientName()) {
            $label = __("Klient:", ZZZ_DOMAIN);
            echo "<p>$label <span>{$this->getModel()->getParamClientName()}</span></p>";
        }
    }

    public function renderNextReferenceLink() {
        $adjacent = get_adjacent_post(false, "", false);
        if (KT::issetAndNotEmpty($adjacent)) {
            $url = get_permalink($adjacent->ID);
            echo "<a href=\"$url\" title=\"Další naše práce\" class=\"next\">Další reference</a>";
        }
    }

    public function renderGallery() {
        $this->getModel()->getGallery()->setOrderby("menu_order");
        if ($this->getModel()->getGallery()->hasFiles()) {
            foreach ($this->getModel()->getGallery()->getFiles() as $image) {
                $imageData = wp_get_attachment_image_src($image->ID, KT_ZZZ_IMAGE_SIZE_REFERENCE_GALLERY);
                echo "<div class=\"col-sm-6\">";
                echo $this->getImageHtmlTag($imageData[0], array("alt" => $image->post_title, "class" => "img-responsive"));
                echo "</div>";
            }
        }
    }

    public function renderPrevReferenceLink() {
        $adjacent = get_adjacent_post(false, "", true);
        if (KT::issetAndNotEmpty($adjacent)) {
            $url = get_permalink($adjacent->ID);
            echo "<a href=\"$url\" title=\"Předchozí naše práce\" class=\"prev\">Předchozí reference</a>";
        }
    }

}
