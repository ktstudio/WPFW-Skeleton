# (KT) WP Framework Skeleton

Základní kostra pro vlastní WordPress šablony založené na WP Frameworku

1. Vložte adresář wpframework do wp-content/themes/
2. Přejmenujte adresář wpframework na svůj vlastní název šablony + změňte si vlastní screenshot.png
3. Dále je třeba přejmenovat výchozí prefixy ZZZ (ten je zvolen takto pro, aby šlo snadno použít hromadné přejmenování) 
	1. Soubory (na disku) - všechny soubory, které začínají na kt_zzz nebo kt-zzz
	2. Konstanty a třídy (v kódu) - vše co začíná na KT_ZZZ (+ ZZZ_DOMAIN) a kt-zzz
4. Nakonfigurujte si šablonu dle vlastních představ v kt/yours/requires/common/kt_zzz_theme_setup.inc.php, případně doplňte vlastní konstanty v kt/yours/kt_init.inc.php 
5. Nakopírujte aktuální verzi [WP Frameworku](https://github.com/ktstudio/WP-Framework) standardně dle pokynů [z dokumentace](http://www.wpframework.cz/zaciname/) - adresář kt 
6. Upravte vzorové soubory, doplňte vlastní (kód)...
7. Profit :-)

---

**Testováno na verzi [WP Frameworku 1.5](https://github.com/ktstudio/WP-Framework/releases)...*

---

Copyright © KTStudio.cz 2015