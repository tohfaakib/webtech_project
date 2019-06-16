<?php
session_start();
include 'common.php';
include '../service/user_service.php';
include '../data/search_data_access.php';
$id=$_SESSION['user']['id'];
$email=$_SESSION['user']['email'];
$imgnamel=$_SESSION['user']['imgname'];
$address=$_SESSION['user']['address'];
// get all values from  users session
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			body
			{
				margin-top: 52px;
				padding: 0%;
			}
			
			table tbody tr:hover
			{
				transition: all .3s ease-in-out;
				background:#fff;
			}
			.products-container
			{
				background: #1c67d8;
				height: 40px;
				padding: 1px;
			}
			.products-container h4
			{
				padding: 1px 10px;
			}
			.mysearchbox
			{
				border: .1px solid #fff;
				border-radius: 2px;
				-webkit-box-shadow: 0 0 10px rgba(0, 0, 204, .3);
				box-shadow: 0 0 10px rgba(0, 0, 204, .3);
				background-image: url("images/search.png");
				background-position: 123px 3px; 
  				background-repeat: no-repeat;
			}
		
			.mysearchbox:hover
			{
				transition: all .3s ease-in-out;
				-webkit-box-shadow: 0 0 10px rgba(0, 0, 204, .5);
    			box-shadow: 0 0 10px rgba(0, 0, 204, .5);
			}
			.mysearchbox:focus
			{
				transition: all .3s ease-in-out;
				-webkit-box-shadow: 0 0 10px rgba(255, 255, 255, .7);
    			box-shadow: 0 0 10px rgba(255, 255, 255, .7);
			}
			.myseacrh
			{
				padding: 7px 10px;
			}
            .search-products-text
			{
				font-size: 17;			
				color: #4d94ff;
			}
            .error
            {
                color:red;
            }
		</style>
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
                $query1=owner_search_orders_products_Query($id);
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

