<?php
    require_once("classes/User.php");

    $users = new User;
    $result = $users->getUsers();
    session_start();
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
    <br>
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>User ID</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                echo $_SESSION['userid'];
                    foreach($result as $key => $row){
                        $id = $row['user_id'];
                        $img = $row['image_path'];
                        echo "<tr>"; 
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td><a href='edituser.php?id=$id' class='btn btn-info btn-sm'>Edit</a> 
                        <a href='userAction.php?actiontype=delete&id=$id' class='btn btn-danger btn-sm'>Delete</a></td>";
                        echo "<td><img src='$img' width='50'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>