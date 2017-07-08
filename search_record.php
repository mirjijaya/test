<!--
Function:   search_record file will search the records form database base
Description:This file will serach the record from the database base on following criteria
            1)Last modified date should be greater than 30 days.
            2)Order the result by hospital name.
-->
<?php

$value=$_GET["value"];
$hidden_id=$_GET["hidden_id"];


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hospital";
	//Connect to MySQL Server
$con=mysqli_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysqli_select_db($con,$dbname) or die(mysql_error());
//generet the query by  Hospital_Name
if($hidden_id=="Enter Hospital Name")
{
    $label='Hospital_Name';
    $query = "SELECT * FROM doctor where Hospital_Name='$value' and Last_Modified_date < (CURRENT_DATE()- INTERVAL 1 MONTH) ORDER BY Hospital_Name,Location";
}
//generet the query by  Location
else if($hidden_id=="Enter Location")
{
    $label='Location';
    $query = "SELECT * FROM doctor where Location='$value'and Last_Modified_date < (CURRENT_DATE()- INTERVAL 1 MONTH) ORDER BY Hospital_Name,Location";
} 


$result= mysqli_query($con, $query);

$display_string = "<table border=1 id='result_tab'>";
$display_string .= "<tr id='row'>";
$display_string .="<th>SL No</th>";
$display_string .= "<th>Doctor Name</th>";
$display_string .= "<th>Hospital Name</th>";
$display_string .= "<th>Qualification</th>";
$display_string .= "<th>Location</th>";
$display_string .= "<th>Last Update Date(yyyy-mm-dd)</th>";
$display_string .= "</tr>";
$count=1;
while($row= mysqli_fetch_array($result))
{
    $display_string .= "<tr id='row'>";
    $display_string .="<td id='data'>$count</td>";
    $count=$count+1;
    $display_string .= "<td id='data'>$row[Doctor_Name]</td>";
	$display_string .= "<td id='data'>$row[Hospital_Name]</td>";
	$display_string .= "<td id='data'>$row[Qualification]</td>";        
	$display_string .= "<td id='data'>$row[Location]</td>";
        $display_string .= "<td id='data'>$row[Last_Modified_date]</td>";
	$display_string .= "</tr>";
        
        if($count>150)
        {
            break;
        }
}
    $display_string .= "</table>";
echo $display_string;

?>