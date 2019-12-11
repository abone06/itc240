<?php 
// LOG IN INDEX.PHP

session_start();

if(!isset($_SESSION['UserName'])){
    $_SESSION['msg'] = "You must log in first";

    header('Location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);

    header('Location: login.php');
}

include('includes/header.php');
?>


        <main>
            <h1>Thank you for submitting your form</h1>
            <p>We have received you form and we will send you an email as soon as we can. We will review the information, and in case we need more details we will send an email to your
            email. Please review your junk mail if you havent received an email in between 72 hours.</p>
        </main>
        <aside>
            <img class="thanks" src="images/thank-you.png" alt="thank you"/>
        </aside>

<?php include("includes/footer.php");?>