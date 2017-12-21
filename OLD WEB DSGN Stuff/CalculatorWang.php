<html>
	<head>
		<title>Calculator</title>
	</head>
	
	<body>
		<h1><center>A Simple Calculator</center></h1>
		<br>
		<br>
		
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {					
				$error = array();
				
				if (empty($_POST['num1']))
					$error[] = "num1 is not entered.";
				else
					$num1 = $_POST['num1'];
					
				if (empty($_POST['num2']))
					$error[] = "num2 is not entered.";	
				else
					$num2 = $_POST['num2'];	
					
				if (empty($error)){  
					$op = $_POST['op'];
					
					if ($op == '+') $result = $num1 + $num2;
					elseif ($op == '-') $result = $num1 - $num2;
					elseif ($op == '*') $result = $num1 * $num2;
					else $result = $num1 / $num2;	
				}
				else {
					foreach ($error as $msg){
						echo $msg;
						echo '<br>';
					}
				}
				
			}
		?>
		
		<center>
		<form action = "" method = "post">
			<p>
			<input type = "number" name = "num1" 
				value = <?php if (isset($_POST['num1'])) echo $num1 ?>>
			</p>
			<p>
			<select name = "op">
				<option value = "+"> + </option>
				<option value = "-"> - </option>	
				<option value = "*"> * </option>	
				<option value = "/"> / </option>
			</select>		
			</p>
			<p>
			<input type = "number" name = "num2" 
				value = <?php if (isset($_POST['num2'])) echo $num2 ?>>
			</p>
			<p> = </p>
			<p>
			<input 
				value = <?php if (isset($result)) echo $result ?>>
			</p>
			<input type = "submit" value = "Calculate">
		</form>
		</center>
	</body>
</html>
			
		