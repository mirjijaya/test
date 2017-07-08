<!--
Description:   load_hosp_list file will generet the select option for hospital name and location which are exists in the database

-->
<?php

$hidden_id=$_GET["hidden_id"];
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hospital";
	//Connect to MySQL Server
$con=mysqli_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysqli_select_db($con,$dbname) or die(mysql_error());

if($hidden_id=="Enter Hospital Name")
{
 $query = "SELECT DISTINCT  Hospital_Name FROM doctor";
 
 $result= mysqli_query($con, $query);
 $display_string ="<select id='hospital_list'>";
 
 while($row= mysqli_fetch_array($result))
{ 
     $display_string .= "<option>$row[Hospital_Name]</option>";
 }
$display_string .="</select>";
echo $display_string;
}
else if($hidden_id=="Enter Location")
{
    $query = "SELECT DISTINCT Location FROM doctor";
    
 $result= mysqli_query($con, $query);
 $display_string ="<select id='hospital_list'>";
 
 while($row= mysqli_fetch_array($result))
{ 
     $display_string .= "<option>$row[Location]</option>";
	
 }
$display_string .="</select>";
echo $display_string;
} 
?>