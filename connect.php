<?php
include 'abirErEnv.php';

$con = new mysqli($serverName, 'root', '', 'crud');

if(!$con){
    die(mysqli_error($con));
}


?>