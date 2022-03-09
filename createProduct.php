<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>

<?php require 'category/getAll.php' ?>
<?php require 'product/create.php' ?>

<section>
    <div class="container mt-5 mb-2 text-end">
        <a href="index.php" class="btn btn-primary shadow w-50">Back</a>
    </div>
</section>

<main>
    <div class="container-lg w-50 card p-2 m-auto">
        <div class="card-header">
            <h3 class="text-primary">Create Product</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" class="shadow row g-3 needs-validation" novalidate>
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Name Product</label>
                    <input type="text" name="name" id="validationCustom01" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Price</label>
                    <input type="number" name="price" id="validationCustom02" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err;?></span>
                </div>                    
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Details</label>
                    <input type="text" name="details" id="validationCustom03" class="form-control <?php echo (!empty($details_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $details; ?>">
                    <span class="invalid-feedback"><?php echo $details_err;?></span>
                </div>
                <div class="col-md-8">
                    <label for="validationCustom01" class="form-label">Image</label>
                    <input type="file" name="img" id="validationCustom01" class="form-control <?php echo (!empty($img_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $img; ?>">
                    <span class="invalid-feedback"><?php echo $img_err;?></span>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Category</label>
                    <select name="category_id" id="validationCustom04" class="form-select form-control <?php echo (!empty($category_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category_id; ?>">
                    <span class="invalid-feedback"><?php echo $category_id_err;?></span>
                        <option selected disabled value="">Choose...</option>
                        <?php 
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo "<option value='$row[id]'> $row[name] </option>";
                                }
                            }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" name="submit" value="submit" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php 
    mysqli_free_result($result);
    $conn->close();
?>

<?php include 'includes/footer.php'; ?>