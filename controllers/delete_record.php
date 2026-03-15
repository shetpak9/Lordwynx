<?php
    $cId = $_GET['cId'];
    if(isset($_GET['con']) && $_GET['con'] == 'delete'){
?>
    <script type="text/javascript">
        var con = confirm("Are you sure you want to delete this record?");
        if(con){
            window.location.href = "/Lordwynx/delete_record.php?cId=<?= $cId ?>&com=delete";
        }
        else{
            window.location.href = "/Lordwynx/search_record.php";
        }
    </script>
<?php    
    }
    if(isset($_GET['com']) && $_GET['com'] == 'delete'){
        $d_query = "DELETE FROM customer_tb " . 
                   "WHERE cId = ?";
        $stmt =$conn->prepare($d_query);
        $stmt->bind_param("i", $cId);
        $stmt->execute();
        if(!$stmt){
            echo "Connection Error" . $conn->error;
        }
        else if($stmt->affected_rows == 0){
            echo "No records were deleted.";
        }
        else{
        ?>
         <script>
            alert("Record deleted succesfully!");
            window.location.href = "/Lordwynx/search_record.php";
         </script>   
<?php
        }
    }
?>