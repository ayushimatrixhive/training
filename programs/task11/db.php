<?php
    $servername='localhost';
    $username='root1';
    $password='root1';
    $dbname = "time_zone";
    
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }




        class config
        {
            private $host='localhost';
            private $username='root1';
            private $password='root1';
            private $dbname='time_zone';
    
            function __construct()
            {   
                if(mysql_connect($this->host,$this->username,$this->password))
                {
                    echo "connection successfully";
                }
            }
            function db()
            {
                mysql_select_db($this->$dbname);
            }
        }
    
        $obj=new config();
        $obj->

            $variable = $obj->fetch_data("SELECT * FROM time_zone");
            for($i=0;$i<count($variable);$i++){  
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php
                    }     
                     $result = $variable[$i]['name'];     
                     }
            //insert INTO values in any table
            $result = $obj->insert_data($name);
            if($result)
            echo 'inserted';
            else{
            echo 'failed';
            }

?>