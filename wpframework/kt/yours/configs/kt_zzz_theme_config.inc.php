<?php

class KT_ZZZ_Theme_Config implements KT_Configable
{
    const FORM_PREFIX = "kt-zzz-theme";

    // --- fieldsety ---------------------------

    public static function getAllGenericFieldsets()
    {
        return self::getAllNormalFieldsets() + self::getAllSideFieldsets();
    }

    public static function getAllNormalFieldsets()
    {
        return [
            self::ADDRESS_FIELDSET => self::getAddressFieldset(),
            self::CONTACT_FIELDSET => self::getContactFieldset(),
            self::SOCIAL_FIELDSET => self::getSocialFieldset(),
            self::ANALYTICS_FIELDSET => self::getAnalyticsFieldset(),
        ];
    }

    public static function getAllSideFieldsets()
    {
        return [
            self::CATEGORY_FIELDSET => self::getCategoryFieldset(),
            self::COMPETITIVE_ADVATAGES_FIELDSET => self::getCompetitiveAdvantagesFieldset(),
        ];
    }

    // --- KATEGORIE ------------------------

    const CATEGORY_FIELDSET = "kt-zzz-theme-category";
    const CATEGORY_NEWS_ID = "kt-zzz-theme-category-news-id";

    public static function getCategoryFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::CATEGORY_FIELDSET, __("Kategorie", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::CATEGORY_FIELDSET);

        $fieldset->addWpCategory(self::CATEGORY_NEWS_ID, __("Novinky:", "ZZZ_ADMIN_DOMAIN"));

        return $fieldset;
    }

    // --- KONKURENČNÍ VÝHODY ------------------------

    const COMPETITIVE_ADVATAGES_FIELDSET = "kt-zzz-theme-competitive-advantages";
    const COMPETITIVE_ADVATAGES_TITLE = "kt-zzz-theme-competitive-advantages-title";
    const COMPETITIVE_ADVATAGES_MAX_COUNT = "kt-zzz-theme-competitive-advantages-max-count";

    public static function getCompetitiveAdvantagesFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::COMPETITIVE_ADVATAGES_FIELDSET, __("Konkurenční výhody", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::COMPETITIVE_ADVATAGES_FIELDSET);

        $fieldset->addText(self::COMPETITIVE_ADVATAGES_TITLE, __("Nadpis:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addSlider(self::COMPETITIVE_ADVATAGES_MAX_COUNT, __("Max. počet:", "ZZZ_ADMIN_DOMAIN"))
            ->setDefaultValue(3)
            ->setStep(3)
            ->setMinValue(0)
            ->setMaxValue(12);

        return $fieldset;
    }

    // --- ADRESA ------------------------

    const ADDRESS_FIELDSET = "kt-zzz-theme-address";
    const ADDRESS_TITLE = "kt-zzz-theme-address-title";
    const ADDRESS_STREET = "kt-zzz-theme-address-street";
    const ADDRESS_CITY = "kt-zzz-theme-address-city";
    const ADDRESS_ZIP = "kt-zzz-theme-address-zip";

    public static function getAddressFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::ADDRESS_FIELDSET, __("Adresa", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::ADDRESS_FIELDSET);

        $fieldset->addText(self::ADDRESS_TITLE, __("Titulek:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addText(self::ADDRESS_STREET, __("Ulice:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addText(self::ADDRESS_CITY, __("Město:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addText(self::ADDRESS_ZIP, __("PSČ:", "ZZZ_ADMIN_DOMAIN"));

        return $fieldset;
    }

    // --- KONTAKTY ------------------------

    const CONTACT_FIELDSET = "kt-zzz-theme-contact";
    const CONTACT_PHONE = "kt-zzz-theme-contact-phone";
    const CONTACT_MOBILE = "kt-zzz-theme-contact-mobile";
    const CONTACT_EMAIL = "kt-zzz-theme-contact-email";

    public static function getContactFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::CONTACT_FIELDSET, __("Kontakty", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::CONTACT_FIELDSET);

        $fieldset->addText(self::CONTACT_PHONE, __("Telefon:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addText(self::CONTACT_MOBILE, __("Mobil:", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->addText(self::CONTACT_EMAIL, __("E-mail:", "ZZZ_ADMIN_DOMAIN"))
            ->setInputType(KT_Text_Field::INPUT_EMAIL)
            ->addRule(KT_Field_Validator::EMAIL, __("E-mail musí být ve správném tvaru", "ZZZ_ADMIN_DOMAIN"));

        return $fieldset;
    }

    // --- SOCIÁLNÍ SÍTĚ ------------------------

    const SOCIAL_FIELDSET = "kt-zzz-theme-social";
    const SOCIAL_FACEBOOK = "kt-zzz-theme-social-facebook";
    const SOCIAL_TWITTER = "kt-zzz-theme-social-twitter";
    const SOCIAL_GOOGLE_PLUS = "kt-zzz-theme-social-google-plus";
    const SOCIAL_YOUTUBE = "kt-zzz-theme-social-youtube";

    public static function getSocialFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::SOCIAL_FIELDSET, __("Sociální sítě", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::SOCIAL_FIELDSET);

        $fieldset->addText(self::SOCIAL_FACEBOOK, __("Facebook:", "ZZZ_ADMIN_DOMAIN"))
            ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_TWITTER, __("Twitter", "ZZZ_ADMIN_DOMAIN"))
            ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_GOOGLE_PLUS, __("Google+:", "ZZZ_ADMIN_DOMAIN"))
            ->setInputType(KT_Text_Field::INPUT_URL);
        $fieldset->addText(self::SOCIAL_YOUTUBE, __("YouTube:", "ZZZ_ADMIN_DOMAIN"))
            ->setInputType(KT_Text_Field::INPUT_URL);

        return $fieldset;
    }

    // --- ANALYTIKA ------------------------

    const ANALYTICS_FIELDSET = "kt-zzz-theme-analytics";
    const ANALYTICS_TRACKING_CODE = "kt-zzz-theme-analytics-tracking-code";
    const ANALYTICS_PIXEL_CODE = "kt-zzz-theme-analytics-pixel-code";

    public static function getAnalyticsFieldset()
    {
        $fieldset = new KT_Form_Fieldset(self::ANALYTICS_FIELDSET, __("Analytika", "ZZZ_ADMIN_DOMAIN"));
        $fieldset->setPostPrefix(self::ANALYTICS_FIELDSET);

        $fieldset->addTextarea(self::ANALYTICS_TRACKING_CODE, __("Měřící kód:", "ZZZ_ADMIN_DOMAIN"))
            ->setToolTip(__("Měřící kód(y) Google Tag Manager nebo Analytics, popř. Seznam", "ZZZ_ADMIN_DOMAIN"))
            ->setFilterSanitize(FILTER_DEFAULT);

        $fieldset->addTextarea(self::ANALYTICS_PIXEL_CODE, __("Pixel kód:", "ZZZ_ADMIN_DOMAIN"))
            ->setToolTip(__("Měřící (Facebook) Pixel kód(y) do hlavičky", "ZZZ_ADMIN_DOMAIN"))
            ->setFilterSanitize(FILTER_DEFAULT);

        return $fieldset;
    }
}
