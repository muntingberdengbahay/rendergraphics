<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';
require __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';


function sendPasswordResetEmail($email, $resetToken) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'support@wearerendergraphics.com'; // Replace with your Gmail SMTP
        $mail->Password = 'Portfolionih34ven!';   // Use App Password, not your actual Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Email Configuration
        $mail->setFrom('support@wearerendergraphics.com', 'Render Graphics Support');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';

        // Generate Reset Link
        $resetLink = "https://wearerendergraphics.com/reset-password.php?token=" . $resetToken;

        // Email Template
        $mail->Body = "
            <div style='font-family:Arial,sans-serif;max-width:600px;margin:auto;border:1px solid #ddd;padding:20px;border-radius:8px'>
                <h2 style='color:#7f5539'>Password Reset Request</h2>
                <p>You requested a password reset. Click below to reset your password:</p>
                <div style='text-align:center;margin:20px 0'>
                    <a href='{$resetLink}' style='background-color:#9c6644;color:white;padding:12px 25px;text-decoration:none;border-radius:5px;display:inline-block' target='_blank'>
                        Reset Password
                    </a>
                </div>
                <p>If you did not request this, please ignore this email.</p>
                <hr>
                <p style='color:#999;font-size:0.9em'>© 2025 Render Graphics</p>
            </div>
        ";

        // Send Email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
