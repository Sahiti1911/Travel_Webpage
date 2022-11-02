<?php
$uname = $_POST['name'];
$gen= $_POST['gender'];
$ph = $_POST['phone'];
$id = $_POST['email'];

$conn = mysqli_connect("localhost","root","","phpdata");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "INSERT INTO data (Name,Gender,Phone,Email)
VALUES ('$uname','$gen','$ph','$id')";

if(isset($_FILES['img'])){
  $errors= array();
  $file_name = $_FILES['img']['name'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  
  $extensions= array("png");
  
  if(in_array($file_ext,$extensions)=== false){
     $errors[]="extension not allowed, please choose a PNG file.";
  }

  
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"C:\xampp\htdocs\fwt assignment\aadhar".$file_name);
     echo "Success";
  }else{
     print_r($errors);
  }
}

    if ($conn->query($sql) === TRUE) {
  echo nl2br("\n");
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br/>" . $conn->error;
}
$conn->close();
?>