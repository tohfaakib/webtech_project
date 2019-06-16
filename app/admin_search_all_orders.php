<?php
session_start();
include 'common.php';
include '../service/user_service.php';
include '../data/search_data_access.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="admincss.css">
	</head>
	<body>
    
        <table class="table table-responsive">
        <br>
            <thead>
                <!-- <th>Select All</th> -->
                <th width="300px">Product Model</th>
                <th width="200px">Product Image</th>
                <th width="200px">Price</th>
                <th width="200px">Quantity</th>
                <th width="200px">Customer Name</th>
                <th width="200px">Customer Email</th>
                <th width="200px">Customer Mobile</th>
                <th width="200px">Customer Address</th>
                <th width="200px">Customer Comment</th>
            </thead>
            <span class="search-products-text pull-left">Search Products</span><br><br>
            <tbody>
                <?php
                $query1=admin_search_all_orders_Query();
                $rows1=mysqli_num_rows($query1);
                if($rows1>0)
                {
                    while($row=mysqli_fetch_assoc($query1))  
                    {
                ?>
                <tr>
                    <td><?= $row['model']?></td>
                    <td><img src="images/<?= $row['main_image']?>" width="80px;"></td>
                    <td> <?= $row['price']?></td>
                    <td><?= $row['quantity']?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['mobile']?></td>
                    <td><?= $row['address']?></td>
                    <td><?= $row['comment']?></td>	
                </tr>
                <?php }}
                else
                {
                    echo "<td class='error'>No result found</td>";
                }
                ?>
            </tbody>
        </table><hr style="border:1px solid #1c67d8">
	</body>
</html>

