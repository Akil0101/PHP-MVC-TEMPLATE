<?php
class model
{
    public $connection = "";
    public function __construct()
    {  $config="";
        
         
        // database connectivity
        $conn = $this->connection = new mysqli("localhost", "root", "", "lusi");
        if ($conn) {
            // echo "<h5>Connection stablished successfully</h5>";
        } else {
            die(mysqli_error($conn));
        }
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

    // create member function for select all data of perticlure user
    public function selectall($table,$column,$data)
    {
        $select = "select * from $table where $column='$data'";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }

    // create member function for select all data of perticlure user
    public function select($table)
    {
        $select = "select * from $table";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }



    // create member function for join data tables
    public function joindata($table, $table1, $column, $customerid, $where)
    {
        $select = "select * from $table join $table1 on $where where $column='$customerid'";

        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

    }


    // create member function for join data tables
    public function joindata1($table, $table1, $table2, $where, $where1, $column, $customerid)
    {
        $select = "select * from $table join $table1 on $where join $table2 on $where1  where $table1.$column='$customerid'";
        $exe = mysqli_query($this->connection, $select);
        while ($fetch = mysqli_fetch_array($exe)) {
            $arr[] = $fetch;
        }
        return $arr;

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

   

  
    

    


}
?>