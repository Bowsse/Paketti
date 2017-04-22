<?php
include("links.php");
include("header.php");
include("navbar.php");
include("student_permission.php");

$thesisID = getThesisID($_SESSION["username"]);
$thesisID = $thesisID["thesisID"];


if (isset($thesisID))
	{
		$grades = getThesisGrades($thesisID);
	}
echo "<section class='small'>";
echo "<h3>Thesis reviews</h3>";
echo "</section>";


// checks if user has theses
if ($grades != null) {


	$thesisGrade = array(
	'field1' => '1. Aiheen ja lähestymistavan valinta',
	'field2' => '2. Tietoperusta ja työn rakenne',
	'field3' => '3. Opinnäytetyön toteutus',
	'field4' => '4. Tulokset/tuotokset ja niiden analysointi',
	'field5' => '5. Raportointi'
);

while($row = $grades->fetch(PDO::FETCH_ASSOC)) {

echo "<section class='wide'>";
echo "<div id='thesisGrade'><h3>Reviewer: {$row['Person_personID']}</h3>";
foreach($thesisGrade as $key => $field){		
    echo "<label style='width:400px;'>$field: </label><input type='text' readonly value='$row[$key]'><br>";
}

echo "<br><label style='text-align:center;'>Comment</label><br><textarea cols='80' rows='5' readonly>{$row['comment']}</textarea><br><br>";
echo "</section>";
}

}
else {
	echo "<section class='small'>";
	echo "Thesis has no grades.";
	echo "</section>";
}




?>
