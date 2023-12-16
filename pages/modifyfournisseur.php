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
        

        
    
        
        
        $reponse = $bdd->query("UPDATE `projet_web`.`fournisseur` SET `nom` = '".$nomclient."', `tel` = '".$telClient."', `email` = '".$emailClient."', `adresse` = '".$adressClient."' WHERE `fournisseur`.`id` = ".$ref.";
        "); 
    
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
    </style><body>
        <center>
            
    <div class="back"><a href="fetchfours.php">Retour</a></div> <br>
    <form action="" method="post">
        
    <h6>NOM:</h6><br> <input type="text" name="nomclient" required>
    
    <h6>Numéro De Télephone:</h6><br> <input type="text" name="telClient" required>
    <h6>ADRESSE:</h6><br> <input type="text" name="adressClient" required>
    <h6>EMAIL: </h6><br><input type="text" name="emailClient" required><br>
    <input type="submit" value="valider" name="ok" id="ok" >
    </form>
        </center>
    </body>
</html>