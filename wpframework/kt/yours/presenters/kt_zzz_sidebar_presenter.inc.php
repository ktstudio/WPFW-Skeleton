<?php

/**
 * Model pro obsluhu, resp. výpis sidebaru
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Sidebar_Presenter extends KT_Presenter_Base {

    private $currentSidebarName = KT_ZZZ_SIDEBAR_DEFAULT;

    public function __construct() {
        parent::__construct();
        $this->initCurrentSidebar();
    }

    // --- getry & setry ------------------------------

    /**
     * @return string
     */
    public function getCurrentSidebarName() {
        return $this->currentSidebarName;
    }

    /**
     * Nastaví jméno (identifikátor) sidebáru, který se bude aktuálně zobrazovat a volat.
     * 
     * @param string $currentSidebarName
     * 
     * @return \KT_VLS_Sidebar_Presenter
     */
    public function setCurrentSidebarName($currentSidebarName) {
        $this->currentSidebarName = $currentSidebarName;
        return $this;
    }

    // --- veřejné metody ------------------------------

    /**
     * Vykreslení sidebaru
     */
    public function render() {
        if (is_active_sidebar($this->getCurrentSidebarName())) {
            dynamic_sidebar($this->getCurrentSidebarName());
        }
    }

    // --- neveřejné metody ------------------------------

    /**
     * Provede inicializaci aktuálního sidebaru 
     * 
     * @return \KT_VLS_Sidebar_Presenter
     */
    private function initCurrentSidebar() {
        return $this->setCurrentSidebarName(KT_ZZZ_SIDEBAR_DEFAULT);
    }

}
