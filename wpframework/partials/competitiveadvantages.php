<?php $competitiveAdvantagesPresenter = new KT_ZZZ_Competitive_Advantages_Presenter(); ?>

<section id="competitive-advantages">
    <?php if (KT_ZZZ::getThemeModel()->isCompetitiveAdvantagesTitle()) { ?>
        <header>
            <h2><?php echo KT_ZZZ::getThemeModel()->getCompetitiveAdvantagesTitle(); ?></h2>
        </header>
    <?php } ?>
    <div class="row">
        <?php $competitiveAdvantagesPresenter->theItems(); ?>
    </div>
</section>
