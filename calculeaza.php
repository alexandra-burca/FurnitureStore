<?php

include('db_connect.php');

//write query
$sql = 'SELECT * FROM mobila';
//make query
$result = mysqli_query($conn, $sql);
//fetch result
$mobila = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free result
mysqli_free_result($result);
//close connection
mysqli_close($conn);

//print_r($mobila);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Calculează </title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table.css">

    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<ul>

    <li><a href="acasa.html" style="color:#67d6ff">Acasă</a></li>

    <li class="dropdown">
        <a href="javascript:void(0)" style="color:#ff5baa" class="dropbtn">Produse</a>
        <div class="dropdown-content">
            <a href="produse1.html">Living</a>
            <a href="produse2.html">Bucătărie</a>
            <a href="produse3.html">Dormitor</a>
        </div> </li>
    <li><a class="active" href="calculeaza.php" style="color:#ff9f44">Calculează</a></li>
    <li><a href="comanda.php" style="color:#b9ff48">Comandă</a></li>


</ul>

<h1 style="text-align:center;margin-top: 100px;margin-bottom: 70px"> CALCULEAZĂ </h1>

<h3 style="margin-left: 50px"> Calculează-ți comanda înainte de a completa formularul de comandă! </h3>


<table>
    <tr>
        <th> ID </th> <th> Nume </th> <th> Preț </th>
    </tr>

    <?php foreach($mobila as $mobi) { ?>
        <tr>
            <td> <?php echo htmlspecialchars($mobi['id']); ?> </td>
            <td> <?php echo htmlspecialchars($mobi['nume']); ?> </td>
            <td> <?php echo htmlspecialchars($mobi['pret']); ?> </td>
        </tr>

    <?php } ?>

</table>


<script>
    function myFunction()
    {
        var p1 = document.getElementById("produs1").value;
        var p2 = document.getElementById("produs2").value;
        var p3 = document.getElementById("produs3").value;

        document.getElementById("demo").innerHTML = parseInt(p1) + parseInt(p2) + parseInt(p3);
    }
</script>


<p> Pret Produs 1: <input type="text" id="produs1" value="0"> </p>
<p> Pret Produs 2: <input type="text" id="produs2" value="0"> </p>
<p> Pret Produs 3: <input type="text" id="produs3" value="0"> </p>

<button style="margin-left: 100px" onclick="myFunction()">Adună produsele!</button>
<p id="demo"> </p>
<p> </p>


</body>

</html>