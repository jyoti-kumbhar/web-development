<?php
$fname=trim($_REQUEST["fn"]);
$lname=trim($_REQUEST["ln"]);
$Age=trim($_REQUEST["Age"]);
$Hometown=trim($_REQUEST["Ht"]);
$mobno=trim($_REQUEST["mn"]);
echo "<H1> Retrieving Data from Server...<?h1>";
echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Hometown</th>
<th>Mobile Number</th>
</tr>";

echo "<tr>";
echo "<td>".$fname."</td>";
echo "<td>".$lname."</td>";
echo "<td>".$Age."</td>";
echo "<td>".$Hometown."</td>";
echo "<td>".$mobno."</td>";
echo "</tr>";
echo"</table>";
?>