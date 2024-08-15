<?php

include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/admin/page/doc_desc_conf.php';

$sql_products = "SELECT productId, productName FROM product";
$result_products = $connection->query($sql_products);
// Fetches the results from product
?>

<div class="container mt-5">
    <h2>Manage Doc Descriptions</h2>
    <!-- Add Doc Description Form -->
    <form action="index.php?p=admin&ap=docdesc" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="ddid" class="form-label">DDID</label>
            <input type="text" class="form-control" id="ddid" name="ddid" required>
        </div>
        <div class="mb-3">
            <label for="productId" class="form-label">Product</label>
            <select class="form-control" id="productId" name="productId" required>
                <?php while ($row = $result_products->fetch_assoc()): ?>
                    <option value="<?php echo $row['productId']; ?>"><?php echo $row['productName']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" name="add_doc" class="btn btn-primary">Add Doc Description</button>
    </form>
    <!-- Doc Description Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DDID</th>
                <th>Product Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['DDID']; ?></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['DDID']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="index.php?p=admin&ap=docdesc&docid=<?php echo $row['DDID']; ?>" class="btn btn-danger">Delete</a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['DDID']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Doc Description</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?p=admin&ap=docdesc" method="POST">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="ddid" class="form-label">DDID</label>
                                                    <input type="text" class="form-control" id="ddid" name="ddid" value="<?php echo $row['DDID']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="productId" class="form-label">Product</label>
                                                    <select class="form-control" id="productId" name="productId" required>
                                                        <?php
                                                        $result_products = $connection->query($sql_products); // Re-run the query for edit modal
                                                        while ($product_row = $result_products->fetch_assoc()): ?>
                                                            <option value="<?php echo $product_row['productId']; ?>"
                                                                <?php // you forget the condition here, condition to deffine arrary?>
                                                                <?php if (isset($row['productId']) && $product_row['productId'] == $row['productId']) echo 'selected'; ?>>
                                                                <?php echo $product_row['productName']; ?>
                                                            </option>

                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_doc" class="btn btn-primary">Save changes</button>
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
                    <td colspan="3">No doc descriptions found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$connection->close();
?>
