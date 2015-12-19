<?php

// --- KT init ---------------------------

/*
 * Inicializace KT frameworku - nic nemazat !!!
 */
$ktInitfile = TEMPLATEPATH . "/kt/kt_init.inc.php";
if (file_exists($ktInitfile)) {
    require($ktInitfile);
} else {
    wp_die(sprintf(__("POZOR: WP Framework není k dispozici, zkontrolujte prosím adresář a inicializační soubor: %s"), $ktInitfile));
}
