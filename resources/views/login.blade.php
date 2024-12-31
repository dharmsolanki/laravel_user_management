<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset margin and padding for body and html */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Centering the form on the page */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        /* Styling the form */
        form {
            width: 100%;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        /* Form header */
        .imgcontainer {
            text-align: center;
            margin-bottom: 20px;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Input Fields Styling */
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Submit Button Styling */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 16px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Styling the Cancel Button */
        .cancelbtn {
            background-color: #f44336;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .cancelbtn:hover {
            background-color: #e53935;
        }

        /* "Remember me" label styling */
        label {
            font-size: 14px;
        }

        .psw {
            float: right;
            font-size: 14px;
        }

        .psw a {
            text-decoration: none;
            color: #4CAF50;
        }

        .psw a:hover {
            text-decoration: underline;
        }

        /* Error message styling */
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            form {
                padding: 20px;
            }

            .imgcontainer img {
                width: 50%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <form action="{{route('login')}}" method="post">
            @csrf

            <div class="imgcontainer">
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            @if($errors->any())
                <div>
                    <p class="error-message">{{ $errors->first() }}</p>
                </div>
            @endif
            <div>
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>

                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
        </form>
    </div>
</body>
</html>
