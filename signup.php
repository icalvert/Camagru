<?php
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Sign up</h2>
        <form class="signup-form" action="signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="Enter password">
            <button type="submit" name="submit">Sign up</button>
            <br>
            <button type="submit" name="resetbtn">Forgot password</button>
        </form>
    </div>
</section>

<?php
    include_once 'footer.php';
?>
