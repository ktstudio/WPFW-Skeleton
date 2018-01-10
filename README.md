# (KT) WP Framework Skeleton

Základní kostra pro vlastní WordPress šablony založené na WP Frameworku

1. Vložte adresář wpframework do wp-content/themes/
2. Přejmenujte adresář wpframework na svůj vlastní název šablony + změňte si vlastní screenshot.png
3. Dále je třeba přejmenovat výchozí prefixy ZZZ (ten je zvolen takto pro, aby šlo snadno použít hromadné přejmenování) 
	1. Soubory (na disku) - všechny soubory, které začínají na kt_zzz nebo kt-zzz (pozn.: k tomu můžete využít např. program [Bulk Rename Utility](http://www.bulkrenameutility.co.uk/Download.php) nebo skript [prefixer.php](https://github.com/JohnyGemityg/my-tools/blob/master/prefixer.php))
	2. Konstanty a třídy (v kódu) - vše co začíná na KT_ZZZ (+ ZZZ_DOMAIN) a kt-zzz
4. Nakonfigurujte si šablonu dle vlastních představ v kt/yours/requires/common/kt_zzz_theme_setup.inc.php, případně doplňte vlastní konstanty v kt/yours/kt_init.inc.php 
5. Nakopírujte aktuální verzi [WP Frameworku](https://github.com/ktstudio/WP-Framework) standardně dle pokynů [z dokumentace](http://www.wpframework.cz/zaciname/) - adresář kt 
6. Upravte vzorové soubory, spusťte v databázi SQL skript (kt-zzz.sql), doplňte vlastní (kód)...
7. Profit :-)

## Co je součástí?

- Příprava pro použití s front page a základní (HTML/WP) layouty (header, footer, 404, page, single, search, archive, category)
- Základní obecná konfigurace šablony (vč. configu a modelu) 
- Novinky (presenter a partial) 
- Reference (jako vlastní post type + config, enum, model, presentery, metaboxy, partial) 
- Slider (jako vlastní post type + config, model, presenter, metaboxy, partial) 
- Konkurenční výhody (jako CRUD + config, model, presenter, admin page, metaboxy, partial + SQL skript) 
- Příprava pro potencionální rozšíření příspěvků a stránek 

---

**) Všechny součásti jsou připravené pouze jednoduše pro další vlastní použití/rozšíření nebo odstranění dle libosti...*

---

**) Vzorová šablona počítá s existencí distribuční verze UI FW [BootStrap](http://getbootstrap.com/getting-started/#download) v rámci adresáře kt/yours/...*

---

**) Při kopírování WP Frameworku POZOR na přepsání souboru kt/yours/kt_init.inc.php, platí ten ze skeletonu...*

---

**) Testováno na verzi [WP Frameworku 1.11](https://github.com/ktstudio/WP-Framework/releases)...*

---

Copyright © [KT Studio](https://www.ktstudio.cz/) 2015-2016  
Copyright © [Brilo Team](https://www.brilo.cz/) 2017-2018
