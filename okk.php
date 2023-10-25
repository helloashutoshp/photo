<div class="size">
  <?php

  $server = "localhost";
  $user = "root";
  $pass = "";
  $db = "inner";

  $id = $_POST['id'];
  $na = $_POST['name'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $gen = $_POST['genderr'];
  $city = $_POST['city'];



  $conn = mysqli_connect($server, $user, $pass, $db);



  $sql = "UPDATE `person` SET `name` = '$na', `email` = '$email', `gender` = '$gen', `city` = '$city' WHERE `person`.`id` = $id";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("Location:employee.php");
    exit;
  }




  ?>
</div>