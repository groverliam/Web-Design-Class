<html>
	<head>
		<title>Calculator</title>
	</head>
	
	<body>
		<h1><center>A Simple Calculator</center></h1>
		<br>
		<br>
		
		<?php
			//produce a drop-down menu (HTML SELECT Tag)
			function dropdown($array, $name, $value){
				// $array -- array name
				// $name -- the field name
				echo '<select name='.$name.'>';
					
				foreach($array as $ar){
					echo '<option value="'.$ar.'"';
					if($ar == $value) echo 'selected="selected"';
							echo '>' .$ar.'</option>';
				}
				
				echo '</select>';							
			}
			?>
		
		<?php	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {		
				$num2 = $_POST['num2'];
				$op	= $_POST['op'];
				
				$error = array();
				
				if (!empty($_POST['num1']))
					$num1 = $_POST['num1'];
				else
					$error[] = "num1 is not entered.";
					
				if (!empty($_POST['num2']))
					$num2 = $_POST['num2'];
				else
					$error[] = "num2 is not entered.";		
					
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
			
			<?php
				$operator = array("+", "-", "*", "/");
				
				dropdown($operator, "op", $_POST['op']);  //rop-down menu. Approach 3.
				
				/* drop-down menu. Approach 2.
				echo '<select name = "op">';
				foreach($operator as $e){
					echo '<option value = "'.$e.'"';
					if(isset($_POST['op']) && ($op == $e)) echo 'selected="selected"';
					echo '>'.$e;
					echo '</option>';
				}
						
				echo '</select>';
				*/		
			?>
	
			<!-- drop-down menu. Approach 1.
			<select name = "op">
				<option value = "+" 
					<?php if(isset($_POST['op']) && ($op == "+")) echo 'selected="selected"' ?> 
					>+ 
				</option>
				<option value = "-"
					<?php if(isset($_POST['op']) && ($op == "-")) echo 'selected="selected"' ?> 
					>-
				</option>
				<option value = "*"
					<?php if(isset($_POST['op']) && ($op == "*")) echo 'selected="selected"' ?> 
					> * </option>	
				<option value = "/"
					<?php if(isset($_POST['op']) && ($op == "/")) echo 'selected="selected"' ?> 
					> / </option>
			</select>	
			-->	
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
			
		