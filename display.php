<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>crud operation</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="mystyle.css">
    </head>

    <body>

        <div class="one">
            <h1>-:Pet care details:-</h1>
        </div>  

        <div class="container uploadsection">
            <button class="upload-btn" id="toggleBtn">Upload File</button>
            <button class="upload-btn" style="margin-left: 839px;"><a href="insert.php" class="text-light">Add pet details</a></button>
            <div class="upload-slider" id="slider">
                <form action="bulk.php" method="post" enctype="multipart/form-data"> 
                    <input type="file" id="fileInput" name="csv_file" accept=".csv">
                    <input type="submit" name="upload" value="Upload" class="fileuploadbtn btn btn-primary my-5">
                </form>
            </div>
        </div>

        <div class="container" style="padding:0px !important">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Species</th>
                        <th scope="col">Breed</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from pet_care";
                    $result = mysqli_query($con, $sql);
                    if ($result) {


                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $species = $row['species'];
                            $breed = $row['breed'];
                            $age = $row['age'];
                            $gender = $row['gender'];

                            echo '  
                        <tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $species . '</td>
                            <td>' . $breed . '</td>
                            <td>' . $age . '</td>
                            <td>' . $gender . '</td>
                            


                            <td style="width: 200px;">
                                <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                            </td>
                        </tr>';
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </body>

</html>

<script>
    document.getElementById('toggleBtn').addEventListener('click', function () {
        const slider = document.getElementById('slider');
        slider.classList.toggle('show');
    });
</script>