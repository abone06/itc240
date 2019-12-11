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

include('server.php');
include("includes/header.php");

?>

        <main>
           
           <h1>About Page</h1>
           <p>Thanks for checking my work. In case you need some suggestions send an email to contactus@seattlecolleges.com</p>
       </main>
       <aside>
           <h2>Contact me</h2>
           <ul>
               <li>contactus@seattlecolleges.com</li>
               <li>Phone: 206 1111 222</li>
           </ul>
       </aside>
<?php include("includes/footer.php");?>