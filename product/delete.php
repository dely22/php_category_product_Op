<?php include '../config/config.php'; ?>

<?php 

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql    = "DELETE FROM products WHERE id = $id";
        $result = $conn->query($sql);

        if ($result)
        {
            header('Location: ../index.php');
        }
        else
        {
            header('Location: ../index.php');
            echo "can not deleted ....";
        }
    }

?>


<?php 
    mysqli_free_result($result);
    $conn->close();
?>