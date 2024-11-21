<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .login-container h3 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control-icon {
            position: relative;
        }

        .form-control-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-control {

            padding-left: 35px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            outline: none;
            box-shadow: none;
            border: none;
        }

        .btn-custom {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: scale(1.05);
        }

        .signup-link a {
            color: #2575fc;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-in-out;
        }

        .error-message i {
            font-size: 24px;
            margin-right: 15px;
        }

        .error-message .message-content {
            font-size: 16px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .error-message button {
            background-color: transparent;
            border: none;
            color: #721c24;
            font-size: 18px;
            cursor: pointer;
            margin-left: auto;
            transition: color 0.3s;
        }

        .error-message button:hover {
            color: #f5c6cb;
        }
    </style>
</head>

<body>
  
    <div class="login-container">
        @if($errors->any())
     <div class="error-message">
        <i class="fas fa-exclamation-triangle"></i>
        <div class="message-content">
            <strong>Error</strong><br>
            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button onclick="this.parentElement.style.display='none'"><i class="fas fa-times"></i></button>
    </div>
    @endif

        <h3>Login</h3>
        <form action="{{ route('login.check') }}" method="post">
        @csrf
            <div class="mb-4 form-group">
                <label for="mobile" class="form-label">Username</label>
                <div class="form-control-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="mobile" id="mobile" name="mobile" class="form-control" placeholder="Enter your Username">
                </div>
            </div>
            <div class="mb-4 form-group">
                <label for="password" class="form-label">Password</label>
                <div class="form-control-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter your password">
                </div>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
        <div class="text-center signup-link mt-4">
            <p>Don't have an account? <a href="{{route('register')}}">Sign Up</a></p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
