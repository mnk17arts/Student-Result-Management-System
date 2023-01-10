<?php 
include './bits/_studentlogin.php' ;
include './bits/_adminlogin.php' ;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MITS HOME</title>
    <link rel="icon" href="https://assets.codepen.io/5987189/internal/avatars/users/default.png?fit=crop&format=auto&height=80&version=1617549988&width=80" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="./bits/styles/bootstrap.min.css">
    <link rel="stylesheet" href="./bits/styles/index.css">
</head>

<body class="home-body">

    <?php require 'bits/_connectdb.php' ?>

    <div class="heading p-4">
        <h1>MESSI INTERMEDIATE TEACHING SCHOOL</h1>
        <h5>(<i> An institute under Ministry of HRD, Govt. of India </i>)</h5>
        <p> Gunjan Hills, Hyderabad, Telangana - 500075</p>
    </div>
    <div class="container mt-4">

        <div class="body mt-4">
            <div class="admin">
                <div class="box">
                    <img src="./bits/img/admin.png" alt="admin"></img>
                    <button class="btn btn-outline-light my-4" data-bs-toggle="modal"  data-bs-target="#adminloginModal" title="Administration login">ADMIN LOGIN</button>
                </div>
            </div>
            <div class="student">
                <div class="box">
                    <img src="./bits/img/student.png" alt="student"></img>
                    <button class="btn btn-outline-light my-4" data-bs-toggle="modal" data-bs-target="#studentloginModal" title="Students login">STUDENT LOGIN</button>
                </div>
            </div>
        </div>
    </div>

    


    <div class="container-fluid bg-dark text-light p-3" style="text-align:center;">
        <p> made by <a href="https://www.linkedin.com/in/mnk17arts" target="_blank">mnk17arts</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <script src="bits/scripts/bootstrap.bundle.min.js"></script> -->
</body>

</html>