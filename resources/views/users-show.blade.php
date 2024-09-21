<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .user-details {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 20px;
            display: block;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="user-details">
        <h2>{{ $user['name'] }}</h2>
        <p><strong>Age:</strong> {{ $user['age'] }}</p>
        <p><strong>Title:</strong> {{ $user['title'] }}</p>
        <p><strong>Description:</strong> {{ $user['description'] }}</p>
        <p><strong>Date Published:</strong> {{ $user['date_published'] }}</p>
        <a href="{{ route('dashboard') }}" class="btn">Back to Users List</a>
    </div>
</body>
</html>
