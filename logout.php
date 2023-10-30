
<?php
session_start();
// Unset all of the session variables
session_unset();
// Destroy the session
session_destroy();
header("Location: index.php");
