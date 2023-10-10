<?php 

$connect = mysqli_connect("localhost","root","","database_connect");

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dept = $_POST['dept'];

    $insert_data = "INSERT INTO insert_data(name,email, phone, dept) VALUES ('$name','$email','$phone','$dept')";

    $query = mysqli_query($connect,$insert_data);
}




 
?>

<form action="" method="POST">
    <input name="name" type="text" id="" placeholder="Name">
    <input name="email" type="email" id="" placeholder="Email">
    <input name="phone" type="text" id="" placeholder="Phone">
    <select name="dept">
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="BBA">BBA</option>
    </select>
    <button name="send">Send</button>
   
</form>
<table>

<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Dept</th>
<th>Edit</th>
<th>Delet</th>

<?php 


$select = "SELECT * FROM insert_data";
$read = mysqli_query($connect,$select);

while($row = mysqli_fetch_array($read)){
   ?>

    <tr>
        <td><?php echo $row['name']?></td>
    
        <td><?php echo $row['email']?></td>
     
        <td><?php echo $row['phone']?></td>

        <td><?php echo $row['dept']?></td>



        <td><a href="edit.php?idNo=<?php echo $row['id']; ?>">edit</a></td>
        <td><a href="delet.php?idNo=<?php echo $row['id']; ?>">delet</a></td>

    </tr>

   <?php
}


?>

</table>

