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
include('includes/header.php');


// --------------------Logic of the Form---------------------

$name = $email = $gender = $comments = $palce = $phone = $age = '';
$privacy = 'uncheked';
$nameErr = $emailErr = $genderErr = $commentsErr = $placeErr = $phoneErr = $privacyErr = $ageErr = '';


//Getting data from the server because if its there is because is looger and
//registrated 

$uname = $_SESSION['UserName'];

$user_data = "SELECT * FROM users WHERE username = '$uname' LIMIT 1 ";
$data_by_username = mysqli_query($db, $user_data);
$dataUser = mysqli_fetch_assoc($data_by_username);


if(mysqli_num_rows($data_by_username) == 1 ) {

    $name = $dataUser['user_firstname'] . " " . $dataUser['user_lastname'] ;
    $email = $dataUser['email'];
    
}

@mysqli_free_result($data_by_username);

//Close the Connection
@mysqli_close($iConn);

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    if(empty($_POST['name']) ) {
        $nameErr = 'Please fill out your name';
        } else {
        $name = $_POST['name'];
        }
        
        if(empty($_POST['email']) ) {
        $emailErr = 'Please fill out your email';
        } else {
        $email = $_POST['email'];
        }
        
        
        if(empty($_POST['gender']) ) {
        $genderErr = 'Please fill  your gender';
        } else {
        $gender = $_POST['gender'];
        }
        
        
        if(empty($_POST['place']) ) {
        $placeErr = 'Please select  your favorite place to live';
        } else {
        $place = $_POST['place'];
        }

        if(empty($_POST['age'])|| $_POST['age'] == "NULL" ){
            $ageErr = "Please select your range of age.";
            }
            else{
                $age = $_POST['age'];
            }

        if(empty($_POST['privacy']) ) {
            $privacyErr = 'You need to accept the privacy option in order to continue.';
            } else {
            $privacy = 'checked';
            }

        if(empty($_POST['phone'])) {  // if empty, type in your number
            $phoneErr = 'Your phone number please!';
            } elseif(array_key_exists('phone', $_POST)){
            if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
            { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
            $phoneErr = 'Invalid format!';
            } else{
            $phone = $_POST['phone'];
            }
            }
        
        
 
if(isset($_POST['name'],
$_POST['email'],
$_POST['gender'],
$_POST['place'],
$_POST['age'],
$_POST['privacy'] ) && $_POST['age'] != "NULL" ) {

$comments = $_POST['comments']; 
 
$male = 'uncheked';
$female = 'uncheked';
 
if($gender == 'male') {
    $male = 'checked'; 
} elseif 
($gender == 'female')
{
$female = 'checked'; 
}

$moreinfo ='';

foreach( $_POST['place'] as $palce_r => $value){
    if($value == 'ca'){
        $country .="Canada,";
        $moreinfo .= "Canadian seniors are generally more satisfied with their lives than those in younger age groups. Older Canadians are especially appreciative of their safety, the quality of their local environment and their personal relationships, but are generally less satisfied with their health, according to a Statistics Canada report. However, life satisfaction among Canadians also varies by metro area and ranges from 7.8 out of 10 in Vancouver, Toronto and Windsor, to 8.2 in St. John’s, Trois-Rivières and Saguenay, according to a Statistics Canada analysis of Canadian Community Health Survey and General Social Survey data about average life satisfaction from 2009 to 2013.\n\n";
    }

    if($value == 'cr'){
        $country .="Costa Rica,";
        $moreinfo .= "COSTA RICA'S REMOTE beaches and dense jungles are both beautiful and exotic. You can hike a volcano, visit a cloud forest, relax in thermal waters and snorkel through new worlds beneath the sea. Costa Rica's cost of living can feel very affordable to retirees relocating from the U.S. This country has been a popular place to retire overseas for over 40 years.\n\n";
    }
     
    if($value == 'ec'){
        $country .="Ecuador,";
        $moreinfo .= "Ecuador continues to land on International Living’s top ten list for best retirement destinations worldwide. Expats looking for affordable housing, quality medical care, and rich cultural history flock not only to the high Sierran city of Cuenca, but also to small towns dotting the mainland from the Amazon Basin to the Pacific Coast; for example, Canoa.- Beach lovers with a penchant for a low-key, relaxed atmosphere will love Canoa. Although the isolated fishing village is not for everyone, larger towns like San Vicente or Bahia de Caraquez are a short bus ride away. Sports enthusiasts will love the opportunities to surf, paddleboard, kitesurf, and parasail, while those very same activities make Canoa ripe for investment and signal growth in the decades to come.\n\n";
    }

    if($value == 'gr'){
        $country .="Germany,";
        $moreinfo .= "If you want to retire in Germany as an American, you won’t be alone. A New York Times article cites figures ranking Germany fourth in the world for the number of Americans who retire there. Out of the 373,224 retired Americans living abroad in 2013, 24,499 chose to move to Germany. \n\n";
    }
     
    if($value == 'jp'){
        $country .= "Japan,";
        $moreinfo .= "Japan – the Land of the Rising Sun – is an archipelago of nearly 7,000 islands located in East Asia between the Pacific Ocean and the Sea of Japan. The island nation has long been a popular with tourists due to its scenic beauty, natural hot springs (called onsen), artistic cuisine, traditional culture and 18 World Heritage Sites, including Himeji-jo Castle and the Historic Monuments of Ancient Kyoto.\n\n";
    }

    if($value == 'my'){
        $country .= "Malaysia,";
        $moreinfo .= "Malaysia’s vast tropical jungles are becoming a big tourist draw, but Western expats cluster in its two biggest cities: Kuala Lumpur and George Town, both on the West Coast of Peninsular Malaysia. George Town is an island city just across a channel from the mainland. Malaysia’s capital city, Kuala Lumpur, is to the south, just 200 or so miles from Singapore, its rival as the hottest-growing city in Southeast Asia.\n\n";
    }

    if($value == 'mx'){
        $country .= "Mexico,";
        $moreinfo .= "MORE AMERICANS HAVE retired abroad in Mexico than any other country. The low cost of living, sunshine, accessibility, established expat communities and diversity of lifestyle options draw many retirees south of the border.From relaxing beach towns to cosmopolitan cities, the challenge is deciding where to retire in Mexico. Consider these potential retirement spots in Mexico where you can seek adventure overseas, but don't have to give up all the comforts of home.\n\n";
    }

    if($value == 'pa'){
        $country .= "Panama,";
        $moreinfo .= "Panama is one of the world’s top retirement destinations. In this country, you have three dramatically different retirement lifestyle options to choose among: cosmopolitan cities, beautiful beachfront towns and cooler mountain climes. There are appealing retirement spots for retirees on strict budgets as well as upscale amenities for those whose retirement resources stretch a little further.\n\n";
    }

    if($value == 'tl'){
        $country .= "Thailand,";
        $moreinfo .= "Known for its white sand beaches, crystal clear water and beautiful climate, plus its ruins of ancient kingdoms, many present-day temples and, of course, Thai cuisine, Thailand offers a mix of everything from vibrant cosmopolitan cities to quiet waterside towns. Over the years, Thailand has turned into a popular destination for expats in search of a change of scenery, new cultural experiences, affordable health care, possible tax benefits and a lower cost of living during retirement.\n\n";
    }

    if($value == 'uk'){
        $country .= "United Kingdom,";
        $moreinfo .= "Plymouth, Devon is the most desirable city in Britain for retirees due to its affordable homes and plentiful parks and churches, new research reveals. Plymouth's top offering is its large number of religious centres – but with a significant selection of parks, affordable homes, and proximity to the sea, it has a lot to offer anyone.\n\n";
    }

    if($value == 'oth'){
        $country .= "others country not listed in the site are not ranked as the best place to retire,";
    }

}

 
$to = 'bone.cruz@seattlecolleges.edu; szemetylo@seattlecolleges.edu; szemeo@mystudentswa.com';
$subject = 'Thanks for Contacting us - Reviewing Email' .date("m/d/y");
$body = 'Thank you '.$name. ' for submitting the form' .PHP_EOL.'';
$body .= "We understand that you are interested in: \n".$country.' and we will be sending youmore information.' .PHP_EOL.'';
$body .= 'Please review the Following data: ' .$moreinfo .PHP_EOL.'';
$headers = array(
    'From' => 'no-reply@mystswa.com',
    'Reply-to' => ''.$email.'');
mail($to, $subject, $body, $headers); 

header('Location: thx.php');
 
} // endisset
 
 
} // end server request

?>
        <main>
            <h2>Send us your Information to know you...</h2>
            <form class ="contact-form" action="contact.php" method="post">
                <fieldset>
                    <label>Name</label><br>
                    <input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo htmlspecialchars($_POST['name']);} else {echo $name;}   ?>" ><br>
                    <span class="error" style="color:red;"><?php echo $nameErr; ?></span><br>

                    <label>Email</label> <br>
                    <input type="email" name="email"  value="<?php if(isset($_POST['email'])) {echo htmlspecialchars($_POST['email']);} else{echo $email;}   ?>" ><br>
                    <span class="error" style="color:red;"><?php echo $emailErr; ?></span><br>

                    <label>Phone</label> <br>
                    <input type="text" name="phone" placeholder="xxx-xxx-xxxx"  value="<?php if(isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']);   ?>" ><br>
                    <span class="error" style="color:red;"><?php echo $phoneErr; ?></span><br>

                    <label>Gender</label><br>
                    <ul class="place-gender">
                    <li><input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female' ) echo 'checked = "checked"'; ?>>Female</li>
                    <li><input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male' ) echo 'checked = "checked"'; ?>>Male</li>
                    </ul>
                    <span class="error" style="color:red;"><?php echo $genderErr; ?></span><br>
                    <label>Favorite Place to live </label>
                    <ul class="place-form">
                    <li><input type="checkbox" name="place[]" value="ca" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'ca') echo 'checked = "checked"'; }} ?>>Canada</li>
                    <li><input type="checkbox" name="place[]" value="cr" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'cr') echo 'checked = "checked"'; }} ?>>Costa Rica</li>
                    <li><input type="checkbox" name="place[]" value="ec" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'ec') echo 'checked = "checked"'; }} ?>>Ecuador</li>
                    <li><input type="checkbox" name="place[]" value="gr" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'gr') echo 'checked = "checked"'; }} ?>>Germany</li>
                    <li><input type="checkbox" name="place[]" value="jp" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'jp') echo 'checked = "checked"'; }} ?>>Japan</li>
                    <li><input type="checkbox" name="place[]" value="my" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'my') echo 'checked = "checked"'; }} ?>>Malaysia</li>
                    <li><input type="checkbox" name="place[]" value="mx" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'mx') echo 'checked = "checked"'; }} ?>>Mexico</li>
                    <li><input type="checkbox" name="place[]" value="pa" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'pa') echo 'checked = "checked"'; }} ?>>Panama</li>
                    <li><input type="checkbox" name="place[]" value="tl" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'tl') echo 'checked = "checked"'; }} ?>>Thailand</li>
                    <li><input type="checkbox" name="place[]" value="uk" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'uk') echo 'checked = "checked"'; }} ?>>United Kingdom</li>
                    <li><input type="checkbox" name="place[]" value="oth" <?php if(isset($_POST['place'])) { foreach( $_POST['place'] as $palce => $value){ if($value == 'oth') echo 'checked = "checked"'; }} ?>>Other</li>
                    </ul>
                    <span class="error" style="color:red;"><?php echo $placeErr; ?></span><br>

                    <label>Your age are around:</label>
                    <select name="age">
                        <option value="NULL" <?php if(isset($_POST['age']) && $_POST['age'] == "NULL" ) 
                        { echo 'selected = unselected'; } ?>>Select One</option>
                        <option value="1" <?php if(isset($_POST['age']) && $_POST['age'] == "1" ) 
                        { echo 'selected = selected'; } ?>>18 years - 50 years</option>
                        <option value="2" <?php if(isset($_POST['age']) && $_POST['age'] == "2" ) 
                        { echo 'selected = selected'; } ?>>51 years - 60 years</option>
                        <option value="3" <?php if(isset($_POST['age']) && $_POST['age'] == "3" ) 
                        { echo 'selected = selected'; } ?>>61 years - 70 years</option>
                        <option value="4" <?php if(isset($_POST['age']) && $_POST['age'] == "4" ) 
                        { echo 'selected = selected'; } ?>>71 years - 80 years</option>
                        <option value="5" <?php if(isset($_POST['age']) && $_POST['age'] == "5" ) 
                        { echo 'selected = selected'; } ?>>90 years - higher</option>
                        </select><br>
                        <span class="error" style="color:red;"><?php echo $ageErr; ?> </span><br>

                    <label>Comments</label> <br>
                    <textarea name='comments'></textarea><br>


                    <input type="checkbox" name="privacy" value="privacy" <?php if(isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ) echo 'checked = "checked"'; ?>> 
                    <label>You need to accept the Privacy policy in order to continue</label><br>
                    <span class="error" style="color:red;"><?php echo $privacyErr; ?></span><br><br>


                    <input type="submit" name="submit" value="Send it">
                    <input type="button" onclick="window.location.href ='contact.php';" value="Reset"/>
                    
                </fieldset> 
            </form>

        </main>
        <aside>

            
        </aside>

<?php include("includes/footer.php");?>
