<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <!-- <link href="css/home.css"> -->
	<title>HOME</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
     <link rel="stylesheet" href="css/home.css">

</head>
<body>
                         <div class="container mt-3">
                              <div class="form-check form-switch">
                                   <input class="form-check-input " type="checkbox" id="themeSwitch">
                                   <label class="form-check-label" for="themeSwitch">Toggle Dark Mode</label>
                              </div>
                         </div>
     <div class="container rounded  mt-5">
                         
        <div class="row">
            <div class="col-md-4 border-right">
               <canvas id="skin_container"></canvas>
            </div>
            <div class="col-md-8 ">
                <div class="p-3 py-5">
               </div>
                    <div class="row mt-1">
                        <div class="col-md-6"><label for="skin" class="form-label">Username:</label><input type="text" class="form-control" placeholder="Username" value="<?php echo $_SESSION['username']; ?>" disabled></div>
                        <div class="col-md-6"><label for="skin" class="form-label">Password:</label><input type="password" class="form-control" placeholder="password" value="password" disabled></div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6">
                              <label for="skin" class="form-label ">Skin:</label>
                              <input class="form-control col-md-6" type="file" id="skin" disabled>
                        </div>
                        <div class="col-md-6">
                              <label for="skin" class="form-label">Cape:</label>
                              <input class="form-control col-md-6" type="file" id="skin" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <form method="post">
                                                <!-- <button type="button" class="btn btn-success" >Success</button> -->
                                                <!-- <div class="col-sm-9 text-secondary"> -->
                                                <button type="submit" name="ds" value="ds" class="btn btn-danger col-md-2" disabled>Connect discord</button>
                                            </form>
                    </div>    
                    <div class="mt-3 text-right"><button class="btn btn-primary profile-button col-md-2" type="button" disabled>Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/skinview3d.bundle.js"></script>
<script>
let skinViewer = new skinview3d.SkinViewer({
		canvas: document.getElementById("skin_container"),
		width: 300,
		height: 400,
		skin: "img/skin.png"
	});

	// Change viewer size
	skinViewer.width = 300;
	skinViewer.height = 600;

	// Load another skin
	skinViewer.loadSkin("uploads/skins/Default.png");

	// Load a cape
	skinViewer.loadCape("uploads/capes/Default.png");

	// Load an elytra (from a cape texture)

	// Unload(hide) the cape / elytra
	// skinViewer.loadCape(null);

	// Set the background color
	// skinViewer.background = 0x5a76f3;

	// Set the background to a normal image
	// skinViewer.loadBackground("img/background.png");

	// Set the background to a panoramic image
	// skinViewer.loadPanorama("img/panorama1.png");

	// Change camera FOV
	skinViewer.fov = 70;

	// Zoom out
	skinViewer.zoom = 0.5;

	// Rotate the player
	skinViewer.autoRotate = false;

	// Apply an animation
	skinViewer.animation = new skinview3d.IdleAnimation();

	// Set the speed of the animation
	skinViewer.animation.speed = 0.5;

	// Pause the animation
	skinViewer.animation.paused = false;

	// Remove the animation
	// skinViewer.animation = null;

    skinViewer.nameTag = "<?php echo $_SESSION['username']; ?>";

//     // Get the radio button elements by their names
//     const elytraRadioButton = document.querySelector('input[name="back_equipment"][value="elytra"]');
//     const capeRadioButton = document.querySelector('input[name="back_equipment"][value="cape"]');

    // Add event listeners to the radio buttons
//     elytraRadioButton.addEventListener("change", handleEquipmentChange);
//     capeRadioButton.addEventListener("change", handleEquipmentChange);

    // Function to handle the change event
//     function handleEquipmentChange(event) {
//     const selectedValue = event.target.value;

//     if (selectedValue === "elytra") {
//         // Code to handle elytra selection
//         console.log("Elytra selected");
//         // Call the skinViewer.loadCape() function or any other relevant actions
//         skinViewer.loadCape("https://spaceshield.org/api/cloaks/<?=$user->uuid?>", { backEquipment: "elytra" });
//     } else if (selectedValue === "cape") {
//         // Code to handle none (cape) selection
//         console.log("None (cape) selected");
//         // Remove the elytra but keep the cape
//         skinViewer.loadCape("https://spaceshield.org/api/cloaks/<?=$user->uuid?>");
//     }
//     }

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/darktheme.js"></script>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>