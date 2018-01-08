<?php

class KT_ZZZ_Theme_Model extends KT_WP_Options_Base_Model
{
    private $categoryNewsPermalink;
    private $categoryNewsTitle;

    public function __construct()
    {
        parent::__construct(KT_ZZZ_Theme_Config::FORM_PREFIX);
    }

    // --- getry & setry ------------------------

    public function getCategoryNewsId()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::CATEGORY_NEWS_ID);
    }

    public function getCategoryNewsPermalink()
    {
        if (isset($this->categoryNewsPermalink)) {
            return $this->categoryNewsPermalink;
        }
        if ($this->isCategoryNewsId()) {
            return $this->categoryNewsPermalink = get_category_link($this->getCategoryNewsId());
        }
        return $this->categoryNewsPermalink = "";
    }

    public function getCategoryNewsTitle()
    {
        if (isset($this->categoryNewsTitle)) {
            return $this->categoryNewsTitle;
        }
        if ($this->isCategoryNewsId()) {
            return $this->categoryNewsTitle = get_cat_name($this->getCategoryNewsId());
        }
        return $this->categoryNewsTitle = "";
    }

    public function getCompetitiveAdvantagesTitle()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::COMPETITIVE_ADVATAGES_TITLE);
    }

    public function getCompetitiveAdvantagesMaxCount()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::COMPETITIVE_ADVATAGES_MAX_COUNT);
    }

    public function getAddressTitle()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_TITLE);
    }

    public function getAddressStreet()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_STREET);
    }

    public function getAddressCity()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_CITY);
    }

    public function getAddressZip()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ADDRESS_ZIP);
    }

    public function getContactPhone()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_PHONE);
    }

    public function getContactMobile()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_MOBILE);
    }

    public function getContactEmail()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::CONTACT_EMAIL);
    }

    public function getSocialFacebook()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_FACEBOOK);
    }

    public function getSocialTwitter()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_TWITTER);
    }

    public function getSocialGooglePlus()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_GOOGLE_PLUS);
    }

    public function getSocialYouTube()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::SOCIAL_YOUTUBE);
    }

    public function getAnalyticsTrackingCode()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ANALYTICS_TRACKING_CODE);
    }

    public function getAnalyticsPixelCode()
    {
        return $this->getOption(KT_ZZZ_Theme_Config::ANALYTICS_PIXEL_CODE);
    }

    // --- veřejné metody ---------------------------

    public function isCategoryNews()
    {
        return KT::isIdFormat($this->getCategoryNewsId());
    }

    public function isCategoryNewsPermalink()
    {
        return KT::issetAndNotEmpty($this->getCategoryNewsId());
    }

    public function isCategoryNewsTitle()
    {
        return KT::issetAndNotEmpty($this->getCategoryNewsId());
    }

    public function isCompetitiveAdvantagesTitle()
    {
        return KT::issetAndNotEmpty($this->getCompetitiveAdvantagesTitle());
    }

    public function isCompetitiveAdvantagesMaxCount()
    {
        return KT::isIdFormat($this->getCompetitiveAdvantagesMaxCount());
    }

    public function isAddressTitle()
    {
        return KT::issetAndNotEmpty($this->getAddressTitle());
    }

    public function isAddressStreet()
    {
        return KT::issetAndNotEmpty($this->getAddressStreet());
    }

    public function isAddressCity()
    {
        return KT::issetAndNotEmpty($this->getAddressCity());
    }

    public function isAddressZip()
    {
        return KT::issetAndNotEmpty($this->getAddressZip());
    }

    public function isContactPhone()
    {
        return KT::issetAndNotEmpty($this->getContactPhone());
    }

    public function isContactMobile()
    {
        return KT::issetAndNotEmpty($this->getContactMobile());
    }

    public function isContactEmail()
    {
        return KT::issetAndNotEmpty($this->getContactEmail());
    }

    public function theSocialFacebook()
    {
        $this->theSocialListItem($this->getSocialFacebook(), __("Facebook", "ZZZ_DOMAIN"), "facebook");
    }

    public function theSocialTwitter()
    {
        $this->theSocialListItem($this->getSocialTwitter(), __("Twitter", "ZZZ_DOMAIN"), "twitter");
    }

    public function theSocialGooglePlus()
    {
        $this->theSocialListItem($this->getSocialGooglePlus(), __("Google+", "ZZZ_DOMAIN"), "google");
    }

    public function theSocialYouTube()
    {
        $this->theSocialListItem($this->getSocialYouTube(), __("YouTube kanál", "ZZZ_DOMAIN"), "youtube");
    }

    public function isAnalyticsTrackingCode()
    {
        return KT::issetAndNotEmpty($this->getAnalyticsTrackingCode());
    }

    public function isAnalyticsPixelCode()
    {
        return KT::issetAndNotEmpty($this->getAnalyticsPixelCode());
    }

    // --- neveřejné metody ------------------------

    private function theSocialListItem($url, $title, $class)
    {
        if (KT::issetAndNotEmpty($url) && KT::issetAndNotEmpty($title) && KT::issetAndNotEmpty($class)) {
            echo "<li><a href=\"{$url}\" title=\"{$title}\" target=\"_blank\" class=\"{$class}\">{$title}</a></li>";
        }
    }
}
