<?php

session_start();

require "model/connection.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        echo "Email not Found";
    } else if (empty($password)) {
        echo "Password not Found";
    } else {
        $resultSet = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
        $row = $resultSet->num_rows;
        if ($row > 0) {
            $user = $resultSet->fetch_assoc();
            $_SESSION["user"] = $user;
            echo "Success";
        } else {
            echo "Invalid Credential";
        }
    }
}
