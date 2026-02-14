<?php
include "db.php";
$id = $_GET['id'];

$match = mysqli_fetch_assoc(mysqli_query($con,
"SELECT * FROM matches WHERE id='$id'"));

if($match['score_a'] > $match['score_b']){
    $winner="Team A";
}else if($match['score_b'] > $match['score_a']){
    $winner="Team B";
}else{
    $winner="Draw";
}

mysqli_query($con,
"UPDATE matches SET match_status='Finished', winner='$winner' WHERE id='$id'");

echo "<h1>Match Finished</h1>";
echo "<h2>Winner: $winner</h2>";
?>
