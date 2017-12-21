<html>

	<head>
		<title> Personal Information Registration | Pananche Entertainment </title>
	</head>
		
	<body>
		<?php
			if ($_SERVER['REQUEST_METHOD']=='POST')
			{		
				//retrieve form data
				$error = array();

				if (!empty($_POST['firstName']))
				{
					$firstName = $_POST['firstName'];
				}
				else 
				{
					$error[] = "Please enter first name.";
				}
			
				if (!empty($_POST['lastName']))
				{
					$lastName = $_POST['lastName'];
				}
				else 
				{
					$error[] = "Please enter last name.";
				}
			
				if (!empty($_POST['residency']))
				{
					$residency = $_POST['residency'];
				}

				if (!empty($_POST['stateRep']))
				{
					$stateRep = $_POST['stateRep'];
				}
				else
				{
					$stateRep = NULL;
				}

				if (!empty($_POST['address']))
				{
					$address = $_POST['address'];
				}
				else
				{
					$error[] = "Please enter your street address.";
				}
				
				if (!empty($_POST['address2']))
				{
					$address2 = $_POST['address2'];
				}
				else
				{
					$address2 = NULL;
				}
				
				if (!empty($_POST['city']))
				{
					$city = $_POST['city'];
				}
				else
				{
					$error[] = "Please enter your city.";
				}
				
				if (!empty($_POST['state']))
				{
					$state = $_POST['state'];
				}
				else
				{
					$error[] = "Please enter your state / province / region.";
				}
				
				if (!empty($_POST['zipCode']))
				{
					$zipCode = $_POST['zipCode'];
				}
				else
				{
					$error[] = "Please enter your zip code.";
				}
				
				if (!empty($_POST['phoneNumber']))
				{
					$phoneNumber = $_POST['phoneNumber'];
				}
				else
				{
					$error[] = "Please enter your phone number.";
				}
				
				if (!empty($_POST['email']))
				{
					$email = $_POST['email'];
				}
				else 
				{
					$error[] = "Please enter email.";	
				}

				if (!empty($_POST['website']))
				{
					$website = $_POST['website'];
				}
				else
				{
					$website = NULL;
				}
			
				if (!empty($_POST['birthday']))
				{
					$birthday = $_POST['birthday'];
				}
				else
				{
					$birthday = NULL;
				}

				if (!empty($_POST['placeOfBirth']))
				{
					$placeOfBirth = $_POST['placeOfBirth'];
				}
				else
				{
					$placeOfBirth = NULL;
				}
				
				if (!empty($_POST['height']))
				{
					$height = $_POST['height'];
				}
				else
				{
					$height = NULL;
				}
				
				if (!empty($_POST['weight']))
				{
					$weight = $_POST['weight'];
				}
				else
				{
					$weight = NULL;
				}

				if (!empty($_POST['langSpoke']))
				{
					$langSpoke = $_POST['langSpoke'];
				}
				else
				{
					$langSpoke = NULL;
				}
				
				if (!empty($_POST['zodiacSign']))
				{
					$zodiacSign = $_POST['zodiacSign'];
				}
				else
				{
					$zodiacSign = NULL;
				}
				
				if (!empty($_POST['interpreter']))
				{
					$interpreter = $_POST['interpreter'];
				}
				else
				{
					$interpreter = NULL;
				}
				
				if (!empty($_POST['fatherName']))
				{
					$fatherName = $_POST['fatherName'];
				}
				else
				{
					$fatherName = NULL;
				}
				
				if (!empty($_POST['motherName']))
				{
					$motherName = $_POST['motherName'];
				}
				else
				{
					$motherName = NULL;
				}

				if (!empty($_POST['guardianName']))
				{
					$guardianName = $_POST['guardianName'];
				}
				else
				{
					$guardianName = NULL;
				}
			
				if (!empty($_POST['guardianAddress']))
				{
					$guardianAddress = $_POST['guardianAddress'];
				}
				else
				{
					$guardianAddress = NULL;
				}
			
				if (!empty($_POST['guardianAddress2']))
				{
					$guardianAddress2 = $_POST['guardianAddress2'];
				}
				else
				{
					$guardianAddress2 = NULL;
				}

				if (!empty($_POST['guardianCity']))
				{
					$guardianCity = $_POST['guardianCity'];
				}
				else
				{
					$guardianCity = NULL;
				}
				
				if (!empty($_POST['guardianState']))
				{
					$guardianState = $_POST['guardianState'];
				}
				else
				{
					$guardianState = NULL;
				}
				
				if (!empty($_POST['guardianZipCode']))
				{
					$guardianZipCode = $_POST['guardianZipCode'];
				}
				else
				{
					$guardianZipCode = NULL;
				}
				
				if (!empty($_POST['occupation']))
				{
					$occupation = $_POST['occupation'];
				}
				else
				{
					$occupation = NULL;
				}

				if (!empty($_POST['education']))
				{
					$education = $_POST['education'];
				}
				else
				{
					$education = NULL;
				}
				
				if (!empty($_POST['hobbyInterest']))
				{
					$hobbyInterest = $_POST['hobbyInterest'];
				}
				else
				{
					$hobbyInterest = NULL;
				}

				if (!empty($_POST['goals']))
				{
					$goals = $_POST['goals'];
				}
				else
				{
					$goals = NULL;
				}

				if (!empty($_POST['whyParticipate']))
				{
					$whyParticipate = $_POST['whyParticipate'];
				}
				else
				{
					$whyParticipate = NULL;
				}

				if(!empty($error))
				{
					foreach ($error as $msg)
					{
						echo $msg;
						echo '<br>';
					}
				}
		
				else 
				{
				
					//connect to DB
					//first define database connection parameters
					$servername = "localhost";
					$uname = "root";
					$pword = "root";  //change to your password for the server
					$dbname = "Pananche_Entertainment";
			
					//create connection
					$conn = new mysqli($servername, $uname, $pword, $dbname);

					//check connection
					if ($conn->connect_error) 
					{
    					die("Connection failed: " . $conn->connect_error);
					} 
				
					// sql to insert data to table
					$sql = "INSERT INTO PagReg_Personal_Information (First_Name, Last_Name, Residency, State_Representation,
																Address, Address_2, City, State, Zip_Code, Phone_Number, Email, Website,
																Birthday, Place_Of_Birth, Height, Weight, Languages_Spoken, Zodiac_Sign,
																Interpreter, Fathers_Name, Mothers_Name, Guardian_Name, Guardian_Address,
																Guardian_Address2, Guardian_City, Guardian_State, Guardian_Zip, Occupation,
																Education, Hobby_Interest, Goals, Why_Participate)
														VALUES ('$firstName', '$lastName', '$residency', '$stateRep',
																'$address', '$address2', '$city', '$state', '$zipCode', '$phoneNumber', '$email', '$website',
																'$birthday', '$placeOfBirth', '$height', '$weight', '$langSpoke', '$zodiacSign', 
																'$interpreter', '$fatherName', '$motherName', '$guardianName', '$guardianAddress', 
																'$guardianAddress2', '$guardianCity', '$guardianState', '$guardianZipCode', '$occupation',
																'$education', '$hobbyInterest', '$goals', '$whyParticipate')";

					if ($conn->query($sql) === TRUE) 
					{
    					echo "New record created successfully";
					} 
					else 
					{
    					echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();	
				
				}
				
			}
		?>

		<h1> Pageant Registration </h1>
		
		<form action = "" method = "post">
			
			<table>
				<tr>
					<td>First Name: </td><br>
					<td><input type = "text" name = "firstName"
						value = <?php if (isset($_POST['firstName'])) echo $_POST['firstName'] ?>> </td>
					<br>

				</tr>
				
				<tr>
					<td>Last Name: </td> <br>
					<td><input type = "text" name = "lastName"
						value = <?php if (isset($_POST['lastName'])) echo $_POST['lastName'] ?>> </td>
					<br>
				</tr>
				
				<tr>
					<td>Residency Status: </td><br>
					<td>
						<input type = "radio" name = "residency" value = "Citizen"> Citizen
						<br>
						<input type = "radio" name = "residency" value = "Permanent Resident"> Permanent Resident
						<br>
						<input type = "radio" name = "residency" value = "Other">
						<input type = "text" name = "residency" value = "Other"
							value = <?php if (isset($_POST['residency'])) echo $_POST['residency'] ?>> </td>					
					</td>
				</tr>
				
				<tr>
					<td>State of Representation: </td><br>
					<td>
						<select name="stateRep" id="stateRep">
  							<option value="" selected="selected">Select a State</option>
  							<option value="AL">Alabama</option>
  							<option value="AK">Alaska</option>
  							<option value="AZ">Arizona</option>
  							<option value="AR">Arkansas</option>
  							<option value="CA">California</option>
  							<option value="CO">Colorado</option>
  							<option value="CT">Connecticut</option>
  							<option value="DE">Delaware</option>
  							<option value="DC">District Of Columbia</option>
 							<option value="FL">Florida</option>
  							<option value="GA">Georgia</option>
  							<option value="HI">Hawaii</option>
  							<option value="ID">Idaho</option>
  							<option value="IL">Illinois</option>
  							<option value="IN">Indiana</option>
  							<option value="IA">Iowa</option>
  							<option value="KS">Kansas</option>
  							<option value="KY">Kentucky</option>
  							<option value="LA">Louisiana</option>
  							<option value="ME">Maine</option>
  							<option value="MD">Maryland</option>
  							<option value="MA">Massachusetts</option>
  							<option value="MI">Michigan</option>
  							<option value="MN">Minnesota</option>
  							<option value="MS">Mississippi</option>
  							<option value="MO">Missouri</option>
  							<option value="MT">Montana</option>
  							<option value="NE">Nebraska</option>
  							<option value="NV">Nevada</option>
  							<option value="NH">New Hampshire</option>
  							<option value="NJ">New Jersey</option>
  							<option value="NM">New Mexico</option>
  							<option value="NY">New York</option>
  							<option value="NC">North Carolina</option>
  							<option value="ND">North Dakota</option>
  							<option value="OH">Ohio</option>
  							<option value="OK">Oklahoma</option>
  							<option value="OR">Oregon</option>
  							<option value="PA">Pennsylvania</option>
  							<option value="RI">Rhode Island</option>
  							<option value="SC">South Carolina</option>
  							<option value="SD">South Dakota</option>
  							<option value="TN">Tennessee</option>
  							<option value="TX">Texas</option>
  							<option value="UT">Utah</option>
  							<option value="VT">Vermont</option>
  							<option value="VA">Virginia</option>
  							<option value="WA">Washington</option>
  							<option value="WV">West Virginia</option>
  							<option value="WI">Wisconsin</option>
  							<option value="WY">Wyoming</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Street Address: </td><br>
					<td><input type = "text" name = "address"
						value = <?php if (isset($_POST['address'])) echo $_POST['address'] ?>> </td>
				</tr>
				
				<tr>
					<td>Address Line 2: </td><br>
					<td><input type = "text" name = "address2"
						value = <?php if (isset($_POST['address2'])) echo $_POST['address2'] ?>> </td>
				</tr>
				
				<tr>
					<td>City: </td><br>
					<td><input type = "text" name = "city"
						value = <?php if (isset($_POST['city'])) echo $_POST['city'] ?>> </td>
				</tr>
							
				<tr>
					<td>State / Province / Region: </td><br>
					<td><input type = "text" name = "state"
						value = <?php if (isset($_POST['state'])) echo $_POST['state'] ?>> </td>
				</tr>
				
				<tr>
					<td>Zip Code: </td><br>
					<td><input type = "text" name = "zipCode"
						value = <?php if (isset($_POST['zipCode'])) echo $_POST['zipCode'] ?>> </td>
				</tr>

				<tr>
					<td> Phone: </td><br>
					<td><input type = "text" name = "phoneNumber"
						value = <?php if (isset($_POST['phoneNumber'])) echo $_POST['phoneNumber'] ?>> </td>
				</tr>
				
				<tr>
					<td> Email: </td><br>
					<td><input type = "email" name = "email"
						value = <?php if (isset($_POST['email'])) echo $_POST['email'] ?>> </td>
				</tr>
				
				<tr>
					<td>Website: </td><br>
					<td><input type = "text" name = "website"
						value = <?php if (isset($_POST['website'])) echo $_POST['website'] ?>> </td>
				</tr>
				
				<tr>
					<td>Birthday: </td><br>
					<td><input type = "date" name = "birthday"
						value = <?php if (isset($_POST['birthday'])) echo $_POST['birthday'] ?>> </td>
				</tr>
				
				<tr>
					<td>Place of Birth: </td><br>
					<td><input type = "text" name = "placeOfBirth"
						value = <?php if (isset($_POST['placeOfBirth'])) echo $_POST['placeOfBirth'] ?>> </td>
				</tr>
							
				<tr>
					<td>Height: </td><br>
					<td><input type = "text" name = "height"
						value = <?php if (isset($_POST['height'])) echo $_POST['height'] ?>> </td>
				</tr>
				
				<tr>
					<td>Weight: </td><br>
					<td><input type = "text" name = "weight"
						value = <?php if (isset($_POST['weight'])) echo $_POST['weight'] ?>> </td>
				</tr>

				<tr>
					<td>Languages Spoken: </td><br>
					<td><input type = "text" name = "langSpoke"
						value = <?php if (isset($_POST['langSpoke'])) echo $_POST['langSpoke'] ?>> </td>
				</tr>
				
				<tr>
					<td>Zodiac Sign: </td><br>
					
					<td>
						<select name = "zodiacSign" id = "zodiacSign">
						  	<option value="" selected="selected">Select a Zodiac Sign</option>
							<option value = "Aquarius">Aquarius - January 20-February 18</option>
							<option value = "Pisces">Pisces - February 19-March 20</option>						
							<option value = "Aries">Aries - March 21-April 19</option>
							<option value = "Taurus">Taurus - April20-May 20</option>
							<option value = "Gemini">Gemini - May 21-June 20</option>
							<option value = "Cancer">Cancer - June 21-July 22</option>
							<option value = "Leo">Leo - July 23-August 22</option>
							<option value = "Virgo">Virgo - August 23-September 22</option>
							<option value = "Libra">Libra - September 23-October 22</option>
							<option value = "Scorpio">Scorpio - October 23-November 21</option>
							<option value = "Sagittarius">Sagittarius - November 22-December 21</option>
							<option value = "Capricorn">Capricorn - December 22-January 19</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Interpreter: </td><br>
					<td>
						<input type = "radio" name = "interpreter" value = "Yes"> Yes
						<br>
						<input type = "radio" name = "interpreter" value = "No"> No
						<br>
					</td>
				</tr>
				
				<tr>
					<td>Father's Name: </td><br>
					<td><input type = "text" name = "fatherName"
						value = <?php if (isset($_POST['fatherName'])) echo $_POST['fatherName'] ?>> </td>
				</tr>
				
				<tr>
					<td>Mother's Name: </td><br>
					<td><input type = "text" name = "motherName"
						value = <?php if (isset($_POST['motherName'])) echo $_POST['motherName'] ?>> </td>
				</tr>
							
				<tr>
					<td>Guardian Name: </td><br>
					<td><input type = "text" name = "guardianName"
						value = <?php if (isset($_POST['guardianName'])) echo $_POST['guardianName'] ?>> </td>
				</tr>
				
				<tr>
					<td> Guardian Address: </td><br>
					<td><input type = "text" name = "guardianAddress"
						value = <?php if (isset($_POST['guardianAddress'])) echo $_POST['guardianAddress'] ?>> </td>
				</tr>

				<tr>
					<td> Guardian Address 2: </td><br>
					<td><input type = "text" name = "guardianAddress2"
						value = <?php if (isset($_POST['guardianAddress2'])) echo $_POST['guardianAddress2'] ?>> </td>
				</tr>
				
				<tr>
					<td> Guardian City: </td><br>
					<td><input type = "email" name = "guardianCity"
						value = <?php if (isset($_POST['guardianCity'])) echo $_POST['guardianCity'] ?>> </td>
				</tr>
				
				<tr>
					<td>Guardian State: </td><br>
					<td><input type = "text" name = "guardianState"
						value = <?php if (isset($_POST['guardianState'])) echo $_POST['guardianState'] ?>> </td>
				</tr>
				
				<tr>
					<td>Guardian Zip Code: </td><br>
					<td><input type = "text" name = "guardianZipCode"
						value = <?php if (isset($_POST['guardianZipCode'])) echo $_POST['guardianZipCode'] ?>> </td>
				</tr>
				
				<tr>
					<td>Occupation: </td><br>
					<td><input type = "text" name = "occupation"
						value = <?php if (isset($_POST['occupation'])) echo $_POST['occupation'] ?>> </td>
				</tr>
							
				<tr>
					<td>Education: </td><br>
					<td><input type = "text" name = "education"
						value = <?php if (isset($_POST['education'])) echo $_POST['education'] ?>> </td>
				</tr>
				
				<tr>
					<td>Hobbies and Interests: </td><br>
					<td><input type = "text" name = "hobbyInterest"
						value = <?php if (isset($_POST['hobbyInterest'])) echo $_POST['hobbyInterest'] ?>> </td>
				</tr>

				<tr>
					<td>Goals: </td><br>
					<td><input type = "text" name = "goals"
						value = <?php if (isset($_POST['goals'])) echo $_POST['goals'] ?>> </td>
				</tr>
				
				<tr>
					<td> Why do you want to participate? : </td><br>
					<td><input type = "text" name = "participate"
						value = <?php if (isset($_POST['participate'])) echo $_POST['participate'] ?>> </td>
				</tr>
				
				
				
			</table>
				
			<input type = "Submit">	
			
		</form>
			
	</body>

</html>		
