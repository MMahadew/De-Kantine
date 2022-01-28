<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "food_order";

try {
    $db = new PDO("mysql:$host=localhost;dbname=food_order","root", "");
} catch (PDOException $e) {
    die("Er is een databasefout opgetreden!");
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $db->prepare("SELECT * FROM user WHERE username = '".$username."' AND password ='".$password."'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    if($result["usertype"]=="user") {
        echo "user";
    }
    elseif($result["usertype"]=="admin") {
        echo "admin";
    }
    else {
        echo "username or password incorrect";
    }
}
?>



<!doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<center>
    <h1>De Kantine</h1>
    <br><br><br><br>
    <div style="background-color: grey; width: 500px;">
        <br><br>
        <form method="post" action="#">
    <div>
        <label>username</label>
        <input type="text" name="username" required>
    </div>
        <br><br>

    <div>
        <label>password</label>
        <input type="password" name="password" required>
    </div>
        <br><br>

    <div>

        <input type="submit" value="Login">
    </div>
        </form>
        <br><br>
    </div>
</center>
</body>
</html>
