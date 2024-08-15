<?php
$search_result = [];
$search_query = '';

if (isset($_GET['dds'])) {
    $search_query = $_GET['dds'];

    // Search query to find matching DDID or productId in doc table and join with product table
    $sql = "SELECT doc.DDID, doc.productId, product.productName, product.productImg, product.productPrice
            FROM doc
            JOIN product ON doc.productId = product.productId
            WHERE doc.DDID LIKE '%$search_query%' OR doc.productId LIKE '%$search_query%'";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_result[] = $row;
        }
    } else {
        $search_result[] = ['DDID' => 'No Data', 'productId' => 'N/A', 'productName' => 'N/A', 'productImg' => '', 'productPrice' => 0];
    }
}

?>