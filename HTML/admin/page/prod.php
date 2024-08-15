<?php

include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/admin/page/prod_conf.php';

$sql_categories = "SELECT CategoryID, CategoryName FROM category";
$result_categories = $connection->query($sql_categories);
//Fetches the results from category 
?>

<div class="container mt-5">
    <h2>Manage Products</h2>
    <!-- Add Product Form -->
    <form action="index.php?p=admin&ap=prod" method="POST" class="mb-4" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Product Description</label>
            <textarea class="form-control" id="desc" name="desc" required></textarea>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="img" name="img" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="categoryID" required>
                <?php while ($row = $result_categories->fetch_assoc()): ?>
                    <option value="<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="temperature" class="form-label">Drug Temperature</label>
            <input type="text" class="form-control" id="temperature" name="temperature" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
    </form>
    <!-- Product Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category ID</th>
                <th>Price</th>
                <th>Temperature</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['productId']; ?></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td><?php echo $row['productDesc']; ?></td>
                        <td><img src="<?php echo $row['productImg']; ?>" alt="Product Image" style="width: 50px; height: 50px;"></td>
                        <td><?php echo $row['categoryID']; ?></td>
                        <td><?php echo $row['productPrice']; ?></td>
                        <td><?php echo $row['drug_temparture']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['productId']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="index.php?p=admin&ap=prod&prodid=<?php echo $row['productId']; ?>" class="btn btn-danger">Delete</a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['productId']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?p=admin&ap=prod" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $row['productId']; ?>">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['productName']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="desc" class="form-label">Product Description</label>
                                                    <textarea class="form-control" id="desc" name="desc" required><?php echo $row['productDesc']; ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="img" class="form-label">Product Image</label>
                                                    <input type="file" class="form-control" id="img" name="img">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-control" id="category" name="categoryID" required>
                                                        <?php
                                                        $result_categories = $connection->query($sql_categories); // Re-run the query for edit modal
                                                        while ($category_row = $result_categories->fetch_assoc()): ?>
                                                            <option value="<?php echo $category_row['CategoryID']; ?>" <?php if ($category_row['CategoryID'] == $row['categoryID']) echo 'selected'; ?>>
                                                                <?php echo $category_row['CategoryName']; ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['productPrice']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="temperature" class="form-label">Drug Temperature</label>
                                                    <input type="text" class="form-control" id="temperature" name="temperature" value="<?php echo $row['drug_temparture']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_product" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9">No products found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$connection->close();
?>
