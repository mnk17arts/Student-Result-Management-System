

<?php
$showError ="false";
$method = $_SERVER['REQUEST_METHOD'];
// ECHO $method;
if($method == 'POST'){
    include '_connectdb.php' ;
    $username = $_POST['suid'];
    $pwd = $_POST['pwd'];

    // check whether the user already exist
    $sql ="SELECT * FROM `student` WHERE `id` = '$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pwd, $row['pwd'])){
            session_start();
            $_SESSION['loggedin'] = true ;
            $_SESSION['who'] = false;
            $_SESSION['username'] = $username ;
            echo "logged in " . $username ;
            
        }
    header("Location: /task-3/studentportal.php");
    }
    
}
?>