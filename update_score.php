<?php
include "db.php";

$team = $_POST['team'];
$points = $_POST['points'];
$match_id = $_POST['match_id'];

if($team=="A"){
    mysqli_query($con,
    "UPDATE matches SET score_a = score_a + $points WHERE id='$match_id'");
}else{
    mysqli_query($con,
    "UPDATE matches SET score_b = score_b + $points WHERE id='$match_id'");
}
?>
