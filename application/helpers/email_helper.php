<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('send_contact_us')) {
	function send_contact_us($name, $email_address, $subject, $message) {
		$subject_title = 'Contact Us';
		$mailContent = "<!DOCTYPE html>";
		$mailContent .= "<html>";
		$mailContent .= "<head>";
		$mailContent .= "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />";
		$mailContent .= "<title></title>";
		$mailContent .= "<meta name='viewport' content='width=device-width, initial-scale=1.0' />";
		$mailContent .= "</head>";
		$mailContent .= "<body style='margin: 0; padding: 0;'>";
		$mailContent .= "<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #ccc;'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td bgcolor='#fafafa' style='padding: 40px 30px 40px 30px;'>";
		$mailContent .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>";
		$mailContent .= "<b>" . $subject_title . " | " . SYSTEM_TITLE . "</b>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>";
		$mailContent .= "<p>Hi " . SYSTEM_TITLE . ",</p>";
		$mailContent .= "<p>"  . $message  . "</p>";
		$mailContent .= "<p> - " . $name . " | " . $email_address   . "</p>";
		$mailContent .= "<p><strong>" . SYSTEM_TITLE . "</strong></p>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "</tr>";
		$mailContent .= "</table>";
		$mailContent .= "</table>";
		$mailContent .= "</body>";
		$mailContent .= "</html>";
		send_email_content(SENDER_USERNAME, $subject_title, $mailContent);
	}
}

if ( ! function_exists('send_forgot_password')) {
	function send_forgot_password($user, $forgot_password_code) {
		$subject = 'Forgot Password';
		$mailContent = "<!DOCTYPE html>";
		$mailContent .= "<html>";
		$mailContent .= "<head>";
		$mailContent .= "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />";
		$mailContent .= "<title></title>";
		$mailContent .= "<meta name='viewport' content='width=device-width, initial-scale=1.0' />";
		$mailContent .= "</head>";
		$mailContent .= "<body style='margin: 0; padding: 0;'>";
		$mailContent .= "<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #ccc;'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td bgcolor='#fafafa' style='padding: 40px 30px 40px 30px;'>";
		$mailContent .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>";
		$mailContent .= "<b>" . $subject . " | " . SYSTEM_TITLE . "</b>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>";
		$mailContent .= "<p>Hi " . $user['first_name'] . ' ' . $user['last_name'] . ",</p>";
		$mailContent .= "<p>Someone has requested a link to change your password. You can do this by clicking the link below:</p>";
		$mailContent .= "<a href='" . base_url() . 'users/set_new_password/' . $forgot_password_code . "' target='_blank'>Click Here</a>";
		$mailContent .= "<p>If you did not initiate this request, you may safely ignore this one-time message. The request will expire shortly.</p>";
		$mailContent .= "<p>NOTE: This is a system generated message, do not reply or send to this address.</p>";
		$mailContent .= "<p><strong>" . SYSTEM_TITLE . "</strong></p>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "</tr>";
		$mailContent .= "</table>";
		$mailContent .= "</table>";
		$mailContent .= "</body>";
		$mailContent .= "</html>";
		send_email_content($user['email_address'], $subject, $mailContent);
	}
}

if ( ! function_exists('send_payment_details')) {
	function send_payment_details($first_name, $last_name, $reference_no, $username, $check_in_date, $check_out_date, $no_of_guests, $total_price, $reservation_status, $mode_of_payment) {
		$ci = &get_instance();
		$ci->load->model('Payment_details_model', 'M_payment_details');
		$payment_details = $ci->M_payment_details->get_first();

		if (!$payment_details) return;

		$subject = 'Payment Details';
		$mailContent = "<!DOCTYPE html>";
		$mailContent .= "<html>";
		$mailContent .= "<head>";
		$mailContent .= "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />";
		$mailContent .= "<title></title>";
		$mailContent .= "<meta name='viewport' content='width=device-width, initial-scale=1.0' />";
		$mailContent .= "</head>";
		$mailContent .= "<body style='margin: 0; padding: 0;'>";
		$mailContent .= "<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #ccc;'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td bgcolor='#fafafa' style='padding: 40px 30px 40px 30px;'>";
		$mailContent .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>";
		$mailContent .= "<b style='text-align: center;'>" . $subject . " | " . SYSTEM_TITLE . "</b>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>";
		$mailContent .= "<p>Hi " . $first_name . ' ' . $last_name . ",</p>";
		$mailContent .= "<p>Thank you for booking!</p>";
		$mailContent .= "<p>Reference No: " . $reference_no . "</p>";
		$mailContent .= "<p>Check In: " . $check_in_date . "</p>";
		$mailContent .= "<p>Check Out: " . $check_out_date . "</p>";
		$mailContent .= "<p>Number of Guests: " . $no_of_guests . " person/s</p>";
		$mailContent .= "<p>Minimum Downpayment: " . money_php(round($total_price / 2)) . "</p>";
		$mailContent .= "<p>Total Amount: " . money_php($total_price) . "</p>";
		$mailContent .= "<p>Status: " . Dropdown::get_static('reservation_status', $reservation_status, 'view') . "</p>";
		$mailContent .= "<p>Mode of Payment: " . $mode_of_payment . "</p>";
		$mailContent .= "<hr>";
		$mailContent .= "<b style='justify-content: center;'>Payment Details</b>";
		$mailContent .= "<p>For GCash Method:" . "</p>";
		$mailContent .= "<p>Name: " . $payment_details['gcash_name'] . "</p>";
		$mailContent .= "<p>Number: " . $payment_details['gcash_account_number'] . "</p>";
		$mailContent .= "<hr>";
		$mailContent .= "<p>For Bank Transfer Method:" . "</p>";
		$mailContent .= "<p>Account Name: " . $payment_details['bank_account_name'] . "</p>";
		$mailContent .= "<p>Account Number: " . $payment_details['bank_account_number'] . "</p>";
		$mailContent .= "<p>NOTE: This is a system generated message, do not reply or send to this address.</p>";
		$mailContent .= "<p><strong>" . SYSTEM_TITLE . "</strong></p>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "</tr>";
		$mailContent .= "</table>";
		$mailContent .= "</table>";
		$mailContent .= "</body>";
		$mailContent .= "</html>";
		send_email_content($username, $subject, $mailContent);
	}
}

if ( ! function_exists('send_account_info')) {
	function send_account_info($first_name, $last_name, $username, $password) {
		$subject = 'Account Information';
		$mailContent = "<!DOCTYPE html>";
		$mailContent .= "<html>";
		$mailContent .= "<head>";
		$mailContent .= "<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />";
		$mailContent .= "<title></title>";
		$mailContent .= "<meta name='viewport' content='width=device-width, initial-scale=1.0' />";
		$mailContent .= "</head>";
		$mailContent .= "<body style='margin: 0; padding: 0;'>";
		$mailContent .= "<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border: 1px solid #ccc;'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td bgcolor='#fafafa' style='padding: 40px 30px 40px 30px;'>";
		$mailContent .= "<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='color: #153643; font-family: Arial, sans-serif; font-size: 24px;'>";
		$mailContent .= "<b>" . $subject . " | " . SYSTEM_TITLE . "</b>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "<tr>";
		$mailContent .= "<td style='padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'>";
		$mailContent .= "<p>Hi " . $first_name . ' ' . $last_name . ",</p>";
		$mailContent .= "<p>Your reservation has been successfully submitted. Please wait for the confirmation of staff.</p>";
		$mailContent .= "<p>If you want to check the status of your reservation kindly login to your account.</p>";
		$mailContent .= "<p>Account Credentials:</p>";
		$mailContent .= "<p>Username: " . $username . "</p>";
		$mailContent .= "<p>Password: " . $password . "</p>";
		$mailContent .= "<p>If you logged in for the first time please change your password immediately for the safety of your account.</p>";
		$mailContent .= "<p>NOTE: This is a system generated message, do not reply or send to this address.</p>";
		$mailContent .= "<p><strong>" . SYSTEM_TITLE . "</strong></p>";
		$mailContent .= "</td>";
		$mailContent .= "</tr>";
		$mailContent .= "</tr>";
		$mailContent .= "</table>";
		$mailContent .= "</table>";
		$mailContent .= "</body>";
		$mailContent .= "</html>";
		send_email_content($username, $subject, $mailContent);
	}
}

if ( ! function_exists('send_email_content'))
{
	function send_email_content($email_address = null, $subject = null, $mail_content = null, $attachment_content = null)
	{
		$ci = &get_instance();
		// Load PHPMailer library
		$ci->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $ci->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host = SENDER_HOST;
		$mail->SMTPAuth = true;
		$mail->Username = SENDER_USERNAME;
		$mail->Password = SENDER_PASSWORD;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = SENDER_PORT;

		$mail->setFrom(SENDER_USERNAME, SYSTEM_TITLE);
		$mail->addReplyTo(SENDER_USERNAME, SYSTEM_TITLE);

		// Add a recipient
		$mail->addAddress($email_address);

		$mail->Subject = $subject . ' | ' . SYSTEM_TITLE;;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mail->Body = $mail_content;

		if ($attachment_content) $mail->addAttachment($attachment_content);

		// Send email
		return $mail->send();
	}
}

