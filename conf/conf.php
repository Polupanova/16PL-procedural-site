<?php

/**
 * Ja konstante ACCESS, kas ir definēta failā index.php, nav atrodama, tas nozīmē,
 * ka kāds nelabais mēģina pieslēgt šo failu pa taisno ar URL adresi – bet mēs
 * sakām, ka nedrīkst.
 * 
 * Tā ir drošāk.
 */
if (!defined('ACCESS'))
    exit('Access denied');

/**
 * DB pieslēguma konfigurācija
 * Izmantojam konstantes, lai norādītu:
 * - hosta vārdu         DB_SERV
 * - lietotāja vārdu     DB_USER
 * - lietotāja paroli    DB_PASS
 * - datubāzes nosaukumu DB_DATB
 * 
 * Šīs konstantes mēs izmantosim failā db/func.php
 */
define('DB_SERV', 'webskola.lv');
define('DB_USER', '16plproc');
define('DB_PASS', '16plproc');
define('DB_DATB', '16plproc');

