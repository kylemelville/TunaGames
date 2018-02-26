<?php
	class StatusMessenger {
		private $errorMessages = array();
		private $successMessages = array();

		function addErrorMessage($message) {
			array_push($this->errorMessages, $message);
		}

		function addSuccessMessage($message) {
			array_push($this->successMessages, $message);
		}

		function displayErrorMessages() {
			$errorBanner = '<div class="error banner">
					<div class="wrapper">
						<img src="./images/ui/sicktuna.png">
						<ul class="messages">';
			foreach($this->errorMessages as &$message) {
				$errorBanner = $errorBanner.'<li>'.$message.'</li>';
			}					
			$errorBanner = $errorBanner.'</ul>
					</div>
				</div>';
			echo $errorBanner;
		}

		function displaySuccessMessages() {
			$successBanner = '<div class="success banner">
					<div class="wrapper">
						<img src="./images/ui/sweatytuna.png">
						<ul class="messages">';
			foreach($this->successMessages as &$message) {
				$successBanner = $successBanner.'<li>'.$message.'</li>';
			}
			$successBanner = $successBanner.'</ul>
					</div>
				</div>';
			echo $successBanner;
		}
	}
	$statusMessenger = new StatusMessenger;
?>
<link rel="stylesheet" href="./css/status.css" type="text/css" />