<?php
include "../config/database.php";

$id = $_GET['id'];
mysqli_query($conn,"UPDATE todos SET status = 1 - status WHERE id='$id'");
