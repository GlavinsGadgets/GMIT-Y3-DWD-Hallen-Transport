<?php 
    /* Clears Cached Data */
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    if (isset ($_POST ['submit'])){
        $EON = $_POST ['Edit_Order_ID'];
        $EPD = $_POST ['Edit_Package_Details'];
        $EEN = $_POST ['Edit_Employee_Name'];
        $ECN = $_POST ['Edit_Customer_Name'];
        $ECD = $_POST ['Edit_Customer_Details'];
        $EPS = $_POST ['Edit_Package_Status'];

        $conn = mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
        if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

        $exists= mysqli_query ($conn,"SELECT * FROM package WHERE package_id = '$EON' ") or die ("Query could not be completed");

        if (mysqli_num_rows($exists) !=0){

            if($EPD || $EEN || $ECN || $ECD || $EPS){
                if ($EPD){
                    mysqli_query ($conn,"UPDATE package SET package_details = '$EPD' WHERE package_id = '$EON'") or die ("Update could not be applied");
                    echo "Successfully Updated Package Details <br>";
                }
                if ($EEN){
                    mysqli_query ($conn,"UPDATE package SET package_employee = '$EEN' WHERE package_id = '$EON'") or die ("Update could not be applied");
                    echo "Successfully Updated Employee Name <br>";
                }
                if ($ECN){
                    mysqli_query ($conn,"UPDATE customers SET customer_name = '$ECN' WHERE customer_id = '$EON'") or die ("Update could not be applied");
                    echo "Successfully Updated Customer Name <br>";
                }
                if ($ECD){
                    mysqli_query ($conn,"UPDATE customers SET customer_details = '$ECD' WHERE customer_id = '$EON'") or die ("Update could not be applied");
                    echo "Successfully Updated Customer Details <br>";
                }
                if ($EPS){
                    mysqli_query ($conn,"UPDATE package SET package_status = '$EPS' WHERE package_id  = '$EON'") or die ("Update could not be applied");
                    echo "Successfully Updated Package Status Description <br>";
                }
            }
            else{
                echo "No details entered";
            }
        }else echo "That Package ID does not exist.  Please re-enter:";
        header( "refresh:2;url=../index.php" );

    }
?>