<!-- resources/views/road/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Roadwork Entry</title>
    @vite(['resources/css/style.css', 'resources/js/app.js', 'resources/css/create.css'])
</head>
<body>
<header class="main-header">
        <nav class="navbar">
            <div class="container">
                <a href="/" class="navbar-brand">My System</a>
                <ul class="nav-links">
                    <li><a href="{{ route('road.gallery') }}">Go Back to Gallery</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="main-content">
        <div class="container">
            <h1>Edit Roadwork Entry</h1>

            <div class="form-flex-container">
                <form action="{{ route('road.update', $road->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="roadname">Road Name:</label>
                        <input type="text" name="roadname" id="roadname" value="{{ old('roadname', $road->roadname) }}" required>
                    </div>
                    <div>
                        <label for="segment_number">Segment Number:</label>
                        <input type="number" name="segment_number" id="segment_number" value="{{ old('segment_number', $road->segment_number) }}" required>
                    </div>
                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" required>{{ old('description', $road->description) }}</textarea>
                    </div>

                    <div>
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image">
                    </div>

                    
                    <div>
                        <label for="latitude">Latitude:</label>
                        <input type="text" name="latitude" id="latitude" value="{{ old('latitude', $road->latitude) }}" required>
                    </div>
                    <div>
                        <label for="longitude">Longitude:</label>
                        <input type="text" name="longitude" id="longitude" value="{{ old('longitude', $road->longitude) }}" required>
                    </div>
                    <br>
                    <div>
                        
                        <button  type="submit">Update Roadwork Entry</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2024 XenTense. All rights reserved.</p>
            <p>For system details or support, contact: support@example.com</p>
        </div>
    </footer>
</body>
</html>
