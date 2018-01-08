<?php
$sliderPresenter = new KT_ZZZ_Sliders_Presenter();
if ($sliderPresenter->hasPosts()) {
    ?>

    <section id="slider">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $sliderPresenter->theIndicators(); ?>
            </ol>
            <div class="carousel-inner">
                <?php $sliderPresenter->theInners(); ?>
            </div>
        </div>
    </section>

<?php
}