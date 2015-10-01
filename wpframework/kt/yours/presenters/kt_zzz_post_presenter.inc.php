<?php

class KT_ZZZ_Post_Presenter extends KT_WP_Post_Base_Presenter {

    function __construct(WP_Post $post) {
        parent::__construct(new KT_ZZZ_Post_Model($post));
    }

    // --- getry & setry ---------------------

    /**
     * @return \KT_ZZZ_Post_Model
     */
    public function getModel() {
        return parent::getModel();
    }

    // --- veřejné metody ---------------------

    // TODO

}
