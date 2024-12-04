<?php
require_once ("model/adminmodel.php");
class admincontroller extends adminmodel
{
    public function __construct()
    {

    
        parent::__construct();
        // logic for admin login
        if (isset($_POST["log"])) {
            $em = $_POST["txt_email"];
            $pass = $_POST["txt_password"];
            $chk = $this->adminlogin('admin', $em, $pass);
            if ($chk) {
                echo "<script>
                alert('You are Logged in successfully')
                window.location='admin-dashboard';
                </script>";
            } else {
                echo "<script>
                alert('Your email and password are Incorrect try again')
                window.location='./';
                </script>";
            }
        }
      




        //load views of admin create an routing
        if (isset($_SERVER["PATH_INFO"])) {
            switch ($_SERVER["PATH_INFO"]) {
                case '/':
                    require_once ("index.php");
                    require_once ("admin-login.php");
                    break;

                case '/admin-dashboard':
                    if (isset($_SESSION["admin_id"])) {
                        require_once ("index.php");
                        require_once ("header.php");
                        require_once ("sidebar.php");
                        require_once ("admin-dashboard.php");
                        require_once ("footer.php");
                    } else {
                        echo "<script>window.location.assign('http://localhost/work/Aadil/KMC%20Cool/admin/')</script>";
                    }
                    break;

                case '/admin-changepassword':
                    if (isset($_SESSION["admin_id"])) {
                        require_once ("index.php");
                        require_once ("header.php");
                        require_once ("sidebar.php");
                        require_once ("admin-changepassword.php");
                        require_once ("footer.php");
                    } else {
                        echo "<script>window.location.assign('http://localhost/work/Aadil/KMC%20Cool/admin/')</script>";
                    }
                    break;
               

                default:
                    require_once ("index.php");
                    require_once ("header.php");
                    require_once ("sidebar.php");
                    require_once ("404.php");
                    require_once ("footer.php");
                    break;
            }
        }
    }
}

$obj = new admincontroller;
?>