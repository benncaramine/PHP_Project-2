<?php
$ref=$_GET['ref'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $result=$bdd->query(" DELETE FROM `projet_web`.`approvisionnement` WHERE `approvisionnement`.`idApp` = ".$ref.";");
        header("location: fetchApprov.php");
?>