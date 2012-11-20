<?php
    
	/* register.php
	 *
	 * Code taken from CS50, pset7 distribution.
	 */
	
	// configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if form submission was satisfactory
        if (empty($_POST["username"]) || empty($_POST["password"]))
            apologize("Please enter both a username and a password.\n");
        else if (strcmp($_POST["password"],$_POST["confirmation"]) != 0)
            apologize("Passwords do not match.\n");
        else
        {
            // register new user and log them in
            $query = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)",
                $_POST["username"], crypt($_POST["password"]));
            if ($query === false)
                apologize("Registration failed.\n");
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $_SESSION["id"] = $rows[0]["id"];
                redirect("/");
            }
        }
    }
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>