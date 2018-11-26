<?php
    /* Clears Cached Data */
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    $conn = mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

    if(isset($_GET['edit'])){
        $edit_id= $_GET['edit'];
        $editQuery = mysqli_query($conn, "SELECT * 
        FROM (((package
        INNER JOIN employee ON package.package_employee = employee.employee_id)
        INNER JOIN customers ON package.package_customer = customers.customer_id)
        INNER JOIN package_status ON package.package_status = package_status.package_status_code)
        WHERE package_id Like '$edit_id'");
        while($editArray = mysqli_fetch_array($editQuery, MYSQLI_ASSOC)){
            $Edit_Order_ID =  $editArray['package_id'];
            $Edit_Employee_Package_ID = $editArray['package_employee'];
            $Edit_Package_Customer = $editArray['package_customer'];
            $Edit_Package_PS = $editArray['package_status'];
            $Edit_Package_Details = $editArray['package_details'];
            $Edit_Employee_Name = $editArray['employee_name'];
            $Edit_Customer_Name = $editArray['customer_name'];
            $Edit_Customer_Details = $editArray['customer_details'];
            $Edit_Package_Status = $editArray['package_status_description'];
        }   
    }
    $dir = "../../../../";
?>
<html lang="eng"> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Employee Dashboard - Update Products</title>
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
                    <a class="nav-link" href="../../">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $dir ?>">Back to Home Page</a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="nav-scroller bg-white box-shadow">

        <nav class="nav nav-underline">
        <a class="nav-link" href="../../">Home</a>
            <a class="nav-link" href="../../Insert/">Insert Deliveries</a>
            <a class="nav-link active" href="../../Update/">Update Deliveries</a>
            <a class="nav-link" href="../../Remove/">Delete Deliveries</a>
        </nav>

    </div>

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 hallen-bg-orange rounded box-shadow">
            <img class="mr-3" src="<?php echo $dir ?>Site-Assets/Images/Hallen-favicon-200px.png" alt="" width="48" height="48">
            <div class="lh-100">
                <h6 class="mb-0 text-white lh-100">Hallen Dashboard Update Products</h6>
            </div>
        </div>

        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6 class="border-bottom border-gray pb-2 mb-0">Update Products</h6>
            <div class="media text-muted pt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <p>
                                Only enter data in the feilds you want to update.
                            </p>

                            <div class="table-responsive">
                                <form action="edit.php" method="post">
                                    <table class='table table-striped table-sm'>
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Package Details</th>
                                                <th>Customer Name</th>
                                                <th>Customer Details</th>
											</tr>
											<tr>
                                                <th>Employee Name</th>
                                                <th>Package Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" id="Edit_Order_ID" name="Edit_Order_ID" value="<?php echo $edit_id; ?>" class="Edit-Input insert-id" readonly></td>
                                                <td><input type="text" id="Edit_Package_Details" name="Edit_Package_Details" placeholder="<?php echo $Edit_Package_Details; ?>" class="Edit-Input"></td>
                                                <td><input type="text" id="Edit_Customer_Name" name="Edit_Customer_Name" placeholder="<?php echo $Edit_Customer_Name; ?>" class="Edit-Input"></td>
                                                <td><input type="text" id="Edit_Customer_Details" name="Edit_Customer_Details" placeholder="<?php echo $Edit_Customer_Details; ?>" class="Edit-Input"></td>
											</tr>
											<tr>
												<td> <div class="form-group"><select name="Edit_Employee_Name" class="form-control form-control-sm"><option value="<?php echo $Edit_Employee_Package_ID ?>"><?php echo $Edit_Employee_Name; ?></option>
													<?php $EmployeeName = mysqli_query($conn, "SELECT * FROM employee");
													while($record = mysqli_fetch_array($EmployeeName)){
														if($record['employee_id'] != 9999999 && $record['employee_id'] != $Edit_Employee_Package_ID ){echo "<option value='" .$record['employee_id']. "'>" .$record['employee_name']. "</option>";}	
													} ?>
												</select></div> </td>                                                
												
												<td> <div class="form-group"><select name="Edit_Package_Status" class="form-control form-control-sm"><option value="<?php echo $Edit_Package_PS ?>"><?php echo $Edit_Package_Status; ?></option>
													<?php $myData = mysqli_query($conn, "SELECT * FROM package_status");
													while($record = mysqli_fetch_array($myData)){
														if ($record['package_status_code'] != $Edit_Package_PS){echo "<option value='" .$record['package_status_code']. "'>" .$record['package_status_description']. "</option>";	}
													} ?>
												</select></div> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="submit" id="submit" name="submit" value="Submit">
                                </form>
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
