<?php
if (KT_ZZZ::getThemeModel()->isCategoryNews()) {
    $newsPresenter = new KT_ZZZ_News_Presenter();
    ?>

    <section id="news">
        <header>
            <h2><?php echo KT_ZZZ::getThemeModel()->getCategoryNewsTitle(); ?></h2>
        </header>
        <div class="row">
            <?php $newsPresenter->theQuery(); ?>
        </div>
    </section>

    <?php
}
