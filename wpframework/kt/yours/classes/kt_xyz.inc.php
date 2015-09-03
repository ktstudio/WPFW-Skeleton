<?php

class KT_XYZ {

    private static $themeModel = null;

    /**
     * Vrátí model šablony s nastavením
     * 
     * @return \KT_XYZ_Theme_Model
     */
    public static function getThemeModel() {
        if (KT::issetAndNotEmpty(self::$themeModel)) {
            return self::$themeModel;
        }
        $themeModel = new KT_XYZ_Theme_Model();
        return self::$themeModel = $themeModel;
    }

}
