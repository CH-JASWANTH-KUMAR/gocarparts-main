<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();

if (!isLoggedIn()) {
    header("Location: loginpage.php");
    exit;
}

require_once __DIR__ . '/db.php';
$user_id = getUserId();
$username = $_SESSION['username'] ?? 'User';

// Load user orders using prepared statement as specified in Phase 3
$orders = [];
$orders_query = "
    SELECT 
        o.id, 
        o.order_time, 
        o.first_name, 
        o.last_name, 
        o.email_or_mobile,
        COALESCE(SUM(oi.subtotal), 0) AS total,
        MAX(oi.payment_status) AS payment_status
    FROM orders o
    LEFT JOIN order_items oi 
        ON oi.order_id = o.id
    WHERE o.user_id = ?
    GROUP BY o.id
    ORDER BY o.id DESC
";

$stmt = $conn->prepare($orders_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders_result = $stmt->get_result();
while ($row = $orders_result->fetch_assoc()) {
    $orders[] = $row;
}
$stmt->close();
?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Partsix - My Account</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    
   <!-- ======= All CSS Plugins here ======== -->
   <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
   <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">
 
   <!-- Plugin css -->
   <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
 
   <!-- Custom Style CSS -->
   <link rel="stylesheet" href="assets/css/style.css">
  <!-- Homepage V2 — Premium Design System (Phase 1: Topbar · Header · Nav · Search) -->
  <link rel="stylesheet" href="assets/css/homepage-v2.css">
</head>

<body>

    <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>	

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->
    
    <!-- Start header area -->
   <?php include 'header.php'?>

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.php">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
<p class="account__welcome--text">
    Hello, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin'; ?> welcome to your dashboard!
</p>
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="my-account.php">Dashboard</a></li>
                            <li class="account__menu--list"><a href="my-account-2.php">Addresses</a></li>
                            <li class="account__menu--list"><a href="wishlist.php">Wishlist</a></li>
                            <li class="account__menu--list"><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Orders History</h2>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">Order ID</th>
                                            <th class="account__table--header__child--items">Order Date</th>
                                            <th class="account__table--header__child--items">Customer Name</th>
                                            <th class="account__table--header__child--items">Payment Status</th>
                                            <th class="account__table--header__child--items">Order Total</th>
                                            <th class="account__table--header__child--items">View Details</th>	 	 	 	
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">
                                        <?php if (empty($orders)): ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items" colspan="6" style="text-align: center;">No orders found.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($orders as $order): ?>
                                                <tr class="account__table--body__child">
                                                    <td class="account__table--body__child--items">#<?php echo htmlspecialchars($order['id']); ?></td>
                                                    <td class="account__table--body__child--items"><?php echo htmlspecialchars(date('F d, Y', strtotime($order['order_time']))); ?></td>
                                                    <td class="account__table--body__child--items"><?php echo htmlspecialchars(trim($order['first_name'] . ' ' . $order['last_name']) ?: 'N/A'); ?></td>
                                                    <td class="account__table--body__child--items"><?php echo htmlspecialchars($order['payment_status'] ?: 'Pending'); ?></td>
                                                    <td class="account__table--body__child--items">$<?php echo htmlspecialchars(number_format($order['total'], 2)); ?></td>
                                                    <td class="account__table--body__child--items"><a href="order-details.php?id=<?php echo htmlspecialchars($order['id']); ?>" class="view__details--link">View Details</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                    <tbody class="account__table--body mobile__block">
                                        <?php if (empty($orders)): ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items" style="text-align: center;">No orders found.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($orders as $order): ?>
                                                <tr class="account__table--body__child">
                                                    <td class="account__table--body__child--items">
                                                        <strong>Order ID</strong>
                                                        <span>#<?php echo htmlspecialchars($order['id']); ?></span>
                                                    </td>
                                                    <td class="account__table--body__child--items">
                                                        <strong>Order Date</strong>
                                                        <span><?php echo htmlspecialchars(date('F d, Y', strtotime($order['order_time']))); ?></span>
                                                    </td>
                                                    <td class="account__table--body__child--items">
                                                        <strong>Customer Name</strong>
                                                        <span><?php echo htmlspecialchars(trim($order['first_name'] . ' ' . $order['last_name']) ?: 'N/A'); ?></span>
                                                    </td>
                                                    <td class="account__table--body__child--items">
                                                        <strong>Payment Status</strong>
                                                        <span><?php echo htmlspecialchars($order['payment_status'] ?: 'Pending'); ?></span>
                                                    </td>
                                                    <td class="account__table--body__child--items">
                                                        <strong>Order Total</strong>
                                                        <span>$<?php echo htmlspecialchars(number_format($order['total'], 2)); ?></span>
                                                    </td>
                                                    <td class="account__table--body__child--items">
                                                        <strong>View Details</strong>
                                                        <span><a href="order-details.php?id=<?php echo htmlspecialchars($order['id']); ?>" class="view__details--link">View Details</a></span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->

        <!-- Start shipping section -->
        <section class="shipping__section">
            <div class="container">
                <div class="shipping__inner style2 d-flex">
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping1.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Free Shipping</h2>
                            <p class="shipping__content--desc">Free shipping over $100</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping2.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Support 24/7</h2>
                            <p class="shipping__content--desc">Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping3.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">100% Money Back</h2>
                            <p class="shipping__content--desc">You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping4.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Payment Secure</h2>
                            <p class="shipping__content--desc">We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

    </main>

        <?php include 'footer.php'; ?>


    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="assets/js/vendor/popper.js" defer="defer"></script>
<script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="assets/js/script.js"></script>
  
</body>
</html>