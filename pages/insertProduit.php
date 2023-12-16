<?php 


    if(isset($_POST['ok'])){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        
        $libelle=$_POST['libelle'];
        $categorie=$_POST['categorie'];
        $prixUnitaire=$_POST['prixUnitaire'];
        $stock=$_POST['stock'];
        $prixVente=$_POST['prixVente'];

        
    
        $result=$bdd->query("SELECT * FROM `categorie` WHERE intitule = '".$categorie."'");
        
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $reponse = $bdd->query("INSERT INTO `projet_web`.`produit` (`ref`, `libelle`, `prix_uni`, `stock`, `prix_vente`, `pic`, `id_cat`) VALUES (NULL, '".$libelle."', '".$prixUnitaire."',".$stock.", '".$prixVente."', NULL, '".$row[0]."');"); 
        }
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
            <div class="back">
            <a href="fetchProduit.php">Retour</a>
            </div><br>
    <form action="" method="post">
        <h6 style="padding-top: 20px;">LIBELLE:</h6><br>
    <input type="text" name="libelle" required><br>
        <h6>CATEGORIE:</h6><br> 
    <select name="categorie" id="" required>

    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
        catch(PDOException $e)
        {
        echo $e->getMessage();
        }

        $result=$bdd->query("SELECT * FROM `categorie`");
        
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            print "<option>".$row[1]."</option>";
        }

    ?>


    </select><br>
    

        <h6>PRIXUNITAIRE:</h6><br>
    <input type="text" name="prixUnitaire" required><br>
    <h6>QUANTITE:</h6><br>
    <input type="text" name="stock" required><br>

        <h6>PRIXDEVENTE:</h6><br>
    <input type="text" name="prixVente" required><br>
    
    <input type="submit" name="ok" value="valider" id="ok">
    </form>
    </center></body>
</html>