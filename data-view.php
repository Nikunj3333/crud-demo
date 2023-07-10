<?php 

    include("connect.php");

    if(isset($_GET['id']) && isset($_GET['action'])) {
        $id = $_GET["id"];
        // delete
        // echo $result; exit;
        if($_GET['action'] == "delete") {
            // delete query run
            $deleteSql = "delete from users where id = {$id}";
            $deleteResult = mysqli_query($con, $deleteSql);
            if($deleteResult) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong>
                Record deleted succesfully!
                 <button type="button" class="close" dta-dismiss="alert" arial-label="close">
                 <span arial-hidden="true">&time</span>
                 </button>
                </div>';
            } else {
                die(mysqli_error($con));
            }
        } else if($_GET['action'] == "block") {
            // block update query 
        }
    }

    $sql = "SELECT id, name, email, mobile FROM `users`";
    $result = mysqli_query($con, $sql);

    // find the number of returns record

    $num = mysqli_num_rows($result); // specified row in table
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>View-data</title>
</head>

<body>

    <div class="container p-5">
        <h1>Form</h1>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th score="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($num > 0) {
                        $i = 1;
                        while($row=mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row["name"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["mobile"]; ?></td>
                            <td>
                                <a class="btn btn-sm" href="edit.php?id=<?= $row["id"]; ?>">Edit</a>    
                                <a 
                                    class="btn btn-sm btn-danger"
                                    href="data-view.php?action=delete&id=<?= $row["id"]; ?>"
                                    onclick="if (confirm('Are you sure?')){return true;}else{event.stopPropagation(); event.preventDefault();};"
                                >Delete</a>    
                                <a class="btn btn-sm btn-danger block" href="data-view.php?action=block&id=<?= $row["id"]; ?>">Block</a>    
                            </td>
                        </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <a href="index.php"><button class="btn btn-primary">Add Row</button></a>
    </div>
    <!-- <script>
// function add() {
//   var table = document.getElementById("myTable");
//   var row = table.insertRow(0);
//   cell1.innerHTML = "Add";
  
// }
</script> -->
</body>

</html>