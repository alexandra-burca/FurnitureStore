<?php

$conn = mysqli_connect('localhost','ale','test1234','produse');
//check connection
if(!$conn)
{
    echo 'Connection error: ' . mysqli_connect_error();
}

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

<style>
    table, td
    {
        border: 1px solid black;
    }

    th
    {
        width:33%;
        background:#ff9f44;
        padding:10px
    }

</style>

<body>

<table>
    <tr>
        <th> ID </th> <th> Nume </th> <th> Pret </th>
    </tr>

    <?php foreach($mobila as $mobi) { ?>
        <tr>
            <td> <?php echo htmlspecialchars($mobi['id']); ?> </td>
            <td> <?php echo htmlspecialchars($mobi['nume']); ?> </td>
            <td> <?php echo htmlspecialchars($mobi['pret']); ?> </td>
        </tr>

    <?php } ?>

</table>
</body>

</html>