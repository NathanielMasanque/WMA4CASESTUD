<?php
// PHP script at the top for dynamic content (optional)
$title = "Three Maps at Upper Right";  // Dynamic page title
$locations = [
    ["id" => "map1", "lat" => 15.503646, "lng" => 120.579177, "title" => "ReLoved - San Isidro"],
    ["id" => "map2", "lat" => 15.470013, "lng" => 120.620019, "title" => "ReLoved - Lucinda"],
    ["id" => "map3", "lat" => 15.485505, "lng" => 120.586967, "title" => "ReLoved - Main"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: small;
        }

        .maps-container {
            display: flex;
            flex-direction: column; 
            position: absolute;
            top: 100px;  
            right: 100px; 
            gap: 1px; 
            z-index: 1000; 
        }

        .map-frame {
            width: 200px;   
            height: 100px; 
            border: 2px solid black; 
            border-radius: 10px;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .maps-container {
                top: 10px; 
                right: 10px; 
                width: 90%; 
                gap: 10px;  
            }
            .map-frame {
                width: 100%;
                height: 200px;
            }
        }
    </style>
</head>
<body>

<h1>ReLoved</h1>

<div class="maps-container">
    <?php foreach ($locations as $location): ?>
        <h3><?php echo $location['title']; ?></h3>
        <div id="<?php echo $location['id']; ?>" class="map-frame"></div>
    <?php endforeach; ?>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    // Initialize maps using PHP data within JavaScript
    function initializeMap(mapId, lat, lng, title) {
        var map = L.map(mapId).setView([lat, lng], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup('<h3>' + title + '</h3>');
    }

    <?php foreach ($locations as $location): ?>
        initializeMap('<?php echo $location['id']; ?>', <?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>, '<?php echo $location['title']; ?>');
    <?php endforeach; ?>
</script>

</body>
</html>
