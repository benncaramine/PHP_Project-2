<?php 


    if(isset($_POST['okey'])){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        
        $produit=$_POST['produit'];
        $fournisseur=$_POST['fournisseur'];
        $dateApprovc=$_POST['dateApprovc'];
        $quantite=$_POST['quantite'];
        $result=$bdd->query("SELECT * FROM `fournisseur` WHERE nom='".$fournisseur."'");
        
        $row = $result->fetch(PDO::FETCH_NUM);

$resultP=$bdd->query("SELECT * FROM `produit` WHERE libelle='".$produit."'");
        
        $rowP = $resultP->fetch(PDO::FETCH_NUM);
    
        
        $reponse = $bdd->query("INSERT INTO `projet_web`.`approvisionnement` (`produitID`, `fournisseurID`, `quantite`, `date`, `idApp`) VALUES ('".$rowP[0]."', '".$row[0]."', '".$quantite."', '".$dateApprovc."', NULL);"); 
        $r=$bdd->query("UPDATE `projet_web`.`produit` SET `stock`=stock+".$quantite." WHERE `produit`.`ref` = ".$rowP[0].";");
    }

    
?>
<html>
<style>
         body{
            font-family: 'Montserrat', sans-serif;
            padding: auto;
            margin: auto;
            background-image : url(images/n.jpg);
        }
        center{
            padding-top: 100px;
        }
   
        div.back a{

            text-decoration: none;
            
        }
        div.back{
            width: 50px;
            position: relative;
            border: darkblue solid;
            cursor: pointer;
            right: 200px;
            top: 50px;
            transition: 0.3s ease;
            border-radius: 3px;
            background: red;
            color: red;
            box-shadow: 200px;

        }
        div.back:hover,a:hover{
            border: rgb(92, 92, 143) solid;
            background-color: rgb(92, 92, 143);
            color: white;
        }
        input{
            height:80px;
            width:300px;
            text-decoration:none;
            border: blue solid;
            border-radius: 10px;
        }
        form{
            
            width: 500px;
            background-color: black ;  
            color: red; 
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 800px;

        }
        h6{
            margin: 5px 5px 5px 5px;
        }
        #ok{
            height: 20px;
            width:80px;
            margin: 5px 5px 5px 5px;
            cursor: pointer;
            transition: 0.3s ease;
            background-color: red;
        }
        #ok:hover{
            background-color: rgb(92, 92, 143);
            border: rgb(92, 92, 143) solid;
            color: white; 
        }
    </style>
    <body>
        <center>
        <div class="back"><a href="fetchApprov.php">Retour</a></div>
    <form action="" method="post">
        
    <h6>PRODUIT:</h6><br> <select name="produit" >
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
    <h6>FOURNISSEUR:</h6><br> <select name="fournisseur" >
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
    <h6>DATE:</h6><br> <input type="date" name="dateApprovc" >
    <h6>QUANTITE:  </h6><br> <input type="number" name="quantite"><br>
    <input type="submit" value="valider" name="okey" id="ok">
    </form>
        </center>
    </body>
</html>