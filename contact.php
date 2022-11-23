<?php
require_once('layouts/header.php');
// var_dump($_POST);
if (!empty($_POST)) {
	$first_name = Utility::getPost('first_name');
	$last_name = Utility::getPost('last_name');
	$email = Utility::getPost('email');
	$phone_number = Utility::getPost('phone');
	$subject_name = Utility::getPost('subject_name');
	$note = Utility::getPost('note');
	$created_at = $updated_at = date('Y-m-d H:i:s');

	$sql = "insert into FeedBack(firstname, lastname, email, phone_number, subject_name, note, status, created_at, updated_at) values('$first_name', '$last_name', '$email', '$phone_number', '$subject_name', '$note', 0, '$created_at', '$updated_at')";
	// echo $sql;
	$db = new Database();
	$resutl = $db->execute($sql);
}
?>
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<form method="post">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input required="true" type="text" class="form-control" id="usr" name="first_name" placeholder="Nhập tên">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input required="true" type="text" class="form-control" id="usr" name="last_name" placeholder="Nhập họ">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input required="true" type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
				</div>
				<div class="form-group">
					<input required="true" type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập sđt">
				</div>
				<div class="form-group">
					<input required="true" type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Nhập chủ đề">
				</div>
				<div class="form-group">
					<label for="pwd">Nội dung:</label>
					<textarea class="form-control" rows="3" name="note"></textarea>
				</div>
				<a href="checkout.php"><button class="btn btn-success" onclick="handleContact()" style="border-radius: 0px; font-size: 26px; width: 100%;">GỬI PHẢN HỒI</button></a>
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14894.629801668254!2d105.7849436!3d21.046388!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1668435459392!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</form>
</div>
<?php
require_once('layouts/footer.php');
?>

<script>
	function handleContact() {
		firstName = $('[name=first_name]').val();
		lastName = $('[name=last_name]').val();
		email = $('[name=email]').val();
		subject_name = $('[name=subject_name]').val();
		note = $('[name=note]').val();

		if (firstName != '' && lastName != '' && email != '' && subject_name != '' && note != '') {
			alert("Cảm ơn bạn đã gửi phản hồi")
		}

	}
</script>