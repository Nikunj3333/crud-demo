<?php   
include '../connect.php';

$name = "";
$email = "";
$mobile = "";
$password = "";

// to get the file PHP global variable: $_FILES

if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $password = htmlspecialchars(trim($_POST['password']));
    $isValid = true;

    // Validations
    if(empty($name)) {
        $errorMsg = "Name is required!";
        $isValid = false;
    } else if(empty($email)) {
        // filter_var($email, FILTER_VALIDATE_EMAIL)
        $errorMsg = "Email is required!";
        $isValid = false;
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is invalid!";
        $isValid = false;
    } else if(empty($mobile)) {
        $errorMsg = "Mobile is required!";
        $isValid = false;
    } else if(empty($password)) {
        $errorMsg = "Password is required!";
        $isValid = false;
    }

     // handle file upload - START
     $target_dir = "../uploads/";
     $target_file = $target_dir . basename($_FILES["adhaar_card"]["name"]); // uploads/FILE_NAME.{extension}
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // to get the extension of the file
     
     if($uploadOk == 1) {
         if (move_uploaded_file($_FILES["adhaar_card"]["tmp_name"], $target_file)) {
         } else {
             echo "Sorry, there was an error uploading your file."; exit;
         }
     } else {
         echo "Sorry, your file was not uploaded."; exit;
     }
     // handle file upload - END

    if($isValid) { // check if data is valid then only perform insert query
        $sql = "Insert into users(name, email, mobile, password, adhaar_card) values('{$name}', '{$email}', '{$mobile}', '{$password}', '{$target_file}')";

        // $sql = "insert into `users`(name,email,mobile,password) values ('$name','$email','$mobile','$password')";

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
    } 
    else { // when there is error and $isValid = false
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong>
        ' . $errorMsg . '
         <button type="button" class="close" dta-dismiss="alert" arial-label="close">
         <span arial-hidden="true">&time</span>
         </button>
        </div>';
    }
    
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
            <h1>Add Users</h1>
            <form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="Text" name="name" class="form-control" placeholder="Enter Your Name" autocomplete="off" value="<?php echo $name; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your Email" autocomplete="off" value="<?php echo $email; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputMobile1" class="form-label">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile-Number" autocomplete="off" value="<?php echo $mobile; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="adhaar_card" class="form-label">Adhaar Card</label>
                    <input type="file" name="adhaar_card" class="form-control" required>
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