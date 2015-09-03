<?php

class KT_XYZ_Theme_Config {

    const FORM_PREFIX = "kt-xyz-theme";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldset() {
        return array(
            self::CATEGORY_FIELDSET => self::getCategoryFieldset(),
            self::ADDRESS_FIELDSET => self::getAddressFieldset(),
            self::CONTACT_FIELDSET => self::getContactFieldset(),
            self::SOCIAL_FIELDSET => self::getSocialFieldset(),
        );
    }

    // --- KATEGORIE ------------------------

    const CATEGORY_FIELDSET = "kt-xyz-theme-category";
    const CATEGORY_NEWS_ID = "kt-xyz-theme-category-news-id";

    public static function getCategoryFieldset() {
        $fieldset = new KT_Form_Fieldset(self::CATEGORY_FIELDSET, __("Kategorie", XYZ_DOMAIN));
        $fieldset->setPostPrefix(self::CATEGORY_FIELDSET);

        $fieldset->addWpCategory(self::CATEGORY_NEWS_ID, __("Novinky:", XYZ_DOMAIN));

        return $fieldset;
    }

    // --- ADRESA ------------------------

    const ADDRESS_FIELDSET = "kt-xyz-theme-address";
    const ADDRESS_TITLE = "kt-xyz-theme-address-title";
    const ADDRESS_STREET = "kt-xyz-theme-address-street";
    const ADDRESS_CITY = "kt-xyz-theme-address-city";
    const ADDRESS_ZIP = "kt-xyz-theme-address-zip";

    public static function getAddressFieldset() {
        $fieldset = new KT_Form_Fieldset(self::ADDRESS_FIELDSET, __("Adresa", XYZ_DOMAIN));
        $fieldset->setPostPrefix(self::ADDRESS_FIELDSET);

        $fieldset->addText(self::ADDRESS_TITLE, __("Titulek:", XYZ_DOMAIN));
        $fieldset->addText(self::ADDRESS_STREET, __("Ulice:", XYZ_DOMAIN));
        $fieldset->addText(self::ADDRESS_CITY, __("Město:", XYZ_DOMAIN));
        $fieldset->addText(self::ADDRESS_ZIP, __("PSČ:", XYZ_DOMAIN));

        return $fieldset;
    }

    // --- KONTAKTY ------------------------

    const CONTACT_FIELDSET = "kt-xyz-theme-contact";
    const CONTACT_PHONE = "kt-xyz-theme-contact-phone";
    const CONTACT_MOBILE = "kt-xyz-theme-contact-mobile";
    const CONTACT_EMAIL = "kt-xyz-theme-contact-email";

    public static function getContactFieldset() {
        $fieldset = new KT_Form_Fieldset(self::CONTACT_FIELDSET, __("Kontakty", XYZ_DOMAIN));
        $fieldset->setPostPrefix(self::CONTACT_FIELDSET);

        $fieldset->addText(self::CONTACT_PHONE, __("Telefon:", XYZ_DOMAIN));
        $fieldset->addText(self::CONTACT_MOBILE, __("Mobil:", XYZ_DOMAIN));
        $fieldset->addText(self::CONTACT_EMAIL, __("E-mail:", XYZ_DOMAIN))
                ->addRule(KT_Field_Validator::EMAIL, __("E-mail musí být ve správném tvaru", XYZ_DOMAIN));

        return $fieldset;
    }

    // --- SOCIÁLNÍ SÍTĚ ------------------------

    const SOCIAL_FIELDSET = "kt-xyz-theme-social";
    const SOCIAL_FACEBOOK = "kt-xyz-theme-social-facebook";
    const SOCIAL_TWITTER = "kt-xyz-theme-social-twitter";
    const SOCIAL_GOOGLE_PLUS = "kt-xyz-theme-social-google-plus";
    const SOCIAL_YOUTUBE = "kt-xyz-theme-social-youtube";

    public static function getSocialFieldset() {
        $fieldset = new KT_Form_Fieldset(self::SOCIAL_FIELDSET, __("Sociální sítě", XYZ_DOMAIN));
        $fieldset->setPostPrefix(self::SOCIAL_FIELDSET);

        $fieldset->addText(self::SOCIAL_FACEBOOK, __("Facebook:", XYZ_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_TWITTER, __("Twitter", XYZ_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_GOOGLE_PLUS, __("Google+:", XYZ_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_YOUTUBE, __("YouTube:", XYZ_DOMAIN))
                ->setInputType(KT_Text_Field::INPUT_URL);

        return $fieldset;
    }

}
