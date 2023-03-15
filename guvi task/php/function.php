<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "signup");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $age = $_POST["age"];
  $contactnumber = $_POST["contactnumber"];

  if(empty($name) || empty($username) || empty($password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO register (name,username,password,age,contactnumber)  VALUES('$name', '$username', '$password', '$age','$contactnumber')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

// LOGIN
function login(){
  global $conn;

  $username = $_POST["username"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      $conn = mysqli_connect("localhost", "root", "", "signup");

    
    $username = $_POST['username'];
      $user = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");
    
      $arrays = array();
      while($row = mysqli_fetch_assoc($user)){
        $arrays[] = $row;
      }
      echo json_encode($arrays);
   
      exit;
     

    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
