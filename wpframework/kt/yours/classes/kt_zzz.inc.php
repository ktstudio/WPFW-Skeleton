<?php

/**
 * Základní statická třída s persitentími daty per request
 * 
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ {

    private static $themeModel = null;

    /**
     * Vrátí model šablony s nastavením
     * 
     * @author Martin Hlaváč
     * @link http://www.ktstudio.cz
     * 
     * @return \KT_ZZZ_Theme_Model
     */
    public static function getThemeModel() {
        if (KT::issetAndNotEmpty(self::$themeModel)) {
            return self::$themeModel;
        }
        $themeModel = new KT_ZZZ_Theme_Model();
        return self::$themeModel = $themeModel;
    }

}
