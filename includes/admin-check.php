<?php

session_start();

if ( isset( $_SESSION['admin_id'] ) ) {
    // Grab user data from the database using the admin_id
} else {
    // Redirect them to the login page
    header("Location: ./../admin/index.php");
}
?>