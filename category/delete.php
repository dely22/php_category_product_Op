<?php include '../config/config.php'; ?>

<?php 

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql    = "DELETE FROM categories WHERE id = $id";
        $result = $conn->query($sql);

        if ($result)
        {
            header('Location: ../categories.php');
        }
        else
        {
            header('Location: ../categories.php');
            echo "can not deleted ....";
        }
    }

?>


<?php 
    mysqli_free_result($result);
    $conn->close();
?>