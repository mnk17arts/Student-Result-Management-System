<?php require 'bits/_connectdb.php' ?>
<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true || $_SESSION['who']!=false){
    header('location: https://localhost/task-3/home.php');
    exit;
}
$userid = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="./bits/styles/bootstrap.min.css">
    <link rel="stylesheet" href="./bits/styles/index.css">
</head>

<body class="student-body">

    <div class="heading p-4">
        <h1>MESSI INTERMEDIATE TEACHING SCHOOL</h1>
        <h5>(<i> An institute under Ministry of HRD, Govt. of India </i>)</h5>
        <p> Gunjan Hills, Hyderabad, Telangana - 500075</p>
    </div>
    <div class="container-fluid p-0">
        <div class="body">
            <div class="leftframe p-3">
                <ul>
                    <li> <a class="viewgrade">Grade Card</a></li>
                    <li> <a>Option 2</a></li>
                    <li> <a>Option 3</a></li>
                    <li> <a>Option 4</a></li>
                    <li> <a>Option 5</a></li>
                    <li> <a>Option 6</a></li>
                    <li> <a>Option 7</a></li>
                    <li> <a>Option 8</a></li>
                </ul>
            </div>
            <div class="rightframe container-fluid p-0">
                <div class="righttop" style="padding:5px;">
                    <h3><i>
                            <?php 
                        // sql query to be executed to insert data
    $sqls = "SELECT * FROM `students` WHERE `id`=$userid";
    $results = mysqli_query($conn, $sqls);
    $nums = mysqli_num_rows($results);
    if($nums > 0){
        // using while loop
        while($rows = mysqli_fetch_assoc($results)){
            // echo var_dump($row) ;
            echo " Welcome " . $rows['name'] . " ( ID - " . $rows['id'] . " ) </i><!-- SIGN OUT BUTTON -->
            <a href='/task-3/bits/_logout.php' style='float:right;border-color:#000;' class='btn btn-danger ml-2 mx-2'>LogOut</a></h3>

            
        </div>
        <div class='rightbot'>
            <div class='viewdiv' id='viewdiv'>";
            echo '
                    <div class="view-header">
                        <h5 ">GRADE CARD</h5>
                        
                    </div>
                    <div class="view-body">
                        <div class="bodyup">
                            <div class="bodyupleft">
                                <img src="./bits/img/student.png" alt="student"></img><br/>
                                <label> Student signature </label>  
                            </div>
                            <div class="bodyupright">
                                <label class="form-label">Name : '. $rows['name']  .'</label><br/>
                                <label class="form-label">Roll No : '. $rows['id']  .'</label> <br/> 
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
                                        <td> <b>'. $rows['maths']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 100 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 2 </th>
                                        <td> Physics </td>
                                        <td> <b>'. $rows['physics']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 98 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 3 </th>
                                        <td> Chemistry </td>
                                        <td> <b>'. $rows['chemistry']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 100 </b> </td>
                                    </tr> 
                                    <tr>
                                        <th> 4 </th>
                                        <td> English </td>
                                        <td> <b>'. $rows['english']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 98 </b> </td>
                                    </tr>
                                    <tr>
                                        <th> 5 </th>
                                        <td> Sanskrit </td>
                                        <td> <b>'. $rows['sanskrit']  .'</b> </td>
                                        <td> <b> 100 </b></td>
                                        <td> <b> 99 </b> </td>
                                    </tr> 
                                    <tr>
                                    <th> </th>
                                    <th> Total Marks </th>
                                    <td style="background:#30f3;"> <b>'; 
                                    $tot = $rows['sanskrit']+ $rows['english'] +$rows['chemistry']+$rows['physics']+ $rows['maths'];
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

                        </div>                            <div class="btnss"><button type="button" style="width:100px;border-radius:5px;margin:5px;" class="btn btn-primary">Print</button>
                            <button type="button" style="width:100px;border-radius:5px;margin:5px;" class="btn btn-primary">Download</button></div>
                    </div> ';
                                }
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
    <script>
    $(document).ready(function() {
        $('#viewdiv').hide();
        $('.viewgrade').click(() => {
            $('#viewdiv').show();
        })
    });
    </script>
</body>

</html>