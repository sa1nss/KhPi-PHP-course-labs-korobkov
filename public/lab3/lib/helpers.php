<?php
session_start();

function check_session_timeout() {
    $timeout_seconds = 300; 
    if (isset($_SESSION['last_activity'])) {
        if (time() - $_SESSION['last_activity'] > $timeout_seconds) {
            session_unset();
            session_destroy();
            return false;
        } else {
            $_SESSION['last_activity'] = time();
            return true;
        }
    } else {
        $_SESSION['last_activity'] = time();
        return true;
    }
}

function ensure_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    check_session_timeout();
}
