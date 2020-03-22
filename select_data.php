<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
		$server='localhost';
		$username='root';
		$password='';
		$dbname='qassim';
		$link=mysqli_connect($server,$username,$password,$dbname);
		if(!$link)
		{
			die('faild to connect database:'.mysqli_connect_error());
		}
		
		$Name=$_POST['name'];
		//hacker dar jonno code,,amr website hack thaka dura thakun..
		$Name=mysqli_real_escape_string($link,$Name);
		
		
		$sql="SELECT * FROM student WHERE first_name= '$Name'";
		if($result=mysqli_query($link,$sql))
		{
			if(mysqli_num_rows($result)>0){
				
				echo "<table border=1;>";
				echo "<tr>";
					echo "<th>id</th>";
					echo "<th>first_name</th>";
					echo "<th>last_name</th>";
					echo "<th>Email</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['first_name'] . "</td>";
					echo "<td>" . $row['last_name'] . "</td>";
					echo "<td>" . $row['Email'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";
				
			}else{
				echo'0 result';
			}
		}else{
			echo'faild to select data:'.$sql.'<br/>'.mysqli_error($link);
		}
		mysqli_close($link);
		?>
	
	
	
</body>
</html>