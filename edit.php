<?php
include 'connect.php';
$name = "";
$email = "";
$mobile = "";
$password = "";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "insert into `users`(name,email,mobile,password) values ('$name','$email','$mobile','$password')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
        Your Entry succesfully!
         <button type="button" class="close" dta-dismiss="alert" arial-label="close">
         <span arial-hidden="true">&time</span>
         </button>
        </div>';
    } else {
        die(mysqli_error($con));
    }
} else {
    $row = 
    $sql = "SELECT id, name, email, mobile FROM `users` where id = ";
    $result = mysqli_query($con, $sql);
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Crude Operation</title>
</head>

<body>
    <section class="form-connection">
        <div class="container py-5">
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="Text" name="name" class="form-control" placeholder="Enter Your Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="exampleInputMobile1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile-Number" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>