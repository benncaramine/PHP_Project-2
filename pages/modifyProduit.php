<?php 

    $ref=$_GET['ref'];

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
        $prixVente=$_POST['prixVente'];

        

        
    
        
        
        $reponse = $bdd->query("UPDATE `projet_web`.`produit` SET `libelle`='".$libelle."', `prix_uni` = '".$prixUnitaire."', `prix_vente` = '".$prixVente."' WHERE `produit`.`ref` = ".$ref.";"); 
    
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
    <div class="back"><a href="fetchProduit.php">Retour</a></div><br>

<form action="" method="post">
<h6>LIBELLE:</h6><br>
<input type="text" name="libelle" required><br>
<h6>CATEGORIE:</h6><br>
 <select name="categorie" id="" >

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }

    $result=$bdd->query("SELECT * FROM `categorie`");
    
    while ($row = $result->fetch(PDO::FETCH_NUM)) {
        print "<option value='".$row[0]."'>".$row[1]."</option>";
    }

?>


</select><br>


<h6>PRIXUNITAIRE:</h6><br><input type="text" name="prixUnitaire" required><br>
<h6>PRIXDEVENTE:</h6><br><input type="text" name="prixVente" required><br>

<input type="submit" name="ok" value="valider" id="ok">
</form>
    </center>
</body>
</html>