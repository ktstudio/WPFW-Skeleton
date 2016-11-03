<?php

class KT_ZZZ_Post_Config implements KT_Configable {

    const FORM_PREFIX = "kt-zzz-post";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldsets() {
        return self::getAllNormalFieldsets() + self::getAllSideFieldsets();
    }

    public static function getAllNormalFieldsets() {
        return array(
            self::PARAMS_FIELDSET => self::getParamsFieldset(),
        );
    }

    public static function getAllSideFieldsets() {
        return array();
    }

    // --- parametry ---------------------------

    const PARAMS_FIELDSET = "kt-zzz-post-params";

    public static function getParamsFieldset() {
        $fieldset = new KT_Form_Fieldset(self::PARAMS_FIELDSET, __("Parametry", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::PARAMS_FIELDSET);

        // TODO

        return $fieldset;
    }

}
