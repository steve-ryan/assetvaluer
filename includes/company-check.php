<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ( isset( $_SESSION['cid'] ) ) {
    // Grab user data from the database using the admin_id
} else {
    // Redirect them to the login page
    header("Location: ./../company/index.php");
}
?>