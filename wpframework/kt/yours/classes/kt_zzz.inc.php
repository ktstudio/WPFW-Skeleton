<?php

/**
 * Základní statická třída s persitentími daty per request
 */
class KT_ZZZ
{
    const DEFAULT_DECIMALS_COUNT = 2;
    const DEFAULT_DECIMAL_POINT = ",";
    const DEFAULT_THOUSANDS_SEPARATOR = " ";
    const DEFAULT_CURRENCY_PREFIX = "";
    const DEFAULT_CURRENCY_SUFFIX = " Kč";

    private static $themeModel = null;
    private static $frontPageModel;
    private static $postsPageModel;

    /** @return KT_ZZZ_Theme_Model */
    public static function getThemeModel()
    {
        if (isset(self::$themeModel)) {
            return self::$themeModel;
        }
        $themeModel = new KT_ZZZ_Theme_Model();
        return self::$themeModel = $themeModel;
    }

    /** @return KT_WP_Post_Base_Model */
    public static function getFrontPageModel()
    {
        if (isset(self::$frontPageModel)) {
            return self::$frontPageModel;
        }
        global $post;
        $frontPageId = get_option(KT_WP_OPTION_KEY_FRONT_PAGE);
        if (isset($post) && $post->ID == $frontPageId) {
            $frontPageModel = new KT_WP_Post_Base_Model($post);
        } else {
            $frontPageModel = new KT_WP_Post_Base_Model(get_post($frontPageId));
        }
        return self::$frontPageModel = $frontPageModel;
    }

    /** @return KT_WP_Post_Base_Model */
    public static function getPostsPageModel()
    {
        if (isset(self::$postsPageModel)) {
            return self::$postsPageModel;
        }
        global $post;
        $postsPageId = get_option(KT_WP_OPTION_KEY_POSTS_PAGE);
        if (isset($post) && $post->ID == $postsPageId) {
            $postsPageModel = new KT_WP_Post_Base_Model($post);
        } else {
            $postsPageModel = new KT_WP_Post_Base_Model(get_post($postsPageId));
        }
        return self::$postsPageModel = $postsPageModel;
    }

    /**
     * @param string $text
     * @param string $class
     * @param string $tag
     * @return string
     */
    public static function formatText($text = null, $class = null, $tag = "p")
    {
        return KT::textLinesToHtml(KT_String_Markdown::doMarkdownEmphasis($text), $tag, $class);
    }

    /**
     * @param int|float $value
     * @param int $decimals
     * @param char $decimalPoint
     * @param char $thousandsSeparator
     * @return int|float
     */
    public static function formatNumber($value, $decimals = self::DEFAULT_DECIMALS_COUNT, $decimalPoint = self::DEFAULT_DECIMAL_POINT, $thousandsSeparator = self::DEFAULT_THOUSANDS_SEPARATOR)
    {
        if (isset($value) && isset($decimals) && is_numeric($value) && is_numeric($decimals)) {
            if (ctype_digit((string)$value)) {
                $decimals = 0;
            }
            return number_format($value, intval($decimals), $decimalPoint, $thousandsSeparator);
        }
        return null;
    }

    /**
     * @param int|float $value
     * @param string $prefix
     * @param string $suffix
     * @return string
     */
    public static function formatPrice($value, $decimals = self::DEFAULT_DECIMALS_COUNT, $prefix = self::DEFAULT_CURRENCY_PREFIX, $suffix = self::DEFAULT_CURRENCY_SUFFIX)
    {
        if (isset($value) && is_numeric($value)) {
            $value = self::formatNumber($value, $decimals);
            return sprintf("%s%s%s", $prefix, $value, $suffix);
        }
        return null;
    }

    public static function renderAnalyticsTrackingCode()
    {
        if (self::getThemeModel()->isAnalyticsTrackingCode()) {
            echo self::getThemeModel()->getAnalyticsTrackingCode();
        }
    }

    public static function renderAnalyticsPixelCode()
    {
        if (self::getThemeModel()->isAnalyticsPixelCode()) {
            echo self::getThemeModel()->getAnalyticsPixelCode();
        }
    }

    public static function renderCompatibilityScript()
    {
        echo "<!--[if lt IE 9]><script src=\"https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js\"></script><script src=\"https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js\"></script><![endif]-->";
    }

    public static function renderGoogleMapScript()
    {
        if (self::getThemeModel()->isGoogleMapKey()) {
            $key = KT_ZZZ::getThemeModel()->getGoogleMapKey();
            $keyAttribute = "&key=$key";
            echo "<script async defer src=\"https://maps.googleapis.com/maps/api/js?callback=initMap$keyAttribute\" type=\"text/javascript\"></script>";
        }
    }
}
