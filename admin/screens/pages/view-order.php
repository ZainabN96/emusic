<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
require '../../includes/header.php';
require '../../../class/cls_db.php';

$orderQuery = 'SELECT * FROM orders WHERE order_id = ' . $_GET['order_id'];
$orderArray = select( $orderQuery );

foreach ( $orderArray as $orderRecord ) {
	$order_id = $orderRecord['order_id'];
	if ( $orderRecord['status'] == 2 ) {
		$status = 'In Progress';
	} elseif ( $orderRecord['status'] == 1 ) {
		$status = 'Approved';
	} elseif ( $orderRecord['status'] == 0 ) {
		$status = 'Declined';
	}
}

$list_title = 'Order # ' . $order_id;
$user_name  = getCustomField( 'user_name', 'users', 'user_id', $orderRecord['user_id'] );
?>

	<body class="bg-nav">
		<main class="main" id="top">
			<div class="container-fluid content-area mb-5" data-layout="container">
				<?php require '../../includes/navbar.php'; ?>
                <div class="content">
                    <?php require '../../includes/menu.php'; ?>
                    <a href="list-orders.php" class="btn btn-info btn-custom mb-3 text-black"> <i class="fa fa-arrow-left"></i> Back To List</a>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h3 class="mb-0"><?php echo $list_title; ?> </h3>
                            </div>
                        </div>

                        <h4>User Detail</h4>
                        <p>Name: <?php echo $user_name; ?></p>
                        <hr>

                        <h4>Order Items</h4>
                        <table class="table table-sm" width="80%">
                            <thead class="bg-400">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                            <?php
                            $orderItemsQuery = 'SELECT * FROM order_items WHERE order_id = ' . $order_id;
                            $orderItemsArray = select( $orderItemsQuery );
                            foreach ( $orderItemsArray as $orderItemsRecord ) {
                                $music_id   = $orderItemsRecord['music_id'];
                                $musicQuery = 'SELECT * FROM music WHERE music_id = ' . $music_id;
                                $musicArray = select( $musicQuery );
                                foreach ( $musicArray as $musicRecord ) {
                                    ?>
                                <tr>
                                    <td><?php echo $musicRecord['music_id']; ?></td>
                                    <td><?php echo $musicRecord['music_title']; ?></td>
                                    <td><?php echo $musicRecord['price']; ?></td>
                                    <td><?php echo $musicRecord['discount_price']; ?></td>
                                </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                        <hr>
                        <h4>Payment Detail</h4>
                        <p>Amount: <?php echo $orderRecord['amount']; ?></p>
                        <p>Owner: <?php echo $orderRecord['owner']; ?> </p>
                        <p>Card Number: <?php echo $orderRecord['card_number']; ?> </p>
                        <p>CVV: <?php echo $orderRecord['cvv']; ?> </p>
                        <p>Expiration Date: <?php echo $orderRecord['month']; ?>, <?php echo $orderRecord['year']; ?> </p>
                        <hr>

                        <h4>Order Status</h4>
                        <p><?php echo $status; ?></p>
                        <hr>

                        <a href='../configuration/approve-order.php?order_id=<?php echo $orderRecord['order_id']; ?>' class="btn btn-sm btn-custom" onclick='return confirm("Are You Sure?");'>Approve</a>
                        <a href='../helpingfiles/changestatus.php?tbl=orders&val=0&conditionCol=order_id&conditionVal=<?php echo $orderRecord['order_id']; ?>' class="btn btn-sm btn-custom" onclick='return confirm("Are You Sure?");'>Cancel</a>
                </div>
			</div>
		</main>
		<?php require '../../includes/footer-script.php'; ?>
	</body>

</html>
