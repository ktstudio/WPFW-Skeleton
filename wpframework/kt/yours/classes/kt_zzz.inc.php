<?php

/**
 * Základní statická třída s persitentími daty per request
 */
class KT_ZZZ {

    private static $themeModel = null;

    /**
     * Vrátí model šablony s nastavením
     * 
     * @return KT_ZZZ_Theme_Model
     */
    public static function getThemeModel() {
        if (isset(self::$themeModel)) {
            return self::$themeModel;
        }
        $themeModel = new KT_ZZZ_Theme_Model();
        return self::$themeModel = $themeModel;
    }

}
