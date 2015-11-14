<form id="searchform" class="navbar-form navbar-right" role="search" method="get" action="<?php echo home_url("/"); ?>">
    <div class="form-group">
        <input id="s" name="s" type="text" class="form-control" placeholder="<?php _e("Zadejte výraz...", ZZZ_DOMAIN); ?>">
    </div>
    <button type="submit" class="btn btn-default"><?php _e("Vyhledat", ZZZ_DOMAIN); ?></button>
</form>