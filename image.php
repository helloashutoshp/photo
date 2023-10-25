<?php


error_reporting(0);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>


    <div class="card col-8 container p-0">
        <form action="image.php" method="post" enctype="multipart/form-data">
            <div class="card-header bg-primary text-white ">
                <h1 class="card-title">Image insertion</h1>
            </div>

            <div class="card-body">
                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" id="age" placeholder="Enter age" required>
                </div>

                <div class="form-group  ">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="male" name="genderr">male
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="female" name="genderr">female
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="other" name="genderr">other
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fi">Image</label>
                    <input type="file" name="uploadfile" class="form-control" id="fi" required>
                </div>


                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="check" class="form-check-input" value="Active">Ok
                    </label>
                </div>

            </div>




            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="submit">
            </div>

        </form>
    </div>

    <?php









    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $filename = $_FILES['uploadfile']['name'];
        $tempname = $_FILES['uploadfile']['tmp_name'];

        $folder = "im/" . $filename;

        move_uploaded_file($tempname, $folder);

        $name = $_POST['name'];
        $email = $_POST['email'];

        $age = $_POST['age'];
        $gender = $_POST['genderr'];
        $chk = $_POST['check'];


        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "image";

        $con = mysqli_connect($server, $user, $password, $dbname);

        if($chk == "Active"){

        
            $sql = "INSERT INTO `img` ( `name`, `email`, `age`, `gender`,`file`,`Status`) VALUES ( '$name', '$email', '$age', ' $gender','$folder','Active');";
       
        }

        else{

            $sql = "INSERT INTO `img` ( `name`, `email`, `age`, `gender`,`file`,`Status`) VALUES ( '$name', '$email', '$age', ' $gender','$folder','Deactive');";

        }

        $result = mysqli_query($con, $sql);

        if ($result) {
            echo '<div class="hide alert alert-success alert-dismissible fade show" role="alert">
     Record inserted successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
        }
    }
    ?>


    <script>
        window.setTimeout(function() {
            $(".hide").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
</body>

</html>