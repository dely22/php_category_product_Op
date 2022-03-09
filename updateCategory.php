<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>

<?php 

if (isset($_POST['submit']))
{
    $id   = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE categories SET name = '$name' WHERE id = $id";

    $result = $conn->query($sql);

    if ($result)
    {
        header('Location: categories.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) {
            $id   = $row['id'];
            $name = $row['name'];
        }
?>

<section>
    <div class="container mt-5 mb-2 text-end">
        <a href="categories.php" class="btn btn-primary">Back</a>
    </div>
</section>

<main>
    <div class="container-lg card p-2 m-auto">
        <div class="card-header">
            <h3 class="text-primary">Update category</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST"  class="row g-3 needs-validation" novalidate>
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" id="validationCustom01" class="form-control">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" name="submit" value="submit" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
    }
    else{
        header('Location: categories.php');
    }
}
?>



<?php 
    mysqli_free_result($result);
    $conn->close();
?>

<?php include 'includes/footer.php'; ?>