<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Setup Page - Step 1</title>
    <script>
        function toggleHWIDSetup() {
            var hwidSetupDiv = document.getElementById("hwidSetupDiv");
            var hwidCheckbox = document.getElementById("presetup");

            if (hwidCheckbox.checked) {
                hwidSetupDiv.style.display = "block";
            } else {
                hwidSetupDiv.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h2>Database Setup</h2>
    <form action="process_setup.php" method="post">
        <label>IP Address:</label>
        <input type="text" name="ip" required><br><br>

		<label>Username:</label>
        <input type="text" name="username" required><br><br>


        <label>Port:</label>
        <input type="text" name="port" value="3306" required><br><br>

        <label>Password:</label>
        <input type="password" name="db_password"required><br><br>

        <label>Database Name:</label>
        <input type="text" name="database" required><br><br>

        <label>Useful for minecraft/gravitlauncher:</label>
        <input type="checkbox" name="presetup" id="presetup" checked disabled><br><br>

        <div id="">
            <label>Setup hwid base:</label>
            <input type="checkbox" name="hwid"><br><br>
        </div>
        <label>type register:</label>
        <input type="number" id="typeregister" name="typeregister" min="0" max="3" value="0"/><br><br>

        <label>type lib:</label>
        <input type="number" id="capetype" name="capetype" min="0" max="2" value="0"/><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
