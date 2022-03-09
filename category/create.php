<?php

     // Define variables and initialize with empty values
    $name     = '';
    $name_err = '';

     // Get All Name Categories
    $sql  = 'SELECT name FROM `categories`';
    $result = $conn->query($sql);
    
     // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
         // Validate name
        $input_name = trim($_POST['name']);

        if (empty($input_name)) {
            $name_err = "Please enter a name.";
        }
        elseif ($result->num_rows > 0){
            while ($row = $result->fetch_array()){
                if ($row['name'] == $input_name){
                    $name_err = "Duplcate name.";
                    echo $row['name'];
                    break;
                }
            }
        }
        else $name = $input_name;

         // Check input errors before inserting in database
        if (empty($name_err))
        {
             // Prepare an insert statement
            $sql = "INSERT INTO categories (name) VALUES (?)";

            if ($stmt = mysqli_prepare($conn, $sql))
            {
                 // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_name);
                 // Set parameters
                $param_name = $name;

                 // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt))
                {
                    // Records created successfully. Redirect to landing page
                    header("location: categories.php");
                    exit();
                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             // Close statement
            mysqli_stmt_close($stmt);
        }
    }

?>
