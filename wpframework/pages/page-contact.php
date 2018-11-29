<?php
/* Template Name: Kontakt */
$postPresenter = new KT_ZZZ_Page_Presenter($postModel = new KT_ZZZ_Page_Model($post));
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
                    <h1><?php echo $postModel->getTitle(); ?></h1>
                </header>
                <?php
                if ($postModel->hasExcerpt()) {
                    echo $postModel->getExcerpt();
                }
                echo $postModel->getContent();
                $contentFormPresenter->renderForm();
                ?>
            </main>
        </div>
    </div>
</div>

<?php
get_footer();
