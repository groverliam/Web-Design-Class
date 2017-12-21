<!DOCTYPE html>
<html>
<head>
	<title> MU Registration </title>
	<style>
		* {
   		 	box-sizing: border-box;
		}
		#container {
			max-width: 1200px;
		}
		
		.header, .footer {
    		background-color: darkblue;
    		color: white;
   			padding: 5px;
    		text-align: center;
		}
		.column {
    		float: left;
    		padding: 10px;
    		height: 600px;
		}
		.clearfix::after {
    		content: "";
    		clear: both;
    		display: table;
		}
		.menu {

    		width: 25%;
		}
		.content {
		
    		width: 50%;
    		background-color: blue;
		}
		.content2 {
    		width: 25%;
    		background-color: white;
		}
		.column2 {
    		float: left;
    		padding: 10px;
    		height: 200px;
		}
		.content3 {
		
    		width: 50%;
    		background-color: black;
		}
		.content4 {
    		width: 50%;
    		background-color: pink;
		}

		.menu ul {
    		list-style-type: none;
    		margin: 0;
    		padding: 0;
		}
		.menu li {
    		padding: 8px;
    		margin-bottom: 8px;
    		background-color: darkblue;
    		color: #ffffff;
		}
		.menu li:hover {
    		background-color: #0099cc;
		}
		a {
			color: white;
		}

	</style>
</head>
<body>
<div id = "container">
<div class="header">
	<h1>Monmouth University Class Registration System</h1>
</div>

<div class="clearfix">
	<div class="column menu">
    	<ul>
      		<li>View Classes</li>
      		<li>Students</li>
      		<li>Faculty</li>
    		<li><a href="login.php">Log in</a></li>
      		<li>About</li>
    	</ul>
  	</div>

  	<div class="column content">

  	</div>
  	

  	<div class="column content2">
  	<center><p> APPLES </p></center>
  	</div>

</div>

<div class="clearfix">

  	<div class="column2 content3">	
  	</div>
  	

  	<div class="column2 content4">
  		
  	</div>

</div>

<div class="footer">
  	<p>&copy SE357 | 2017 | 400 Cedar Ave, West Long Branch, New Jersey</p>
</div>
</div>
</body>
</html>
