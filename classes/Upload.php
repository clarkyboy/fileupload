<?php

    require_once 'Database.php';

    class Upload extends Database{
       
        public function uploadPic($name, $address, $loginname, $loginpass, $imagepath, $directory, $tmp){
            $extension = pathinfo($imagepath, PATHINFO_EXTENSION);
            $array_extensions = array('png', 'jpg', 'jpeg', 'gif');

            if(in_array($extension, $array_extensions) || $extension == null){
                if($imagepath == null){
                    $target_new_directory = $directory."jedi.png";
                }else{
                    $target_new_directory = $directory.$imagepath;
                }
                if(file_exists($target_new_directory) && $target_new_directory != $directory."jedi.png" ){
                    header('Location: error.php');
                }else{
                    $sql = "INSERT INTO employee (`emp_name`,  emp_login_name, emp_login_pass, emp_address, emp_image_path) VALUES ('$name', '$loginname', '$loginpass', '$address',  '$target_new_directory')";
                    $result = $this->conn->query($sql);
                    if($result){
                        move_uploaded_file($tmp, $target_new_directory);
                        header('Location: fileupload.php');
                    }  
                }
            }else{
                
                header('Location: error-extension.php');
            }

             
        }

        public function display(){
            $sql = "SELECT * FROM employee";
            $result = $this->conn->query($sql);
            $rows=array();
            while($row=$result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }

        public function retrieveEmpByName($name){
            $sql = "SELECT * FROM employee WHERE emp_name = '$name'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            if(empty($row)){
                header('Location: ../crudoop/error.php');
            }else{
                 // this will pass the row array to the next page which is 
                //result.php
                header('Location: ../crudoop/result.php?result='.urlencode(serialize($row)));
            }
          
           
        }
        public function login($username, $password){
            $sql = "SELECT * FROM employee WHERE emp_login_name = '$username' AND emp_login_pass ='$password' ";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }

        public function encrypt($password){
            $character= 0;
            $encrypted = "";
            while($character < strlen($password)){
                // ord function converts characters into ASCII values
                $temp = ord($password[$character]) + 5;
                //chr() converts ASCII to characters
                $encrypted .= chr($temp);
                //increments the
                $character++;
                
            }
            return $encrypted;
        }

    }

?>