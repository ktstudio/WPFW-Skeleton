<?php

class KT_ZZZ_Reference_Config implements KT_Configable {

    const FORM_PREFIX = "kt-zzz-reference";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldsets() {
        return array(
            self::PARAMS_FIELDSET => self::getParamsFieldset(),
        );
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

    const PARAMS_FIELDSET = "kt-zzz-reference-params";
    const PARAMS_INFORMATION = "kt-zzz-reference-params-information";
    const PARAMS_TYPES = "kt-zzz-reference-params-types";
    const PARAMS_DATE = "kt-zzz-reference-params-date";
    const PARAMS_CLIENT = "kt-zzz-reference-params-client";

    public static function getParamsFieldset() {
        $fieldset = new KT_Form_Fieldset(self::PARAMS_FIELDSET, __("Parametry", ZZZ_DOMAIN));
        $fieldset->setPostPrefix(self::PARAMS_FIELDSET);

        $fieldset->addText(self::PARAMS_DATE, "Datum");

        $fieldset->addText(self::PARAMS_CLIENT, "Klient");

        $referenceTypes = new KT_ZZZ_Reference_Type_Enum();

        $fieldset->addTextarea(self::PARAMS_INFORMATION, __("Informace:", ZZZ_DOMAIN));

        $fieldset->addCheckbox(self::PARAMS_TYPES, __("Typy:", ZZZ_DOMAIN))
                ->setOptionsData($referenceTypes->getTranslates());

        return $fieldset;
    }

}
