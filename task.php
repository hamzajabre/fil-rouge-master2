

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <label for="name_user">Nom :</label>    
    <input type="text" name="name_user" ><br>
    <br><br>
    <label for="first_name_user">Prénom :</label><br>
    <input type="text" name="first_name_user" >
    <br><br>
    <label for="login_user">Login :</label><br>
    <input type="text" name="login_user" >
    <br><br>
    <label for="pass_user">Mot de passe :</label><br>
    <input type="text" name="pass_user" >
    <br><br>
    <input type="submit" value="ajouter">
  </form>    

    <?php
       if (isset($_POST['name_user']) && isset($_POST['first_name_user'])
        && isset($_POST['login_user']) && isset($_POST['pass_user'])){
		
        $name_user = $_POST['name_user']; echo "nom : $name_user <br>";
        $first_name_user = $_POST['first_name_user'];echo "prenom : $first_name_user <br>";
        $login_user = $_POST['login_user'];echo "login : $login_user <b";
        $pass_user = $_POST['pass_user'];echo "mot de passe:  $pass_user";
    
        } 

        $db_user = "hamza-jabre";
        $db_password = "hamza1986";
        $db_name = "task";
    
        $bdd = new PDO('mysql:host=localhost;dbname=' . $db_name,  $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        
        $req = $bdd->prepare('SELECT * FROM users where name_user=:name_user');
        $name_user = "";
        $req->bindParam(":name_user", $name_user);
        $req->execute();
       
        foreach($req->fetchAll() as $donnee) {
            echo '<p>' . $donnee['name_user'] . "<br> " . $donnee['first_name_user'] . "<br>" . $donnee['login_user'] ."<br>" . $donnee['pass_user'] .'</p>';
        }
    
        $req->closeCursor();
    
    
        $bdd->query("INSERT INTO users (name_user, first_name_user, login_user, pass_user) VALUES ('$name_user', '$first_name_user', '$login_user', '$pass_user')") ;
   ?>
   
</body>
</html>




