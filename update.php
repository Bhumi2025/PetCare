<?php
include 'connect.php';

$id = $_GET['updateid'];

$sql = "select * from pet_care where id=$id";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$species = $row['species'];                           //dis all data
$breed = $row['breed'];
$age = $row['age'];
$gender = $row['gender'];



if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];



    $sql = "UPDATE `pet_care` SET `id`=$id,`name`='$name',`species`='$species',`breed`='$breed',`age`='$age',`gender`='$gender' where id=$id";

    $result = mysqli_query($con, $sql);
    if ($result)
    {

        header('Location: display.php');
        
    } 
    else 
    {

        die(mysqli_error($con));
    }
}

?>


<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
    <title>crud opration</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
        <br><br>
            <div class="form-group">
                <label>name</label>
                <input type="text" class="form-control" name="name" autocomplete="off" value=<?php echo $name?>>

            </div>
            <div class="form-group">
                <label>species</label>
                <input type="text" class="form-control" name="species" autocomplete="off" value=<?php echo $species?>>

            </div>
            <div class="form-group">
                <label>breed</label>
                <input type="text" class="form-control" name="breed" autocomplete="off" value=<?php echo $breed?>  >

            </div>
            <div class="form-group">
                <label>age</label>
                <input type="text" class="form-control" name="age" autocomplete="off" value=<?php echo $age?> >

            </div>
           <div>
                <lable for="gender">choose gender : </lable>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
            </div><br>
            
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>


            
        </form>
    </div>

</body>

</html>