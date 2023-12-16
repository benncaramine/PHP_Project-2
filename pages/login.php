<?php
if(isset($_POST['Login'])){


$user=$_POST["username"];
$password=$_POST["password"];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
    catch(PDOException $e)
{
    echo $e->getMessage();
} 
$result=$bdd->query("SELECT * FROM `admin`");
$de=$result->fetch();
    if($de['username']==$user){
    if($de['password']==$password){
        header('location:fetchProduit.php');
    }else{
        header('location:login.php');  
    }
}

}
    

?>
<html>
    <head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
            font-size:1.05em;
            padding: auto;
            margin: auto;
            
        }
        center{
            padding-top: 100px;
        }
      
        body{
           
              background: url(images/groin.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
              background-size: cover;
            
        
        }
    </style>
    </head>
    <body>

    <center>
        <div>
              
            <form action="" method="post" >
                <h2 style="color:black	;">USERNAME:</h2><br>
                <input type="text" name="username" required class="form-control" style="width: 300px;"><br>
                <h2 style="color:black	;">PASSWORD:</h2><br>
                <input type="password" name="password" required class="form-control" style="width: 300px"; ><br>
                <input type="submit" value="Login" name="Login" class="btn btn-light">

            </form>
        </div>
    </center>
    </body>
</html>
