<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        label, select, button {
            margin: 10px;
        }

        input[type="text"], input[type="checkbox"] {
            padding: 8px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>

    <h2>String Transformation</h2>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required>
        
        <label>Choose Transformation:</label>
        <select name="transformation">
            <option value="uppercase">Uppercase</option>
            <option value="lowercase">Lowercase</option>
            <option value="capitalize">Capitalize Words</option>
        </select>

        <label for="removeSpaces">Remove Spaces:</label>
        <input type="checkbox" id="removeSpaces" name="removeSpaces">

        <button type="submit" name="transform">Transform</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["transform"])) {
        $inputString = $_POST["inputString"];
        $transformation = $_POST["transformation"];
        $removeSpaces = isset($_POST["removeSpaces"]);

        // Remove spaces if the checkbox is checked
        if ($removeSpaces) {
            $inputString = str_replace(' ', '', $inputString);
        }

        switch ($transformation) {
            case 'uppercase':
                $result = strtoupper($inputString);
                break;
            case 'lowercase':
                $result = strtolower($inputString);
                break;
            case 'capitalize':
                $result = ucwords(strtolower($inputString));
                break;
            default:
                $result = "Invalid transformation";
                break;
        }

        echo "<p>Original String: $inputString</p>";
        echo "<p>Transformed String: $result</p>";
    }
    ?>

</body>
</html>
