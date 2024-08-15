<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>


<div class="d-flex">
    <div class="bg-dark text-white p-3" style="width: 250px; margin: 20px 0 0 0">
    <?php include('includes/sidebar.php'); ?>
    </div>

    <?php 
        if(isset($_GET['ap'])){
            $ap = $_GET['ap'];
            switch($ap){
                case 'dash':
                    include('page/dashboard.php');
                    break;
                case 'user':
                    include('page/user.php');
                    break;
                case 'prod':
                    include('page/prod.php');
                    break;
                case 'categ':
                    include('page/cate.php');
                    break;
                case 'uorder':
                    include('page/order.php');
                    break;
                case 'docdesc':
                        include('page/doc_desc.php');
                        break;
            }
        }else{
            include('page/dashboard.php');
        }
    ?>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="tempScale.js"></script>

</body>
</html>
