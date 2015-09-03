<?php

class KT_ZZZ_Post_Config {

    const FORM_PREFIX = "kt-zzz-post";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldset() {
        return array(
            self::PARAMS_FIELDSET => self::getParamsFieldset(),
        );
    }

    // --- parametry ---------------------------

    const PARAMS_FIELDSET = "kt-zzz-post-params";

    public static function getParamsFieldset() {
        $fieldset = new KT_Form_Fieldset(self::PARAMS_FIELDSET, __("Parametry", ZZZ_DOMAIN));
        $fieldset->setPostPrefix(self::PARAMS_FIELDSET);

        // TODO

        return $fieldset;
    }

}
