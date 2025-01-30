<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="css/styles1.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" action="{{route('register.post')}}" method="POST">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="error-return">{{$error}}</p>
                @endforeach
            @endif
            <div class="form-group">
                <label for="regUsername">Username:</label>
                <input type="text" id="regUsername" name="username" required>
            </div>
            <div class="form-group">
                <label for="regPassword">Password:</label>
                <input type="password" id="regPassword" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="userRole">Select Your Role:</label>
                <select id="userRole" name="userRole" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="student">Student</option>
                    <option value="professional">Professional</option>
                    <option value="educator">Educator</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="{{route('login.index')}}">Login here</a></p>
    </div>
</body>
</html>
