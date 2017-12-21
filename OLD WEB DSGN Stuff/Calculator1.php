<!-Calculator1.php>
<html>

	<title>Calculator1</title>
	
	<body>
	
		<center>
		<h1>A Simple Calculator</h1>
		
		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(!empty($_POST['num1']))
			$num1 = $_POST['num1'];
		else
			$error[] = "num1 is not entered.";
		if(!empty($_POST['num2']))
			$num2 = $_POST['num2'];
		else
			$error[] = "num2 is not entered.";
		if(!empty($error))
			foreach($error as $msg) { 
				echo $msg;
				echo '<br>';
				}
		$op = $_POST['op'];
		
		if($op == '+')
			$result = $num1 + $num2;
		else if($op == '-')
			$result = $num1 - $num2;
		else if($op == '*')
			$result = $num1 * $num2;
		else if($op == '/')
			$result = $num1 / $num2;
		}
		?>
		<br>
		<br>
		<form action="", method= "post">
			<input type= "number" name= "num1" value = <?php if(isset($_POST['num1'])) echo $num1;
				else echo rand(1,30);
				 ?>>
			<br><br> 
			<p>
				<select name = "op">
					<option value = "+"> + </option>
					<option value = "-"> - </option>
					<option value = "*"> * </option>
					<option value = "/"> / </option>
				</select>
			</p>
			<br><br>
			<input type= "number" name= "num2" value = <?php if(isset($_POST['num2'])) echo $num2 ?>>
			<br>
			<br>
			<p> = </p>
			<input value = <?php if(isset($_POST['num1'])) echo $result ?>>
			<br>
			<br>
			<input type= "submit" value= "Submit">
			</center>
		</form>
		
	</body>
	
</html>