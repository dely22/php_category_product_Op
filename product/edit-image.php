<?php include '../config/config.php'; ?>

<?php 
    if (isset($_POST['submit']))
    {
        $id = $_POST['id'];
    }

    // configration upload image
    require '../config/upload-img.php';

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded.";
    }
    // if everything is ok, try to upload file
    else {
        if (move_uploaded_file($temp_name, $target_file))
        {
            update($id, $path, $conn);
            header("Location: ../updateProduct.php?id=$id");
        }
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    function update($id, $img, $conn)
    {
        $sql    = "UPDATE products SET img = '$img' WHERE id = $id";
        $result = $conn->query($sql);

        if ($result)
        {
            echo "record Update";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<?php 
    $conn->close();
?>