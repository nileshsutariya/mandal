<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

        .registration-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .registration-container h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
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

        .btn-custom {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #2575fc;
        }

        .signin-link a {
            color: #6a11cb;
            text-decoration: none;
        }

        .signin-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <h3>Register</h3>
        <form  action="{{ route('user.store') }}" method="post">
        @csrf
            <div class="mb-4 form-group">
                <label for="name" class="form-label">Full Name</label>
                <div class="form-control-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name">
                </div>
            </div>
            <div class="mb-4 form-group">
                <label for="mobile" class="form-label">Mobile</label>
                <div class="form-control-icon">
                    <i class="fas fa-phone"></i>
                    <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
            </div>
            <div class="mb-4 form-group">
                <label for="password" class="form-label">Password</label>
                <div class="form-control-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
            </div>
            <div class="mb-4 form-group">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <div class="form-control-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="confirm-password" name="confirmpassword" class="form-control"
                        placeholder="Confirm your password">
                </div>
            </div>
            <button type="submit" class="btn btn-custom w-100">Register</button>
        </form>
        <div class="text-center signin-link mt-4">
            <p>Already have an account? <a href="{{route('login')}}">Sign In</a></p>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
