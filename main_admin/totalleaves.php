<?php
session_start();
include('dbconnect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HR Module</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <?php include("navbar.php"); ?>
        <div class="main_content" style="margin-top: 30px;">

            <div class="row">
                <div class="col-2 col-md-2 col-lg-2"></div>
                <div class="col-8 col-md-8 col-lg-8 table-responsive">
                    <h2 style="text-align:center">Leaves Calculation</h2><br>
                    <hr>
                    <form action="" method="post" id="my-form1">
                        <div class="form-group"><br><br>
                            <label for="name">Employee ID:</label>
                            <input type="text" class="form-control" id="langname" placeholder="Enter Employee ID" name="id">
                        </div>
                        <div class="form-group">
                            <label for="name">Month:</label>
                            <input type="text" class="form-control" id="langname" placeholder="Enter Month" name="month">
                        </div>
                        <button type="submit" class="btn btn-primary align-right" name="btn" value="check">Check</button>
                    </form>
                    <?php
                    $id = "";
                    $shortcount = 0;
                    $longcount = 0;
                    $wholecount = 0;
                    if (isset($_POST["btn"]) && !empty($_POST["btn"])) {
                        $id = $_POST["id"];
                        $mon = $_POST["month"];
                        $sql = "SELECT Leave_Type FROM leaves WHERE Employee_ID='$id' and Leave_Type='short' and MONTH(StartDate)=$mon";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $shortcount = mysqli_num_rows($result);
                        } else {
                            $shortcount = 0;
                        }
                        $sql1 = "SELECT Leave_Type FROM leaves WHERE Employee_ID='$id' and Leave_Type='long' and MONTH(StartDate)=$mon";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0) {
                            $longcount = mysqli_num_rows($result1);
                        } else {
                            $longcount = 0;
                        }
                        $sql2 = "SELECT Leave_Type FROM leaves WHERE Employee_ID='$id' and Leave_Type='whole' and MONTH(StartDate)=$mon";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            $wholecount = mysqli_num_rows($result2);
                        } else {
                            $wholecount = 0;
                        }

                    ?><br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Number of Short Leaves</th>
                                    <th>Number of Long Leaves</th>
                                    <th>Number of Whole Day Leaves</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $shortcount; ?></td>
                                    <td><?php echo $longcount; ?></td>
                                    <td><?php echo $wholecount; ?></td>
                                </tr>
                            </tbody><br>
                        </table>
                    <?php } ?>
                </div>

                <div class="col-3 col-md-3 col-lg-3"></div>
            </div>

        </div>
    </div>

</body>

</html>