<?php
include 'config.php'; // Use 'include' instead of '@include' for better error handling
$cart = "SELECT * FROM cart";
$all_cart = $conn->query($cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <section id="header">
    <a href="#"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a  class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="cartpage.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="register.php">Register</a></li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">
    <h2>#Cart</h2>
        <p>Add your coupon code & SAVE upto 70%!</p>
    </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
            <?php
while ($row_cart = mysqli_fetch_assoc($all_cart)) {
    $prod_id = $row_cart["prod_id"];
    $products_table = "SELECT * FROM items WHERE prod_id = $prod_id";
    $all_items = $conn->query($products_table);
    while ($row = mysqli_fetch_assoc($all_items)) {
        echo "<tr>
            <td><button class='remove normal' data-id='{$row['prod_id']}'>Remove</button></td>
            <td><img src='img/products/{$row['image']}' alt=''></td>
            <td>{$row['prod_name']}</td>
            <td>{$row['price']}<input type='hidden' class='iprice' value={$row['price']}></td>
        </tr>";
    }
}
?>
            </tbody>
        </table>
    </section>

    <footer class="section-p1">
    <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong>Margao Goa</p>
            <p><strong>Phone:</strong>+91 8922135178</p>
            <p><strong>Hours:</strong>10:00 - 06:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Polciy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Getways</p>
            <img src="img/pay/pay.png" alt="">
        </div>
    </footer>

    <div class="copyright">
        <p>@ 2023, Ecommerce Website</p>
    </div>
    <script src="index.js"></script>
    <script>
        var remove = document.getElementsByClassName("remove");
        for (var i = 0; i < remove.length; i++) {
            remove[i].addEventListener("click", function (event) {
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        target.innerHTML = this.responseText;
                        target.style.opacity = 0.3;
                    }
                };
                xml.open("GET", "config.php?cart_id=" + cart_id, true);
                xml.send();
            });
        }
        </script>
    <script>
        var iprice = document.getElementsByClassName('iprice');
        var iqty = document.getElementsByClassName('iqty');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementsByClassName('gtotal'); // Select the total element
        function subtotal() {
        for (var i = 0; i < iprice.length; i++) {
            itotal[i].innerText=(iprice[i].value)*(iqty[i].value);
        } 
    }
    </script>
</body>
</html>
