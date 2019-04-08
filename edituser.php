<?php
    require_once("classes/User.php");

    $id = $_GET['id'];

    $user = new User;

    $row = $user->getSpecificUser($id);
    
?>
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
    <form action="userAction.php" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username']; ?>">
        </div>
        <div class="form-group">
            <label>Firstname</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']; ?>">
        </div>
        <div class="form-group">
            <label>Lastname</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['lastname']; ?>">
        </div>
        <input type="hidden" name="userid" value="<?php echo $id; ?>">
        <input type="submit" value="Submit" class="btn btn-primary" name="update">
    </form>
    </div>

</body>
</html>