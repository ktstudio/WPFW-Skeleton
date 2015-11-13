<?php
$sliderPresenter = new KT_ZZZ_Slider_Presenter();
if ($sliderPresenter->isPosts()) {
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