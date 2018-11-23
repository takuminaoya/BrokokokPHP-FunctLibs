<?php
    // ------------------------------------------------------------------------------------
    // 00. Daftar Isi
    // ------------------------------------------------------------------------------------
    // A1. => Select Function
    // A2. => Populate <option>
    // A3. => Insert Function
    // A4. => Tools
    // A5. => User Manipulation
    // ------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------
    // A1. Start Of Select Function
    // ------------------------------------------------------------------------------------

    // function select
    // How To use it
    /*
        $row = array();
        $row = selectAll('tb_item', $connection);
            if(is_array($row)){
            for($i = 0; $i < count($row); $i++) {
                echo $row[$i]['id_item'];
                echo $row[$i]['nama_item'];
            }
        }
    */
	function selectAll($table_name, $connection)
	{
        $sql = "SELECT * FROM $table_name";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $res[] = $row;
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    // ---------------------------------------------------------------------------
    // Example
    // ---------------------------------------------------------------------------
    // $roll = array();
    // $roll = selectAllArray('tb_roll', $connection, 'no_roll', $t_real, 'roll');
    // ---------------------------------------------------------------------------
    function selectAllArray($table_name, $connection, $where, $array, $value)
	{
        $matches = join("," , $array);

        $sql = "SELECT * FROM $table_name WHERE $where IN ( $matches )";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $res[] = $row[$value];
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function selectAllOrder($table_name, $connection, $limit, $orderby, $ascdsc)
	{
        $sql = "SELECT * FROM $table_name ORDER BY $orderby $ascdsc";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $res[] = $row;
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function selectConditionAll($table_name, $connection, $where, $condition)
	{
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $res[] = $row;
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function selectConditionAllValue($table_name, $connection, $where, $condition, $value)
	{
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $res[] = $row[$value];
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function selectCondition($table_name, $connection, $where, $condition, $value)
	{
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    return $row[$value];
                }
                
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
    
    function selectDistinct($table_name, $field, $connection, $value)
	{
        $sql = "SELECT DISTINCT $field FROM $table_name";
        $res = array();

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                     $res[] = $row[$value];
                }
                return $res;
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function selectDistinctCondition($table_name, $field, $connection, $where, $condition, $value)
	{
        $sql = "SELECT DISTINCT $field FROM $table_name WHERE $where = '$condition'";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    return $row[$value];
                }
                
                mysqli_free_result($result);
            } else {
                //echo "No Result!.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
    // ------------------------------------------------------------------------------------
    // End Of Select Function
    // ------------------------------------------------------------------------------------


    // ------------------------------------------------------------------------------------
    // A2. Start Of Populate <option> Function
    // ------------------------------------------------------------------------------------
    function populateOption($table_name, $connection, $value, $display)
	{
        $sql = "SELECT * FROM $table_name";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option value='".$row[$value]."'>".$row[$display]."</option>";
                }
                
                mysqli_free_result($result);
            } else {
                echo "No Result!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function populateConditionOption($table_name, $connection, $value, $display, $where, $condition)
	{
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option value='".$row[$value]."'>".$row[$display]."</option>";
                }
                
                mysqli_free_result($result);
            } else {
                echo "No Result!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function populateConditionOptionWithSelected($table_name, $connection, $value, $display, $where, $condition, $value2)
	{
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row[$value]; ?>"<?=$row[$value] == $value2 ? ' selected="selected"' : '';?>><?php echo $row[$display]; ?></option>
                    <?php
                }
                
                mysqli_free_result($result);
            } else {
                echo "No Result!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function populateOptionWithSelected($table_name, $connection, $value, $display, $value2)
	{
        $sql = "SELECT * FROM $table_name";

        if($result = mysqli_query($connection, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row[$value]; ?>"<?=$row[$value] == $value2 ? ' selected="selected"' : '';?>><?php echo $row[$display]; ?></option>

                    <?php
                }
                
                mysqli_free_result($result);
            } else {
                echo "No Result!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
    // ------------------------------------------------------------------------------------
    // End Of Populate <option> Function
    // ------------------------------------------------------------------------------------
    
    // ------------------------------------------------------------------------------------
    // A3. Start Of CURD Data Function
    // ------------------------------------------------------------------------------------
    // how to use function insert
	/*$arr = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            );
    insertData('users', $arr);*/
	function insertData($table_name,$data,$connection)
	{
		// convert data to array
		$key = array_keys($data);
		$val = array_values($data);
		$sql = "insert into $table_name(" . implode(', ', $key) . ") values('" . implode("','", $val) . "')";
		
		$status = mysqli_query($connection,$sql);
		
		if ($status)
		{
			return true;
		} 
		else
		{
			printf("Errormessage: %s\n", mysqli_error($connection));
			return false;
		}
    }

    // ------------------------------------------------------------------------------------
    // Example
    // ------------------------------------------------------------------------------------
    /*
    <script>
        var answer = confirm("Delete data?")
        if (answer) {
            <?php 
                $del = deleteData($connection, 'tb_name', 'id_tb', $_GET['idtb']); 
                if($del) {
                    // true
                } else {
                    // false
                }
            ?>
        }
        else {
            window.location.href = 'index.php';
        }
    </script>
    */
    function deleteData($connection, $tablename, $where, $condition){
        // start query
        $sql_del = "DELETE from $tablename WHERE $where = '$condition'";
        $query_del = mysqli_query($connection,$sql_del);
        
        // condition check, if success
        if($query_del){
            return 1;
        }
        else{
            return 0;
        }
    }
    // ------------------------------------------------------------------------------------
    // End Of Insert Data Function
    // ------------------------------------------------------------------------------------
    
    // ------------------------------------------------------------------------------------
    // A4. Start Of Tools Function
    // ------------------------------------------------------------------------------------
    function countTableRow($connection, $table_name) {
        $sql = "SELECT * FROM $table_name";

        if($result = mysqli_query($connection, $sql)){
            return mysqli_num_rows($result);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

    function countTableRowCondition($connection, $table_name, $where, $condition) {
        $sql = "SELECT * FROM $table_name WHERE $where = '$condition'";

        if($result = mysqli_query($connection, $sql)){
            return mysqli_num_rows($result);
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }
    // ------------------------------------------------------------------------------------
    // End Of Tools Function
    // ------------------------------------------------------------------------------------
    
    
    // ------------------------------------------------------------------------------------
    // A5. Start Of User Manipulating Function
    // ------------------------------------------------------------------------------------
    function login($username,$password,$connection)
    {
        // declare variabel
        if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $sql = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'";

                if($result = mysqli_query($connection, $sql)){
                    if(mysqli_num_rows($result) == 1){
                        
                        while($row = mysqli_fetch_array($result)){
                            session_start();
                            $_SESSION['id'] = $row['id'];
                            return true;
                        }

                        mysqli_free_result($result);
                    } else {
                        return false;
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
                }
                mysqli_close($connection);
            }
    }
    // ------------------------------------------------------------------------------------
    // End Of User Manipulating Function
    // ------------------------------------------------------------------------------------
?>