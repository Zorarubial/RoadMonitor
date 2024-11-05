// gallery.js

document.addEventListener("DOMContentLoaded", function() {
    // Initialize the map centered at Baliwag, Bulacan
    var map = L.map('map').setView([14.9508, 120.9029], 13); 

    // Add the OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add markers for each road if they have latitude and longitude
    roads.forEach(function(road) {
        if (road.latitude && road.longitude) {
            L.marker([road.latitude, road.longitude])
                .bindPopup('<b>' + road.roadname + '</b><br>' + road.description)
                .addTo(map);
        }
    });
});

// Function to confirm deletion

