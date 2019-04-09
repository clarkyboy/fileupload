<?php
    require_once 'classes/Upload.php';
    $upload = new Upload;
    $list = $upload->display();
    if(isset($_POST['upload'])){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $image = $_FILES['image']['name']; // this contains the file name
        $tmp = $_FILES['image']['tmp_name']; // this contains the temporary file name
        $directory = 'uploads/userimg/'; // contains the location where the image is saved

        $upload->uploadPic($name, $address, $image, $directory, $tmp);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="" placeholder="Name">
        <input type="text" name="address" id="" placeholder="Address">
        <input type="file" name="image" id="">
        <input type="submit" value="Upload" name="upload">
    </form>
    <br>
    <table>
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Address</th>
        </thead>
        <tbody>
            <?php
                foreach($list as $key => $value){
                    echo "<tr>";
                        echo "<td><img src = ".$value['emp_image_path']." width='50' height='50'><td>";
                        echo "<td>".$value['emp_name']."</td>";
                        echo "<td>".$value['emp_address']."</td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>