
<html>
<style>
        body{
            font-family: 'Montserrat', sans-serif;
            padding: auto;
            margin: auto;
            background : url(images/m.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
              background-size: cover;
        }
        center{
            padding-top: 150px;
        }
        .content-table{
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1.6em;
            min-width: 900px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 28px rgb(0,0,0,0.15);
        }
        .content-table thead tr{
            background-color: Black;  
            color: red;
            text-align: left;
            font-weight: bold;
            font-size:0.6em;
        }
        .content-table td,
        .content-table th{
            padding: 12px 15px;
        }
        .content-table tbody tr{
            border-bottom: 1.5px black solid;
            background-color: LightGrey	; 
        }
        .navbar{

            margin: 0px;
            height: 80px;
            
            background-image : url(images/m.jpg);

        
        }
        .navbar nav{
            display:flex;
            flex-wrap:wrap;
            justify-content: center;
            align-items: center;
            border-bottom: 5px solid black;
        }
        .navbar nav ul{
            list-style-type: none;
            display: flex;
            
        }
        .navbar nav ul li{
            padding: 12px 15px;
            text-decoration: none;
        }
        .navbar nav ul li a{
            font-weight:bold;
            text-decoration: none;
            color: red;
            transition: 0.3s ease;
        }
        .navbar nav ul li a:hover{
            color :white;
            border-bottom: 1px rgb(92, 92, 143) solid;

        }
        #delete{
            padding: 14px 14px 14px 14px;
            text-decoration: none;
            color: red;
            background: black;
            font-size: 0.8em;
            transition: 0.3s ease;

        }
        #delete:hover{
            padding: 13px 13px 13px 13px;
            background: red;
            border: red 1px solid;
            font-size: 0.8em;
            color: black;
        }
        #ajouter{
            
            padding: 20px 20px 20px 20px;
            text-decoration: none;
            color: red;
            background: black;
            font-size: 1em;
            transition: 0.3s ease;
            border-radius: 20px;

        }
        #ajouter:hover{
            padding: 14px 14px 14px 14px;
            background: red;
            border: green 1px solid;
            font-size: 0.8em;
            color: black;
            border-radius: 2px;
           
        }
        #modify{
            padding: 14px 14px 14px 14px;
            text-decoration: none;
            color: red;
            background: black;
            font-size: 0.8em;
            transition: 0.3s ease;


        }
        
        #modify:hover{

            padding: 14px 14px 14px 14px;
            background: red;
            border: red 1px solid;
            font-size: 0.8em;
            color: black;
            border-radius: 2px;
        }

        
        </style>
        <body>
            <section class="navbar">
                <nav>
                    <ul>
                    <li><a href="fetchProduit.php">PRODUITS</a></li>
                        <li><a href="fetchclients.php">CLIENTS</a></li>
                        <li><a href="fetchApprov.php">APPROVISIONNEMENT</a></li>
                        <li><a href="fetchfours.php">FOURNISSEURS</a></li>
                        <li><a href="fetchcat.php">CATEGORIES</a></li>
                        <li><a href="fetchCommande.php">COMMANDE</a></li>

                    </ul>
                </nav>

            </section>
        <body>
            <center>
            <?php 
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=projet_web', 'root', ''); }
            catch(PDOException $e)
        {
            echo $e->getMessage();
        }    
        $result=$bdd->query("SELECT * FROM `fournisseur`  ");
        echo "<table class=","content-table",">";
        echo   "<thead class=","content-table",">";
        echo   "<tr>";
        echo "<th>id</th>";
        echo "<th>nom</th>";
        echo "<th>tel</th>";
        echo "<th>adress</th>";
        echo "<th>email</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo   "</tr>";
        echo   "</thead>";
        echo   "<tbody>";
        while ($row = $result->fetch(PDO::FETCH_NUM)) {     
            echo    "<tr>";
            echo "<td>".$row[0]."</td> ";
            echo "<td>".$row[1]."</td> ";
            echo "<td>".$row[2]."</td> ";
            echo "<td>".$row[3]."</td> ";
            echo "<td>".$row[4]."</td> ";

            echo "<td><a href=","deletefournisseur.php?ref=".$row[0].""," id=","delete",">delete</a></td>";
            echo "<td><a href=","modifyfournisseur.php?ref=".$row[0].""," id=","modify",">modify</a></td>";
            echo    "</tr>";
            
        }
        echo   "</tbody>";
    
?>
            </center>
        </body>
    <a href="insertFournissuer.php" id="ajouter">ADD</a>
</html>