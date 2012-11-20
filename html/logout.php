<?php
 
	/* logout.php
	 *
	 * Code taken from CS50, pset7 distribution.
	 */
	
    // configuration
    require("../includes/config.php"); 
 
    // log out current user, if any
    logout();
 
    // redirect user
    redirect("/");
 
?>