<?php 

session_start();
include('config.php');




//Inicialize variables

$FirstName = '';
$LastName = '';
$UserName = '';
$Email = '';
$errors = array();

// Connect tot he DB

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Register our users


if(isset($_POST['reg_user'])){

    //We are goingto received input values from our form

    $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
    $Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);

    //form validation  - verify is fill ed out

    //array push

    
    if(empty($LastName)){
        array_push($errors,'First Name is Required');
    }

    if(empty($FirstName)){
        array_push($errors,'Last Name is Required');
    }

    if(empty($UserName)){
        array_push($errors,'User Name is Required');
    }

    if(empty($Email)){
        array_push($errors,'Email is Required');
    }

    if(empty($Password_1)){
        array_push($errors,'Password is Required');
    }

    if(empty($Email)){
        array_push($errors,'Email is Required');
    }

    //Passwords should be indentical 



    if($Password_1 != $Password_2){
        array_push($errors,'Password Confirmation is not equal');
        
    }

    //we check is the user exist already in out DB


    $user_check_query = "SELECT * FROM users WHERE username = '$UserName' OR email='$Email' LIMIT 1 ";

    $result = mysqli_query($db, $user_check_query);
    $user =  mysqli_fetch_assoc($result);

    if($user){
        if($user['username'] == $UserName){
            array_push($errors,'User already exists');
        }

        if($user['email'] == $Email){
            array_push($errors,'The email already exists');
        }
    } //user end if

    if(count($errors) == 0){
        $Password = md5($Password_1);

        $query = "INSERT INTO users (user_firstname, user_lastname, username, email, password)
        VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";

        //echo $query;

        mysqli_query($db, $query);

        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = 'You are logged in!';

        header('Location: index.php' );
    }

   

}

//login page Monday

if(isset($_POST['login_user'])){

    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password_log']);

    echo "Password es:" . $_POST['Password_log'];
    echo "User es:" . $_POST['UserName'];

    if(empty($UserName)){
        array_push($errors,'User Name is Required');
    }

    if(empty($Password)){
        array_push($errors,'Password is Required');
    }

    //if we dont have errors, then we can start the connection to the DB


    if(count($errors) == 0){

        //preguntar a Olga porque no sirve la variable Password.

        $Password = md5($Password);

        $query = "SELECT * FROM users WHERE username = '$UserName' AND password='$Password'";


        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1){
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = 'You are logged in!';

            header('Location: index.php' );
        }
        else{
            array_push($errors,'User Not Found, Please check the UserName or Password');
        }


    }

}// END LOGIN IF

?>