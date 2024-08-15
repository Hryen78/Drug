<!-- yeah this one being reuse too much so I have seperate it out -->
<!-- the bootstrap still gonna work, because it was call in the other script that have the bootstrap in it-->
<div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 my-md-0 my-3">
    
    <div class="card">
        <form method="post">
            <!-- item info from db-->
            <input type="hidden" name="product_id" value="<?php echo $itemVe['productId']; ?>">

            <!-- prod name & img-->
            <a href="index.php?p=proddetail&product_id=<?php echo htmlspecialchars($itemVe['productId']); ?>" >
                <div class="d-flex justify-content-center"> 
                    <img src="<?php echo $itemVe['productImg'] ?>" 
                    class="card-img img-fluid" style="width: 175px; height: 250px;" alt=""> </div>
                
                <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                    <div class="d-flex justify-content-center px-1"><?php echo $itemVe['productName']; ?></div>
                    
                    <!-- don't forget price-->
                    <div class="px-lg-2 px-1 px-2" 
                        style="border-radius: 5px; border: 1px solid #ffbb33; 
                        color:white;background-color:#ffbb33"> 
                            <?php echo $itemVe['productPrice']; ?> 
                    </div>
                    

                    <!-- this one will be used for cart amount item input-->
                    <input type="hidden" name="veAmount" value="1"/>
                </div>
            </a>
            <!-- button -->
            <div class="d-flex align-items-center justify-content-between py-2 px-1">
                <button class="btn btn-danger text-uppercase" name="buy">Buy Now</button>
                <button class="btn btn-primary text-uppercase" name="add">Add to Cart</button>
            </div>

        </form>
    </div>
    
</div>