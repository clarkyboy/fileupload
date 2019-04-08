<?php
require_once "Database.php";

class User extends Database
{

    public function getUsers()
    {
        $sql = "SELECT * FROM users INNER JOIN employees ON users.user_id = employees.user_id";

        $result = $this->conn->query($sql);

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getSpecificUser($id)
    {

        $sql = "SELECT * FROM users INNER JOIN employees ON users.user_id = employees.user_id WHERE users.user_id = $id";

        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();

        return $row;

    }

    public function createUser($username, $password, $firstname, $lastname, $image)
    {
        $newpass = md5($password);  
        //set default timezone
        date_default_timezone_get();
        $date = date('Y_m_d', time());
        //location and name of the file
        $directory = "uploads/products/";
        $target_file = $directory . basename($date."_".$_FILES['image']['name']);

        $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";

        $result = $this->conn->query($sql);

        if ($result) {

            $id = mysqli_insert_id($this->conn);
            $sql = "INSERT INTO employees(user_id, firstname, lastname, image_path) VALUES('$id', '$firstname', '$lastname', '$target_file')";
            $result = $this->conn->query($sql);
            if ($result) {
                //move the uploaded file to the folder
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                header("location: index.php");
            }

        } else {
            echo "Connection Error: " . $this->conn->error;
        }
    }

    public function updateUser($id, $username, $firstname, $lastname)
    {

        $sql = "UPDATE users SET username='$username' WHERE user_id = $id";
        $result = $this->conn->query($sql);

        if ($result) {
            $sql = "UPDATE employees SET firstname='$firstname', lastname='$lastname' WHERE user_id = $id";
            $result = $this->conn->query($sql);
            if ($result) {
                header("location: index.php");
            }
        } else {
            echo "Connection Error: " . $this->conn->error;
        }
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE user_id=$id";

        $result = $this->conn->query($sql);

        if ($result) {
            header("location: index.php");
        } else {
            echo "Connection Error: " . $this->conn->error;
        }
    }

    public function login($username, $password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $userid = $row['user_id'];
            return $userid;
        }
        else{
            return false;
        }
    }

}
