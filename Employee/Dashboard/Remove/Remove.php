<?php
    /* Clears Cached Data */
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    if(isset($_GET['delete'])){
        $conn = mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
        if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

        $delete_id= $_GET['delete'];
        
        mysqli_query($conn, "DELETE FROM customers WHERE customer_id = '$delete_id';");
        mysqli_query($conn, "DELETE FROM package WHERE package_id = '$delete_id';");
        
        mysqli_free_result($result);
        mysqli_close($conn);
        header("location: index.php");
    }
?>