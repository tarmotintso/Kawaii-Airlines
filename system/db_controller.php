<?php

require "system/database.php";
connect_db();
@$db = new mysqli(DATABASE_HOSTNAME, DATABASE_USERNAME, DATABASE_PASSWORD);

if (!@$db) {
    die('Could not connect: ' . mysql_error());
}

$lend_id = 1;
$lennud = get_first("select * from lennud.lend lend JOIN lennud.lennuk lennuk ON lennuk.id= lend.lennuk_id where lend.id=  $lend_id");

$broneeringud = get_first("select * from lennud.broneering WHERE lend.id = $lend_id");

$broneeritud_kohad = array();
foreach ($broneeringud as $broneering) {
    array_push($broneeritud_kohad, $broneering['koha_nr']);
}
$vabad_kohad = array();

$nr = $lennud["kohtade_arv"];
for ($x = 0; $x <= $nr; $x++) {
    if (in_array($x, $broneeritud_kohad)) {
    } else {
        array_push($vabad_kohad, $x);
    }
}

//$posts = get_all("SELECT * FROM status.pakkumised");
//if ($_POST)
//{
//    /**
//     * Take inserted data from form
//     */
//
//
//    $sql = "";
//        if (($db->query($sql)) === TRUE){
//
//            echo "<br>";
//            echo "<br>";
//            echo "<h2>Midagi on tehtud</h2>";
//        }
//            else {
//                echo "<br>";
//                echo "<br>";
//                echo "<h2>Viga:</h2> " . $sql . "<br>" . $db->error;
//            }
//
//    $db->close();
//}


//if ($_POST) {
//
//    /**
//     * Take inserted data from form
//     */
//    $pealkiri = $_POST['task_pealkiri'];
//    $eesnimi = $_POST['task_juh_eesnimi'];
//    $perenimi = $_POST['task_juh_perenimi'];
//    $tyyp = $_POST['task_tyyp'];
//    //$file = $_POST['task_file'];
//
//    //extra code against hack attempts
//    $pealkiri = mysql_real_escape_string($pealkiri);
//    $eesnimi = mysql_real_escape_string($eesnimi);
//    $perenimi = mysql_real_escape_string($perenimi);
//    $tyyp = mysql_real_escape_string($tyyp);
//    //$file = mysql_real_escape_string($file);
//
//    $query = "INSERT INTO loputoo.loputoo_kirjeldus (pealkiri, tyyp) VALUES ('$pealkiri','$tyyp')";
//    $query2 = "INSERT INTO loputoo.loputoo_juhendaja (j_eesnimi, j_perenimi) VALUES ('$eesnimi','$perenimi')";
//    //preg_match('`^\s*$`', $pealkiri) check for whitespace in a string
//
//    //check if inserted data is present on the forms and query it into database
//    if (empty($pealkiri)) {
//        echo "<br>" . "<br>" . "<h3>Pealkiri on sisestamata</h3>";
//    } elseif (empty($eesnimi)) {
//        echo "<br>" . "<br>" . "<h3>Eesnimi on sisestamata</h3>";
//    } elseif (empty($perenimi)) {
//        echo "<br>" . "<br>" . "<h3>Perekonnanimi on sisestamata</h3>";
//    } elseif (empty($tyyp)) {
//        echo "<br>" . "<br>" . "<h3>Tüüp on sisestamata</h3>";
//    } else {
//        if (($db->query($query) === TRUE) && ($db->query($query2) === TRUE)) {
//            echo "<br>";
//            echo "<br>";
//            echo "<h2>Andmed on edukalt sisestatud!</h2>";
//
//        } else {
//            echo "<h2>Viga:</h2> " . $$query . "<br>" . $db->error;
//        }
//    }
//    $db->close();
//
//}