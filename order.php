<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

//products query
include_once("./DbConnection/db-connection.php");

$pquery = "SELECT * FROM products";
$presult = mysqli_query($conn, $pquery);

// Check if there are any products
if ($presult) {
    $productsData = mysqli_fetch_all($presult, MYSQLI_ASSOC);
} else {
    $productsData = array(); // Empty array if no data or error
}

mysqli_close($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['companyName'];
    $companyRegNumber = $_POST['companyRegNumber'];
    $companyDirectorName = $_POST['companyDirectorName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $deliveryDate = $_POST['deliveryDate'];

    // Plant selection and quantities
    // Initialize an empty quantities array
    $quantities = [];

    // Loop through the products data
    foreach ($productsData as $product) {
        // Get the product name dynamically
        $plantName = $product['name'];

        // Dynamically access the quantity value from the POST data using the product name
        $quantities[$plantName] = $_POST[$plantName . '-quantity'] ?? 0;
    }



    // Prepare a string for plant names (if any plants were selected)
    $plants = [];
    // if ($quantities['tamarind'] > 0) $plants[] = "Tamarind";
    // foreach ($productsData as $product):
    //     if ($quantities[''] > 0) $plants[] = "Tamarind";
    //         echo htmlspecialchars($product['name']);
    // endforeach;

    foreach ($productsData as $product):
        $plantName = strtolower(str_replace(' ', '', $product['name']));  // Sanitize the name (lowercase, remove spaces)

        // Check if the plant name exists in the quantities array and if the quantity is greater than 0
        if (isset($quantities[$plantName]) && $quantities[$plantName] > 0) {
            $plants[] = htmlspecialchars($product['name']);
        }
    endforeach;

    $plantsString = implode(", ", $plants);
    $quantitiesString = json_encode($quantities);

    // Database connection
    $conn = new mysqli("localhost", "root", "", "finalproject");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO clientorder (companyName, registationNumber, directorName, email, phoneNumber, shippingAddress, deliveryDate, product, quantity) 
            VALUES ('$companyName', '$companyRegNumber', '$companyDirectorName', '$email', '$phone', '$address', '$deliveryDate', '$plantsString', '$quantitiesString')";

    if ($conn->query($sql) === TRUE) {
        $alertMessage = "Order is successful!";
        $alertClass = "success";
        $redirectUrl = "order.php";
    } else {
        $alertMessage = "Something went wrong. Please try again!";
        $alertClass = "error";
        $redirectUrl = "order.php";
    }

    $conn->close();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(0, 63, 50);
            margin: 0;
            padding: 0;
            color: white;
        }

        h3,
        label,
        p,
        button {
            font-family: 'Verdana', sans-serif;
        }

        .input input,
        .input select {
            font-family: 'Georgia', serif;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section h3 {
            font-size: 1.75rem;
            color: darkorange;
            margin-bottom: 15px;
        }

        .form-section .input {
            margin-bottom: 15px;
        }

        .form-section .input input,
        .form-section .input select {
            width: 60%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #777;
            color: #fff;
        }

        .form-section .input input {
            width: 100%;
        }

        button {
            padding: 10px 20px;
            background-color: darkorange;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #666;
        }

        .links {
            margin-top: 20px;
            text-align: right;
            padding-right: 20px;
        }

        .links a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .links a:hover {
            text-decoration: underline;
        }

        /* Table Styles */
        table {
            width: 50%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th {
            padding: 10px 12px;
            text-align: left;
            border: 1px solid #444;
            color: #fff;
        }

        table td {
            padding: 10px 18px;
            text-align: left;
            border: 1px solid #444;
            color: #fff;
        }

        table th {
            background-color: #555;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #444;
        }

        table tr:hover {
            background-color: #666;
        }

        /* Reduce input field width */
        table input[type="number"],
        table input[type="text"] {
            width: 100%;
            padding: 5px;
            background-color: #777;
            color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-section input[type="number"] {
            width: 100%;
        }

        /* Center the ORDER heading and make it bold */
        .title p {
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            font-size: 54px;
            margin-bottom: 30px;
        }

        /* Center the submit button */
        .submit-section {
            text-align: center;
            margin-top: 20px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8d7da;
            color: red;
            border: 2px solid red;
            padding: 20px;
            border-radius: 5px;
            font-size: 1.2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 400px;
            text-align: center;
        }

        .modal.success {
            background-color: #d4edda;
            color: green;
            border-color: green;
        }

        .modal button {
            padding: 10px 20px;
            background-color: #ccc;
            color: black;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }

        .modal button:hover {
            background-color: #bbb;
        }

        .container {
            width: 60%;
            margin: auto 20% 60px;
        }
    </style>
</head>

<body>
    <div class="links">
        <a href="index.php">Home</a>
    </div>

    <section class="order" id="order">
        <div class="title">
            <p>ORDER</p>
        </div>
        <div class="container">
            <form action="order.php" method="POST">
                <div class="form-sections">
                    <!-- Company Information Section -->
                    <div class="form-section">
                        <h3>Company Information</h3>
                        <div class="input">
                            <label for="companyName">Company Name:</label>
                            <input name="companyName" id="companyName" type="text" placeholder="Enter your company name..." required>
                        </div>
                        <div class="input">
                            <label for="companyRegNumber">Company Registration Number:</label>
                            <input name="companyRegNumber" id="CompanyregNumber" type="text" placeholder="Enter your company registration number..." required>
                        </div>
                        <div class="input">
                            <label for="companyDirectorName">Company Director Name:</label>
                            <input name="companyDirectorName" id="companyDirectorName" type="text" placeholder="Enter your company director name..." required>
                        </div>
                        <div class="input">
                            <label for="email">Email Address:</label>
                            <input name="email" id="email" type="email" placeholder="Enter your email..." required>
                        </div>
                        <div class="input">
                            <label for="phone">Phone Number:</label>
                            <input name="phone" id="phone" type="text" placeholder="Enter your phone number..." required>
                        </div>
                    </div>

                    <!-- Shipping Information Section -->
                    <div class="form-section">
                        <h3>Shipping Information</h3>
                        <div class="input">
                            <label for="address">Shipping Address:</label>
                            <input name="address" id="address" type="text" placeholder="Enter your shipping address..." required>
                        </div>
                        <div class="input">
                            <label for="deliveryDate">Preferred Delivery Date:</label>
                            <input name="deliveryDate" id="deliveryDate" type="date" required>
                        </div>
                    </div>

                    <!-- Products and Quantity Section -->
                    <div class="form-section">
                        <h3>Select Plants and Quantity</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Plant Name</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>Tamarind</td>
                                    <td><input type="number" name="tamarind-quantity" placeholder="Quantity" min="1"></td>
                                </tr>      
                                                           -->
                                <?php foreach ($productsData as $product): ?>

                                    <tr>
                                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                                        <td><input type="number" name="<?php echo htmlspecialchars($product['name']); ?>-quantity" placeholder="Quantity" min="1"></td>
                                    </tr>


                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="section submit-section">
                    <button class="btn" type="submit">SUBMIT</button>
                </div>
            </form>
        </div>

        <!-- Modal Popup -->
        <?php if (isset($alertMessage)): ?>
            <div class="modal <?php echo $alertClass; ?>" id="alertModal">
                <p><?php echo $alertMessage; ?></p>
                <button onclick="redirectToOrderPage()">OK</button>
            </div>
        <?php endif; ?>
    </section>

    <script>
        // Display the modal
        <?php if (isset($alertMessage)): ?>
            document.getElementById('alertModal').style.display = 'block';
        <?php endif; ?>

        // Redirect back to the order page when "OK" is clicked
        function redirectToOrderPage() {
            window.location.href = '<?php echo $redirectUrl; ?>';
        }
    </script>
</body>

</html>