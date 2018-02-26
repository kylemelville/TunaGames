<?php
	$pageSubTitle = "Contact Us";
	require("../mysqli_connect.php");
	require("./includes/status.php");
	include("./includes/header.php");
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
			$query = "INSERT INTO messages (name, email, subject, message)
				VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['subject']."', '".$_POST['message']."');";
			$result = @mysqli_query($dbc, $query);
			if($result) {
				$statusMessenger->addSuccessMessage("Thanks for the message!");
				$statusMessenger->displaySuccessMessages();
			} else {
				$statusMessenger->addErrorMessage("Your message didn't send because of a system error.");
				$statusMessenger->displayErrorMessages();
			}
			mysqli_close($dbc);
		}
	}
?>
<div id="contact-header">
	<div class="wrapper">Contact Us</div>
</div>
<div class="wrapper">
	<form class="message-form" action="" method="POST">
		<div class="input-field">
			<label for="name">Name</label>
			<input id="name" name="name" type="text" required>
		</div>
		<div class="input-field">
			<label for="email">Email</label>
			<input id="email" name="email" type="email" required>
		</div>
		<div class="input-field">
			<label for="subject">Subject</label>
			<input id="subject" name="subject" type="text" required>
		</div>
		<div class="input-field">
			<label for="message">Message</label>
			<textarea id="message" name="message" type="text" required> </textarea>
		</div>
		<input type="submit" value="SEND">
	</form>
</div>
<?php include("./includes/footer.php"); ?>
<link rel="stylesheet" href="./css/contact.css" type="text/css" />
<script></script><!-- this is here for the Chrome CSS transition load bug -->