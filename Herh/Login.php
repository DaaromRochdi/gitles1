<?php
session_start();
if (isset($_POST['Login']))
{
    require 'config.inc.php';

    $username = $_POST['username'];
    $password = sha1($_POST ['password']);

    $opdracht = "SELECT * FROM back2_users
WHERE username = '$username' AND password = '$password'";


    $resultaat = mysqli_query($mysqli, $opdracht);
    if (mysqli_num_rows($resultaat) > 0)
    {
        $user = mysqli_fetch_array($resultaat);
        $_SESSION['username'] = $user['username'];
        $_SESSION['Level'] = $user['level'];
        header('Location: home.php');
    }
    else
    {
        echo "<p>Naam en/of wachtwoord zijn verkeerd</p>";
        echo "<p><a href='Index.php'>Probeer opnieuw</a></p>";
    }
}
?>