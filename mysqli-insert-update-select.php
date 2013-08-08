<?php
/**
 * INSERT PREPARE MYSQLI
 */
 
/* Create the prepared statement */
if ($stmt = $mysqli->prepare("INSERT INTO CodeCall (FirstName, LastName) values (?, ?)")) {

/* Bind our params */
$stmt->bind_param('ss', $firstName, $lastName);

/* Set our params */
$firstName = "Jordan";
$lastName = "DeLozier";

/* Execute the prepared Statement */
$stmt->execute();

/* Close the statement */
$stmt->close();
}
else {
/* Error */
printf("Prepared Statement Error: %s\n", $mysqli->error);
}


/**
 * UPDATE PREPARE MYSQLI
 */

  if ($stmt = $mysqli->prepare("UPDATE tblFacilityHrs SET title =?, description = ? WHERE uid = ?")){
        $stmt->bind_param('sss', $title, $desc, $uid2);
		//Get params
		$title=$_POST['title'];
		$desc=$_POST['description'];
		$uid2=$_GET['uid'];
		$stmt->execute();
        $stmt->close();
    }
    else {
        //Error
        printf("Prep statment failed: %s\n", $mysqli->error);
    }
	

/**
 * SELECT PREPARE MYSQLI
 */
 
 
   /* Create the prepared statement */
	if ($stmt = $mysqli->prepare("SELECT FirstName,LastName FROM CodeCall ORDER BY LastName")) {
	/* Execute the prepared Statement */
	$stmt->execute();

	/* Bind results to variables */
	$stmt->bind_result($firstName, $lastName);

	/* fetch values */
	while ($stmt->fetch()) {
	printf("%s %s\n", $lastName, $firstName);
	}

	/* Close the statement */
	$stmt->close();

	}
	else {
	/* Error */
	printf("Prepared Statement Error: %s\n", $mysqli->error);
	}