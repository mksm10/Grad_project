<?php
session_start();

$error = "";

/* if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: loginsuccess.php");
    exit();
}
*/

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "user1" && $password == "pass1") {

        $_SESSION['loggedin'] = true;
        header("Location: loginsuccess1.php");
        exit();

    } elseif ($username == "user2" && $password == "pass2") {

        $_SESSION['loggedin'] = true;
        header("Location: loginsuccess2.php");
        exit();

    } elseif ($username == "user3" && $password == "pass3") {

        $_SESSION['loggedin'] = true;
        header("Location: loginsuccess3.php");
        exit();

    } elseif ($username == "user4" && $password == "pass4") {

        $_SESSION['loggedin'] = true;
        header("Location: loginsuccess4.php");
        exit();

    } elseif ($username == "admin" && $password == "pass5") {

        $_SESSION['loggedin'] = true;
        header("Location: loginsuccess5.php");
        exit();

    } else {
        $error = "Username or password is incorrect";
    }
}
?>

<form method="post">

Username:<br>
<input type="text" name="username"><br>

Password:<br>
<input type="text" name="password"><br><br>

<input type="submit" value="Login">

</form>