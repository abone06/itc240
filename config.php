<?php
// my config file

ob_start();//prevent headers errors
define('DEBUG', 'TRUE'); // WE WANT TO SEE THE ERRORS WITH TRUE --> FALSE DO NOT DISPLAY THE ERRORS
include('credentials.php'); 


function myerror($myFile, $myLine, $errorMsg)
{
if(defined('DEBUG') && DEBUG)
{
echo"Error in file: <b>".$myFile."</b> on line: <b>".$myLine."</b><br />";
echo"Error Message: <b>".$errorMsg."</b><br />";
die();
}else{
        echo "I'm sorry, we have encountered an error. ";
        die();
}
}

?>