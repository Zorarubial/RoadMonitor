<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/style.css'])
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="container">
                <a href="/" class="navbar-brand">My System</a>
                <ul class="nav-links">
                    <li><a href="{{ route('road.index') }}">Go Back to Home</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="main-content">
        <div class="container">
            <h1>Login</h1>
            <form method="POST" action="{{ route('road.login') }}">
                @csrf
                <label>Email:</label>
                <input type="email" name="email" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>


    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>
</body>
</html>
