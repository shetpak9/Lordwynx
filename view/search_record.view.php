<form method="POST">
        Search: <input type="text" name="search">
                <input type="submit" name="search_btn" value="Search">
        <br/>
        <br/>

        <table border="1" cellpadding="7" cellspacing="2" >
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Contact No.</th>
                <th>Address</th>
            </tr>
<?php
    if(isset($_POST['search_btn'])){
        $src_val = $_POST['search'];
        if(!empty($src_val)){
            $s_query = "SELECT * FROM customer_tb ". 
                       "WHERE cfname= ? OR clname= ?";
            $stmt = $conn->prepare($s_query);
            $stmt->bind_param("ss", $src_val, $src_val);
            $stmt->execute();
            $q_query = $stmt->get_result();
            if(!$q_query){
                echo $conn->error;
                exit();
            }
            else if($q_query->num_rows == 0){
                echo "No record found";
            }
            else{
                while($row = $q_query->fetch_assoc()):
?>
            <tr>
                <td><?= $row['cId'] ?></td>
                <td><?= $row['clname'] . ', ' . $row['cfname'] . ' ' . $row['cmi'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['contact_no'] ?></td>
                <td><?= $row['address'] ?></td>
                <td>
                    <a href="/Lordwynx/update_record?cId=<?= $row['cId'] ?>" style="color:black">Update</a>
                </td>
                <td>
                    <a href="/Lordwynx/delete_record?cId=<?= $row['cId'] ?>&con=delete" style="color:black">Delete</a>
                </td>
            </tr>
<?php endwhile; ?>
        </table>
<?php      }
        }
        else{
            echo "Please enter a name to search.";
        }
    }
?>
</form>
</body>
</html>