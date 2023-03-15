<?php
$conn = mysqli_connect("localhost", "root", "", "signup");

    
    $username = $_POST['username'];
      $user = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");
    
      $arrays = array();
      while($row = mysqli_fetch_assoc($user)){
        $arrays[] = $row;
      }
      echo json_encode($arrays);
      exit;


?>
