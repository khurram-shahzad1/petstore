<?php
require '../assets/db.php';


if (isset($_POST['signUpForm'])) {
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_mobile=$_POST['user_mobile'];
    $user_password=$_POST['user_password'];
    $sql_e = "SELECT * FROM user WHERE user_email='$user_email'";
    $res_e = mysqli_query($conn, $sql_e);	
    if(mysqli_num_rows($res_e) > 0){
        echo 0;
      }
    elseif ($user_name==""|| $user_email==""|| $user_password==""|| $user_mobile=="") {
        echo 1;
    }

    else {
        $sql="INSERT into `user` (user_name,user_email,user_password,user_mobile) VALUES ('$user_name','$user_email' , '$user_password', '$user_mobile')";

        $query=mysqli_query($conn, $sql);

        if ($query) {
            echo 2;
        }

        else {
            echo 1;
        }
    }
}


if (isset($_POST['contactForm'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
 if ($name==""|| $email==""|| $subject==""|| $message=="") {
        echo 0;
    }

    else {
        $sql="INSERT into `contact` (name,email,subject,message) VALUES ('$name','$email' , '$subject', '$message')";

        $query=mysqli_query($conn, $sql);

        if ($query) {
            echo 1;
        }

        else {
            echo 0;
        }
    }
}



if (isset($_POST['updateuser'])) {
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_mobile=$_POST['user_mobile'];
    $user_password=$_POST['user_password'];
    $userId=$_COOKIE['user_id'];
    if ($user_name==""|| $user_email==""|| $user_password==""|| $user_mobile=="") {
        echo 0;
    }

    else {
        $sql="UPDATE user SET `user_name` = '$user_name' , `user_email`='$user_email' , `user_mobile`='$user_mobile' , `user_password`='$user_password' WHERE id = '$userId'";

        $query=mysqli_query($conn, $sql);

        if ($query) {
            echo 1;
        }

        else {
            echo 0;
        }
    }
}


if (isset($_POST['signInForm'])) {
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    if ($user_email==""|| $user_password=="") {
        echo "0";
    }
    else {
            $sql="SELECT * FROM `user` WHERE user_email = '$user_email' AND `user_password` = '$user_password'";

            $query=mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) > 0) {

                $data=mysqli_fetch_array($query);

                setcookie("user_id", $data['id'], time() + (86400 * 3), '/');

                echo $data['id'];

            }

            else {
                echo "0";
            }
        }
    }

    if (isset($_GET['signout'])) {

        setcookie("user_id", "", time() - 3600, '/');
    
        header("Location: ../index.php");
    }

    if(isset($_POST['productId'])) {
        $prodId=$_POST['productId'];
        $userId=$_COOKIE['user_id'];
        $product_qty=$_POST['product_qty'];
    
        if(isset($_COOKIE['user_id'])) {
            $sql="SELECT * FROM cart WHERE product_id = '$prodId' AND user_id = '$userId' ";
            $run_query=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($run_query);
            if($count > 0) {
                $data = mysqli_fetch_array($run_query)['qty'];
                $product_qty2 = $product_qty + $data;
                $sqlUp = "UPDATE cart SET qty = '$product_qty2' WHERE product_id = '$prodId' AND user_id = '$userId'";
                $queryUp = mysqli_query($conn, $sqlUp);
                if ($queryUp) {
                    echo "1"; 
                }else{
                    echo mysqli_error($conn);
                }
            }
            else {
                $sql="INSERT INTO cart (product_id, user_id, qty) VALUES ('$prodId','$userId','$product_qty')";
    
                if(mysqli_query($conn, $sql)) {
                    echo "1";
                }
            }
        }
    
        
    }

    if (isset($_POST['removefromcart'])) {
        $removeId=$_POST['removeId'];
        $del=mysqli_query($conn, "DELETE FROM cart WHERE id = '$removeId'");
    
        if ($del=='1') {
            echo '1';
        }
    }

    
if (isset($_POST['order'])) {
    $user_id=$_COOKIE['user_id'];
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $s_address=$_POST['s_address'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $p_code=$_POST['p_code'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $check_method=$_POST['check_method'];
    $pro_id=$_POST['pro_id'];
    $cid=$_POST['cid'];
    $qty=$_POST['qty'];
    $amount=$_POST['amount'];
    if ($f_name==""|| $l_name=="" || $user_id=="" || $s_address=="" || $city=="" || $country=="" || $p_code==""|| $email==""|| $phone=="" || $check_method=="" || $pro_id=="" || $cid=="" || $qty=="" || $amount=="") {
        echo "0";
    }

    else {
        $sql="INSERT into `orders` (user_id,f_name,l_name,s_address,city,country,p_code,email,phone,check_method,pro_id,c_id,qty,amount) VALUES ('$user_id','$f_name','$l_name','$s_address','$city','$country','$p_code','$email','$phone','$check_method','$pro_id','$cid','$qty','$amount')";       

        $query=mysqli_query($conn, $sql);
        $delete_cart = "delete from cart where user_id='$user_id'";
        $run_delete = mysqli_query($conn,$delete_cart);


        if ($query) {
            echo "1";
        }

        else {
            echo "1";
        }
    }
}

if(isset($_POST['rentbike'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    $productid = $_POST['productid'];
    $cid = $_POST['cid'];
    $userId = $_COOKIE['user_id'];
    $target_dir = "../assets/images/rent_products/";
    $target_file = basename($_FILES["fImage"]["name"]);
    $target_file1 = basename($_FILES["bImage"]["name"]);

    $path = $target_dir . $target_file;
    $path1 = $target_dir . $target_file1;
    $result_doc_one = move_uploaded_file($_FILES["fImage"]["tmp_name"], $path);
    $result_doc_two = move_uploaded_file($_FILES["bImage"]["tmp_name"], $path1);
        $insert = mysqli_query($conn, "INSERT into rent_bike (`user_id`,`c_id`,`fname`,`lname`, `sdate`,`edate`, `productid`, `fImage`, `bImage` ) VALUES ('$userId','$cid','$fname', '$lname', '$sdate', '$edate', '$productid', '$target_file', '$target_file1')");
        if($insert){
            echo "1";
        }else{
            echo "0";
        }
    } 




?>