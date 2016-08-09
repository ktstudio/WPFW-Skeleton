<?php
/* Template Name: Kontakt */
$pagePresenter = new KT_ZZZ_Page_Presenter($pageModel = new KT_ZZZ_Page_Model($post));
$contentFormPresenter = new KT_ZZZ_Contact_Form_Presenter();
get_header();
?>   

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
        <div class="col-md-9">
            <main>
                <header>
                    <h1><?php echo $pageModel->getTitle(); ?></h1>
                </header>
                <?php
                if ($pageModel->hasExcerpt()) {
                    echo $pageModel->getExcerpt();
                }
                echo $pageModel->getContent();
                $contentFormPresenter->renderForm();
                ?>
            </main>
        </div>
    </div>
</div>

<?php
get_footer();
