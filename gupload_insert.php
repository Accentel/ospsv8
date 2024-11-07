<?php

include('dbconnection/connection.php');
if (isset($_POST['submit'])) {
    //print_r($_POST);
    
    $lname = $_POST['lname'];
	$user = $_POST['user'];
	$serviceno = $_POST['serviceno'];
	$_POST['ksr'];
        //Loop through each file
        for($i=0; $i<count($_POST['ksr']); $i++) {
			$title=$_POST['title'][$i];
	    $tmp = $_FILES['image']['tmp_name'][$i];
	if (is_uploaded_file($tmp)) {
        $iname = date('d-m-Y-H-i-s').$_FILES['image']['name'][$i];
        $dir = "uploads/guj";
        $destination = $dir . '/' . $iname;
		$path_parts = pathinfo($iname);
		 $fileExtension = $path_parts['extension'];
        move_uploaded_file($tmp, $destination);
        $data1 = "insert into ggallery(image,loc,user,serviceno,title,extension) values('$iname','$lname','$user','$serviceno','$title','$fileExtension')";
        $res = mysqli_query($link,$data1) or die(mysqli_error($link));
    }
	
		
	}

    if ($res) {
        print "<script>";
        print "alert('Successfully Uploaded ');";
        print "self.location='gbill_list.php';";
        print "</script>";
    }
}
?>
