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
            session_start();
            if(!empty($_SESSION['msg'])){
                echo "<div class='alert alert-danger'><p class='text-center'>".$_SESSION['msg']."</p></div>";
                unset($_SESSION['msg']);
            }
        ?>
        <form action="userAction.php" method="post" enctype="multipart/form-data">
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