<?php
@include 'config.php';
$all_products = $conn->query("SELECT * FROM items LIMIT 8");
$half_products=$conn->query("SELECT * FROM items WHERE prod_id >((SELECT count(*) from items)-8)");
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

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>ON all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button><a href="shop.html">Shop Now</a></button>
    </section>

    <section id="feature" class="section-p1">
        <div class ="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>

        <div class ="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>

        <div class ="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>

        <div class ="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>

        <div class ="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>

        <div class ="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>Support</h6>
        </div>

    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Designs</p>
        <div class="pro-container">
        <?php
while ($row = mysqli_fetch_assoc($all_products)) {
?>
<div class="pro">
<a href="sproduct.html">
    <img src="img/products/<?php echo $row["image"]; ?>" >
</a>
    <div class="des">
        <span>Levi's</span>
        <h5><?php echo $row["prod_name"]; ?></h5>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h4><?php echo $row["price"]; ?></h4>
    </div>
    <button class="add normal" data-id="<?php echo $row['prod_id']; ?>">Add to cart</button>
</div>
<?php
}
?>
        </div>
    </section>

    <section id="banner" class="section-m1 ">
        <h4>Black Friday Sale</h4>
        <h2>Up to <span>70%</span>off-All T-Shirts & Accessories</h2>
        <button class="normal"><a href="shop.html">Explore Now</a></button>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
        <?php
while ($row = mysqli_fetch_assoc($half_products)) {
?>
<div class="pro">
<a href="sproduct.html">
    <img src="img/products/<?php echo $row["image"]; ?>" >
</a>
    <div class="des">
        <span>Levi's</span>
        <h5><?php echo $row["prod_name"]; ?></h5>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h4><?php echo $row["price"]; ?></h4>
    </div>
    <button class="add normal" data-id="<?php echo $row['prod_id']; ?>">Add to cart</button>
</div>
<?php
}
?>
        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy Deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>Sale</span>
            <button class="white">Learn More</button>
        </div>

        <div class="banner-box banner-box2">
            <h4>Winter</h4>
            <h2>Upcoming Season</h2>
            <span>Sale</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection-50% OFF</h3>
        </div>

        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Winter/2023</h3>
        </div>

        <div class="banner-box banner-box3">
            <h2>T-Shirts</h2>
            <h3>New Trendy Graphics</h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1 ">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest collection and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="your email address">
            <button class="normal">Sign Up</button>
        </div>
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
    var prod_id = document.getElementsByClassName("add");
    for (var i = 0; i < prod_id.length; i++) {
    prod_id[i].addEventListener("click", function(event) {
        var target = event.target;
        var id = target.getAttribute("data-id"); // Use "data_id" instead of "data_id"
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data=JSON.parse(this.responseText);
                target.innerHTML=data.in_cart;
                document.getElementById("lg-bag").innerHTML=data.num_cart +1;
            }
        }
        xml.open("GET", "config.php?id=" + id, true); // Change the URL construction
        xml.send();

    })
}
</script>


</body>
</html>