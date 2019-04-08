<?php
require_once "classes/User.php";
require_once "classes/Validation.php";

$user = new User;
$validation = new Validation;

session_start();

//add user
if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $image = $_POST['image'];

    $msg = $validation->check_empty($_POST, array('username', 'password', 'firstname', 'lastname'));

    if (!empty($msg)) {
        //set error message
        $_SESSION['msg'] = $msg;
        //redirect url
        header("location: adduser.php");
    } else {
        $user->createUser($username, $password, $firstname, $lastname, $image);
    }

}
//login user
elseif (isset($_POST['login'])) {

    $login = $user->login($username, $password);

    if ($login) {
        $_SESSION['userid'] = $login;
        header("location: index.php");
    }
    else{
        $_SESSION['msg'] = "Invalid Username or Password";

        header("location: login.php");
    }
}
//update user
elseif (isset($_POST['update'])) {
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user->updateUser($id, $username, $firstname, $lastname);
}
//delete user
elseif ($_GET['actiontype'] == 'delete') {
    $id = $_GET['id'];
    $user->deleteUser($id);
}
