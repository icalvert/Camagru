<?php
    include_once 'header.php';
    require_once "config/database.php";
    session_start();
        
    $email = $_GET['email'];
    $reset = $_GET['reset'];

    $query = "SELECT email, reset from users WHERE email='$email' AND reset='$reset'";
    $okay = $connection->prepare($query);
    $okay->execute();
    $yeah = $okay->rowCount();
    if($okay > 0){
        echo '<section class="main-container">
    <div class="main-wrapper">
        <h2>Set new password</h2>
        <form class="signup-form" action="reset.php" method="POST">
            <input type="password" name="newpwd" placeholder="Enter new password">
            <input type="password" name="cnfrmpwd" placeholder="Confirm password">
            <button type="submit" name="confirm">Reset password</button>
        </form>
    </div>
</section>';
    } else {
        echo "You are not authorised to access this site.";
    }
?>

<?php
    if (isset($_POST['confirm'])){
        require_once 'config/database.php';

        $newpwd = $_POST['newpwd'];
        $cnfrmpwd = $_POST['cnfrmpwd'];

        if ($newpwd == "" || $cnfrmpwd == ""){
            echo "Fields are empty";
        }
        if ($newpwd != $cnfrmpwd){
            echo "Passwords do not match\n";
        } elseif(strlen($newpwd) < 5)
            echo "Password must have at least 5 characters\n";
        if (!preg_match("#[0-9]+#",$newpwd))
             echo "Password must have at least 1 number\n";
        if (!preg_match("#[a-z]+#",$newpwd))
             echo "Password must have at least 1 lowercase letter\n";
        if (!preg_match("#[A-Z]+#",$newpwd))
            echo "Password must contain at least 1 uppercase letter\n";
        
        else {
            try {
                    $connection->beginTransaction();
        
                    $sql = "UPDATE `users` SET password='$newpwd' WHERE email='$email'";
                    $okay = $connection->prepare($sql);
                    $okay->execute();
                    header("Location:signup.php");
        
                    $connection->commit();
        
                }
                catch(PDOException $e)
                {
                    echo $sql . "\n" . $e->getMessage();
                }

            }
        }




?>



    
    
    
