<?php
session_start();
     include_once 'header.php';
     echo $_SESSION['email'];
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Update profile</h2>
        <form class="signup-form" action="updating.inc.php" method="POST">
            <h1>Update username</h1>
            <input type="text" name="newuid" placeholder="New username">
            <input type="password" name="pwd" placeholder="Enter password">
            <button type="submit" name="updateuid">Update username</button>
        </form>
        <form class="signup-form" action="updating.inc.php" method="POST">
            <h1>Update password</h1>
            <input type="password" name="updatepwd" placeholder="New password">
            <input type="password" name="pwd" placeholder="Enter password">
            <button type="submit" name="updatepass">Update password</button>
        </form>
        <form class="signup-form" action="updating.inc.php" method="POST">
            <h1>Update email</h1>
            <input type="text" name="newemail" placeholder="New email">
            <input type="password" name="pwd" placeholder="Enter password">
            <button type="submit" name="updateemail">Update email</button>
            <br>
        </form>
            <form action="updating.inc.php" method="POST">
            <input type="checkbox" name="noti" value="noti"> Enable email notifications<br>
            <input type="submit" name = "save_changes" value="Submit">
            </form>
    </div>
</section>

<?php
    include_once 'footer.php';
?>