<?PHP
	require "init.php";

	$ret_post = $_POST;
	$item_type = $ret_post["item_type"];
	
	$dbo = mysqli_connect("localhost", "root", "autoset", "gppj") or die("eeeee");
	
	$query = "Select name From itemtypes as i WHERE i.typename = " . $item_type;

	$users_dbo = mysqli_query($dbo, $query);

	$tmp;
	if($users_dbo->num_rows > 0) {
		while($is = mysqli_fetch_assoc($users_dbo)){
			$tmp = $is;
		}
	}

	$ret_json = $tmp;

	mysqli_close($dbo);

	echo json_encode($ret_json, JSON_UNESCAPED_UNICODE);
?>