<?php
class Auth {

    public $data;
    public $admin;
    public $mod;
    public $user;
    public $path = "header('Location: http://'.getConfig('DOMAIN').'/')";

    //
    public static function isAdmin() {
        if ((!isset($_SESSION['group']))) {
            return false;
        } else if ($_SESSION['group'] == 'administrator') {
            return true;
        }
        return false;
    }
    //
    public static function isMod() {
        if ((!isset($_SESSION['group']))) {
            return false;
        } else if ($_SESSION['group'] == 'administrator') {
            return true;
        } else if ($_SESSION['group'] == 'moderator') {
            return true;
        }
        return false;
    }
    //
    public static function isUser() {
        if ((!isset($_SESSION['group']))) {
            return false;
        } else if ($_SESSION['group'] == 'administrator') {
            return true;
        } else if ($_SESSION['group'] == 'moderator') {
            return true;
        } else if ($_SESSION['group'] == 'user') {
            return true;
        }
        return false;
    }

    // prüft ob user berechtigung für seite hat z.B. bouncer(isAdmin());
    public static function bouncer($data) {
        if ($data == false) {
            return $path;
        }
    }
    
}