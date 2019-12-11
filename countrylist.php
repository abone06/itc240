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
           <table>
               
<?php 
//------------- Connect to the DB ------------

$country_data = "SELECT * FROM country_to_retire";
$data_by_country = mysqli_query($db, $country_data);

if(mysqli_num_rows($data_by_country) > 0 ) {

    while($dataCountry = mysqli_fetch_assoc($data_by_country)){

        $countryListNameDB = $dataCountry['country_name'];
        if($dataCountry['country_name'] == "CostaRica")
        $countryListName = "Costa Rica";
        elseif($dataCountry['country_name'] == "UnitedKingdom")
        $countryListName = "United Kingdom";
        else
        $countryListName =$dataCountry['country_name'];

        switch ($dataCountry['country_rank']) {
            case '1':
                $rankList = 'First Place';
                break;

            case '2':
                $rankList = 'Second Place';
                break;
            
            case '3':
                $rankList = 'Third Place';
                break;
            
            case '4':
                $rankList = 'Fourth Place';
                break;

            case '5':
                $rankList = 'Fifth Place';
                break;
            
            case '6':
                $rankList = 'Sixth Place';
                break;

            case '7':
                $rankList = 'Seventh Place';
                break;

            case '8':
                $rankList = 'Eight Place';
                break;
            
            case '9':
                $rankList = 'Nineth Place';
                break;

            case '10':
                $rankList = 'Tenth Place';
                break;
            
            default:
                $rankList = 'TBD';
                break;
        }

        echo '<tr>';
        echo '<td><img class="countrySummary" src="images/'. $countryListNameDB . '-summary.png" alt="' . $countryListNameDB.' Summary" /></td>';
        echo '<td>'.$countryListName.'</td>';
        echo '<td>'. $rankList.'</td>';
        echo '<td><a>More Information...</a></td>';
        echo '</tr>';
        
    }

}

@mysqli_free_result($data_by_username);

//Close the Connection
@mysqli_close($iConn);


//--------------------------------------------

?>
                   
               
            </table>
           
       </main>
       <aside>

       </aside>

<?php include("includes/footer.php");?>