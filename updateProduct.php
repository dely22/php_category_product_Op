<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>

<?php 

if (isset($_POST['submit']))
{
    $produc_id   = $_POST['id'];
    $name        = $_POST['name'];
    $price       = $_POST['price'];
    $details     = $_POST['details'];
    $category_id = $_POST['category_id'];

    $sql = "UPDATE products SET 
        name = '$name',
        price = '$price',
        details = '$details',
        category_id = '$category_id'
        WHERE id = $produc_id";

    $result = $conn->query($sql);

    if ($result)
    {
        header('Location: index.php');
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while ($row = $result->fetch_assoc()) {
            $id   = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $details = $row['details'];
            $category_id = $row['category_id'];
            $img = $row['img'];
        }
?>

<section>
    <div class="container mt-5 mb-2 text-end">
        <a href="index.php" class="btn btn-primary shadow w-50">Back</a>
    </div>
</section>

<main>
    <div class="container-lg card p-2 m-auto shadow">
        <div class="card-header">
            <h3 class="text-primary">Update Product</h3>
        </div>
        <div class="card-body shadow">
            <form action="" method="POST"  class="row g-3 needs-validation" novalidate>
                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                <div class="col-4">
                    <img class="img-fluid" src="public/uploads/<?php echo $img;?>" alt="">
                    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit Image
                    </button>
                </div>
                <div class="col-8 pl-3">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Name Product</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="validationCustom01" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Price</label>
                            <input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id="validationCustom02" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>                    
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Details</label>
                            <input type="text" name="details" value="<?php echo $details; ?>" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid details.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Category</label>
                            <select name="category_id" class="form-select" id="validationCustom04" required>
                                <option  disabled value="">Choose...</option>
                                <?php 
                                    $sql  = 'SELECT * FROM `categories`';
                                    $result = $conn->query($sql);
                                ?>
                                <?php 
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                            if ($category_id == $row['id']){
                                                echo "<option selected value='$row[id]'> $row[name] </option>";
                                            }
                                            else {
                                                echo "<option  value='$row[id]'> $row[name] </option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary w-100" name="submit" value="submit" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade shadow" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="product/edit-image.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            <label for="validationCustom01" class="form-label">Image</label>
                            <input type="file" name="img" class="form-control" id="validationCustom01" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary w-100">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    }
    else{
        header('Location: index.php');
    }
}
?>



<?php 
    mysqli_free_result($result);
    $conn->close();
?>

<?php include 'includes/footer.php'; ?>