<!-form2.php>
<html>
<head>
<title> Form Processing </title>
</head>

<body>
<?php
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$age = $_POST['age'];

/*echo $fname;
echo '<br>';
echo $lname;
echo '<br>';
echo $gender;
echo '<br>';
echo $age;
echo '<br>';
echo $email;
echo '<br>';*/



echo '<center>';
echo '<table>';

echo '<h1>Your Input Information<h1>';
//echo '<br>';
//echo '<br>';

echo '<tr>';
echo '<td>First name: </td>';
echo '<td>'.$fname.'</td>';
echo '</tr><br>';
echo '<tr>';
echo '<td>Last name: </td>';
echo '<td>'.$lname.'</td>';
echo '</tr><br>';
echo '<tr>';
echo '<td>Gender: </td>';
echo '<td>'.$gender.'</td>';
echo '</tr><br>';
echo '<tr>';
echo '<td>Age: </td>';
echo '<td>'.$age.'</td>';
echo '</tr><br>';
echo '<tr>';
echo '<td>Email: </td>';
echo '<td>'.$email.'</td>';
echo '</tr><br>';

echo '</table>';
echo '</center>';


?>
</body>
</html>