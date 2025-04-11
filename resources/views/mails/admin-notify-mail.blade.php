<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SakarlTech Training</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            background-color: #0b67a5;
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .content {
            padding: 20px;
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }

        .highlight {
            color: #0b67a5;
            font-weight: bold;
        }

        .cta-button {
            background-color: #41d6fe;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: inline-block;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #0b67a5;
        }

        .footer {
            background: #0b67a5;
            color: white;
            padding: 15px;
            font-size: 14px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            Registration Alert!
        </div>
        <div class="content">
            <p>Hello !</p>
            <p>A user just registered for the <span class="highlight">{{ $course_name }}</span> course.</p>
            <p>The total cost of the course is <strong> {{ $course_price }}</strong>.</p>
            <p>Kindly find the user details below for follow up:</p>



            <p>Name: {{ $name }}</p>
            <p>Course: {{ $course_name }} </p>
            <p>Course Price:{{ $course_price }} </p>
            <p>Course Payment Link Sent: {{ $payment_link }} </p>


        </div>

        <div class="footer">
            &copy; 2024 SakarlTech Training | All Rights Reserved.
        </div>
    </div>

</body>

</html>
