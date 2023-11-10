<?php
// Check for success message
if (isset($_SESSION['alert_success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
        '<strong>Holy guacamole!</strong> ' . $_SESSION['alert_success'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
        '</div>';

    // Clear the session variable
    unset($_SESSION['alert_success']);
}

// Check for warning message
if (isset($_SESSION['alert_warning'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' .
        '<strong>Holy guacamole!</strong> ' . $_SESSION['alert_warning'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
        '</div>';

    // Clear the session variable
    unset($_SESSION['alert_warning']);
}

// Check for danger message
if (isset($_SESSION['alert_danger'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
        '<strong>Error!</strong> ' . $_SESSION['alert_danger'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
        '</div>';

    // Clear the session variable
    unset($_SESSION['alert_danger']);
}
?>
