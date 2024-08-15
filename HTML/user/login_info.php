<?php 
include '../Drug/HTML/shop/xampp_connection.php';

// Edit User
if (isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $city = $_POST['city'];
    $user_type = $_POST['user_type'] ? $_POST['user_type'] : null;

    $sql = "UPDATE user SET user_name='$user_name', user_address='$user_address', city='$city', user_type='$user_type' 
            WHERE user_id=$user_id";
    if ($connection->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch users
$sql = "SELECT * FROM user";
$result = $connection->query($sql);

?>

<div class="modal fade" id="editModal<?php echo $row['user_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?p=loginfo" method="POST">
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