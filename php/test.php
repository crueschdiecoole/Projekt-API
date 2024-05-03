<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Europe Map</title>
    <!-- Include your mapdata.js file -->
    <script>
        var simplemaps_europemap_mapdata = {
            main_settings: {
                //General settings
                width: "responsive", //'700' or 'responsive'
                background_color: "#FFFFFF",
                background_transparent: "yes",
                border_color: "#000000",
                popups: "detect",
                
                //State defaults
                state_description: "Main City",
                state_color: "#ffffff",
                state_hover_color: "#99c0e2",
                state_url: "",
                border_size: "1",
                all_states_inactive: "no",
                all_states_zoomable: "yes",
                location_description: "",
                location_color: "#0141ff",
                location_opacity: "0.8",
                location_hover_opacity: 1,
                location_url: "",
                location_size: "12",
                location_type: "circle",
                location_image_source: "frog.png",
                location_border_color: "#FFFFFF",
                location_border: 2,
                location_hover_border: 2.5,
                all_locations_inactive: "no",
                all_locations_hidden: "no",
                
                //Label defaults
                label_color: "#d5ddec",
                label_hover_color: "#d5ddec",
                label_size: 22,
                label_font: "Arial",
                hide_labels: "no",
                manual_zoom: "no",
                back_image: "no",
                arrow_color: "#cecece",
                arrow_color_border: "#808080",
                initial_back: "no",
                initial_zoom: -1,
                initial_zoom_solo: "no",
                region_opacity: 1,
                region_hover_opacity: 0.6,
                zoom_out_incrementally: "yes",
                zoom_percentage: 0.99,
                zoom_time: 0.5,
                
                //Popup settings
                popup_color: "white",
                popup_opacity: 0.9,
                popup_shadow: 1,
                popup_corners: 5,
                popup_font: "12px/1.5 Verdana, Arial, Helvetica, sans-serif",
                popup_nocss: "no",
                
                //Advanced settings
                div: "map",
                auto_load: "yes",
                url_new_tab: "no",
                images_directory: "default",
                fade_time: 0.1,
                link_text: "View Website",
                state_image_url: "",
                state_image_position: "",
                location_image_url: "",
                border_hover_color: ""
            },
            state_specific: {
                // Define state-specific settings here
            },
            locations: {
                // Define specific locations here
            },
            regions: {},
            labels: {},
            legend: {
                entries: []
            }
        };
    </script>
</head>
<body>
    <!-- Add any HTML elements or map container here -->
    <div id="map"></div>

    <!-- Add JavaScript to render the map -->
    <script>
        // JavaScript code to render the map using the data from simplemaps_europemap_mapdata
        // Example code for rendering the map:
        new SimpleMaps({
            div: "map",
            data: simplemaps_europemap_mapdata
        });
    </script>
</body>
</html>
