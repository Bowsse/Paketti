
<?php
// Links to pages
$permission = $_SESSION['permission'];


// if student
if ($permission == 0) {
	$thesisID = getThesisID($_SESSION["username"]);
	$thesisID = $thesisID["thesisID"];
?>
<div class="sidebar">
	<a href="student_thesis.php">Thesis</a>
	<a href="user_information.php">User information</a>
	<a href="student_supervisors.php">Supervisors</a>
	<a href='student_thesis_status.php'>Status</a>
<?php

$grades = getThesisGrades($thesisID);

$count = $grades->rowCount();

	if ($count > 0)
	{
		echo "<a href='student_thesis_grade.php'>Thesis reviews</a>";
	}

?>
	 </div>
</div>
<?php

} 

// if supervisor
if ($permission == 1) {
?>
<div class="sidebar">
	<a href='supervisor_main.php'>Theses</a>
	<a href='user_information.php'>User information</a>
</div>
<?php
}

?>