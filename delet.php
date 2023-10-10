<?php




    $connect = mysqli_connect("localhost", "root", "", "database_connect"); 

    $id = $_GET['idNo'];



    // Fetch data from the database
    $delet = "DELETE FROM insert_data WHERE Id = $id"; // Assuming 'Id' is the primary key
    $delet_query = mysqli_query($connect, $delet);


    if($delet_query){
        echo "data delet successfull";
    }







?>
