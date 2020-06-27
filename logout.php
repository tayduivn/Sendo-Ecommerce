<?php
session_start();
unset($_SESSION['mem']);
header('Location: /');
?>