<?php 


    if(isset($_POST['ok'])){
        $bdd='';
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $date=$_POST['date'];
        $client=$_POST['client'];
        $produit=$_POST['produit'];
        $quantite=$_POST['qu'];
       
        $in=$bdd->query("INSERT INTO commende values('".$client."','".$produit."','".$date."','".$quantite."','0');");
        header('location:fetchCommande.php');
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
            <a href="fetchCommande.php">Retour</a>
            </div><br>
    <form action="" method="post">
        <h6>DATE</h6>
        <input type="date" name="date">
        <h6>REF DU PRODUIT:</h6><br> 
        <input type="text" name="produit">
        <h6>CIN DU CLIENT:</h6><br> 
        <input type="text" name="client">
        <h6>QUANTITE:</h6><br> 
       <input type="number" name="qu"><br>
      <input type="submit" name="ok" value="valider" id="ok">
    </form>
    </center></body>
</html>