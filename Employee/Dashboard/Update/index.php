<?php
    /* Clears Cached Data */
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    $conn = mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}
    $result = mysqli_query($conn, "SELECT * 
        FROM (((package
        INNER JOIN employee ON package.package_employee = employee.employee_id)
        INNER JOIN customers ON package.package_customer = customers.customer_id)
        INNER JOIN package_status ON package.package_status = package_status.package_status_code)");

    if(isset($_GET['edit'])){
        $edit_id= $_GET['edit'];
        $editQuery = mysqli_query($conn, "SELECT * FROM package WHERE package_id = '$edit_id'");
        while($editArray = mysqli_fetch_array($editQuery, MYSQLI_ASSOC)){
            $Edit_id = $editArray['package_id'];
            $Edit_name = $editArray['package_name'];
            $Edit_price = $editArray['package_price'];
        }
        header("location: Edit/index.php?edit=$edit_id");
    }
    $dir = "../../../";
?>
<html lang="eng"> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Employee Dashboard - Update Deliveries</title>
    <link rel="icon" href="<?php echo $dir ?>Site-Assets/Images/Hallen-favicon-200px.png">

    <link rel="stylesheet" href="<?php echo $dir ?>Site-Assets/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $dir ?>Site-Assets/CSS/Hallen-Main-Style.css" />
    <link rel="stylesheet" href="<?php echo $dir ?>Site-Assets/CSS/offcanvas.css" />

</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="">Hallen Employee Dashboard</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="../">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $dir ?>">Back to Home Page</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
            <a class="nav-link" href="../">Home</a>
            <a class="nav-link" href="../Insert/">Insert Deliveries</a>
            <a class="nav-link active" href="../Update/">Update Deliveries</a>
            <a class="nav-link" href="../Remove/">Delete Deliveries</a>
        </nav>
    </div>

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 hallen-bg-orange rounded box-shadow">
            <img class="mr-3" src="<?php echo $dir ?>Site-Assets/Images/Hallen-favicon-200px.png" alt="" width="48" height="48">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Hallen Dashboard Update Deliveries</h6>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Update Deliveries</h6>
            <div class="media text-muted pt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive">
                                <?php 
                                    echo "<table class='table table-striped table-sm'><thead><tr>
                                    <th>Order ID</th>
                                    <th>Package Details</th>
                                    <th>Employee Name</th>
                                    <th>Customer Name</th>
                                    <th>Customer Details</th>
                                    <th>Package Status</th>
                                    <th>Edit</th></tr></thead>";

                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['package_id'] . "</td>";
                                        echo "<td>" . $row['package_details'] . "</td>";
                                        echo "<td>" . $row['employee_name'] . "</td>";
                                        echo "<td>" . $row['customer_name'] ."</td>";
                                        echo "<td>" . $row['customer_details'] ."</td>";
                                        echo "<td>" . $row['package_status_description'] ."</td>";
                                        echo "<td><a href =\"index.php?edit=" . $row['package_id'] . "\">Edit</a></td>";
                                        echo "</tr>";}
                                    echo "</tbody>";

                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo $dir ?>Site-Assets/JavaScript/jquery.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/vendor/popper.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/bootstrap.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/vendor/holder.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/offcanvas.js"></script>

</body>
</html>
