<?php 

    $ref=$_GET['ref'];

    if(isset($_POST['ok'])){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        
        $nomclient=$_POST['nomclient'];
        
        $telClient=$_POST['telClient'];
        $adressClient=$_POST['adressClient'];
        $emailClient=$_POST['emailClient'];
        

        
    
        
        
        $reponse = $bdd->query("UPDATE `projet_web`.`client` SET `nom`='".$nomclient."', `tele` = '".$telClient."', `email` = '".$emailClient."',`adresse` = '".$adressClient."' WHERE `client`.`id` = '".$ref."';"); 
    
    }

    
?>

<html>
<a href="fetchApprov.php">back</a> <br>
<form action="" method="post">
        
        produit: <select name="produit" >
        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
            {
            echo $e->getMessage();
            }
    
            $result=$bdd->query("SELECT * FROM `produit`");
            
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                print "<option>".$row[1]."</option>";
            }
    
        ?>
        </select>
        fournisseur: <select name="fournisseur" >
        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
            {
            echo $e->getMessage();
            }
    
            $result=$bdd->query("SELECT * FROM `fournisseur`");
            
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                print "<option>".$row[1]."</option>";
            }
    
        ?>
        </select> 
        date: <input type="date" name="dateApprovc" >
        quantite: <input type="number" name="quantite">
        <input type="submit" value="valider" name="okey">
        </form>
</html>