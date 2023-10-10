<?php
$connect = mysqli_connect("localhost", "root", "", "database_connect");

// Check if 'idNo' is set in the URL
if (isset($_GET['idNo'])) {
    $id = $_GET['idNo'];

    if (isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['dept'];

        $update_data = "UPDATE insert_data SET name='$name', email='$email', phone='$phone', dept='$dept' WHERE Id = $id";

        $query_update = mysqli_query($connect, $update_data);

        if ($query_update) {
            echo "Data updated successfully";
        } else {
            echo "Data update failed: " . mysqli_error($connect);
        }
    }

    // Fetch data from the database
    $select = "SELECT * FROM insert_data WHERE Id = $id"; // Assuming 'Id' is the primary key
    $read = mysqli_query($connect, $select);

    if ($read && mysqli_num_rows($read) > 0) {
        $row = mysqli_fetch_array($read);
    } else {
        echo "No data found for this ID.";
        // You can redirect or handle the case where no data is found.
    }
} else {
    echo "Error: 'idNo' is not set in the URL.";
}
?>




<form action="" method="POST">
    <input value="<?php echo $row['name']?>" name="name" type="text" id="" placeholder="Name">
    <input value="<?php echo $row['email']?>" name="email" type="email" id="" placeholder="Email">
    <input value="<?php echo $row['phone']?>" name="phone" type="text" id="" placeholder="Phone">
    <select name="dept">
    <option value="CSE" <?php if ($row['dept'] === 'CSE') echo 'selected'; ?>>CSE</option>
    <option value="EEE" <?php if ($row['dept'] === 'EEE') echo 'selected'; ?>>EEE</option>
    <option value="BBA" <?php if ($row['dept'] === 'BBA') echo 'selected'; ?>>BBA</option>
</select>
    <button name="edit">Send</button>
</form>