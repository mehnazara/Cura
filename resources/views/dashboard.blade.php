<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elderly Nursing Care Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: right;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        .container {
            padding: 20px;
        }

        .profile {
            margin-top: 50px;
            text-align: center;
        }

        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="#">Upload Image</a>
        <a href="#">Update Info</a>
        <a href="#">Logout</a>
    </div>

    <div class="container">
        <div class="profile">
            <img src="{{ asset('images/user-profile-image.jpg') }}" alt="User Profile Image">
            <h2>User's Name</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <p>user@example.com</p>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <p>123-456-7890</p>
            </div>
            <!-- Add more user info fields as needed -->
        </div>
    </div>
</body>

</html>
