<?php
/* Clears Cached Data */
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/* Makes connection to server */
$conn = mysqli_connect("127.0.0.1", "hallen-root-dbs", "40wkUIcNJZY6", "hallen-delivery-sys");
if(!$conn) { die("Connection failed: " . mysqli_connect_error()); }

/* Pulls info from the HTML form */
$EMPUSERNAME = $_POST['emp_username'];
$EMPPASSWRD = $_POST['emp_password'];

/* Checks to see if there is any text in the form */
if ($EMPUSERNAME && $EMPPASSWRD) {
    /* Gets data from MYSQL server */
    $QUERY = mysqli_query($conn, "SELECT * FROM employee WHERE employee_username = '$EMPUSERNAME'");
    $ROWSQUERY = mysqli_num_rows($QUERY);
    $row = mysqli_fetch_array($QUERY);

    /* Checks to see if username was found */
    if($ROWSQUERY != 0){
        /* Checks if the user name and password are the same in the server */
        if ($EMPUSERNAME == $row['employee_username'] && md5($EMPPASSWRD) == $row['employee_password']){
            /* Redirects the client to the Employee Dashboard */
            header("Location: ../Dashboard/index.php");
        } 
        else { die("Username/Password was incorrect!"); }
    }
    else { die("Username not found in Database."); }
} 
else { die ("Please enter a user name & password to continue."); }

/* Closses connection to the server */
mysqli_close($conn);