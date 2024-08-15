<?php 
 include '../Drug/HTML/shop/xampp_connection.php'
?>
<div class="flex-grow-1 p-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            
        </div>

        <div class="row">
            <!-- Sales box -->
            <div class="col-lg-6 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            <?php
                            // Fetch the total number of orders from the order table
                            $order_sql = "SELECT COUNT(*) as total_orders FROM `order`";
                            $order_result = $connection->query($order_sql);
                            $order_data = $order_result->fetch_assoc();
                            echo $order_data['total_orders'];
                            ?>
                        </h3>
                        <p>Sales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="http://localhost:8081/Drug/index.php?p=admin&ap=uorder" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- User box -->
            <div class="col-lg-6 col-12">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            <?php
                            // Fetch the total number of users from the users table
                            $user_sql = "SELECT COUNT(*) as total_users FROM user";
                            $user_result = $connection->query($user_sql);
                            $user_data = $user_result->fetch_assoc();
                            echo $user_data['total_users'];
                            ?>
                        </h3>
                        <p>New Members</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="http://localhost:8081/Drug/index.php?p=admin&ap=user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Income Chart -->
        <?php
        // Include database connection file
        include '../Drug/HTML/shop/xampp_connection.php';

        $monthly_sales_data = [];

        // Query to get total sales per month
        $sql = "SELECT DATE_FORMAT(order_date, '%Y-%m') AS month, SUM(sum_price) AS total_sales 
                FROM `order` 
                GROUP BY month 
                ORDER BY month";

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $monthly_sales_data[] = $row;
            }
        } else {
            // If no data is available, set a default message
            $monthly_sales_data[] = ['month' => 'No Data', 'total_sales' => 0];
        }

        $connection->close();
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Monthly Sales Report</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($monthly_sales_data as $data): ?>
                                    <tr>
                                        <td><?php echo $data['month']; ?></td>
                                        <td><?php echo number_format($data['total_sales'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
