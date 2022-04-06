<a class=" text-light" href="<?= createLink("/") ?>">Home</a>
<br>
<br>
<?php if (!isLoggedIn()) : ?>
<a class=" text-light" href="<?= createLink("/login") ?>">Login</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/signup") ?>">Register</a>
<br>
<br>
<?php endif;
if (isLoggedIn()) : ?>
<a class=" text-light" href="<?= createLink("/appointment") ?>">Appointment</a>
<br>
<br>
<a class=" text-light" href="<?= createLink("/logout") ?>">Logout</a>
<br>
<br>
<?php endif; 
echo currentUserRef();
?>
<br>
<br>

hello world
<br>
<br>
welcom to home page !!

<br>
<br>
<?php


?>