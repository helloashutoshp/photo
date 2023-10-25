<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="content-wrapper">
    <?php

    $id = $_GET['id'];
    


    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "image";



    $conn = mysqli_connect($server, $user, $pass, $db);

    $sql = "select * from img where id={$id} ";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);



    if (!$num == null) {



      while ($row = mysqli_fetch_assoc($result)) {

        
    ?>
        <div class="card card-primary col-8 container p-0">
          
          <form action="okk.php" method="POST">
            <div >
              <div >

                <label for="name">Name</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo $row['name']; ?>" required>
              </div>
              <div >
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $row['email']; ?>" required>
              </div>

              <div >
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" id="age" placeholder="Enter age" value="<?php echo $row['age']; ?>" required>
              </div>

              <div>

                <input type="radio" value="male"  name="gender" id="m" required  
                
                
                <?php 
                
                if($row['gender'] == 'male'){
                  
                  echo "checked";
                }
                
                
                ?> 

                                                                               

                                                                                >
                <label for="m">male</label>
                
                <input type="radio" value="female" name="gender" id="f"  required >

                <label for="f">female</label>
                
                <input type="radio" value="other" name="gender" id="o"  required

                                                                                >
                <label for="o">other</label>
                

              </div>


              <div >
                <label for="fi">Image</label>
                <input type="file" name="uploadfile" class="form-control" id="fi" >
                <input type="hidden" name="old-image" value="<?php echo $row['file']; ?>">
              </div>











          <?php

        }
      }


          ?>





          </select><br>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
        </div>








  </div>
</body>

</html>