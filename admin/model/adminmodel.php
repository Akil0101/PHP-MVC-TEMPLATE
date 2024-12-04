<?php
class adminmodel
{
    public $connection = "";
    public function __construct()
    {
        session_start();
        // database connectivity
        $this->connection = new mysqli("localhost", "root", "", "lusi");
        if ($this->connection) {
            // echo "<h5>Connection established successfully</h5>";
        }

    }
    // create a member function for admin login
    public function adminlogin($table, $em, $pass)
    {
        $select = "select * from $table where email='$em' and password='$pass'";
        $exe = mysqli_query($this->connection, $select);
        $fetch = mysqli_fetch_array($exe);
        $num_rows = mysqli_num_rows($exe);
        if ($num_rows == 1) {
            $_SESSION["admin_id"] = $fetch["admin_id"];
            $_SESSION["txt_email"] = $fetch["email"];
            return true;
        } else {
            return false;
        }
    }

    // create a member function for change password
    public function chngepasswordadmin($table, $column, $opass, $npass, $cpass, $id)
    {
        // select old  password 
        $id = $_SESSION["admin_id"];
        $select = "select password from $table where $column='$id'";
        $exe = mysqli_query($this->connection, $select);
        $fetch = mysqli_fetch_array($exe);
        $pass = $fetch["password"];
        if ($pass == $opass && $npass == $cpass) {
            $upd = "update $table set password='$npass' where $column='$id'";
            $exe = mysqli_query($this->connection, $upd);
            return true;
        } else {
            return false;
        }

    }

    // create a member function for insall data
    public function insalldata($table, $data)
    {
        //key convert array into value or string
        $column = array_keys($data);
        $column1 = implode(",", $column);
        //values convert array into value or string
        $value = array_values($data);
        $value1 = implode("','", $value);

        $insert = "insert into $table($column1)values('$value1')";
        $exe = mysqli_query($this->connection, $insert);
        return $exe;
    }

    // create member function for select all data
    public function selectalldata($table)
    {
        $select = "select * from $table";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }


    // create member function for join data tables
    public function joindata($table, $table1, $where)
    {
        $select = "select * from $table join $table1 on $where";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }


    //delete all data
    public function delete($id, $table, $where)
    {
        $delete = "DELETE FROM $table WHERE `$table`.`$where` = $id";
        $exe = mysqli_query($this->connection, $delete);

    }

    //create member function for fetch all product

    public function countproduct($table)
    {
        $select = "select * from $table";
        $exe = mysqli_query($this->connection, $select);
        $fetch = mysqli_fetch_array($exe);

    }
    //creat member function to update all data
    public function updatedata($table, $pid, $pcat, $pnm, $ff, $pp, $qty, $pd, $pdate)
    {

        $update = "UPDATE $table SET productname = '$pnm', pimage = '$ff', offerprice = '$pp', qty = '$qty', pdescriptions = '$pd', added_date='$pdate' WHERE `$table`. product_id = '$pid'";

        $exe = mysqli_query($this->connection, $update);
        return $exe;
    }
    //creat member function to update all data
    public function updatealldata($table, $id, $data,$column)
    {
       


        $update = "UPDATE $table SET $data WHERE `$table`. $column = '$id'";
        $exe = mysqli_query($this->connection, $update);
        return $exe;

    }

    public function select($table)
    {
        $select = "select * from $table";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }

    //creat member function to update about
    public function about($table, $id, $data)
    {
        $update = "UPDATE $table SET about = '$data' WHERE `$table`. id = '$id'";

        $exe = mysqli_query($this->connection, $update);
        return $exe;

    }
    //create member function for fetch one product
    public function onepro($id, $table)
    {
        $select = "select * FROM $table WHERE  $table .`product_id` = $id";
        $exe = mysqli_query($this->connection, $select);
        $fetch = mysqli_fetch_array($exe);
        $arr = $fetch;
        return $arr;
    }

    public function one($table)
    {
        $select = "select * FROM $table";
        $exe = mysqli_query($this->connection, $select);
        $fetch = mysqli_fetch_all($exe);
        
        return $fetch;
    }

    // create a member function for logout as admin
    public function logout()
    {
        unset($_SESSION["admin_id"]);
        unset($_SESSION["txt_email"]);
        session_destroy();
        return true;


    }
}
?>