<?php require 'bits/_connectdb.php' ?>
<?php

session_start();  //  CHECK WHETHER SESSION IS ON OR NOT (LOGGED OR NOT)
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true || $_SESSION['who']!=true){
    header('location: https://localhost/task-3/home.php');
    exit;
}
        $userid = $_SESSION['username'];
        $usersno =$_SESSION['sno'];
        // echo var_dump($userid);
        $view = false;
        $edit = false;
        $insert = false;
      if(isset($_GET['view'])){
        $sno = $_GET['view'] ;
        // echo $sno . " hmm" ;
        $sqlv = "SELECT * FROM `students` WHERE `sno`=$sno";
        $resultv = mysqli_query($conn, $sqlv);
        if($resultv){
            $view = true;
            $num = mysqli_num_rows($resultv);
            // echo $num ;
            // echo "<br>" ;
            // display the rows returned by the sql query
            if($num > 0){
                $rowv = mysqli_fetch_assoc($resultv);
                }
        }
      }
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="./bits/styles/bootstrap.min.css">
    <link rel="stylesheet" href="./bits/styles/index.css">
</head>

<body class="admin-body">


    <?php
    if(isset($_GET['delete'])){
        $sno = $_GET['delete'] ;
        $delete = true ;
        // echo $sno . " hmm" ;
        $sqld = "DELETE FROM  `students` WHERE `sno` = $sno";
        $result = mysqli_query($conn, $sqld);
      }
        
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $operation = $_POST['operation'] ;
  
    if ( $operation == "add") {
      $aname = $_POST['aname'] ;
      $aid = $_POST['aid'] ;
      $amath =$_POST['amath'];
      $aphy =$_POST['aphy'];
      $achem = $_POST['achem'];
      $aeng = $_POST['aeng'];
      $asan = $_POST['asan'];
      $sqli = "INSERT INTO `students` (`name`, `id`, `maths`, `physics`, `chemistry`, `english`, `sanskrit`) VALUES ('$aname', '$aid', '$amath', '$aphy', '$achem', '$aeng', '$asan');";
      $resulti = mysqli_query($conn, $sqli);
      // insertion status
      if($resulti){
            $insert = true;
      }
      else{
        echo "The record was not inserted successfully because of the error ---> " . mysqli_error($conn) ;
      }
    }
    elseif ( $operation == "edit"){
      $sno = $_POST['snoedit'] ;
      // echo 'sno is : -> '.$sno . " <- hmm" ; 
      $emaths = $_POST['emaths'] ;
      $ephy = $_POST['ephy'] ;
      $echem = $_POST['echem'] ;
      $eeng = $_POST['eeng'] ;
      $esan = $_POST['esan'] ;
    //   UPDATE `students` SET `maths` = '99' WHERE `students`.`sno` = 1;
      $sqle = "UPDATE `students` SET `maths` = '$emaths', `physics` = '$ephy', `chemistry` = '$echem', `english` = '$eeng', `sanskrit` = '$esan' WHERE `students`.`sno` = $sno";
      $resulte = mysqli_query($conn, $sqle);
      if($resulte){
        $edit = true ;
        }
    else{
        echo "We could not update the Record successfully";
        }
    }
  
  } 
  ?>
    <?php 
    include './bits/_addstudent.php' ;
    // include './bits/_editmarks.php' ;
    // include './bits/_viewstudent.php' ;
    ?>
    <div class="heading p-4">
        <h1>MESSI INTERMEDIATE TEACHING SCHOOL</h1>
        <h5>(<i> An institute under Ministry of HRD, Govt. of India </i>)</h5>
        <p> Gunjan Hills, Hyderabad, Telangana - 500075</p>
    </div>
    <div class="container-fluid p-0">
        <div class="body">
            <div class="leftframe p-3">
                <ul>
                    <li><a id="studentList">Students Record</a></li>
                    <li> <a data-bs-toggle='modal' data-bs-target='#addModal'>Add Student</a></li>
                    <li> <a>Option 3</a></li>
                    <li> <a>Option 4</a></li>
                    <li> <a>Option 5</a></li>
                    <li> <a>Option 6</a></li>
                    <li> <a>Option 7</a></li>
                    <li> <a>Option 8</a></li>
                </ul>
            </div>
            <div class="rightframe container-fluid p-0">
                <div class="righttop" style="padding:5px;"> <h3><i>
                    <?php 
                        // sql query to be executed to insert data
    $sqlad = "SELECT * FROM `admins` WHERE `sno`=$usersno";
    $resultad = mysqli_query($conn, $sqlad);
    $numad = mysqli_num_rows($resultad);
    if($numad > 0){
        // using while loop
        while($row = mysqli_fetch_assoc($resultad)){
            // echo var_dump($row) ;
            echo " Welcome " . $row['name'] . " ( ID - " . $row['id'] . " )" ;
        }
    }
                    
                    // echo "Welcome " . $userid . " :) " ;
                    ?></i><!-- SIGN OUT BUTTON -->
                    <a href="/task-3/bits/_logout.php" style="float:right;border-color:#000;" class="btn btn-danger ml-2 mx-2">LogOut</a></h3>

                    
                </div>
                <div class="rightbot">
                <?php

                if($edit){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> The Record has updated successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                if($insert){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> The Record has inserted successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                ?>
                    <table class="table" id="myTable" style="font-weight:600;color:#111;margin: 5px 0px;">
                        <thead style="background-color: #222; color : #fff;">
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Name </th>
                                <th scope="col">Id</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

          // sql query to be executed to insert data
          $sql = "SELECT * FROM `students`";
          $result = mysqli_query($conn, $sql);
          $sno = 0 ;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1 ;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['name'] . "</td>
            <td style='color : #333;'>". $row['id'] . "</td>
            <td>". "<button type='button' id=" . $row['sno'] . " class='view btn btn-dark viewshow' data-bs-toggle='modal' data-bs-target='#viewModal'>View</button> <button type='button' id=" . $row['sno'] . " class='delete btn btn-sn btn-danger'>Delete</button> </td>
          </tr>" ;
          }

          ?>
                            <!-- <button type='button' style='background-color : orangered;' id=" . $row['sno'] . " class='edit btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button> -->

                        </tbody>
                    </table>
                    <div class="viewdiv" id="viewdiv">
                        <?php
        if($view){
            echo '
                    <div class="view-header">
                        <h5 ">STUDENT GRADE CARD</h5>
                        
                    </div>
                    <div class="view-body">
                        <div class="bodyup">
                            <div class="bodyupleft">
                                <img src="./bits/img/student.png" alt="student"></img><br/>
                                <label> Student signature </label>  
                            </div>
                            <div class="bodyupright">
                                <label class="form-label">Name : '. $rowv['name']  .'</label><br/>
                                <label class="form-label">Roll No : '. $rowv['id']  .'</label> <br/> 
                                <label class="form-label">Class : 12A </label> <br/> 
                                <label class="form-label">DOB : dd-mm-yyyy </label> <br/> 
                                <label class="form-label">Group : MPC </label> <br/>
                                <label class="form-label">Batch : 2019-21 </label> <br/>
                            </div>
                        </div>
                        <div class="bodydown">
                            <table>
                                <thead>
                                    <tr>
                                        <th> S.no </th>
                                        <th> Subject </th>
                                        <th> Marks </th>
                                        <th> Maximum Marks</th>
                                        <th> Class Highest </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th> 1 </th>
                                        <td> Mathematics </td>
                                        <td> <b>'. $rowv['maths']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 100 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 2 </th>
                                        <td> Physics </td>
                                        <td> <b>'. $rowv['physics']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 98 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 3 </th>
                                        <td> Chemistry </td>
                                        <td> <b>'. $rowv['chemistry']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 100 </b> </td>
                                    </tr> 
                                    <tr>
                                        <th> 4 </th>
                                        <td> English </td>
                                        <td> <b>'. $rowv['english']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 98 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 5 </th>
                                        <td> Sanskrit </td>
                                        <td> <b>'. $rowv['sanskrit']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 99 </b> </td>
                                    </tr> 
                                    <tr>
                                    <th> </th>
                                    <th> Total Marks </th>
                                    <td style="background:#30f3;"> <b>'; 
                                    $tot = $rowv['sanskrit']+ $rowv['english'] +$rowv['chemistry']+$rowv['physics']+ $rowv['maths'];
                                    echo $tot  .'</b> </td>
                                    <th> <b> Grade </b></th>
                                    ';
                                    $grade = $tot/50;
                                    // echo $grade ;
                                    if ($grade >= 6){
                                        echo "<td style='color:#044607;background:#30f3;' > <b>". $grade." (PASS)";
                                    }else{
                                        echo "<td style='color:#f00;background:#30f3;' > <b>". $grade." (FAIL)";
                                    }
                                    echo ' </b> </td>
                                </tr>        
                                </tbody>
                            </table>

                        </div>
                    </div>                            <button type="button" style="background-color : orangered;width:200px;border-radius:5px;margin:5px;" id=' . $rowv['sno'] . 'class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit Marks</button>';
                    include './bits/_editmarks.php' ;
        }
                        ?>
                    </div>
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
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Data Tables js -->
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        $('#myTable_wrapper').hide();
        $('#studentList').click(() => {
            $('#myTable_wrapper').show();
            $('#viewdiv').hide();
        })
        $('.viewshow').click(() => {
            $('#viewdiv').show();
        })
    });
    </script>
    <script>
    viewstudent = document.getElementsByClassName('view');
    Array.from(viewstudent).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("view ");
            sno = e.target.id //.substr(1);
            console.log(e.target.id);
            window.location = '/task-3/adminportal.php?view=' + `${sno}`;

        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id //.substr(1);
            console.log(e.target.id);
            if (confirm("Are you sure you want to delete this record!")) {
                console.log("yes");
                window.location = '/task-3/adminportal.php?delete=' + `${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>

</html>