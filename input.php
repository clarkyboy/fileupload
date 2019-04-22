<?php

    if(isset($_POST['Submit'])){
        //print_r($_POST['time']);
        $time = $_POST['time'];
        for($i=0; $i<count($time); $i++){
            echo $time[$i];
            echo "<br>";
            // you can put the function of adding schedules here....
            $book->insert_bookDetail($userid, $couseid, $time[$i], $date);
        }
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
    <form action="" method="post">
        <input type="text" name="time[]" id="" value="19:00-20:00">
        <input type="text" name="time[]" id="" value="17:00-18:00">
        <input type="submit" value="Submit" name="Submit">
    </form>
</body>
</html>