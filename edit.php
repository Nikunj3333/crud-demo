<?php
    include '../connect.php';
    $name = "";
    $email = "";
    $mobile = "";
    $password = "";
    $userId = $_GET['id'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $updateSql = "update users set name = '{$name}', email = '{$email}', mobile = '{$mobile}', password = '{$password}' where id = 6";    
    $updateResult = mysqli_query($con, $updateSql);

    if ($updateResult) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
        Your Entry Updated succesfully!
         <button type="button" class="close" dta-dismiss="alert" arial-label="close">
         <span arial-hidden="true">&time</span>
         </button>
        </div>';
    } else {
        die(mysqli_error($con));
    }
}

if(isset($userId) && !empty($userId)) {
    $sql = "SELECT * FROM `users` where id = {$userId} LIMIT 1";
    $result = mysqli_query($con, $sql);
    $record = mysqli_fetch_object($result);
    if(!$record) {
        echo "Please go away!"; exit;
    }
    // print_r($record); exit;
} else {
    echo 'Please go away!'; exit;
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
            <h1>Update User</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="Text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php echo $record->name; ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email" value="<?php echo $record->email; ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputMobile1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile-Number" value="<?php echo $record->mobile; ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" value="<?php echo $record->password; ?>">
                </div>

                <button type="submit" class="btn btn-primary" name="submit" value="add_user">Submit</button>
            </form>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>