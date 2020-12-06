<?php

/*
if (isset($_POST["sign_up_username"]) && isset($_POST["sign_up_password"]) && isset($_POST["sign_up_email"]) && isset($_POST["sign_up_repeat_password"])) {
    header("Location: mainpage.php");
    $username = $_POST["sign_up_username"];
    $password = $_POST["sign_up_password"];
    $rePassword = $_POST["sign_up_repeat_password"];
    $email = $_POST["sign_up_email"];
    if ($password != $rePassword) $signUpIncorrect = 2;
    $usersQuery = mysqli_query($connect, "select name, pass from users");
    $users = mysqli_fetch_all($usersQuery, $resulttype = MYSQLI_NUM);
    $users = array_values($users);
    foreach ($users as $user) {
      if ($user[0] == $username) {
        $signUpIncorrect = 2;
      }
    }
    if ($signUpIncorrect == 1) {
      
      $mysqli_stmt = mysqli_stmt_init($connect);
      mysqli_stmt_prepare($mysqli_stmt, "insert into users(name, pass, email) values (?, ?, ?)");
      mysqli_stmt_bind_param($mysqli_stmt, "sss", $username, $password, $email);
      mysqli_stmt_execute($mysqli_stmt);
      setcookie("user", $username, time() + 86400, "/");
      header("Location: mainpage.php");
  
    }
  }
  */

  if(isset($_POST["username"])) echo "The entered username: ".$_POST["username"]; else echo "There is no entered username";

?>