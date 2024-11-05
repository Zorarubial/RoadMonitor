<!-- resources/views/road/user-management.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    @vite(['resources/css/style.css', 'resources/js/app.js']) <!-- Include Vite for styles and scripts -->


    <style>

        .search-txtfield {
            padding: 10px 15px 10px 15px;
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            font-weight: bold;
            color: black;
            transition: background-color 0.3s ease; /* Smooth background transition */
        }
        .search-button {
            padding: 10px 15px 10px 15px;
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            font-weight: bold;
            color: black;
            transition: background-color 0.3s ease; /* Smooth background transition */
        }
        .action-button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease; /* Smooth background transition */
        }
        .edit-button {
            background-color: lightseagreen; /* light seagreen background for edit */
        }

        .edit-button:hover {
            background-color: green; /* Darker green on hover */
        }

        .delete-button {
            background-color: #dc3545; /* Red background for delete */
        }

        .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <nav class="navbar">
            <div class="container">
                <a href="/" class="navbar-brand">My System</a>
                <ul class="nav-links">
                    <li><a href="{{ route('road.admin.dashboard') }}">Go Back to Dashboard</a></li>
                    
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1>User Management</h1>

            <!-- Search Filter -->
            <div class="search-filter" style="text-align: center; width: 100%;">
                <form method="GET" action="{{ route('road.admin.users.index') }}">
                    <input class="search-txtfield" type="text" name="search" placeholder="Search users..." value="{{ request()->query('search') }}">
                    <button class="search-button" type="submit">Search</button>
                </form>
            </div>
            <br>
            <!-- User Table -->
            @if ($users->isEmpty())
                <p>No users found.</p>
            @else
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <button class="action-button edit-button">Edit</button> | 
                                    <button class="action-button delete-button">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <!-- Pagination -->
            <div class="pagination-links">
                {{ $users->links() }}
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>
</body>
</html>
