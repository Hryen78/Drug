<?php

include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/admin/page/order_conf.php';

?>

<div class="container mt-5">
    <h2>Manage Orders</h2>
    <!-- Order Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Sum Price</th>
                <th>Order Date</th>
                <th>Order State</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['sum_price']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['order_state']; ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['order_id']; ?>">Edit</button>
                            <!-- Delete Button -->
                            <a href="index.php?p=admin&ap=uorder&orderid=<?php echo $row['order_id']; ?>" class="btn btn-danger">Delete</a>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal<?php echo $row['order_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Order</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="index.php?p=admin&ap=uorder" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                <div class="mb-3">
                                                    <label for="user_id" class="form-label">User ID</label>
                                                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sum_price" class="form-label">Sum Price</label>
                                                    <input type="text" class="form-control" id="sum_price" name="sum_price" value="<?php echo $row['sum_price']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="order_date" class="form-label">Order Date</label>
                                                    <input type="date" class="form-control" id="order_date" name="order_date" value="<?php echo $row['order_date']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="order_state" class="form-label">Order State</label>
                                                    <select class="form-control" id="order_state" name="order_state">
                                                        <option value="shipping" <?php if ($row['order_state'] == 'shipping') echo 'selected'; ?>>Shipping</option>
                                                        <option value="delivered" <?php if ($row['order_state'] == 'delivered') echo 'selected'; ?>>Delivered</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="edit_order" class="btn btn-primary">Save changes</button>
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
                    <td colspan="6">No orders found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$connection->close();
?>
