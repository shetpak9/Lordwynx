<?php
    if(isset($_GET['cId'])){
       $id = $_GET['cId'];
       $query = "SELECT * FROM customer_tb WHERE cId= $id"; 
       $result = $conn->query($query);
       $row = $result->fetch_assoc();
    }
    
    if(isset($_POST['save'])){
        $u_cfname = $_POST['cfname'];
        $u_cmi = $_POST['cmi'];
        $u_clname = $_POST['clname'];
        $u_gender = $_POST['gender'];
        $u_contact_no = $_POST['contact_no'];
        $u_address = $_POST['address'];

        $query = "UPDATE customer_tb " .
                 "SET cfname=?, cmi=?, clname=?, gender=?, contact_no=?, address=? " .
                 "WHERE cId=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssisi", $u_cfname, $u_cmi, $u_clname, $u_gender, $u_contact_no, $u_address, $id);
        $stmt->execute();

        if(!$stmt){
            echo "Error updating record: " . $conn->error;
        }
        else if($stmt->affected_rows == 0){
            echo "No changes were made.";
        }
        else{
?>
            <script>
                alert("Record updated successfully!");
                window.location.href = "/Lordwynx/search_record";
            </script>
<?php
        }
    }
?>  

<form method="POST">
            <table border="0" cellpadding="2" cellspacing="2" width="300">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="cfname" value='<?= $row['cfname']; ?>'></td>
            </tr>
            <tr>
                <td>M.I</td>
                <td><input type="text" name="cmi" size="1" maxlength="1" value='<?= $row['cmi']; ?>'></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="clname" value='<?= $row['clname']; ?>'></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= $row['gender'] == "Male" ? "selected": "" ?> >Male</option>
                        <option value="Female" <?= $row['gender'] == "Female" ? "selected": "" ?>>Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><input type="text" name="contact_no" value='<?= $row['contact_no']; ?>'></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value='<?= $row['address']; ?>'></td>
            </tr>
            <td colspan="2" align="center">
                <input type="submit" name="save" value="Save Changes">
                <input type="button" onclick="cancelChanges()" value="Cancel">
            </td>
        </table>
</form>
</body>
</html>