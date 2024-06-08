<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #eeeeee;
        }

        .header img {
            max-width: 100px;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            color: #333333;
        }

        .content p {
            color: #666666;
            line-height: 1.6;
        }

        .content a.button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #eeeeee;
            color: #999999;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="{{route('home')}}"><img src="https://i.ibb.co/FxyNR9V/logo.png" alt="logo" border="0" /></a>
    </div>
    <div class="content">
        <p>Dear {{ $firstName }} {{ $lastName }},</p>
        <p>Thank you for enrolling as a student of IOCL - Student Online Learning Advancement Portal. You have
            successfully completed your student enrollment, and your logon account for the IOCL Network will be
            activated within one hour.</p>
        <p><strong style="color: #0a3622">IOCL ID:</strong> {{ $ioclId }}</p>
        <p>The details you have provided in your enrollment application, including your username, first name, last name,
            and course details, have now been included on the student portal.</p>
        <p>You can access the student portal by following this link: <a href="{{route('login')}}" target="_blank">www.iocl.edu.lk</a>
        </p>
        <p>You can change your password from home or any PC with Internet access by visiting <a href="{{route('home')}}"
                                                                                                target="_blank">www.icol.com</a>.
            As a security measure, you will need to change your password on your first login.</p>
        <h3>Choosing a Suitable Password</h3>
        <p>Your password should be easy for you to remember but also difficult for others to guess. Therefore, there are
            certain requirements that your password should meet:</p>
        <ul>
            <li>The password should have at least 8 characters, at least 1 digit, at least 1 lower case letter, at least
                1 upper case letter, and at least 1 non-alphanumeric character.
            </li>
        </ul>
        <p>If you require any assistance, please contact Mr. John Doe at <a href="mailto:support@iocl.edu.lk">support@iocl.edu.lk</a>
        </p>
        <p>Welcome to IOCL - Student Online Learning Advancement Portal. We are certain that you will find the
            experience worthwhile and highly enjoyable.</p>
        <p>Remember, your student account is specific to you.<br>
            Please do not pass on your details to anyone else.</p>
    </div>
    <div class="footer">
        <p>&copy; 2024 IOCL. All rights reserved.</p>
    </div>
</div>
</body>
</html>
