<?php
if(isset($_SESSION['session status']) && $_SESSION['session status'] ==1){
?>
    <script>
        window.location = "/Lordwynx/search_record";
    </script>
<?php
}
?>
<form method="POST" action="">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <input type="submit" name="login" value="Log in">
</form>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $l_query = "SELECT * FROM users_tbl ".
               "WHERE username=? AND password=?";
    $stmt = $conn->prepare($l_query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        echo "Login error: " . $conn->error;
        exit();
    }
    else if($result->num_rows == 0){
        echo "Invalid username or password.";
    }
    else{
        $rows = $result->fetch_assoc();
        if($rows['username'] == $username && $rows['password'] == $password){
            $_SESSION['session status'] = 1;
            $_SESSION['uId'] = $rows['uId'];
        ?>
            <script type="text/javascript">
                window.location = "/Lordwynx/search_record";
            </script>
<?php  
        }
    }
}
?>
    
