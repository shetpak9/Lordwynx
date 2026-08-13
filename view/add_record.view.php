<form method="POST" action="">
        <table border="0" cellpadding="2" cellspacing="2" width="300">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="cfname" required></td>
            </tr>
            <tr>
                <td>M.I</td>
                <td><input type="text" name="cmi" size="1" maxlength="1" required></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="clname" required></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <select name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Contact No.</td>
                <td><input type="text" name="contact_no" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" required></td>
            </tr>
            <td colspan="2" align="center">
                <input type="submit" name="save" value="Save Record">
                <input type="reset" value="Clear">
            </td>
        </table>

<?php
if (isset($_POST['save'])) {
    $cfname = $_POST['cfname'];
    $cmi = $_POST['cmi'];
    $clname = $_POST['clname'];
    $gender = $_POST['gender'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];

    $s_save = "INSERT INTO customer_tb " .
              "(cfname, cmi, clname, gender, contact_no, address) " .
              "VALUES ('$cfname', '$cmi', '$clname', '$gender', '$contact_no', '$address')";

    $q_save = $conn->query($s_save);
    if(!$q_save) {
        echo $conn->error;
        exit();
    } 
    else if($conn->affected_rows == 0){
        echo "Save error";
    }
    else{
        ?> 
        <script type="text/javascript">
            alert("Record saved successfully!");
            window.location.href = "<?= $_SERVER['REQUEST_URI']; ?>";
        </script>
        <?php      
    }
}
?>
    </form>
</body>
</html>