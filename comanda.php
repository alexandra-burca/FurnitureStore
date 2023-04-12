<?php

include('db_connect.php');

$nume = $prenume = $email = $produs1 = $produs2 = $produs3 = '';
$errors = array('nume'=>'','prenume'=>'','email'=>'', 'produs1'=>'','produs2'=>'','produs3'=>'');

if(isset($_POST['submit']))
{
    if(empty($_POST['nume']))
    {	$errors['nume'] = 'Introduceți un nume <br />';	}
    else
    {	$nume = $_POST['nume'];
        if(!preg_match('/^[a-zA-ZĂăÂâÎîȘșȚț\s]+$/', $nume))
        {
            $errors['nume'] = 'Introduceți un nume valid';
        }
    }

    if(empty($_POST['prenume']))
    {	$errors['prenume'] = 'Introduceți un prenume <br />';}
    else
    {	$prenume = $_POST['prenume'];
        if(!preg_match('/^[a-zA-ZĂăÂâÎîȘșȚț\s]+$/', $prenume))
        {
            $errors['prenume'] = 'Introduceți un prenume valid';
        }
    }

    if(empty($_POST['email']))
    {	$errors['email'] = 'Introduceți un email <br />';
    }
    else
    { 	$email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Introduceți un email valid';
        }
    }

    if(empty($_POST['produs1']))
    {	$errors['produs1'] = 'Introduceți primul produs <br />';	}
    else
    {	$produs1 = $_POST['produs1'];
        if(!preg_match('/[0-9]+/', $produs1))
        {
            $errors['produs1'] = 'Introduceți un ID valid';
        }
    }

    $produs2 = $_POST['produs2'];
    if(!empty($_POST['produs2']))
    {
        if(!preg_match('/[0-9]+/', $produs2))
        {
            $errors['produs2'] = ' ID invalid';
        }
    }

    $produs3 = $_POST['produs3'];
    if(!empty($_POST['produs3']))
    {
        if(!preg_match('/[0-9]+/', $produs3))
        {
            $errors['produs3'] = 'ID invalid';
        }
    }

    if(array_filter($errors))
    {	//
    }
    else
    {
        $nume = mysqli_real_escape_string($conn, $_POST['nume']);
        $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $produs1 = mysqli_real_escape_string($conn, $_POST['produs1']);
        $produs2 = mysqli_real_escape_string($conn, $_POST['produs2']);
        $produs3 = mysqli_real_escape_string($conn, $_POST['produs3']);

        $sql = "INSERT INTO data_comanda(nume, prenume, email, produs1, produs2, produs3) VALUES ('$nume', '$prenume', '$email', '$produs1', '$produs2', '$produs3')";

        //save to db and check
        if(mysqli_query($conn, $sql))
        {
            header('Location: acasa.html');
        }
        else
        {
            echo 'query error:' . mysqli_error($conn);
        }

    }

} //end of post check
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Comandă </title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="formular.css?v=<?php echo time(); ?>">
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
    <li><a href="calculeaza.php" style="color:#ff9f44">Calculează</a></li>
    <li><a class="active" href="comanda.html" style="color:#b9ff48">Comandă</a></li>

</ul>

<h1 style="text-align:center;margin-top:100px;margin-bottom:50px"> COMANDĂ </h1>


<form action="comanda.php" method="POST">

    <fieldset>
        <legend><span class="number">1</span> Informații client</legend>
        <label> <sup>*</sup>Nume:</label>
        <input type="text" name="nume" value="<?php echo htmlspecialchars($nume) ?>" placeholder="Ana">
        <div> <?php echo $errors['nume']; ?> </div>

        <label> <sup>*</sup>Prenume:</label>
        <input type="text" name="prenume" value="<?php echo htmlspecialchars($prenume) ?>" placeholder="Maria">
        <div> <?php echo $errors['prenume']; ?> </div>

        <label> <sup>*</sup>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>" placeholder="anamaria@e-uvt.ro">
        <div> <?php echo $errors['email']; ?> </div>
    </fieldset>

    <fieldset>
        <legend><span class="number">2</span> Informații comandă </legend>

        <label><sup>*</sup>ID Produs 1</label>
        <input type="text" name="produs1" value="<?php echo htmlspecialchars($produs1) ?>" placeholder="1">
        <div> <?php echo $errors['produs1']; ?> </div>

        <label>ID Produs 2</label>
        <input type="text" name="produs2" value="<?php echo htmlspecialchars($produs2) ?>">
        <div> <?php echo $errors['produs2']; ?> </div>

        <label>ID Produs 3</label>
        <input type="text" name="produs3" value="<?php echo htmlspecialchars($produs3) ?>">
        <div> <?php echo $errors['produs3']; ?> </div>

    </fieldset>

    <button type="submit" name="submit" value="submit" > Trimite comanda! </button>

</form>
<br>

</body>

</html>