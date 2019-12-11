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
            <h1>Best cities for retirees</h1>
            <p> It’s that time of year when magazines and TV news shows serve up their “New Year, New You!” reinvention advice. 
                But how about New Year, New Country? If you’re contemplating retiring abroad, you’ll want to know the Top 10 places 
                just recommended by International Living and Live and Invest Overseas, two experts on the subject.
            </p>
            <img class="retire1" src="images/rest_retire.png" atl="Rest your Retirement"/>
            <p>Their choices are starkly different.</p>
            <p>International Living (IL) ranks Panama as No. 1 and its Top 10 tilts toward countries in Central America and South America.</p>
            <p>Live and Invest Overseas, which selects cities and regions rather than countries, cites the beachy, peachy Algarve region of 
                Portugal as No. 1 (Portugal was the highest ranked European nation on the IL list, at No. 7). The Live and Invest Top 10 leans 
                Pisa-style: European. I’d venture to say many of the Live and Invest Overseas places are ones you don’t know and maybe don’t 
                know how to pronounce; I confess that was the case for me.
            </p>
            

           
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

<?php include "includes/footer.php";?>
