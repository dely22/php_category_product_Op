
<?php 

    $name = $price = $details = $category_id = $img = '';
    $name_err = $price_err = $details_err = $category_id_err = '';

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        require 'config/upload-img.php';
        // Validate name
        $input_name = trim($_POST['name']);
        if (empty($input_name)) 
        {
            $name_err = "Please enter product name.";
        }
        else $name = $input_name;

        // Validate price
        $input_price = trim($_POST['price']);
        if (empty($input_price)) 
        {
            $price_err = "Please enter price product.";
        }
        else $price = $input_price;

        // Validate details
        $input_details = trim($_POST['details']);
        if (empty($input_details)) 
        {
            $details_err = "Please enter product details.";
        }
        else $details = $input_details;

        // Validate name
        $input_category_id = trim($_POST['category_id']);
        if (empty($input_category_id)) 
        {
            $category_id_err = "Please selecte category.";
        }
        else $category_id = $input_category_id;

        

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0)
        {
            $img_err = "Sorry, your file was not uploaded.";
        }
        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($temp_name, 'public/uploads/'.$path))
            {
                if (empty($name_err) && empty($price_err) && empty($details_err) && empty($category_id_err) && empty($img_err))
                {
                    $sql = "INSERT INTO products (name,price,details,img,category_id)
                    VALUES (?,?,?,?,?)";

                    if ($stmt = mysqli_prepare($conn, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, 'sssss', $param_name, $param_price, $param_details, $param_img, $param_category_id);

                        $param_name = $name;
                        $param_price= $price;
                        $param_details = $details;
                        $param_img = $path;
                        $param_category_id = $category_id;

                        if (mysqli_stmt_execute($stmt))
                        {
                            header('Location: index.php');
                        }
                        else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
        }

    }

?>

<?php 

?>