<?php

/**
 * Model pro definici stránky
 *
 * @author Martin Hlaváč
 * @link http://www.ktstudio.cz
 */
class KT_ZZZ_Page_Model extends KT_WP_Post_Base_Model {

    function __construct(WP_Post $post) {
        parent::__construct($post, KT_ZZZ_Page_Config::FORM_PREFIX);
    }

    // --- getry & setry ------------------------
    // TODO
}
