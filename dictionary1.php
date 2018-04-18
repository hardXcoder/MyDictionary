<!DOCTYPE html>
<head>
<title>My Dictionary</title>
<style>
#top
{
color:black;
font-size:100px;
text-align:center;
}
#form1
{
position:absolute;
}
#form2
{
position:absolute;
top:245px;
left:500px;
}
#form3
{
position:absolute;
top:245px;
left:950px;
}
span
{
font-size:25px;
font-weight:bold;
}
#dic_img
{
position:absolute;
top:450px;
left:450px;
}
</style>


</head>
<body background="bg2.jpg">

<h1 id="top">My Dictionary</h2>
<div id="dic_img">
  <img src="img4.png" height="40%" width="40%" />
</div>
<div>
<form id="form1" method="post" action="dictionary2.php">
<label for="search"><span>Word</span></label>
<input name="word" id="search" type="text"/><br/><br/>
<label for="mean"><span>Meaning</span></label>
<input name="meaning" id="mean" type="text"/><br/><br/>
<input  type="image" src="img1.png" height="50px" width="200px"  value="ADD" name="ADD">ADD</input>
</form>
</div>
<div>
<form id="form2" method="post" action="dictionary2.php">
<label for="add"><span>Word</span></label>
<input name="word1" id="add" type="text"/><br/><br/>
<input type="image" src="img1.png" height="50px" width="200px" value="SEARCH" name="SEARCH">SEARCH</input>
</form>
</div>
<div>
<form id="form3" method="post" action="dictionary2.php">
<label for="remove"><span>Word</span></label>
<input name="word2" id="remove" type="text"/><br/><br/>
<input type="image" src="img1.png" height="50px" width="200px" value="REMOVE" name="REMOVE">REMOVE</input>
</form>
</div>


</body>
</html>
<?php
$word=$_POST['word'];
$meaning=$_POST['meaning'];
$word1=$_POST['word1'];
$word2=$_POST['word2'];

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
$query="select*from words where Word='$word1'";
$result=mysqli_query($dbc,$query)
or die("error querring");
while($row=mysqli_fetch_array($result))
{
$display=$row['Meaning'];
echo "$display";
}
}
else if($word2)
{
$query="delete from words where Word='$word2'";
$result=mysqli_query($dbc,$query)
or die("error querring");
echo "$word2 has been removed";
}

mysqli_close($dbc);




?>
