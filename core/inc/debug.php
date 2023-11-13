<?php
function debugLog($message) {
    global $debugMode;

    if ($debugMode) {
        echo "Debug: $message<br>";
    }
}