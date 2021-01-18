<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/sb-admin-3.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/sweetalert.css">
</head>

<body style="font-family: montserrat;">
    <?php include('process.php'); ?>

    <?php
    if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <h2 class="display-4 text-center"><i class="fas fa-book-reader fas-2x"></i> <span class="text-primary text-center">CRUD</span> App</h2>

    <?php
    $query = "SELECT * FROM data";
    $res = mysqli_query($conn, $query);
    ?>
    <div class="card-body mt-4">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="50%" cellspacing="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="jusify-center" style="width: 18%;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td><?php echo 'NG00' . '' . $row['did'] ?></td>
                            <td><?php echo $row['dname'] ?></td>
                            <td><?php echo $row['dlocation'] ?></td>
                            <td> <a href="index.php?edit=<?php echo $row['did']; ?>"><button class="btn btn-primary" type="submit"> <i class="fas fa-pen"></i> Edit</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="process.php?delete=<?php echo $row['did']; ?>"><button class="btn btn-danger" name="delete" type=" submit"> <i class="fas fa-trash"></i> Delete</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="container mt-4">
                <form action="process.php" class="user" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <div class="form-group">
                        <h2 class="display-6">Name:</h2>
                        <input type="text" name="dname" class="form-control form-control-user" value="<?php echo $name ?>" id="dname" placeholder="Enter Name..." required>
                    </div>
                    <div class="form-group">
                        <h2 class="display-6">Location:</h2>
                        <input type="text" name="dlocation" class="form-control form-control-user" value="<?php echo $location; ?>" id="dlocation" placeholder="Enter Location..." required>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <button type="submit" name="save" class="btn btn-primary btn-user btn-block "> <i class="fas fa-book"></i> Save</button>
                    </div>
                    <div class="col-md-6">
                    <button type="submit" name="update" class="btn btn-success btn-user btn-block "><i class="fas fa-book-open"></i> Update</button>
                    </div>
                    </div>

                </form>
            </div>
        </div>
        <script src="js/sweetalert2.js"></script>               
        <script src="js/jquery-3.5.1.slim.js"></script>
        <script src="js/popper.minc225.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/all.js"></script>
       
</body>

</html>                 