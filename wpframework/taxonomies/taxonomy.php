<?php
$termPresenter = new KT_WP_Term_Base_Presenter($termModel = new KT_WP_Term_Base_Model(get_queried_object()));
get_header();
?>

<main id="category" class="container">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1 class="text-center"><?php echo $termModel->getName(); ?></h1>
                <?php if ($termModel->isDescription()) { ?>
                    <h2 class="text-center hidden-xs"><?php echo $termModel->getDescription(); ?></h2>
                <?php } ?>
            </header>
            <?php if (have_posts()) { ?>
                <div class="row">
                    <?php
                    global $wp_query;
                    $clearfixes = array(
                        2 => "<div class=\"visible-sm-block clearfix\"></div>", // za každým 2. záznamem
                        3 => "<div class=\"visible-lg-block visible-md-block clearfix\"></div>" // za každým 3. záznamem
                    );
                    KT_Presenter_Base::theQueryLoops($wp_query, KT_ZZZ_REFERENCE_KEY, $clearfixes);
                    ?>
                </div>
                <div id="pagination" class="pagination clearfix">
                    <?php echo KT::bootstrapPagination(); ?>
                </div>
                <?php
            } else {
                ?> 
                <div class="row">
                    <p><?php _e("K dispozici nejsou žádné příspěvky...", "ZZZ_DOMAIN"); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
