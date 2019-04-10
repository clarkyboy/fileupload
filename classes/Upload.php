<?php

    require_once 'Database.php';

    class Upload extends Database{

        public function uploadPic($name, $address, $imagepath, $directory, $tmp){
            $extension = pathinfo($imagepath, PATHINFO_EXTENSION);
            $array_extensions = array('png', 'jpg', 'jpeg', 'gif');

            if(in_array($extension, $array_extensions) || $extension == null){
                if($imagepath == null){
                    $target_new_directory = $directory."jedi.png";
                }else{
                    $target_new_directory = $directory.$imagepath;
                }
                if(file_exists($target_new_directory)){
                    header('Location: error.php');
                }else{
                    $sql = "INSERT INTO employee (`emp_name`, emp_address, emp_image_path) VALUES ('$name', '$address', '$target_new_directory')";
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
    }

?>