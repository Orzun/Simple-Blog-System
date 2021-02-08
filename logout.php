<?php
session_start();
unset($_SESSION['authName']);
unset($_SESSION['authId']);
header('location:user/check.php');
