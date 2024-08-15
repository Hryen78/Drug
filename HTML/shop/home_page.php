<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Forgot what I should do with this</h4>
                </div>
            </div>
        
        </div>

        <!-- Search Bar -->
        <?php include 'HTML/shop/search_bar.php'; ?>


        <!-- Category  -->
        <div class="col-md-3">
            <form action="" method="GET">
                <div class="card shadow mt-3">
                    <p>Category Name:</p>
                    <div class="card-body">
                        <hr>
                        <?php
                        require_once '../Drug/HTML/shop/xampp_connection.php';
                        require_once '../Drug/HTML/class/category.php';
                        $category = new category();
                        $cate = $category->getAll($connection);
                        ?>
                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Search Engine -->
        <!-- Windows Automatically update and break this function -->
        <!-- Remember to fix this -->
        
        <div class="col-md-9 mt-3">
            <div class="card">
                <div class="card-body row">
                    <?php
                    require_once '../Drug/HTML/class/product.php';
                    $product = new product();

                    // Check for search GET request
                    if (isset($_GET['search'])) {
                        $search_query = $_GET['search'];
                        
                        $pro = $product->searchProducts($connection, $search_query);
                        foreach ($pro as $itemVe) :
                            include 'product_card.php';
                        endforeach;
                    } elseif (isset($_GET['cate'])) {
                        $pro = $product->getListByCateIDs($connection);
                        
                    } else {
                        $pro = $product->gettAll($connection);
                        foreach ($pro as $itemVe) :
                            include 'product_card.php';
                        endforeach;
                    }
                    ?>
                </div>
            </div>
        </div>


        <!-- important don't forget to add this function in product class -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['veAmount'];
            
            // Note: add condition here
            // user had to logged in 
            
            if (!isset($_SESSION['user_id'])){
                echo '<script>alert("You must be logged in to add product to cart")</script>';
            }
            else{
                $user_id = $_SESSION['user_id'];
                if (isset($_POST['buy'])) {
                    // "Buy Now" action (I have no idea what to do with this one)
                    header("Location: checkout.php?product_id=$product_id&quantity=$quantity");
                    exit();
                } elseif (isset($_POST['add'])) {
                    // "Add to Cart" action
                    $add = $product->addProducts($connection);
                }
            }
        }
        ?>
        
    </div>
    
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
