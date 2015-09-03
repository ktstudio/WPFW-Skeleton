<?php

class KT_XYZ_Post_Config {

    const FORM_PREFIX = "kt-xyz-post";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldset() {
        return array(
            self::PARAMS_FIELDSET => self::getParamsFieldset(),
        );
    }

    // --- parametry ---------------------------

    const PARAMS_FIELDSET = "kt-xyz-post-params";

    public static function getParamsFieldset() {
        $fieldset = new KT_Form_Fieldset(self::PARAMS_FIELDSET, __("Parametry", XYZ_DOMAIN));
        $fieldset->setPostPrefix(self::PARAMS_FIELDSET);

        // TODO

        return $fieldset;
    }

}
