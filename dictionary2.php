<!DOCTYPE html>
<head>
</head>
<body>
<?php
$word=$_POST['word'];
$meaning=$_POST['meaning'];
$word1=$_POST['word1'];
$word2=$_POST['word2'];
$word3=$_POST['show'];
$word4=$_POST['letter'];

$dbc=mysqli_connect("localhost","root","9891266117","dictionary")
or die("error connecting");

if($word)
{

$query="insert into words(Word,Meaning) values('$word','$meaning')";
$result=mysqli_query($dbc,$query)
or die("error querring");
echo "$word has been added";

}

else if($word1)
{
echo '<table>';

$query="select*from words where Word='$word1'";
$result=mysqli_query($dbc,$query)
or die("error querring");
while($row=mysqli_fetch_array($result))
{
echo "<tr><td>";
$display=$row['Meaning'];
echo "$display";
echo "</td></tr>";
}
echo '</table>';
}
else if($word2)
{
$query="delete from words where Word='$word2'";
$result=mysqli_query($dbc,$query)
or die("error querring");
echo "$word2 has been removed";
}
else if($word3)
{
echo '<table>';

$query="select*from words";
$result=mysqli_query($dbc,$query)
or die("error querrying");
while($row=mysqli_fetch_array($result))
{
echo "<tr><td>";
$display=$row['Meaning'];
$display2=$row['Word'];
echo "$display2 : $display";
echo "</td></tr>";
}
echo '</table>';
}

else if($word4)
{
echo '<table>';

$query="select*from words where Word like '{$word4}%'";
$result=mysqli_query($dbc,$query)
or die("error querrying");
while($row=mysqli_fetch_array($result))
{
echo "<tr><td>";
$display=$row['Meaning'];
$display2=$row['Word'];
echo "$display2 : $display";
echo "</td></tr>";
}
echo '</table>';
}


mysqli_close($dbc);




?>
</body>
</html>
