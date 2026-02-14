<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Kabaddi Match Setup</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
<h2>Create Match</h2>

<form method="POST">
    <input type="text" name="teamA" placeholder="Team A Name" required>
    <input type="text" name="teamB" placeholder="Team B Name" required>
    <button name="create">Start Match</button>
</form>

<?php
if(isset($_POST['create'])){

    $teamA = $_POST['teamA'];
    $teamB = $_POST['teamB'];

    mysqli_query($con,"INSERT INTO teams(team_name) VALUES('$teamA')");
    $teamA_id = mysqli_insert_id($con);

    mysqli_query($con,"INSERT INTO teams(team_name) VALUES('$teamB')");
    $teamB_id = mysqli_insert_id($con);

    mysqli_query($con,"INSERT INTO matches(team_a,team_b) 
                       VALUES('$teamA_id','$teamB_id')");

    $match_id = mysqli_insert_id($con);

    header("Location: live_match.php?id=$match_id");
}
?>
</div>
</body>
</html>
