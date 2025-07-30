<!-- resources/views/errors/404.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #f2f2f2;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        .error-code {
            font-size: 10rem;
            font-weight: 700;
            color: #e74c3c;
        }

        .message {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 1.2rem;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="error-code">404</div>
    <div class="message">Oops! Page not found.</div>
    <a href="{{ url('/') }}">Go back to Home</a>
</body>

</html>
