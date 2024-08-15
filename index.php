
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8" />
    <title>AnyIdeaStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!--<script src="JS/tab_switch_with_cookie.js"></script>-->
</head>
<body>
    <div >
        <?php include 'HTML/shop/menu.php' ?>
    </div>
    <div>
        <?php 
            if(isset($_GET['p'])){
                $page = $_GET['p'];
                switch($page){
                    case 'home':
                        include 'HTML/shop/home_page.php';
                        break;
                    case 'about':
                        include 'HTML/shop/about.php';
                        break;
                    case 'contact':
                        include 'HTML/shop/contact.php';
                        break;
                    case 'cart':
                        include 'HTML/cart/cart.php';
                        break;
                    case 'checkout':
                        include 'HTML/cart/checkout.php';
                    case 'log':
                        include 'HTML/user/login.php';
                        break;
                    case 'reg':
                        include 'HTML/user/register.php';
                        break;
                    case 'fg':
                        include 'HTML/user/fg_pass.php';
                        break;
                    case 'rs':
                        include 'HTML/user/rs_pass.php';
                        break;
                    case 'out':
                        include 'HTML/user/logout.php';
                        break;
                    case 'his':
                        include 'HTML/cart/history.php';
                        break;
                    case 'user':
                        include 'HTML/user/user_menu.php';
                        break;
                    case 'loginfo':
                        include 'HTML/user/login_info.php';
                        break;
                    case 'doc':
                        include 'HTML/doc/doc_desc.php';
                        break;
                    case 'shopindex':
                        include 'HTML/shop/index.php';
                        break;
                    case 'proddetail':
                        include 'HTML/shop/product_detail.php';
                        break;
                    case 'admin':
                        include 'HTML/admin/index.php';
                        break;
                    default:
                        include 'HTML/shop/index.php';
                        
                }
            }else{
                include 'HTML/shop/home_page.php';
            }
        ?>
    </div>
    <div style="margin-botton:20px"><?php include("../Drug/HTML/shop/footer.php") ?></div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>