<?php

//reigster page

//Form here
include('server.php');
include('includes/header.php');

?>

<h2>Register</h2>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>First Name: </label>
<input type="text" name="FirstName" value="<?php echo htmlspecialchars($_POST['FirstName']);?>"> <br><br>

<label>Last Name: </label>
<input type="text" name="LastName" value="<?php echo htmlspecialchars($_POST['LastName']);?>"> <br><br>

<label>User Name: </label>
<input type="text" name="UserName" value="<?php echo htmlspecialchars($_POST['UserName']);?>"> <br><br>

<label>Email: </label>
<input type="email" name="Email" value="<?php echo htmlspecialchars($_POST['Email']);?>"> <br><br>

<label>Password: </label>
<input type="password" name="Password_1"> <br><br>

<label>Confirm Password: </label>
<input type="password" name="Password_2"> <br><br>

<?php 
include('errors.php'); 
?>

<button type="submit" class="btn" name="reg_user" >Register</button><br><br>

</fieldset>
</form>

<p class="center_italic"> Already a Member? <a href="login.php" > Sign in!</a></p>



<?php 

include('includes/footer.php');

?>