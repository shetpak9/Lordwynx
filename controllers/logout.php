<?php
$_SESSION['session status'] = 0;
unset($_SESSION['uId']);
unset($_SESSION['session status']);
session_destroy();
?>
<script type="text/javascript">
    window.location = "/Lordwynx/router"
</script>