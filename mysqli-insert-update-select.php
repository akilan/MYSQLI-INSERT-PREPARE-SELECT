<?php
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



   /* Create a prepared statement */
   if($stmt = $mysqli -> prepare("SELECT priv FROM testUsers WHERE username=?
   AND password=?")) {

      /* Bind parameters
         s - string, b - blob, i - int, etc */
      $stmt -> bind_param("ss", $user, $pass);
	  
	  /* Set our params */
	  $firstName = "Jordan";
	  $lastName = "DeLozier";

      /* Execute it */
      $stmt -> execute();

      /* Bind results */
      $stmt -> bind_result($result);

      /* Fetch the value */
      $stmt -> fetch();

      echo $user . "'s level of priviledges is " . $result;

      /* Close statement */
      $stmt -> close();
   }
   else {
	/* Error */
	printf("Prepared Statement Error: %s\n", $mysqli->error);
	}
?>