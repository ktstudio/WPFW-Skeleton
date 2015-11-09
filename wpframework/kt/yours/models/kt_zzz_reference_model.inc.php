<?php

class KT_ZZZ_Reference_Model extends KT_WP_Post_Base_Model {

    function __construct(WP_Post $post) {
        parent::__construct($post);
    }

    // --- getry & setry ------------------------


    public function getParamInformation() {
        return $this->getMetaValue(KT_ZZZ_Reference_Config::PARAMS_INFORMATION);
    }

    public function getParamTypes() {
        return $this->getMetaValue(KT_ZZZ_Reference_Config::PARAMS_TYPES);
    }

    public function getParamDateCreation() {
        return $this->getMetaValue(KT_ZZZ_Reference_Config::PARAMS_DATE);
    }

    public function getParamClientName() {
        return $this->getMetaValue(KT_ZZZ_Reference_Config::PARAMS_CLIENT);
    }

    // --- veřejné funkce ------------------------


    public function isParamInformation() {
        return KT::issetAndNotEmpty($this->getParamInformation());
    }

    public function isParamTypes() {
        return KT::issetAndNotEmpty($this->getParamTypes());
    }

    public function isParamDateCreation() {
        return KT::issetAndNotEmpty($this->getParamDateCreation());
    }

    public function isParamClientName() {
        return KT::issetAndNotEmpty($this->getParamClientName());
    }

}
