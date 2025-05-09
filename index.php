<?php
// Include your database connection file
include("./DbConnection/db-connection.php");

// Fetch all products from the database based on the search query
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Check if there are any products
if ($result && mysqli_num_rows($result) > 0) {
    $productData = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $productData = array(); // Empty array if no data or error
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>More Green</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="contactus.css">
    <link rel="stylesheet" href="footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>


    <!-- Navbar-->
    <header>
        <div class="logo">
            <img src="images/logonew.jpg" alt="">
        </div>
        <div class="head">
            <span>More Green (Pvt) Ltd</span>
        </div>
        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#products">Products</a>
            <a href="#gallery">Gallery</a>
            <a href="#contact">Contact us</a>
            <a href="login.html">Login</a>
            <a href="#blog">Blog</a>
        </div>
        <i class="bx bx-menu" id="menu-icon"></i>
    </header>

    <!-- Home Page -->

    <section id="home" class="home">
        <div class="left">
            <img src="" class="background-image">
        </div>
        <div class="right">
            <div class="top">
                <p>
                    "Planting the seeds of tomorrow’s
                    sustainable harvests, one tree at a time."
                </p>
                <a href="#about">learn more...</a>
            </div>
            <div class="middle">
                <p>
                    More Green (Pvt) Ltd <br>
                    <span>The top choice for quality tree exports, growing a greener tomorrow.</span>
                </p>
            </div>
            <div class="bottom">
                <button onclick="location.href='login.html'" class="link">
                    Order <br>
                    <span>now</span>
                </button>
            </div>
        </div>
    </section>

    <!--About Us---->
    <section class="about" id="about">
        <div class="About-text">
            <div class="title">
                <img src="" alt="">
                <p>ABOUT <span> US </span> </p>
                <img src="" alt="">
            </div>
        </div>

        <p class="des">
            Founded in 2024 and based in Negombo,
            Sri Lanka, More Green (Pvt) Ltd.
            exports a diverse range of trees,
            including Tamarind, Bamboo, Neem, and Arjuna.
            Committed to sustainability, our key project,
            ‘Saudi: The Middle East with More Green from Lankan Trees,’
            aims to enhance greenery in Saudi Arabia using Sri Lankan trees,
            reflecting our mission to combat global warming and promote environmental preservation worldwide.
        </p>

        </div>
    </section>

    <!----products---->
    <section class="product" id="products">

        <div class="title">
            <p>Products</p>
        </div>

        <?php foreach ($productData as $product) : ?>
            <div class="grid-item">
                <div class="image">
                    <?php
                    // Path to the image
                    $imagePath = './admin/AllImages/' . $product['image'];

                    // Check if the image exists
                    if (file_exists($imagePath)) :
                    ?>
                        <!-- Show the image if it exists -->
                        <img src="<?php echo $imagePath; ?>" alt="Image of <?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php else : ?>
                        <!-- Show a default image if the file doesn't exist -->
                        <img src="default.jpg" alt="Default image for <?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php endif; ?>
                </div>

                <div class="details">
                    <h1 class="product-title">
                        <dt><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>:</dt>
                    </h1>
                    <p class="product-description">
                        <?php echo nl2br(htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8')); ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>

        <button onclick="location.href='login.html'" class="linked">
            Order Now
        </button>

    </section>

    <!-- <h1 class="product-title">Neem:</h1>
                <img src="Images/neem.jpeg" alt="">
                <p class="product-description"> The “miracle tree” with extensive medicinal, agricultural,
                    and skincare applications. Its leaves, bark, and oil are highly valued.
                    <button onclick="location.href='login.html'" class="link">
                        Order Now <br>

                    </button>

                <h1 class="product-title">Bamboo: </h1>
                <img src="Images/bambo.jpeg" alt="">
                <p class="product-description"> A fast-growing, resilient plant used in construction,
                    crafts, and cuisine, symbolizing sustainability and versatility.
                    <button onclick="location.href='login.html'" class="link">
                        Order Now <br> </button>
                <h1 class="product-title"> Arjuna:</h1>
                <img src="Images/arjuna.webp" alt="">
                <p class="product-description"> An Ayurvedic tree prized for its heart-supporting properties.
                    Its bark is used in traditional medicine to promote cardiovascular health
                    <button onclick="location.href='login.html'" class="link">
                        Order Now <br> </button>
                <h1 class="product-title">Tamarind: </h1>
                <img src="Images/tamarind.jpeg" alt="">
                <p class="product-description"> A tropical tree known for its tangy, pulp-filled pods,
                    commonly used in cooking, traditional medicine, and woodworking.
                    <button onclick="location.href='login.html'" class="link">
                        Order Now <br>
                    </button> -->

    <!-- Gallery -->
    <section class="gallery" id="gallery">
        <div class="title">
            <img src="" alt="">
            <p>GALLERY</p>
            <img src="" alt="">
        </div>
        <div class="gallery-pictures">
            <img src="Images/Pic1.jpeg" alt="">
            <img src="Images/Pic2.jpeg" alt="">
            <img src="Images/Pic3.jpeg" alt="">
            <img src="Images/Pic4.jpeg" alt="">
            <img src="Images/Pic5.jpeg" alt="">
            <img src="Images/Pic15.jpeg" alt="">
            <img src="Images/Pic7.jpeg" alt="">
            <img src="Images/Pic9.jpeg" alt="">
            <img src="Images/Pic6.jpeg" alt="">
            <img src="Images/Pic10.jpeg" alt="">
            <img src="Images/Pic11.jpeg" alt="">
            <img src="Images/Pic12.jpeg" alt="">
            <img src="Images/Pic13.jpeg" alt="">
            <img src="Images/Pic14.jpeg" alt="">
            <img src="Images/Pic8.jpeg" alt="">
            <img src="Images/Pic16.jpeg" alt="">
        </div>
    </section>


    <!-- Order Page -->
    <!--<section class="order" id="order">
            <div class="title">
                <img src="" alt="">
                <p>ORDER</p>
                <img src="" alt="">
            </div>
            <p class="sub-title">
                "Bring nature to your doorstep and let your garden bloom with life."
            </p>
            <form action="">-->
    <!-- Form Sections -->
    <!--<div class="form-sections">-->
    <!-- Company Information Section -->
    <!--<div class="form-section">
                        <h3>Company Information</h3>
                        <div class="input">
                            <label for="companyName">Company Name:</label>
                            <input id="companyName" type="text" placeholder="Enter your company name..." required>
                        </div>
                        <div class="input">
                            <label for="companyRegNumber">Company Registration Number:</label>
                            <input id="CompanyregNumber" type="text" placeholder="Enter your company registration number..." required>
                        </div>
                        <div class="input">
                            <label for="companyDirectorName">Company Director Name:</label>
                            <input id="companyDirectorName" type="text" placeholder="Enter your company director name..." required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address:</label>
                            <input id="email" type="email" placeholder="Enter your email..." required>
                        </div>
                        <div class="input">
                            <label for="phone">Phone Number:</label>
                            <input id="phone" type="tel" placeholder="Enter your phone number..." required>
                        </div>
                    </div>-->

    <!-- Shipping Information Section -->
    <!--<div class="form-section">
                        <h3>Shipping Information</h3>
                        <div class="input">
                            <label for="address">Shipping Address:</label>
                            <input id="address" type="text" placeholder="Enter your shipping address..." required>
                        </div>
                        <div class="input">
                            <label for="deliveryDate">Preferred Delivery Date:</label>
                            <input id="deliveryDate" type="date" required>
                        </div>
                    </div>-->

    <!-- Select Plants and Quantity Section -->
    <!--<div class="form-section">
                        <h3>Select Plants and Quantity</h3>
                        <div class="plants-selection">
                            <div class="input">
                                <input id="tamarind" type="checkbox" name="plants" value="Tamarind">
                                <label for="tamarind" class="checkbox-label">Tamarind</label>
                                <input id="tamarind-qty" type="number" name="tamarind-quantity" placeholder="Quantity" min="1">
                            </div>
                            <div class="input">
                                <input id="wood-apple" type="checkbox" name="plants" value="Wood Apple">
                                <label for="wood-apple" class="checkbox-label">Wood Apple</label>
                                <input id="wood-apple-qty" type="number" name="wood-apple-quantity" placeholder="Quantity" min="1">
                            </div>
                            <div class="input">
                                <input id="bamboo" type="checkbox" name="plants" value="Bamboo">
                                <label for="bamboo" class="checkbox-label">Bamboo</label>
                                <input id="bamboo-qty" type="number" name="bamboo-quantity" placeholder="Quantity" min="1">
                            </div>
                            <div class="input">
                                <input id="neem" type="checkbox" name="plants" value="Neem">
                                <label for="neem" class="checkbox-label">Neem</label>
                                <input id="neem-qty" type="number" name="neem-quantity" placeholder="Quantity" min="1">
                            </div>
                            <div class="input">
                                <input id="arjuna" type="checkbox" name="plants" value="Arjuna">
                                <label for="arjuna" class="checkbox-label">Arjuna</label>
                                <input id="arjuna-qty" type="number" name="arjuna-quantity" placeholder="Quantity" min="1">
                            </div>
                        </div>
                    </div>
                </div>-->
    <!-- Submit Button -->
    <!--<div class="section submit-section">
                    <button class="btn" type="submit">
                        SUBMIT
                    </button>
                </div>
            </form>
        </section>-->


    <!-- Contact Us -->
    <section class="contact" id="contact"></section>
    <div class="title">
        <img src="" alt="">
        <p>CONTACT US</p>
        <img src="" alt="">
    </div>

    <div class="contact-content">
        <blockquote class="quote">

            <i class=''></i>
            <p>"Growing a greener tomorrow, together"</p>
        </blockquote>

        <div class="contact-details">
            <p>📞 <span>Phone:</span> +94 77 123 4567</p>
            <p>📍 <span>Address:</span> 123 Green Road, Negombo, Sri Lanka</p>
            <p>✉ <span>Email:</span> <b>info@moregreenexport.com</b></p>
        </div>
        <div class="name">
            <h2>More Green (Pvt) Ltd.</h2>
        </div>
    </div>

    <!-- <p class="order-now">
        &nbsp;
        <a href="#order" class="link"><span></span></a>
    </p> -->
    </section>

    <!-- Quotes Section -->
    <section class="quotes">
        <h2>Advance Notice:</h2>
        <div class="quote-box">
            <p>"Secure your order effortlessly through our online inquiry form"</p>
        </div>
        <div class="quote-box">
            <p>"Please submit your request at least 24 hours in advance."</p>
        </div>
        <div class="quote-box">
            <p>"For bulk orders or special requirements, kindly contact us directly."</p>
        </div>
        <div class="quote-box">
            <p>"Our dedicated team is available to assist you with any order-related questions or concerns"</p>
        </div>
        <div class="quote-box">
            <p>"We strive to respond to all inquiries promptly. Reach out to us!"</p>
        </div>
    </section>


    <!-- Footer -->
    <section class="blog" id="blog">
        <footer>
            <div class="image">
                <div class="image-overlay"></div>
            </div>
            <a href="#home">
                <img src="Images/logonew.jpg" alt="">
            </a>
            <p>MORE GREEN PVT (LTD)</p>
            <ul class="links" type="none">
                <li class="link">
                    <a href="#home"> Home</a>
                </li>
                <li class="link">
                    <a href="#about"> About Us</a>
                </li>
                <li class="link">
                    <a href="#products"> Products</a>
                </li>
                <li class="link">
                    <a href="#gallery"> Gallery</a>
                </li>

                <li class="link">
                    <a href="#contact"> Contact Us</a>
                </li>
                <li class="link">
                    <a href="#blog"> Blog</a>
                </li>
            </ul>
            <div class="box-icon">
                <h1>Follow us for more:</h1>
                <a href="https://www.facebook.com" target="_blank">
                    <i class='bx bxl-facebook'></i>
                </a>

                <a href="https://www.instagram.com/mr.ammxr_xc/profilecard/?igsh=MTV1dHg4MnlhY2dxYQ==" target="_blank">
                    <i class='bx bxl-instagram'></i>
                </a>
                <a href="https://www.twitter.com" target="_blank">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="https://www.pinterest.com" target="_blank">
                    <i class='bx bxl-pinterest-alt'></i>
                </a>


            </div>
        </footer>
    </section>
    <script>
        // Select the menu icon and the menu container
        const menuIcon = document.getElementById('menu-icon');
        const menuLinks = document.querySelector('.links');

        // Add an event listener for click on the menu icon
        menuIcon.addEventListener('click', () => {
            // Toggle the 'active' class on the menu container
            menuLinks.classList.toggle('active');
        });
    </script>


</body>

</html>