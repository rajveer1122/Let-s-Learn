

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Dropdown Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Dynamic Dropdown Example</h2>

    <select id="product">
        <option value="">Select an option</option>
        <option value="option1">Solar</option>
        <option value="option2">Heat</option>
        <option value="option3">Water</option>
    </select>

    <select id="prod-type">
        <option value="">Select an option</option>
    </select>

  
    <select id="prod-ef">
        <option value="">Select an option</option>
    </select>

    <script>
        $(document).ready(function() {
            // Array of options for the 2nd dropdown based on the selected option in the first dropdown
            var optionsSecond = {
                option1: ["340-watt polycrystalline", "550-watt monocrystalline half cut"],
                option2: ["Residential", "Commercial", "Swimming Pool", "Other"],
                option3: ["1Residential", "1Commercial"]
            };

            var firstOptionSecond = optionsSecond.option1[0];

            // Array of options for the third dropdown based on the selected option in the 2nd dropdown
            var optionsThird = {
                "Residential": [ "6.5 kw + 300 Lpd Superia", "6.5 kw + 300 Lpd Imperia"],
                "Commercial": ["11 kw Commercial", "19 kw Commercial", "39 kw Commercial"],
                "Swimming Pool": ["18 kw Swimming Pool Heat Pump", "33 kw Swimming Pool Heat Pump", "40 kw Swimming Pool Heat Pump", "52 kw Swimming Pool Heat Pump", "90 kw Swimming Pool Heat Pump"],
                "Other": ["Please Specify Model Type"],

                "1Residential": ["100 LPD ETC", "200 LPD ETC", "300 LPD ETC", "500 LPD ETC", "1000 LPD ETC", "100 LPD FPC", "200 LPD FPC", "300 LPD FPC", "500 LPD FPC", "1000 LPD FPC"],
                "1Commercial": ["Please Specify Model Type"]
            };

            // Event handler for the first dropdown change event
            $("#product").on("change", function() {
                var selectedFirst = $(this).val();
                var options = optionsSecond[selectedFirst] || []; // Get the options based on the selected value
                
                // Update the options in the 2nd dropdown
                var secondDropdown = $("#prod-type");
                secondDropdown.empty(); // Clear existing options
                
                $.each(options, function(index, value) {
                    secondDropdown.append($("<option>").text(value));
                });

                // Clear the selection in the third dropdown
                $("#prod-ef").empty();
            });

            // Event handler for the 2nd dropdown change event
            $("#prod-type").on("change", function() {
                var selectedSecond = $(this).val();
                var options = optionsThird[selectedSecond] || []; // Get the options based on the selected value
                
                // Update the options in the third dropdown
                var thirdDropdown = $("#prod-ef");
                thirdDropdown.empty(); // Clear existing options
                
                $.each(options, function(index, value) {
                    thirdDropdown.append($("<option>").text(value));
                });
            });
        });
    </script>
</body>
</html>
