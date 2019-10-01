<?php include('db.php');

if($errors){
    foreach($errors as $error){ ?>
        <p><?php echo $error ?></p>
    <?php } ?>
<?php } ?>