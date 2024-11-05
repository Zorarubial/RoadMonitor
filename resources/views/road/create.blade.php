<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <title>Register Road</title>
    @vite(['resources/css/style.css', 'resources/css/create.css'])
    <style>
        /* Basic styling for the image preview */
        #image-preview {
            width: 300px; /* Set a fixed width for the preview */
            height: 200px; /* Set a fixed height for the preview */
            object-fit: cover; /* Maintain aspect ratio and cover the area */
            display: none; /* Hide it initially */
            margin-top: 10px; /* Add some margin above the preview */
            border: 1px solid #ccc; /* Optional border for better visibility */
        }
    </style>
</head>
<body>
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
    
    <main class="main-content">
    <div class="container">
        <h1>Register Road Work</h1>
        <form method="post" action="{{ route('road.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <!-- Error messages -->
            @if ($errors->any())
                <div class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Flex container for side-by-side inputs -->
            <div class="form-flex-container">
                <div class="leftside-inputs">
                    <div class="form-group">
                        <label for="roadname">Name</label>
                        <input type="text" name="roadname" id="roadname" placeholder="Road Project Name" />
                    </div>
                    <div class="form-group">
                        <label for="segment_number">Number</label>
                        <input type="number" name="segment_number" id="segment_number" placeholder="Segment #" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" placeholder="Description" />
                    </div>
                </div>

                <div class="rightside-inputs">
                    <div class="form-group">
                        <label for="image-input" class="custom-file-upload">Choose File</label>
                        <input type="file" name="image" accept="image/*" id="image-input" required />
                    </div>
                    <img id="image-preview" src="" alt="Image Preview" />
                </div>
            </div>
            <div>   
                    <h1 style="text-align:left;">Drop pin on roadwork location:</h1>
                    <div style="margin-top: 10px;">
                        <label for="latitude">Latitude:</label>
                        <input type="text" id="latitude" name="latitude" readonly />

                        <label for="longitude">Longitude:</label>
                        <input type="text" id="longitude" name="longitude" readonly  />
                    </div>
                
                    <div id="map" style="height: 400px;"></div>
                            <button type="clear" > Clear fields </button>
                            <input type="submit" value="Register roadwork project" />
                        </div>
                    </form>
                </div>
            </form>
    </div>  
                
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>

    <script>
        // JavaScript to handle image preview
        document.getElementById('image-input').addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the first file
            const preview = document.getElementById('image-preview'); // Get the preview image element

            if (file) {
                const reader = new FileReader(); // Create a FileReader
                reader.onload = function(e) {
                    preview.src = e.target.result; // Set the preview image source to the file's data URL
                    preview.style.display = 'block'; // Show the preview
                }
                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                preview.src = ''; // Reset the preview if no file is selected
                preview.style.display = 'none'; // Hide the preview
            }
        });

                // Initialize the map centered at a default location (Baliwag)
        var map = L.map('map').setView([14.9508, 120.9029], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker;

        // Event handler for map clicks to get latitude and longitude
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Remove previous marker if it exists
            if (marker) {
                map.removeLayer(marker);
            }

            // Add new marker to the clicked location
            marker = L.marker([lat, lng]).addTo(map);

            // Update hidden inputs with the new coordinates
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });


    </script>
</body>
</html>