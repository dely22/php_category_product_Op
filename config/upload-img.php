<?php

    $img_dir   = "../public/uploads/";
    $path      = $_FILES['img']['name']; // 6637.png
    $temp_name = $_FILES['img']['tmp_name']; // C:\xampp\tmp\php74EE.tmp
    $img_size  = $_FILES['img']['size'];
    $uploadOk = 1;

    $img_err = '';

    //Check if image empty
    if (empty($path))
    {
        $img_err = "Please enter product image";
        $uploadOk = 0;
    }
    else {
        $target_file = $img_dir.basename($path); // public/uploads/6637.png
        $img_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // png

        
        // Check if image file is a actual image or fake image
        if (isset($_POST['submit']))
        {
            $check = getimagesize($temp_name); // Array ( [0] => 660 [1] => 330 [2] => 3 [3] => width="660" height="330" [bits] => 4 [mime] => image/png )
            if ($check !== false)
            {
                // $img_err = "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else 
            {
                $img_err = "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file))
        {
            $img_err = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($img_size > 500000)
        {
            $img_err = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($img_file_type != "jpg" && $img_file_type != "png" && $img_file_type != "jpeg" && $img_file_type != "gif")
        {
            $img_err = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
    }


?>