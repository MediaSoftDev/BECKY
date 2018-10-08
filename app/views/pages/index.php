<?php include ROUTE_APP . '/views/inc/header.php';?>

<h1><?= $data['title']; ?></h1>

<?php
/*TODO:     

    ** We run our array of object `users` through the method foreach

    foreach ($data['users'] as $user):       
        echo $user->name;
    endforeach;

*/
?>

<?php include ROUTE_APP . '/views/inc/footer.php';?>