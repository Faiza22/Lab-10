<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<style>
p, div {
	font-family: 'Raleway', sans-serif;
}

.container {
	margin: 50px 10% 50px 10%;
	background: white;
	border: 1px solid #ccc;
	border-radius: 5px;
	padding: 30px;
}

body {
	background: #ececec;
}
</style>
</head>
<body> 
<?php
$name = "";
$str = file_get_contents('dictionary.json');
$json = json_decode($str, true);

?>
<div class="container">
<center><h1>Digital Dictionary</h1></center>
<br>
<center><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Enter Word: <input type="text" name="name" value="<?php echo $name;?>">
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form></center>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$name = strtoupper($_POST["name"]); 	 
  
	echo "<h2>Results:</h2>";
	$found=false;
	foreach( $json as $k=>$v )
	{
		$word=strchr($k,$name);
		echo "<p style='font-weight:bold'>$word</p>";
		
		if(isset($json[$word])) {
			echo $json[$word];
			$found=true;	}
	}
	
	if(!$found)
		echo "Word not found";
}	
?>
</div>
</body>
</html>






