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
 * DB funkcijas: pieslēgšanās, CRUD
 * 
 * Extensions, kas strādā ar MySQL:
 * mysql  vairs netiek izstrādāts un uzturēts, procedurāla pieeja
 * mysqli OOP
 * PDO    OOP
 */

/**
 * Pieslēdzas pie servera un izvēlas datu bāzi.
 * @return resource (mysql link) Varam to arī neizmantot, ja esm pārliecināti,
 * ka mūsu programma nekad nepieslēgsies vienlaicīgi pie vairākiem DB serveriem.
 */
function connect() {
    $dblink = mysql_connect(DB_SERV, DB_USER, DB_PASS) or exit(mysql_error());

    mysql_select_db(DB_DATB, $dblink) or exit(mysql_error());

    return $dblink;
}

/**
 * Atlasa visas kolonas no tabulas $table.
 * 
 * Izmanto PHP paplašinājuma "mysql" funkcijas:
 * 
 * mysql_query($vaicājums, $resurss)
 * 
 * Funkcija paņem SQL vaicājumu kā tekstu un atgriež atlasītos datus īpašā
 * resource formātā
 * 
 * mysql_fetch_object($resurss)
 * 
 * Paņem funkcijas mysql_query rezultātu, no tā – pirmo ierakstu, izveido
 * šim ierakstam atbilstošo PHP objektu, un pabīda t.s. kursoru uz vienu
 * pozīiciju tālāk.
 * Ja šo funkciju lieto ciklā while, katrā cikla solī tiek paņemts nākamais
 * atlasīto datu ieraksts, un pārvērsts objektā.
 * Bez šīs funkcijas vēl eksistē mysql_fetch_assoc() un mysql_fetch_array().
 * 
 * @param string $table tabulas nosaukums
 * @param resource $link DB pieslēguma resurss (deskriptors). Varam atstāt tukšu,
 * ja nelietojam.
 * @return array masīvs ar objektiem
 */
function get($table, $link = NULL) {
    $q = "SELECT * FROM `$table`";
    
    $data = query($q, $link);

    return $data;
}

/**
 * Funkcijas izpilda jebkuru SQL vaicājumu
 * 
 * @param string $q — vaicājums
 * @param resource $link — DB pieslēguma resurss (deskriptors)
 * @return array
 */
function query($q, $link = NULL) {
    $res = mysql_query($q, $link) or exit(mysql_error());

//    echo $q;

    while ($line = mysql_fetch_object($res)) {
        $data[] = $line;
    }

    return $data;
}

/**
 * 
 * @param string $table – tabulas nosaukums
 * @param array $data – asociatīvs masīvs ar pievienojamajiem datiem
 * @param resource $link — DB pieslēguma resurss (deskriptors)
 */
function add($table, $data, $link = NULL) {
    $q = "INSERT INTO `$table` set ";
    
    foreach ($data as $index => $item) {
//        $q .= "`$index` = '$item', ";
        $set[] = "`$index` = '$item'";
    }
    
    $q .= implode(', ', $set);
    
    echo $q;
    
    query($q, $link);
}

//Don't Repeat Yourself