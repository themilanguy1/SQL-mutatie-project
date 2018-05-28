<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Gebruiker Toevoegen</title>
</head>
<body>

    <?php
    session_start();
        try {
            $db = new PDO("mysql:host=localhost; dbname=deb43619_milan", "deb43619_milan", "MlG199713");
            if(isset($_POST['inloggen'])) {
                $username = $_POST['username'];
                $password = sha1($_POST['password']);
                $query = $db->prepare("SELECT * FROM gebruiker 
                    WHERE username = :user 
                    AND password = :pass");
                $query->bindParam("user", $username);
                $query->bindParam("pass", $password);
                $query->execute();
                if($query->rowCount() == 1) {
                    echo "Juiste gegevens!";
                    $_SESSION['login'] = true;
                } else {
                    echo "Onjuiste gegevens!";
                    $_SESSION['login'] = false;
                }
            } echo "<br>";
        } catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
    ?>
    <form method="post" action="">
        <label>Username</label>
        <input type="text" name="username"><br>

        <label>Password</label>
        <input type="password" name="password"><br>

        <input type="submit" name="inloggen" value="Inloggen">
    </form>

<br><br>
<p>username = root<p>
<p>password = password<p>
</body>
</html>

<?php
if(isset($_SESSION['login'])) {
    if($_SESSION['login'] == true) {
        header('location: beveiligdepagina.php');
        exit;
    }
}
?>
