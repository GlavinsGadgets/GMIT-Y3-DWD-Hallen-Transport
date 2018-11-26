<?php
    /* Clears Cached Data */
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    $connection= mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
    if (!$connection){ die('Could not connect: ' . mysqli_error()); }
    $result = mysqli_query($connection,"SELECT * 
        FROM (((package
        INNER JOIN employee ON package.package_employee = employee.employee_id)
        INNER JOIN customers ON package.package_customer = customers.customer_id)
        INNER JOIN package_status ON package.package_status = package_status.package_status_code)");
    $dir = "../../../";
?>
<!DOCTYPE html>
<html lang="eng"> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Employee Dashboard - Insert Deliveries</title>
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
            <a class="nav-link active" href="../Insert/">Insert Deliveries</a>
            <a class="nav-link" href="../Update/">Update Deliveries</a>
            <a class="nav-link" href="../Remove/">Delete Deliveries</a>
        </nav>
    </div>

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 hallen-bg-orange rounded box-shadow">
            <img class="mr-3" src="<?php echo $dir ?>Site-Assets/Images/Hallen-favicon-200px.png" alt="" width="48" height="48">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Hallen Dashboard Insert Deliveries</h6>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Deliveries Insertion</h6>
            <div class="media pt-3">
                <div class="container">

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <?php 
                                    echo "<table class='table table-striped table-sm'><thead><tr>
                                    <th>Order Number</th>
                                    <th>Package Details</th>
                                    <th>Customer Name</th>
                                    <th>Customer Details</th>
                                    <th>Employee Name</th>
                                    <th>Package Status</th></tr></thead>";

                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['package_id'] . "</td>";
                                        echo "<td>" . $row['package_details'] . "</td>";
                                        echo "<td>" . $row['customer_name'] ."</td>";
                                        echo "<td>" . $row['customer_details'] ."</td>";
                                        echo "<td>" . $row['employee_name'] . "</td>";
                                        echo "<td>" . $row['package_status_description'] ."</td>";
                                        echo "</tr>";}
                                    echo "</tbody>";

                                    mysqli_free_result($result);
                                ?>
                                <form action="Insert.php" method="post">
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="order_number" id="order_number" class="Insert-Input" autofocus></td>
                                            <td><input type="text" name="package_details" id="package_details" class="Insert-Input"></td>
                                            <td><input type="text" name="customer_name" id="customer_name" class="Insert-Input"></td>
                                            <td><input type="text" name="customer_details" id="customer_details" class="Insert-Input"></td>
											<td> <div class="form-group"><select name="employee_name" class="form-control form-control-sm">
												<?php $EmployeeName = mysqli_query($connection, "SELECT * FROM employee");
													while($record = mysqli_fetch_array($EmployeeName)){
														if($record['employee_id'] != 9999999){echo "<option value='" .$record['employee_id']. "'>" .$record['employee_name']. "</option>";}	
													}
													mysqli_free_result($EmployeeName);
												?>
											</select> </div></td>
											<td> <div class="form-group"><select name="package_status_description" class="form-control form-control-sm">
													<?php $myData = mysqli_query($connection, "SELECT * FROM package_status");
													while($record = mysqli_fetch_array($myData)){
														echo "<option value='" .$record['package_status_code']. "'>" .$record['package_status_description']. "</option>";	
													} ?>
												</select></div> </td>
												
											</tr>
                                    </tbody></table>
                                    <input type="submit" value="Submit Details">
                                </form>
                            </div>
                            
                        </div>
                    </div>

					

					
                    
                </div>
            </div>
        </div>
    </main>
	<?php mysqli_close($connection); ?>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/jquery.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/vendor/popper.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/bootstrap.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/vendor/holder.min.js"></script>
    <script src="<?php echo $dir ?>Site-Assets/JavaScript/offcanvas.js"></script>

</body>
</html>
