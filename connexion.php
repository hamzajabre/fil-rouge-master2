<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="view
    port" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>CONNEXION.PHP</h1>
    <form method="POST" name="form_connexion">
        <input type="hidden" name="form_connexion" value="1">
        <label for="login_user">name:</label>
        <input type="text" name="login_user" id="login_user">
        <label for="pass_user">Mot de passe:</label>
        <input type="password" name="pass_user" id="pass_user" placeholder="1234">
        <input type="submit" name="connexion" value="Se connecter">
    </form>

    <?php
    include('./connect.php');
    if (isset($_POST['login_user']) && isset($_POST['pass_user'])) {
        $login_user = $_POST['login_user'];
        $pass_user = $_POST['pass_user'];

        $db_name = "task";
        $db_user = "hamza-jabre";
        $db_pass = "hamza1986";

        $db = new PDO('mysql:host=localhost;dbname=' . $db_name, $db_user, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        /*$bdd->query("INSERT INTO users(name_user,first_name_user,login_user,pass_user,id_task) VALUES('".$name_user."','".$first_name_user."','".$login_user."','".$pass_user."','".$value_id_task."')");*/
        $req = $db->prepare("SELECT * FROM users where login_user=:login_user");
        $req->bindParam(':login_user', $login_user);
        $req->execute();
        if ($req->rowCount() === 1) {
            $user = $req->fetch(PDO::FETCH_ASSOC);
            // Permet de vérifier le hash par rapport au mot de passe saisi
            if (password_verify($_POST["pass_user"], $user['pass_user'])) {
                // On affecte les données de notre utilisateur dans notre super globale $_SESSION
                $_SESSION['user'] = $user;
                // Le header permet d'effectuer une requête HTTP, la valeur Location permet la redirection vers un autre fichier
                header("Location: index.php");
            }
        } else {
            unset($_SESSION['user']);
        }
    }




    ?>




</body>

</html>