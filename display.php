<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>


    <div class="container">

        <table class="table ta" id="myTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">AGE</th>
                    <th scope="col">GENDER</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>




                </tr>
            </thead>
            <tbody>
                <?php

                $server = "localhost";
                $user = "root";
                $pass = "";
                $db = "image";

                $conn = mysqli_connect($server, $user, $pass, $db);


                $sql = "select * from img";

                $result = mysqli_query($conn, $sql);

                $row = mysqli_num_rows($result);


                $n = 1;
                if (!$row == null) {
                    while ($num = mysqli_fetch_assoc($result)) {


                ?>



                        <tr>
                            <th scope="row"><?php echo $n ?></th>
                            <td><?php echo $num['name'] ?></td>
                            <td><?php echo $num['email'] ?></td>
                            <td><?php echo $num['age'] ?></td>
                            <td><?php echo $num['gender'] ?></td>

                            <td><img src="<?php echo $num['file'] ?>" alt="" width="50px"></td>
                            <?php
                            if ($num['Status'] == "Active") {
                            ?>
                                <td style="color:darkgreen"><?php echo $num['Status'] ?></td>

                            <?php

                            } else {
                            ?>
                                <td style="color:darkred"><?php echo $num['Status'] ?></td>

                            <?php
                            }
                            ?>

                            <td>
                                <a href="up.php?id=<?php echo $num['id']?>" class="btn btn-warning">Edit</a>

                            </td>
                        </tr>

                <?php
                        $n = $n + 1;
                    }
                }
                ?>
            </tbody>
        </table>


    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>


    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>


</body>

</html>