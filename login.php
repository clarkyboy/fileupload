<?php
    session_start();
     require_once 'classes/Upload.php';
     $upload = new Upload;
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $upload->encrypt($_POST['password']);
        $credentials = $upload->login($username, $password);
        
        if(!empty($credentials)){
            header('Location: fileupload.php');
        }else{
            $_SESSION['msg'] = "Password don't match";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php
            if(!empty($_SESSION['msg'])){
                echo "<div class='alert alert-danger'><p class='text-center'>".$_SESSION['msg']."</p></div>";
                unset($_SESSION['msg']);
            }
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Login" class="btn btn-primary btn-sm btn-block" name="login">
        </form>
    </div>
</body>
</html>