<?php
    // Create a database connection
    $conn = new mysqli('localhost','root','', 'cara');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET["id"])){
        $prod_id=$_GET["id"];
        $get_cart="SELECT * FROM cart WHERE prod_id=$prod_id";
        $result=$conn->query($get_cart);
        $total_cart="SELECT * FROM cart";
        $total_cart_result=$conn->query($total_cart);
        $cart_num=mysqli_num_rows($total_cart_result);
        if(mysqli_num_rows($result)>0){
            $in_cart="already in cart";

            echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        }
        else{
            $insert="INSERT INTO cart(prod_id)values($prod_id)";
            if($conn->query($insert)===true){
                $in_cart="added to cart";
                echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
            }
            else{
                echo "<script>alert(It doesn't insert)</script>";
            }
        }
    }
    if(isset($_GET["cart_id"])){
        $product_id=$_GET["cart_id"];
        $remove_cart = "DELETE FROM cart WHERE prod_id = $product_id";
        if($conn->query($remove_cart)===true){
            echo "removed from cart";
        }
    }
?>