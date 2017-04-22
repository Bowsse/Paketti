<?php
include("links.php");
include("header.php");
include("navbar.php");
include("student_permission.php");

$thesisID = getThesisID($_SESSION["username"]);
$thesisID = $thesisID["thesisID"];

echo "<section class='wide'>";


$thesisInfo = array(
	'subject' => 'Subject',
	'estimatedDate' => 'Estimated date'
);

// gets all theses by username (admin can only set one thesis for each student)

$grade = getThesisGrades($thesisID);

echo "<div id='thesisInfo'><h3>Thesis grades</h3>";


// checks if user has theses
if ($grade != null) {

while ($row = $grade)
{

	$thesisGrade = array(
	'Person_personID' => 'Reviewer',
	'field1' => '1. Aiheen ja lähestymistavan valinta',
	'field2' => '2. Tietoperusta ja työn rakenne',
	'field3' => '3. Opinnäytetyön toteutus',
	'field4' => '4. Tulokset/tuotokset ja niiden analysointi',
	'field5' => '5. Raportointi'
	);

foreach($thesisGrade as $key => $field){		
    echo "<label style='width:400px;'>$field: </label><input type='text' readonly value='$grade[$key]'><br>";
}

echo "<br><label style='text-align:center;'>Comment</label><br><textarea cols='80' rows='5' readonly>{$grade['comment']}</textarea><br><br>";

	}	
}
else {
	echo "Thesis has no grades.";
}

echo "</section>";


?>
