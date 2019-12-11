<?php

include('server.php');
include('includes/header.php');

?>

<h2> Log in </h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <fieldset>

    <label>User Name: </label>
    <input type="text" name="UserName" value="<?php echo htmlspecialchars($UserName);?>"> <br><br>

    <label>Password: </label>
    <input type="password" name="Password_log"> <br><br>

    <?php 
    include('errors.php'); 
    ?>
    
    <button type="submit" class="btn" name="login_user" >Login</button>
    <button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' " >Reset</button><br><br>

    </fieldset>

</form>

<p class="center_italic"> Already a Member? <a href="register.php" > Sign in!</a></p>

<?php include('includes/footer.php'); ?>