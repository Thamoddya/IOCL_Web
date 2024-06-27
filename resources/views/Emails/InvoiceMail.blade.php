<!-- resources/views/emails/transaction_completed.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Completed</title>
</head>
<body>
<h1>Transaction Completed Successfully</h1>
<p>Dear {{ $user->name }},</p>
<p>Thank you for your purchase! Your transaction ID is {{ $transaction->transaction_no }}.</p>
<p>Best regards,</p>
<p>{{ config('app.name') }}</p>
</body>
</html>
