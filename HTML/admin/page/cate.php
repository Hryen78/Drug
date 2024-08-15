<?php

include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/admin/page/cate_conf.php'

?>

<div class=""></div>

<div class="container mt-5">
    <h2>Manage Categories</h2>
    <!-- Add Category Form -->
    <form action="index.php?p=admin&ap=categ" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
    </form>
    <!-- Category Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['CategoryID']; ?></td>
                        <td><?php echo $row['CategoryName']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['CategoryID']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="index.php?p=admin&ap=categ&cateid=<?php echo $row['CategoryID']; ?>" class="btn btn-danger">Delete</a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['CategoryID']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?p=admin&ap=categ" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?php echo $row['CategoryID']; ?>">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['CategoryName']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_category" class="btn btn-primary">Save changes</button>
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
                    <td colspan="4">No categories found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$connection->close();
?>
