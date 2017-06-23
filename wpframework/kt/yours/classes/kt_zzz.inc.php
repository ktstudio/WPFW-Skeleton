<?php

/**
 * Základní statická třída s persitentími daty per request
 */
class KT_ZZZ
{
    private static $themeModel = null;

    /**
     * Vrátí model šablony s nastavením
     *
     * @return KT_ZZZ_Theme_Model
     */
    public static function getThemeModel()
    {
        if (isset(self::$themeModel)) {
            return self::$themeModel;
        }
        $themeModel = new KT_ZZZ_Theme_Model();
        return self::$themeModel = $themeModel;
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
        $jsUrl = KT_ZZZ_JS_URL;
        echo "<!--[if lt IE 9]><script src=\"{$jsUrl}/compatibility.js\"></script><![endif]-->";
    }
}
