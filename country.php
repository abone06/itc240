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

// ----------  Logic of the Country Page ---------------

if(isset($_GET['country'])){
    $country = $_GET['country'];
}
else{
    $country = "Panama";

}

include('server.php');
include('includes/header.php');

//------------- Connect to the DB ------------

$country_data = "SELECT * FROM country_to_retire WHERE country_name = '$headerBackground' LIMIT 1 ";
$data_by_country = mysqli_query($db, $country_data);
$dataCountry = mysqli_fetch_assoc($data_by_country);

if(mysqli_num_rows($data_by_country) == 1 ) {

    $costOfLiving = $dataCountry['country_cost_of_living'];
    $rank = '';

    switch($dataCountry['country_rank']){

        case 1:
            $rank = "First Place to retire.";
        break;
        case 2:
            $rank = "Second Place to retire.";
        break;
        case 3:
            $rank = "Third Place to retire.";
        break;
        case 4:
            $rank = "Fourth Place to retire.";
        break;
        case 5:
            $rank = "Fifth Place to retire.";
        break;
        case 6:
            $rank = "Sixth Place to retire.";
        break;
        case 7:
            $rank = "Seventh Place to retire.";
        break;
        case 8:
            $rank = "Eighth Place to retire.";
        break;
        case 9:
            $rank = "Nineth Place to retire.";
        break;
        case 10:
            $rank = "Tenth Place to retire.";
        break;

    }

    $countryDescription = $dataCountry['country_description'] ;
    $countryDescription2 = $dataCountry['country_description2'] ;

    
}

@mysqli_free_result($data_by_username);

//Close the Connection
@mysqli_close($iConn);


//--------------------------------------------

?>

    <main>
        <h1><?php echo $headerCountry; ?></h2>
        <img class="countrySummary" src="images/<?php echo $headerBackground . '-summary.png'; ?>" alt="<?php echo $headerCountry; ?> Summary" />
        <ul class="summary-list">
            <li><strong>Country:</strong><?php echo $headerCountry; ?></li>
            <li><strong>Rank: </strong> <?php echo $rank; ?> </li> 
            <li><strong>Cost of Living:</strong> <?php echo $costOfLiving; ?></li>
        </ul>
        <p class="description"><?php echo $countryDescription; ?></p>
        <p><?php echo $countryDescription2; ?></p>
    </main>

    <aside>
    <h3>The International Living Top 10 for 2019</h3>
            <ol>
                <li class="top-cities"><a href="country.php?country=Panama">Panama</a></li>
                <li class="top-cities"><a href="country.php?country=CostaRica">Costa Rica</a></li>
                <li class="top-cities"><a href="country.php?country=Mexico">Mexico</a></li>
                <li class="top-cities"><a href="country.php?country=Ecuador">Ecuador</a></li>
                <li class="top-cities"><a href="country.php?country=Malaysia">Malaysia</a></li>
                <li class="top-cities"><a href="country.php?country=Japan">Japan</a></li>
                <li class="top-cities"><a href="country.php?country=Canada">Canada</a></li>
                <li class="top-cities"><a href="country.php?country=Thailand">Thailand</a></li>
                <li class="top-cities"><a href="country.php?country=Germany">Germany</a></li>
                <li class="top-cities"><a href="country.php?country=UnitedKingdom">United Kingdom</a></li>
            </ol>
    </aside>
<?php include("includes/footer.php");?>