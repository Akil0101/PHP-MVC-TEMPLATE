<?php
ini_set('session.gc_maxlifetime', 604800);

// each client should remember their session id for EXACTLY 1 week
session_set_cookie_params(604800);

session_start();

error_reporting(0);
require_once("model/model.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class controller extends model
{

    public function __construct()
    {
        parent::__construct();

     

        // load your template using routing
        if (isset($_SERVER["PATH_INFO"])) {

            switch ($_SERVER["PATH_INFO"]) {
                case '/':
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("banner.php");
                    require_once("product.php");
                    require_once("footer.php");
                    break;

             

                default:
                    require_once("index.php");
                    require_once("navbar.php");
                    require_once("404.php");
                    require_once("footer.php");
                    break;
            }

        }

    }
}

$obj = new controller;

?>