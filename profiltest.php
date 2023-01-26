<?php
session_start();
$student_id = 10;

$servername = "localhost";
$username = "root";
$password = "";
$db = "moduleconnexion";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$sql = "UPDATE utilisateurs SET login='a' WHERE id='5'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    $login = $row["login"];
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $password = $row["password"];

    echo

    "<html>
<body>

<form action='phpUpdateFormScript.php' method='post'>
Student ID: $id<br>
<input type='hidden' name='student_id' value='$id'>
Uniform: $password<br>
Name: <input type='text' name='login' value='$login'><br>
Age: <input type='text' name='nom' value='$nom'><br>
Gender: <select name='prenom'>
	<option value='$prenom' selected>$prenom </option>
	<option value='boy'>Boy</option>
	<option value='girl'>Girl</option>
	</select><br>
<input type ='submit'>
</form>

</body>
</html>";
} else {
    echo "Not Found";
}
$conn->close();
var_dump($_SESSION);
