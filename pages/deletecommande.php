<?php
$idc=$_GET['idc'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $result=$bdd->query(" DELETE FROM `projet_web`.`commende` WHERE `commende`.`idCommende` = '".$idc."';");
        header("location: fetchCommande.php");

?>