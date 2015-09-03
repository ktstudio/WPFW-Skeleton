<?php

class KT_ZZZ_Theme_Model extends KT_WP_Options_Base_Model {

    private $categoryNewsPermalink;
    private $categoryNewsTitle;

    public function __construct() {
        parent::__construct(KT_ZZZ_Theme_Config::FORM_PREFIX);
    }

    // --- KATEGORIE ---------------------------

    public function getCategoryNewsId() {
        return $this->getOption(KT_ZZZ_Theme_Config::CATEGORY_NEWS_ID);
    }

    public function getCategoryNewsPermalink() {
        $categoryNewsPermalink = $this->categoryNewsPermalink;
        if (KT::issetAndNotEmpty($categoryNewsPermalink)) {
            return $categoryNewsPermalink;
        }
        $categoryNewsId = $this->getCategoryNewsId();
        if (KT::isIdFormat($categoryNewsId)) {
            return $this->categoryNewsPermalink = get_category_link($categoryNewsId);
        }
        return null;
    }

    public function getCategoryNewsTitle() {
        $categoryNewsTitle = $this->categoryNewsTitle;
        if (KT::issetAndNotEmpty($categoryNewsTitle)) {
            return $categoryNewsTitle;
        }
        $categoryNewsId = $this->getCategoryNewsId();
        if (KT::isIdFormat($categoryNewsId)) {
            return $this->categoryNewsTitle = get_cat_name($categoryNewsId);
        }
        return null;
    }

    // --- ADRESA ---------------------------

    public function getAddressTitle() {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_TITLE);
    }

    public function getAddressStreet() {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_STREET);
    }

    public function getAddressCity() {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_CITY);
    }

    public function getAddressZip() {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_ZIP);
    }

    // --- KONTAKTY ---------------------------

    public function getContactPhone() {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_PHONE);
    }

    public function getContactMobile() {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_MOBILE);
    }

    public function getContactEmail() {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_EMAIL);
    }

    // --- SOCIÁLNÍ SÍTĚ ---------------------------

    public function getSocialFacebook() {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_FACEBOOK);
    }

    public function isSocialFacebook() {
        return KT::issetAndNotEmpty($this->getSocialFacebook());
    }

    public function theSocialFacebook() {
        return $this->theSocialListItem($this->getSocialFacebook(), __("Facebook", ZZZ_DOMAIN), "facebook");
    }

    public function getSocialTwitter() {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_TWITTER);
    }

    public function theSocialTwitter() {
        return $this->theSocialListItem($this->getSocialTwitter(), __("Twitter", ZZZ_DOMAIN), "twitter");
    }

    public function getSocialGooglePlus() {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_GOOGLE_PLUS);
    }

    public function theSocialGooglePlus() {
        return $this->theSocialListItem($this->getSocialGooglePlus(), __("Google+", ZZZ_DOMAIN), "google");
    }

    public function getSocialYouTube() {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_YOUTUBE);
    }

    public function theSocialYouTube() {
        return $this->theSocialListItem($this->getSocialYouTube(), __("YouTube kanál", ZZZ_DOMAIN), "ytb");
    }

    // --- HELPERS ---------------------------

    public function theSocialListItem($url, $title, $class) {
        if (KT::issetAndNotEmpty($url) && KT::issetAndNotEmpty($title) && KT::issetAndNotEmpty($class)) {
            echo "<li><a href=\"{$url}\" class=\"{$class}\" title=\"{$title}\">{$title}</a></li>";
        }
    }

}
