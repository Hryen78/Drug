<?php

include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/admin/page/user_conf.php';

?>

<div class="container mt-5">
    <h2>Manage Users</h2>
    <!-- Add User Form -->
    <form action="index.php?p=admin&ap=user" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="user_name" class="form-label">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
        </div>
        <div class="mb-3">
            <label for="user_address" class="form-label">User Address</label>
            <input type="text" class="form-control" id="user_address" name="user_address" required>
        </div>
        <div class="mb-3">
            <label for="user_password" class="form-label">User Password</label>
            <input type="password" class="form-control" id="user_password" name="user_password" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="mb-3">
            <label for="user_type" class="form-label">User Type</label>
            <select class="form-control" id="user_type" name="user_type">
                <option value="" selected>Null</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
    </form>
    <!-- User Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>User Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_address']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['user_type'] ? $row['user_type'] : 'Null'; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['user_id']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="index.php?p=admin&ap=user&userid=<?php echo $row['user_id']; ?>" class="btn btn-danger">Delete</a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?p=admin&ap=user" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                                <div class="mb-3">
                                                    <label for="user_name" class="form-label">User Name</label>
                                                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $row['user_name']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user_address" class="form-label">User Address</label>
                                                    <input type="text" class="form-control" id="user_address" name="user_address" value="<?php echo $row['user_address']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="user_type" class="form-label">User Type</label>
                                                    <select class="form-control" id="user_type" name="user_type">
                                                        <option value="" <?php if (!$row['user_type']) echo 'selected'; ?>>Null</option>
                                                        <option value="admin" <?php if ($row['user_type'] == 'admin') echo 'selected'; ?>>Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_user" class="btn btn-primary">Save changes</button>
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
                    <td colspan="6">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$connection->close();
?>
