<?php


class category
{
    function getAll($connection)
    {
        $sql = "SELECT * FROM category";
        $result  = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $catelist) {
                $mark = [];
                if (isset($_GET['cate'])) {
                    $mark = $_GET['cate'];
                }
?>
                <div>
                    <input type="checkbox" name="cate[]" value="<?= $catelist['CategoryID']; ?>" <?php if (in_array($catelist['CategoryID'], $mark)) 
                    {
                        echo "checked";
                    } ?> />
                    <?= $catelist['CategoryName']; ?>
                </div>
<?php
            }
        } else {
            echo "No Data Found";
        }
    }
}

?>