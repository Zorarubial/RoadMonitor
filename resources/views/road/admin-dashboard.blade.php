<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/style.css', 'resources/css/admin-style.css', 'resources/js/app.js']) <!-- Include the main and additional CSS file -->
</head>
<body>
    <!-- Header (keeps consistency with other pages) -->
    <header class="main-header">
        <nav class="navbar">
            <div class="container">
                <a href="/" class="navbar-brand">My System</a>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <!-- insert more navigation buttons  -->
                </ul>
            </div>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="admin-sidebar">
        <h2 style="background-color: darkseagreen" >Admin Dashboard</h2>
        <ul class="sidebar-links">
            <li><a href="{{ route('road.create') }}">Register Roadwork</a></li>
            <li><a href="{{ route('road.gallery') }}">View All Roads</a></li>
            <li><a href="{{ route('road.admin.users.index') }}">User Management</a></li>
            <li><a href="#">Reports and Analytics</a></li>
            <li><a href="#">Feedback Management</a></li>
            <li><a href="#">Announcements and Notifications</a></li>
            <li><a href="#">Project Progress Tracker</a></li>
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="container" style="text-align: center; height: 357px;">
            <h1>Welcome to the Admin Dashboard</h1>
            <p>Select an option from the sidebar to get started.</p>
        </div>
    </div>

    <!-- Footer (keeps consistency with other pages) -->
    <br>
    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>
</body>
</html>
