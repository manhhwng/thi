<?php
$baseUrl = '';
include_once('./layouts/header.php');
$db = new Database();
$sql = "select products.*, categories.name as category_name from products left join categories on products.category_id = categories.id WHERE deleted=0 ORDER BY id desc limit 0,8";
$lastestItems = $db->executeResult($sql);
?>
<!-- banner -->
<?php require_once('./slider.php') ?>

<!-- danh muc san pham -->
<?php
$count = 0;
foreach ($menuItems as $item) {
	$sql = "select products.*, categories.name as category_name from products left join categories on products.category_id = categories.id where products.category_id = " . $item['id'] . " AND deleted=0";
	// ." order by products.updated_at desc limit 0,4"
	$items = $db->executeResult($sql);
	if ($items == null || count($items) < 4) continue;

?>
	<div style="background-color: <?= ($count++ % 2 == 0) ? '#f7f9fa' : '' ?>;">
		<div class="container">
			<h1 style="text-align: center; margin-top: 60px; margin-bottom: 20px;"><?= $item['name'] ?></h1>
			<div class="row">
				<?php
				foreach ($items as $pItem) {
					echo '<div class="col-md-3 col-6 product-item">
				<a href="detail.php?id=' . $pItem['id'] . '"><img src="' . $pItem['image'] . '" style="width: 100%; height: 220px;"></a>
				<p style="font-weight: bold;">' . $pItem['category_name'] . '</p>
				<a href="detail.php?id=' . $pItem['id'] . '"><p style="font-weight: bold;">' . $pItem['name'] . '</p></a>
				<p style="color: red; font-weight: bold;">' . number_format($pItem['price']) . ' VND</p>
				<p><button class="btn btn-success" onclick="addCart(' . $pItem['id'] . ', 1)" style="width: 100%; border-radius: 0px;"><i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng</button></p>
			</div>';
				}
				?>
			</div>
		</div>
	</div>

<?php
}
require_once('./layouts/footer.php');
?>