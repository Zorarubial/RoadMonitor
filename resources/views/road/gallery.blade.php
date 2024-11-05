<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN to include Leaflet's JavaScript and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <title>Road Gallery</title>
    @vite(['resources/css/style.css', 'resources/js/app.js','resources/js/gallery.js']) <!-- Use Vite for CSS and JS -->
    <style>
        /* Styles for the action buttons */
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
            <h1>Roadwork Gallery</h1>

            @if ($roads->isEmpty())
                <p>No roadwork entries found.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Image</th> <!-- New column for image -->
                            <th>Road Name</th>
                            <th>Segment Number</th>
                            <th>Description</th>
                            <th>Latitude</th> <!-- New column for latitude -->
                            <th>Longitude</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roads as $road)
                            <tr>
                                <td>
                                    @if ($road->image_path) <!-- Check if image path exists -->
                                        <img src="{{ asset('storage/' . $road->image_path) }}" alt="{{ $road->roadname }}" style="width: 100px; height: auto;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $road->roadname }}</td>
                                <td>{{ $road->segment_number }}</td>
                                <td>{{ $road->description }}</td>
                                <td>{{ $road->latitude }}</td> <!-- Display latitude -->
                                <td>{{ $road->longitude }}</td> 
                                <td>
                                    <!-- Actions for edit or delete can be added here -->
                                    <button class="action-button edit-button" onclick="window.location.href='{{ route('road.edit', $road->id) }}'">Edit</button>
                                    <button class="action-button delete-button" onclick="event.preventDefault(); confirmDelete('{{ $road->id }}');">Delete</a>
                                    <form id="delete-form-{{ $road->id }}" action="{{ route('road.destroy', $road->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>
    <div id="map" style="height: 400px;"></div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>
    <script>
        function confirmDelete(roadId) {
            if (confirm("Are you sure you want to delete this roadwork entry?")) {
                document.getElementById('delete-form-' + roadId).submit(); // Submit the form if confirmed
            }
        }

        var roads = @json($roads);
    </script>
</body>
</html>
