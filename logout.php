<?php
session_start();
session_destroy();
header("Location: MunchiesLogin.php?message=You have been logged out.&status=success");
exit();
?>