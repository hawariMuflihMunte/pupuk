<?php include('./php/session.php') ?>
<?php include('./php/connection.php') ?>

<?php

session_unset();
session_destroy();
mysqli_close($connection);

header('location: ./index.php');
exit();