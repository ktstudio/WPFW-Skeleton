<?php

class KT_ZZZ_Sidebar_Presenter extends KT_Presenter_Base {

    private $currentSidebarKey;
    private $currentSidebarName;

    public function __construct() {
        parent::__construct();
        $this->initCurrentSidebar();
    }

    // --- getry & setry ------------------------------

    /** @return string */
    public function getCurrentSidebarKey() {
        return $this->currentSidebarKey;
    }

    private function setCurrentSidebarKey($value) {
        $this->currentSidebarKey = $value;
        return $this;
    }

    /** @return string */
    public function getCurrentSidebarName() {
        return $this->currentSidebarName;
    }

    private function setCurrentSidebarName($value) {
        $this->currentSidebarName = $value;
        return $this;
    }

    // --- veřejné metody ------------------------------

    /**
     * Vykreslení sidebaru
     */
    public function render() {
        if (is_active_sidebar($this->getCurrentSidebarKey())) {
            dynamic_sidebar($this->getCurrentSidebarKey());
        }
    }

    // --- neveřejné metody ------------------------------

    /**
     * Provede inicializaci aktuálního sidebaru 
     * 
     * @return \KT_ZZZ_Sidebar_Presenter
     */
    private function initCurrentSidebar() {
        global $wp_registered_sidebars;
        $sidebarKey = KT_ZZZ_SIDEBAR_DEFAULT;
        if (KT::arrayIssetAndNotEmpty($wp_registered_sidebars)) {
            foreach ($wp_registered_sidebars as $key => $values) {
                if ($key === $sidebarKey) {
                    $this->setCurrentSidebarName(KT::arrayTryGetValue($values, "name"));
                    break;
                }
            }
        }
        return $this->setCurrentSidebarKey($sidebarKey);
    }

}
