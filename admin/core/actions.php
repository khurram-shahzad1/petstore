<?php 
include '../../assets/db.php';
   
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE email='$email' AND `password`='$password'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_num_rows($query);

    if ($data == "0") {
        echo 0;
    
    }else{
        echo 1;
        $info = mysqli_fetch_array($query);
        $uid = $info['id'];
        setcookie ('admin_id',$uid,time() + 84600*7 , '/');
    }
}

if (isset($_GET['signout'])) {
    setcookie ("admin_id", "", time() - 3600, '/');
    header("Location: ../index.php");
}

if(isset($_POST['newProduct'])) {
    $cat = $_POST['catId'];
    $cid = $_POST['cId '];
    $num = $_POST['num'];
    $city = $_POST['city'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $discription = $_POST['discription'];

    $target_dir = "../../assets/images/products/";
    $target_file = basename($_FILES["productImage"]["name"]);

    $path = $target_dir . $target_file;
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
        $insert = mysqli_query($conn, "INSERT into products (cat_id,`c_id` ,`name`, `discription`, price, `image`,`num`,`city`) VALUES ('$cat', '$cid', '$name', '$discription', '$price', '$target_file', '$num', '$city') ");
        if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if(isset($_POST['addbike'])) {
    $cat = $_POST['catId'];
    $cid = $_POST['cId'];
    $name = $_POST['pname'];
    $num = $_POST['num'];
    $city = $_POST['city'];
    $price = $_POST['price'];
    $discription = $_POST['discription'];

    $target_dir = "../../assets/images/rent_products/";
    $target_file = basename($_FILES["productImage"]["name"]);

    $path = $target_dir . $target_file;
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
        $insert = mysqli_query($conn, "INSERT into rent_products (cat_id, c_id, `name`, `discription`, price, `image`,`num`,`city`) VALUES ('$cat', '$cid', '$name', '$discription', '$price', '$target_file', '$num', '$city') ");
       if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST['formpro'])) {
    $id = $_POST['proid'];
    $cat = $_POST['catId'];
    $cid = $_POST['cId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $num = $_POST['num'];
    $city = $_POST['city'];
    $discription = $_POST['discription'];

    if($_FILES['productImage']['name'] != ""){
        $target_dir = "../../assets/images/products/";
        $target_file = basename($_FILES["productImage"]["name"]);
    
        $path = $target_dir . $target_file;
        
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
            $update = mysqli_query($conn, "UPDATE products SET  cat_id ='$cat', c_id ='$cid', `name`='$name' , `discription`='$discription' , price='$price', `image` = '$target_file' , `num` = '$num', `city` = '$city' WHERE id='$id'");
            if($update == '1'){
                echo '1';
            }else{
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_POST['formbike'])) {
    $id = $_POST['proid'];
    $cat = $_POST['catId'];
    $cid = $_POST['cId'];
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $num = $_POST['num'];
    $city = $_POST['city'];
    $discription = $_POST['discription'];

    if($_FILES['productImage']['name'] != ""){
        $target_dir = "../../assets/images/rent_products/";
        $target_file = basename($_FILES["productImage"]["name"]);
    
        $path = $target_dir . $target_file;
        
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $path)) {
            $update = mysqli_query($conn, "UPDATE rent_products SET  cat_id ='$cat', c_id ='$cid', `name`='$name' , `discription`='$discription' , price='$price', `image` = '$target_file', `num` = '$num', `city` = '$city' WHERE id='$id'");
            if($update == '1'){
                echo '1';
            }else{
                echo mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if(isset($_POST['delid'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM user WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if(isset($_POST['delcat'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM categories WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if($query == "1"){
        echo 1;
    }else{
        echo 0;
        echo mysqli_error($conn);
    }
}

if(isset($_POST['newuser'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	
        $insert = mysqli_query($conn, "INSERT into user (`user_name`, `user_email`, user_password, `user_mobile`) VALUES ('$name', '$email', '$password', '$number') ");
        if($insert){
            echo 1;
        }else{
            echo mysqli_error($conn);
        }
    } 



if (isset($_POST['delProduct'])) {
    $id = $_POST['id'];

    $image = mysqli_fetch_array(mysqli_query($conn, "SELECT `image` FROM products WHERE id = '$id'"))[0];

    unlink("../../assets/images/products/$image");

    $sql = "DELETE  FROM products WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        mysqli_error($conn);
    }
}

if (isset($_POST['delbike'])) {
    $id = $_POST['id'];

    $image = mysqli_fetch_array(mysqli_query($conn, "SELECT `image` FROM rent_products WHERE id = '$id'"))[0];

    unlink("../../assets/images/rent_products/$image");

    $sql = "DELETE  FROM rent_products WHERE id='$id'";
    $query = mysqli_query($conn,$sql);

    if ($query == "1") {
        echo 1;
    }else{
        echo 0;
        mysqli_error($conn);
    }
}

if(isset($_POST['addCategory'])){
	$category = $_POST['category'];
	

	if($category == "" ){
		echo 0;
	}
	else {
	$sql = "INSERT into `categories` (`name`) VALUES ('$category')";
	
	$query = mysqli_query($conn , $sql);

	if($query){
		echo 1;
	}
	else{
		echo 0;
	}
	}
}

if(isset($_POST['acceptOrder'])){
    $oid = $_POST['acceptOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `order_status` = '1' WHERE id = '$oid'");

}
if(isset($_POST['rejectOrder'])){
    $oid = $_POST['rejectOrder'];

    echo mysqli_query($conn,"UPDATE orders SET `order_status` = '2' WHERE id = '$oid'");
}

if(isset($_POST['acceptrent'])){
    $rid = $_POST['acceptrent'];

    echo mysqli_query($conn,"UPDATE rent_bike SET `status` = '1' WHERE id = '$rid'");

}
if(isset($_POST['rejectrent'])){
    $rid = $_POST['rejectrent'];

    echo mysqli_query($conn,"UPDATE rent_bike SET `status` = '2' WHERE id = '$rid'");
}

?>