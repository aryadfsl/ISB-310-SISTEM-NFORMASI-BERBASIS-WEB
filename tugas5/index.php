<?php
$data = [];

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        $data[$i][$j] = "$i,$j";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tabel Array 2D</title>

<style>

body{
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

table{
    border-collapse: collapse;
}

td{
    border:2px solid black;
    width:60px;
    height:40px;
    text-align:center;
}

.row1:hover{
    background:red;
}

.row2:hover{
    background:yellow;
}

.row3:hover{
    background:green;
}

.row4:hover{
    background:blue;
}

.row5:hover{
    background:brown;
}

</style>

</head>
<body>
<table>

<?php
for ($i=1; $i<=5; $i++) {
    echo "<tr>";
    
    for ($j=1; $j<=5; $j++) {
        echo "<td class='row$i'>".$data[$i][$j]."</td>";
    }

    echo "</tr>";
}
?>

</table>
</body>
</html>