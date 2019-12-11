<?php

define('THIS_PAGE', basename($SERVER['PHP_SELF']));

$nav;

function makeLinks($nav) {

    $myReturn = '';
    
    foreach($nav as $key => $value){

        $logo = 'fa fa-home'; 

        /*if($value == 'About')
        {
            $logo = 'fas fa-calendar-day'; 
            
        }*/



        if(THIS_PAGE == $key){
            $myReturn .= '<li><a class="active" href="'. $key . '"><i class="logo '.$logo .'"></i>'. $value . '</a></li>';
        }
        else{
            $myReturn .= '<li><a href="'. $key . '"><i class="logo '.$logo .'"></i>'. $value . '</a></li>';
        }
    }
    return $myReturn;
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Best Places to Retire</title>
<script src="https://use.fontawesome.com/6a71565c22.js"></script>
<?php 

$schemeday = 'css/layout.css';
$headerCountry = 'Panama';
$headerBackground ="Panama";
$headerRank ="Ranked the 1st Place to Retire";


switch($country){
    case "Panama":
        $headerBackground ="Panama";
        $headerCountry ="Panama";
        $headerRank ="Ranked the 1st Place to Retire";
    break;

    case "CostaRica":
        $headerBackground ="CostaRica";
        $headerCountry ="Costa Rica";
        $headerRank ="Ranked the Second Place to Retire";
    break;

    case "Mexico":
        $headerBackground ="Mexico";
        $headerCountry ="Mexico";
        $headerRank ="Ranked the Third Place to Retire";
    break;

    case "Ecuador":
        $headerBackground ="Ecuador";
        $headerCountry ="Ecuador";
        $headerRank ="Ranked the Fourth Place to Retire";
    break;

    case "Malaysia":
        $headerBackground ="Malaysia";
        $headerCountry ="Malaysia";
        $headerRank ="Ranked the Fifth Place to Retire";
    break;

    case "Japan":
        $headerBackground ="Japan";
        $headerCountry ="Japan";
        $headerRank ="Ranked the Sixth Place to Retire";
    break;

    case "Canada":
        $headerBackground ="Canada";
        $headerCountry ="Canada";
        $headerRank ="Ranked the Seventh Place to Retire";
    break;

    case "Thailand":
        $headerBackground ="Thailand";
        $headerCountry ="Thailand";
        $headerRank ="Ranked the Eighth Place to Retire";
    break;

    case "Germany":
        $headerBackground ="Germany";
        $headerCountry ="Germany";
        $headerRank ="Ranked the Nineth Place to Retire";
    break;

    case "UnitedKingdom":
        $headerBackground ="UnitedKingdom";
        $headerCountry ="United Kingdom";
        $headerRank ="Ranked the Tenth Place to Retire";
    break;
        

    default:
        $headerBackground ="Panama";
        $headerCountry ="Panama";
        $headerRank ="Ranked the 1st Place to Retire";

    break;
}

$nav['index.php'] = 'Home';
$nav['country.php'] = 'Retire to';
$nav['countrylist.php'] = 'Top 10';
$nav['contact.php'] = 'Contact';
$nav['about.php'] = 'About';


echo  '<link href="'. $schemeday .'" rel="stylesheet" type="text/css">'
?>

</head>

<body>
    <div class="top-container">
        <nav>
            <ul>
                <?php 
                echo makeLinks($nav);
                ?>
                <!--<li>Home</li>
                <li>Home</li>-->
            </ul>
        </nav>
        <div class="box">

        <?php 
        //notification message
        if(isset($_SESSION['success'])){

            echo $_SESSION['success'];
            unset($_SESSION['success']);

        }

        //If the user is looged
        if(isset($_SESSION['UserName'])){        
            echo '<p class="box_text">Welcome <strong> '. $_SESSION['UserName'] .'</strong></p>';
            echo '<p class="box_text"><a class="box_text" href="index.php?logout=\'1\'">Logout</a></p>';
        }
        else{
            echo '<p><a class="box_singin" href="login.php">Login</a> | <a class="box_singin" href="register.php"> Sign up</a></p>';
        }
        ?>
        </div>
    </div>
    <header class="<?php echo $headerBackground; ?>">
    <div class="banner" <?php if(isset($_SESSION['UserName'])) echo 'onclick="location.href=\'country.php?country='.$headerBackground.'\';" style="cursor:pointer;"'?>>
            <h1><?php if(isset($_SESSION['UserName'])) echo '<a href="country.php?country='.$headerBackground.'">';?><?php echo $headerCountry;?><?php if(isset($_SESSION['UserName'])) echo '</a>'; ?></h1>
            <h2><?php if(isset($_SESSION['UserName'])) echo '<a href="country.php?country='.$headerBackground.'">';?><?php echo $headerRank;?><?php if(isset($_SESSION['UserName'])) echo '</a>'; ?></h2>
            <h3><?php if(isset($_SESSION['UserName'])) echo '<a href="country.php?country='.$headerBackground.'">';?>More information...<?php if(isset($_SESSION['UserName'])) echo '</a>'; ?></h3>
        </div>
    </header>
    
    
    <div id="wrapper">
        
        