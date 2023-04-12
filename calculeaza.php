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
    <title> Add up </title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="table.css">

    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<ul>

    <li><a href="acasa.html" style="color:#67d6ff">Home</a></li>

    <li class="dropdown">
        <a href="javascript:void(0)" style="color:#ff5baa" class="dropbtn">Products</a>
        <div class="dropdown-content">
            <a href="produse1.html">Living room</a>
            <a href="produse2.html">Kitchen</a>
            <a href="produse3.html">Bedroom</a>
        </div> </li>
    <li><a class="active" href="calculeaza.php" style="color:#ff9f44">Add up</a></li>
    <li><a href="comanda.php" style="color:#b9ff48">Place Order</a></li>


</ul>

<h1 style="text-align:center;margin-top: 100px;margin-bottom: 70px"> ADD UP </h1>

<h3 style="margin-left: 50px"> Add up the price of your products before placing an order! </h3>


<table>
    <tr>
        <th> ID </th> <th> Name </th> <th> Price </th>
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


<p> Price Produs 1: <input type="text" id="produs1" value="0"> </p>
<p> Price Produs 2: <input type="text" id="produs2" value="0"> </p>
<p> Price Produs 3: <input type="text" id="produs3" value="0"> </p>

<button style="margin-left: 100px" onclick="myFunction()">Add 'em up!</button>
<p id="demo"> </p>
<p> </p>


</body>

</html>