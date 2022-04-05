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
// function generateRandomString($length = 10) {
//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

// $s = generateRandomString();

// echo generateRandomString();

?>