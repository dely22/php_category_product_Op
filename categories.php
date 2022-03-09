<?php include 'includes/header.php'; ?>
<?php include 'config/config.php'; ?>

<?php require 'category/getAll.php' ?>

    <section>
        <div class="container my-5 text-end">
            <a href="createProduct.php" class="btn btn-secondary shadow">Add Product</a>
            <a href="createCategory.php" class="btn btn-secondary shadow">Add Category</a>
            <a href="index.php" class="btn btn-secondary shadow">All Products</a>
            <a href="categories.php" class="btn btn-primary shadow">All Categories</a>
        </div>
    </section>

    <main>
        <div class="container-lg w-50 table-responsive">
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope'row'>$row[id]</th>";
                                echo "<td>$row[name]</td>";
                                echo '<td>
                                        <a href="updateCategory.php?id='.$row['id'].'" class="btn btn-success mx-3">Update</a>
                                        <a href="category/delete.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>
                                    </td>';
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

<?php 
    mysqli_free_result($result);
    $conn->close();
?>

<?php include 'includes/footer.php'; ?>