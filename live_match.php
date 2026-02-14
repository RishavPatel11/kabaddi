<?php 
include "db.php";
$match_id = $_GET['id'];

$match = mysqli_fetch_assoc(mysqli_query($con,
"SELECT * FROM matches WHERE id='$match_id'"));
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="scoreboard">
    <h1>Kabaddi Live Match</h1>

    <div class="teams">
        <div>
            <h2>Team A</h2>
            <h1 id="scoreA"><?php echo $match['score_a']; ?></h1>
            <button onclick="updateScore('A',1)">+1 Raid</button>
            <button onclick="updateScore('A',2)">+2 Super Tackle</button>
            <button onclick="updateScore('A',3)">+3 Super Raid</button>
            <button onclick="updateScore('A',2)">+2 All Out</button>
        </div>

        <div>
            <h2>Team B</h2>
            <h1 id="scoreB"><?php echo $match['score_b']; ?></h1>
            <button onclick="updateScore('B',1)">+1 Raid</button>
            <button onclick="updateScore('B',2)">+2 Super Tackle</button>
            <button onclick="updateScore('B',3)">+3 Super Raid</button>
            <button onclick="updateScore('B',2)">+2 All Out</button>
        </div>
    </div>

    <br>
    <button onclick="finishMatch()">Finish Match</button>
</div>

<script>
function updateScore(team, points){
    fetch("update_score.php",{
        method:"POST",
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:"team="+team+"&points="+points+"&match_id=<?php echo $match_id; ?>"
    })
    .then(res=>res.text())
    .then(data=>{
        location.reload();
    });
}

function finishMatch(){
    window.location="finish_match.php?id=<?php echo $match_id; ?>";
}
</script>

</body>
</html>
