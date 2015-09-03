
<?php if (have_posts()) { ?>
    <section id="indexPosts" class="container">
        <div class="row">
            <?php
            while (have_posts()) : the_post();
                get_template_part("loops/loop", KT_WP_POST_KEY);
            endwhile;
            ?>
        </div>
    </section>
    <?php
} 
