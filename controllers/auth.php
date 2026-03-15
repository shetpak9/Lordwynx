<?php
if(isset($_SESSION['session status']) && isset($_SESSION['uId'])){
$uid = $_SESSION['uId'];
$a_query = "SELECT * FROM users_tbl " .
           "WHERE uId=?";
$stmt = $conn->prepare($a_query);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
    if(!$result){
        echo "Error: " . $conn->error;
        exit();
    }
$row = $result->fetch_assoc();
$ufname = $row['ufname'];
$ulname = $row['ulname'];
}
else{
?>
    <script type="text/jaavascript">
        window.location = "/Lordwynx/router";
    </script>
<?php
}
?>