<?php
include 'connect.php';

if (isset($_POST['upload'])) {
    $fileName = $_FILES['csv_file']['tmp_name'];

    if ($_FILES['csv_file']['size'] > 0) {
        $file = fopen($fileName, 'r');

        // Skip the first line if it contains headers
        fgetcsv($file);

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $name = $column[0];
            $species = $column[1];
            $breed = $column[2];
            $age = $column[3];
            $gender = $column[4];

            $sqlInsert = "INSERT INTO `pet_care`(`name`, `species`, `breed`, `age`, `gender`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sqlInsert);
            
            // Bind parameters
            $stmt->bind_param("sssis", $name, $species, $breed, $age, $gender);
            
            // Execute the statement
            $stmt->execute();
        }

        fclose($file);
        echo "CSV Data Imported Successfully!";
    } else {
        echo "Invalid File: Please Upload CSV File.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSV Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">
</head>

<body>
    <div class="container">
    Back to your index:   
        <button class="btn btn-primary my-5"><a href="display.php"  class="text-light">Go Back</a></button>


    </div>

   
</body>

</html>