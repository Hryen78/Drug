<?php
// Include database connection file
include '../Drug/HTML/shop/xampp_connection.php';
include '../Drug/HTML/doc/doc_search.php';

$connection->close();
?>

<div class="container mt-5">
    <h2>Search Document Description</h2>
    <form method="GET" action="index.php" class="mb-4">
        <input type="hidden" name="p" value="doc">
        <div class="input-group">
            <input type="text" name="dds" class="form-control" placeholder="Search by DDID or Product ID" value="<?php echo htmlspecialchars($search_query); ?>" required>
            <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

    <?php 
        if (!empty($search_result)){ 
                foreach ($search_result as $itemVe):
                    include '../Drug/HTML/shop/product_card.php'; 
                endforeach;

        }else{
            ?>
        
        <div class="alert alert-info">No results found.</div>
    <?php } ?>
</div>
