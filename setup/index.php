<!DOCTYPE html>
<html>
<head>
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
        <input type="checkbox" name="presetup" id="presetup" onchange="toggleHWIDSetup()"><br><br>

        <div id="hwidSetupDiv" style="display: none;">
            <label>Setup hwid base:</label>
            <input type="checkbox" name="hwid"><br><br>
        </div>

        <input type="submit" value="Next">
    </form>
</body>
</html>
