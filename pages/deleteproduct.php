<?php
$ref=$_GET['ref'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $result=$bdd->query("DELETE FROM `produit` WHERE ref = ".$ref." ");
        header("location: fetchProduit.php");
?>