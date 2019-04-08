<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container">
    <?php 
        session_start();

        if(!empty($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="userAction.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Username*</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label>Password*</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Firstname*</label>
            <input type="text" name="firstname" id="firstname" class="form-control">
        </div>
        <div class="form-group">
            <label>Lastname*</label>
            <input type="text" name="lastname" id="lastname" class="form-control">
        </div>

                <input type="file" name="image" id="">
        <input type="submit" value="Submit" class="btn btn-primary" name="add">
    </form>

    </div>

</body>
</html>