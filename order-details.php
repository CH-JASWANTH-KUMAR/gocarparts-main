<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();

if (!isLoggedIn()) {
    header("Location: loginpage.php");
    exit;
}

require_once __DIR__ . '/db.php';
$user_id = getUserId();
$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($order_id <= 0) {
    header("Location: my-account.php");
    exit;
}

// Fetch order details ensuring ownership
$order_query = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($order_query);
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$order) {
    // Order not found or not owned by user
    header("Location: my-account.php");
    exit;
}

// Fetch order items
$items_query = "SELECT * FROM order_items WHERE order_id = ?";
$stmt = $conn->prepare($items_query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$items_result = $stmt->get_result();
$items = [];
$grand_total = 0;
$payment_status = 'Pending';
$payment_id = 'N/A';

while ($row = $items_result->fetch_assoc()) {
    $items[] = $row;
    $grand_total += (float)$row['subtotal'];
    if (!empty($row['payment_status'])) {
        $payment_status = $row['payment_status'];
    }
    if (!empty($row['payment_id'])) {
        $payment_id = $row['payment_id'];
    }
}
$stmt->close();
$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Partsix - Order Details #<?php echo $order_id; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
  
  <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/homepage-v2.css">
  
  <style>
    .order-details__container {
      background: #ffffff;
      border: 1px solid #e5e8ef;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
      margin-bottom: 40px;
    }
    .order-header__title {
      font-size: 24px;
      font-weight: 800;
      color: #142b64;
      font-family: 'Inter', sans-serif;
    }
    .badge-payment {
      padding: 8px 16px;
      font-size: 13px;
      font-weight: 700;
      border-radius: 20px;
    }
    .badge-payment--paid {
      background-color: #22c55e !important;
      color: #ffffff;
    }
    .badge-payment--pending {
      background-color: #eab308 !important;
      color: #ffffff;
    }
    .badge-payment--quote {
      background-color: #3b82f6 !important;
      color: #ffffff;
    }
    .detail-card {
      border: 1px solid #e5e8ef;
      border-radius: 8px;
      padding: 20px;
      height: 100%;
      background-color: #f8f9fc;
    }
    .detail-card__title {
      font-size: 15px;
      font-weight: 700;
      color: #142b64;
      margin-bottom: 12px;
      border-bottom: 1.5px solid #e5e8ef;
      padding-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .detail-card__text {
      font-size: 14px;
      line-height: 1.6;
      color: #4b5563;
      margin-bottom: 6px;
    }
    .item-thumbnail {
      width: 70px;
      height: 70px;
      object-fit: contain;
      border: 1px solid #e5e8ef;
      border-radius: 6px;
      background: #ffffff;
      padding: 4px;
    }
    .item-name {
      font-size: 15px;
      font-weight: 700;
      color: #142b64;
    }
    .table-order-items th {
      background-color: #f8f9fc;
      color: #142b64;
      font-weight: 700;
      border-bottom: 2px solid #e5e8ef;
    }
    .table-order-items td {
      vertical-align: middle;
      border-bottom: 1px solid #e5e8ef;
    }
    .summary-row {
      font-size: 15px;
      color: #4b5563;
      margin-bottom: 8px;
      display: flex;
      justify-content: space-between;
    }
    .summary-row--total {
      font-size: 18px;
      font-weight: 800;
      color: #e3000f;
      border-top: 1.5px solid #e5e8ef;
      padding-top: 12px;
      margin-top: 12px;
    }
    @media (max-width: 768px) {
      .order-details__container {
        padding: 20px 15px;
      }
      .table-order-items thead {
        display: none;
      }
      .table-order-items tr {
        display: block;
        border-bottom: 2px solid #e5e8ef;
        padding-bottom: 15px;
        margin-bottom: 15px;
      }
      .table-order-items td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
        padding: 6px 0;
      }
      .table-order-items td::before {
        content: attr(data-label);
        font-weight: 700;
        color: #142b64;
        margin-right: 15px;
      }
      .table-order-items td.item-info-col {
        flex-direction: column;
        align-items: flex-start;
      }
      .table-order-items td.item-info-col::before {
        display: none;
      }
    }
  </style>
</head>

<body>
  
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
                <li class="breadcrumb__content--menu__items"><a href="my-account.php">My Account</a></li>
                <li class="breadcrumb__content--menu__items"><span>Order Details</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Order Details Section -->
    <section class="my__account--section section--padding">
      <div class="container">
        <div class="order-details__container">
          
          <!-- Title & Top Info -->
          <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-4 mb-4 gap-3">
            <div>
              <h1 class="order-header__title">Order #<?php echo $order_id; ?></h1>
              <p class="text-muted mb-0" style="font-size: 14px; font-weight: 500;">
                Placed on <?php echo htmlspecialchars(date('F d, Y \a\t h:i A', strtotime($order['order_time']))); ?>
              </p>
            </div>
            <div>
              <?php
              $badge_class = 'badge-payment--pending';
              if (strcasecmp($payment_status, 'Paid') === 0) {
                  $badge_class = 'badge-payment--paid';
              } elseif (strcasecmp($payment_status, 'Quote Pending') === 0 || strcasecmp($payment_status, 'Call For Price') === 0) {
                  $badge_class = 'badge-payment--quote';
              }
              ?>
              <span class="badge badge-payment <?php echo $badge_class; ?>">
                Payment: <?php echo htmlspecialchars($payment_status ?: 'Pending'); ?>
              </span>
            </div>
          </div>

          <!-- Customer info row -->
          <div class="row mb-5 g-4">
            <div class="col-md-4">
              <div class="detail-card">
                <h3 class="detail-card__title">Billing Details</h3>
                <p class="detail-card__text"><strong>Name:</strong> <?php echo htmlspecialchars($order['first_name'] . ' ' . $order['last_name']); ?></p>
                <p class="detail-card__text"><strong>Email/Mobile:</strong> <?php echo htmlspecialchars($order['email_or_mobile']); ?></p>
                <?php if (!empty($order['company_name'])): ?>
                  <p class="detail-card__text"><strong>Company:</strong> <?php echo htmlspecialchars($order['company_name']); ?></p>
                <?php endif; ?>
                <p class="detail-card__text"><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
                <p class="detail-card__text"><strong>City:</strong> <?php echo htmlspecialchars($order['city']); ?></p>
                <p class="detail-card__text"><strong>Location:</strong> <?php echo htmlspecialchars($order['country'] . ', ' . $order['postal_code']); ?></p>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="detail-card">
                <h3 class="detail-card__title">Payment Details</h3>
                <p class="detail-card__text"><strong>Status:</strong> <?php echo htmlspecialchars($payment_status ?: 'Pending'); ?></p>
                <p class="detail-card__text"><strong>Transaction ID:</strong> <code style="font-size: 13px; color: #e3000f;"><?php echo htmlspecialchars($payment_id ?: 'N/A'); ?></code></p>
                <p class="detail-card__text"><strong>Method:</strong> Razorpay Gateway</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="detail-card">
                <h3 class="detail-card__title">Order Notes</h3>
                <p class="detail-card__text" style="font-style: italic;">
                  <?php echo !empty($order['order_notes']) ? htmlspecialchars($order['order_notes']) : 'No customer notes added to this order.'; ?>
                </p>
              </div>
            </div>
          </div>

          <!-- Items list -->
          <h2 class="order-header__title mb-4" style="font-size: 18px; border-bottom: 2px solid #142b64; padding-bottom: 8px;">Order Items</h2>
          <div class="table-responsive mb-5">
            <table class="table table-order-items">
              <thead>
                <tr>
                  <th style="width: 100px;">Image</th>
                  <th>Product</th>
                  <th class="text-center" style="width: 120px;">Price</th>
                  <th class="text-center" style="width: 100px;">Quantity</th>
                  <th class="text-end" style="width: 150px;">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($items)): ?>
                  <tr>
                    <td colspan="5" class="text-center text-muted">No items found for this order.</td>
                  </tr>
                <?php else: ?>
                  <?php foreach ($items as $item): ?>
                    <?php
                    $price = (float)$item['price'];
                    $subtotal = (float)$item['subtotal'];
                    $is_call_price = ($price <= 0);
                    
                    // Comma splitting for image in order_items if it contains commas
                    $img_src = trim($item['product_image'] ?: 'assets/img/product/product-placeholder.png');
                    if (strpos($img_src, ',') !== false) {
                        $parts = explode(',', $img_src);
                        $img_src = trim($parts[0]);
                    }
                    ?>
                    <tr>
                      <td data-label="Image">
                        <img class="item-thumbnail" src="<?php echo htmlspecialchars($img_src); ?>" alt="<?php echo htmlspecialchars($item['product_name']); ?>">
                      </td>
                      <td class="item-info-col">
                        <div class="item-name"><?php echo htmlspecialchars($item['product_name']); ?></div>
                      </td>
                      <td class="text-center" data-label="Price" style="font-weight: 600;">
                        <?php echo $is_call_price ? 'Call For Price' : '$' . number_format($price, 2); ?>
                      </td>
                      <td class="text-center" data-label="Quantity" style="font-weight: 600;">
                        <?php echo intval($item['quantity']); ?>
                      </td>
                      <td class="text-end" data-label="Total" style="font-weight: 700; color: #142b64;">
                        <?php echo $is_call_price ? 'Call For Price' : '$' . number_format($subtotal, 2); ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <!-- Total Calculation -->
          <div class="row justify-content-end">
            <div class="col-md-5">
              <div class="detail-card" style="background: #f8f9fc; border: 1px solid #e5e8ef;">
                <h3 class="detail-card__title" style="border-bottom: 2px solid #e3000f;">Summary</h3>
                <div class="summary-row">
                  <span>Subtotal</span>
                  <strong style="color: #142b64;">
                    <?php echo ($grand_total <= 0) ? 'Call For Price' : '$' . number_format($grand_total, 2); ?>
                  </strong>
                </div>
                <div class="summary-row">
                  <span>Shipping</span>
                  <strong class="text-success">Free</strong>
                </div>
                <div class="summary-row summary-row--total">
                  <span>Total Cost</span>
                  <span>
                    <?php echo ($grand_total <= 0) ? 'Call For Price' : '$' . number_format($grand_total, 2); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <!-- Back button -->
          <div class="mt-5 d-flex justify-content-between">
            <a href="my-account.php" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 6px; font-weight: 600; font-family: 'Inter', sans-serif;">
              ← Back to My Account
            </a>
            <a href="index.php" class="btn btn-primary px-4 py-2" style="background-color: #142b64; border-color: #142b64; border-radius: 6px; font-weight: 600; font-family: 'Inter', sans-serif;">
              Continue Shopping
            </a>
          </div>

        </div>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>

  <!-- Scroll top bar -->
  <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

  <!-- All Script JS Plugins here  -->
  <script src="assets/js/vendor/popper.js" defer="defer"></script>
  <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
  <script src="assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="assets/js/plugins/glightbox.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>
</html>
