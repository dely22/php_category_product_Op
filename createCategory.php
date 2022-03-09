<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>

<?php require 'category/create.php'; ?>

<section>
    <div class="container mt-5 mb-2 text-end">
        <a href="categories.php" class="btn btn-primary shadow w-50">Back</a>
    </div>
</section>

<main>
    <div class="container-lg w-50 card p-2 m-auto">
        <div class="card-header">
            <h3 class="text-primary">Create Category</h3>
        </div>
        <div class="card-body shadow">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" name="name" id="validationCustom01" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err;?></span>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php 
    $conn->close();
?>

<?php include 'includes/footer.php'; ?>