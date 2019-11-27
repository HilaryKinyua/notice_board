
<?php session_start();
if(empty($_SESSION['firstname'])):
    header('Location: index.html');
endif;
?>
<!DOCTYPE html>
<html>
<body style="background-color: #0092ef;">
<div style="width:1000px;margin:auto;height:500px;margin-top:300px;margin-left: 400px;">
    <?php

    global $connection;

    session_destroy();

    echo '<meta http-equiv="refresh" content="2;url=index.html">';

    echo'<progress max=100><strong>Progress: 60% done. </strong></progress><br>';
    echo'<span class="itext">Logging out please wait!...</span>';
    echo'<h2>Thank You For visiting our site. we hope to see you back.</h2>';
    ?>
</div>
</body>
</html>

