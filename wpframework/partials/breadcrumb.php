<?php
if (function_exists("yoast_breadcrumb")) {
    ?>
    <section id="breadCrumbsContainer" class="hidden-xs">
        <div id="breadcrumbs" class="container">
            <p><?php _e("Nacházíte se:", ZZZ_DOMAIN); ?></p>
            <?php yoast_breadcrumb(); ?>
        </div>
    </section>
    <?php
}