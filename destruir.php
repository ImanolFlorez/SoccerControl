<?php
session_start();
unset($_SESSION['cancha']);
header("location: reserva.php");
exit();

?>