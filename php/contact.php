<?php

	// Mail settings
	$to      = "info@yourcloudshop.com";
	$subject = "YOURCLOUDSHOP Inquiry";

	// You can put here your email
	$header = "From: noreply@yourcloudshop.com\r\n";
	$header.= "MIME-Version: 1.0\r\n";
	$header.= "Content-Type: text/plain; charset=utf-8\r\n";
	$header.= "X-Priority: 1\r\n";

	if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["store_name"]) && isset($_POST["mobile_no"])) {

		$content  = "Full Name: "      . $_POST["name"]    . "\r\n";
		$content .= "Store Name: " . $_POST["store_name"]   . "\r\n";
		$content .= "Email: " . $_POST["email"]   . "\r\n";
		$content .= "Mobile Number: " . $_POST["mobile_no"]   . "\r\n";
		$content .= "Message: "     . $_POST["message"]   . "\r\n";

		if (mail($to, $subject, $content, $header)) {
			$result = array(
				"sendstatus" => 1
			);

			echo json_encode($result);
		} else {
			$result = array(
				"sendstatus" => 0
			);

			echo json_encode($result);
		}

	}

?>