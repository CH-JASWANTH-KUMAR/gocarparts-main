<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>premium-Car Parts</title>
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
  <link rel="stylesheet" href="assets/css/homepage-v2.css">
  <!-- <link rel="stylesheet" href="assets/css/product-gallery.css   "> -->

    <style>
.desc-box table td {
    padding: 12px 16px;
    border-bottom: 1px solid #eaeaea;
}

.desc-box table tr:nth-child(odd) {
    /* background-color: #f4fdf8 */ 
    background-color:rgba(51, 53, 52, 0.03)
;
}

.desc-box table tr:hover {
    background-color:rgba(214, 91, 91,0.3); /* light green or any color you like */
    transition: background 0.3s ease;
    cursor: pointer;
}
</style>

<style>
/* Dark background overlay */
#quoteModal {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  z-index: 9999;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

/* Modal box */
#quoteModal .modal-content {
  background: white;
  border-radius: 10px;
  width: 100%;
  max-width: 550px;
  max-height: 90vh;
  display: flex;
  flex-direction: column;
  position: relative;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  overflow: hidden; /* prevent header overlap */
}

/* Blue sticky header */
#quoteModal .modal-header {
  background: #e63946;
  color: white;
  padding: 15px;
  font-size: 18px;
  font-weight: bold;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  position: sticky;
  top: 0;
  z-index: 10;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Close button */
#quoteModal .modal-header .close-btn {
  background: none;
  border: none;
  color: white;
  font-size: 22px;
  cursor: pointer;
  line-height: 1;
}

/* Scrollable body */
#quoteModal .modal-body {
  padding: 20px;
  overflow-y: auto;
  flex: 1;
}

/* Input styling */
#quoteModal input, #quoteModal textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

/* Submit button */
#quoteModal button[type="submit"] {
  background: #e63946;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  font-size: 15px;
  cursor: pointer;
}
</style>


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
                                <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        

<?php
require_once __DIR__ . '/includes/db_connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!$id) die("Invalid product ID.");

// Fetch product from products table using prepared statement
$stmt = $conn->prepare("SELECT id, price, category, make, model, year, submodel, image, mileage, sku FROM products WHERE id = ?");
if (!$stmt) {
    die("Database query preparation failed.");
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Product not found.");
}

$product = $result->fetch_assoc();
$stmt->close();

// Compose dynamic title
$title = trim(
    ($product['year'] ?? '') . ' ' .
    ($product['make'] ?? '') . ' ' .
    ($product['model'] ?? '')
);
if (!empty($product['submodel'])) {
    $title .= ' - ' . $product['submodel'];
}

// Handle comma-separated image URLs or empty images
$image = $product['image'] ?? '';
if (strpos($image, ',') !== false) {
    $parts = explode(',', $image);
    $image = trim($parts[0]);
}
if (empty($image)) {
    $image = 'assets/img/product/product-placeholder.png';
}

// Map database fields to template variables
$product['product_id'] = $product['id'];
$product['product_title'] = $title;
$product['product_image'] = $image;
$product['sku'] = !empty($product['sku']) ? htmlspecialchars($product['sku']) : 'N/A';
$product['engine_type'] = ($product['category'] === 'Engine' || $product['category'] === 'USED ENGINES') ? 'Engine' : 'N/A';
$product['transmission_type'] = ($product['category'] === 'Transmission' || $product['category'] === 'USED TRANSMISSIONS') ? 'Transmission' : 'N/A';
$product['in_stock'] = 1;
$product['product_condition'] = 'A-Grade Used';
$product['warranty'] = '1-Year Warranty Included';
$product['fitment_html'] = '';

$year = $product['year'] > 0 ? htmlspecialchars($product['year']) : 'N/A';
$make = !empty($product['make']) ? htmlspecialchars($product['make']) : 'N/A';
$model = !empty($product['model']) ? htmlspecialchars($product['model']) : 'N/A';
$part = htmlspecialchars($product['category'] ?: 'Part');
$displacement = $product['engine_type'];

// Presentation-only display mileage options relative to price
$basePrice = (float)$product['price'];
$minPrice = $basePrice;
$maxPrice = $basePrice;

$m1 = max(30000, 30000 + (($id * 7) % 20000));
$m2 = $m1 + 25000;
$m3 = $m2 + 30000;

$mileageOptions = [
    number_format($m1) . ' miles' => $basePrice * 1.12,
    number_format($m2) . ' miles' => $basePrice,
    number_format($m3) . ' miles' => $basePrice * 0.88
];

$conn->close();
?>

<!-- Premium Product Details Section -->
<section class="product__details--section section--padding">
  <div class="container">
    <div class="row">
      <!-- Gallery Column -->
      <div class="col-lg-6 col-md-6 mb-4">
        <div class="product__details--media">
          <div class="product__media--preview position-relative" style="border: 1px solid #e5e8ef; border-radius: 12px; overflow: hidden; background: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.03); padding: 20px;">
            <div class="gcp-prod-card__badges" style="top: 20px; left: 20px;">
              <span class="gcp-prod-card__badge gcp-prod-card__badge--grade bg-primary text-white py-2 px-3 fs-6" style="border-radius: 4px; font-weight: 700; font-size:11px !important;">A-GRADE CERTIFIED</span>
            </div>
            <img id="main-product-img" src="<?php echo htmlspecialchars($product['product_image'] ?: 'https://via.placeholder.com/600x555'); ?>" alt="<?php echo htmlspecialchars($product['product_title']); ?>" style="width: 100%; height: auto; display: block; max-height: 480px; object-fit: contain; transition: transform 0.3s ease;">
            <span class="gcp-prod-card__photo-label" style="bottom: 12px; right: 12px; font-size: 9px; padding: 4px 8px; background: rgba(0,0,0,0.06); color: #4b5563; border-radius: 4px; font-weight: 600;">OEM STOCK PHOTO</span>
          </div>
          <!-- Swiper Thumbnails -->
          <div class="product__media--nav mt-20 d-flex gap-3 justify-content-center">
            <div class="product__media--nav__items active" style="border: 2.5px solid #142b64; border-radius: 6px; padding: 4px; cursor: pointer; width: 76px; height: 76px; background: #ffffff; transition: border-color 0.2s ease;" onclick="changeMainImage(this, '<?php echo htmlspecialchars($product['product_image']); ?>')">
              <img src="<?php echo htmlspecialchars($product['product_image']); ?>" style="width: 100%; height: 100%; object-fit: contain;" alt="Thumbnail view 1">
            </div>
            <!-- Additional thumbs for aesthetic swappability -->
            <div class="product__media--nav__items" style="border: 1.5px solid #e5e8ef; border-radius: 6px; padding: 4px; cursor: pointer; width: 76px; height: 76px; background: #ffffff; transition: border-color 0.2s ease;" onclick="changeMainImage(this, 'https://dummyimage.com/600x555/142b64/ffffff&text=OEM+Inspection+1')">
              <img src="https://dummyimage.com/600x555/142b64/ffffff&text=OEM+Inspection+1" style="width: 100%; height: 100%; object-fit: contain;" alt="Thumbnail view 2">
            </div>
            <div class="product__media--nav__items" style="border: 1.5px solid #e5e8ef; border-radius: 6px; padding: 4px; cursor: pointer; width: 76px; height: 76px; background: #ffffff; transition: border-color 0.2s ease;" onclick="changeMainImage(this, 'https://dummyimage.com/600x555/e3000f/ffffff&text=OEM+Inspection+2')">
              <img src="https://dummyimage.com/600x555/e3000f/ffffff&text=OEM+Inspection+2" style="width: 100%; height: 100%; object-fit: contain;" alt="Thumbnail view 3">
            </div>
          </div>
        </div>
      </div>
      
      <!-- Info Column -->
      <div class="col-lg-6 col-md-6">
        <div class="product__details--info" style="padding-left: 10px;">
          <!-- Pulsing stock badge -->
          <div class="mb-3 d-flex align-items-center gap-3">
            <span class="badge py-2 px-3 rounded-pill d-inline-flex align-items-center gap-2" style="font-size: 11px; font-weight: 700; background-color: #22c55e !important; color:#ffffff;">
              <span class="gcp-prod-card__pulse-dot" style="background-color:#ffffff; width:6px; height:6px;"></span> <?php echo $product['in_stock'] === 1 ? 'SHIPS TODAY' : 'ORDER ON REQUEST'; ?>
            </span>
            <span class="text-muted" style="font-size: 12px; font-weight: 600; letter-spacing:0.5px;">SKU: <?php echo htmlspecialchars($product['sku']); ?></span>
          </div>
          
          <h1 class="product__details--title" style="font-size: 26px; font-weight: 800; color: #142b64; line-height: 1.25; margin-bottom: 12px; font-family:'Inter', sans-serif;"><?php echo htmlspecialchars($product['product_title']); ?></h1>
          
          <div class="d-flex align-items-center gap-3 mb-4">
            <div class="product__details--price">
              <span id="price-display" style="font-size: 32px; font-weight: 800; color: #e3000f; font-family:'Inter', sans-serif;"><?php echo ($minPrice <= 0) ? 'Call For Price' : '$' . number_format($minPrice, 2); ?></span>
            </div>
            <span style="font-size: 10px; font-weight: 700; color: #e3000f; background: rgba(227, 0, 15, 0.08); border: 1px solid rgba(227, 0, 15, 0.15); border-radius: 4px; padding: 4px 10px; text-transform: uppercase; letter-spacing:0.5px;">Free Commercial Shipping</span>
          </div>
          
          <!-- Mileage options enhancement select -->
          <div class="mb-4">
            <label style="display:block; font-weight:700; font-size:12px; color:#142b64; margin-bottom:8px; text-transform:uppercase; letter-spacing:0.5px;">Select Certified Mileage Condition:</label>
            <div class="select" style="position:relative; max-width:360px;">
              <select id="mileage-select" onchange="updatePrice(this)" style="width: 100%; padding: 12px 36px 12px 16px; font-size: 14px; font-weight: 600; border-radius: 8px; border: 1.5px solid #e5e8ef; background-color: #f8f9fc; cursor: pointer; color: #111827; appearance: none; -webkit-appearance: none; font-family:'Inter', sans-serif;">
                <option value="" disabled selected>Select Mileage Option</option>
                <?php foreach ($mileageOptions as $mileage => $price): ?>
                  <option value="<?php echo htmlspecialchars($mileage); ?>"><?php echo htmlspecialchars($mileage); ?></option>
                <?php endforeach; ?>
              </select>
              <i class="bi bi-chevron-down" style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af; font-size: 12px;"></i>
            </div>
          </div>
          
          <!-- Specs Grid card -->
          <div class="card mb-4" style="border: 1px solid #e5e8ef; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); overflow: hidden;">
            <div class="card-header py-3 px-4" style="background: #142b64; border-bottom: 2px solid #e3000f;">
              <h3 class="mb-0 text-white" style="font-size: 14px; font-weight: 700; letter-spacing:0.5px; text-transform:uppercase; font-family:'Inter', sans-serif;"><i class="bi bi-wrench-adjustable me-2"></i>Product Specifications</h3>
            </div>
            <div class="card-body p-0">
              <div class="row g-0" style="font-family:'Inter', sans-serif;">
                <div class="col-6 py-3 px-4 border-bottom border-end" style="background:#f8f9fc;"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Year</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($year); ?></strong></div>
                <div class="col-6 py-3 px-4 border-bottom" style="background:#f8f9fc;"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Make</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($make); ?></strong></div>
                <div class="col-6 py-3 px-4 border-bottom border-end"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Model</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($model); ?></strong></div>
                <div class="col-6 py-3 px-4 border-bottom"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Part Category</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($part); ?></strong></div>
                <div class="col-6 py-3 px-4 border-end" style="background:#f8f9fc;"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Displacement</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($displacement); ?></strong></div>
                <div class="col-6 py-3 px-4" style="background:#f8f9fc;"><span class="text-muted d-block" style="font-size:9px; font-weight:700; text-transform:uppercase; letter-spacing:0.3px;">Transmission</span><strong style="color:#111827; font-size:14px;"><?php echo htmlspecialchars($product['transmission_type']); ?></strong></div>
              </div>
            </div>
          </div>
          
          <!-- Conversion-Focused CTA Buttons Stack -->
          <div class="d-flex flex-column gap-3 mb-4">
            <div class="d-flex align-items-center gap-3">
              <div class="quantity__box d-flex align-items-center" style="border: 1.5px solid #cbd5e1; border-radius: 8px; padding: 8px 14px; background: #ffffff;">
                <button type="button" class="quantity__value decrease border-0 bg-transparent text-muted px-2 fw-bold" style="cursor:pointer;" onclick="updateQty(-1)">-</button>
                <input type="number" id="qty-input" value="1" min="1" max="5" readonly style="width: 40px; border: 0; text-align: center; font-weight: 700; font-size: 16px; color:#111827; background:transparent;" />
                <button type="button" class="quantity__value increase border-0 bg-transparent text-muted px-2 fw-bold" style="cursor:pointer;" onclick="updateQty(1)">+</button>
              </div>
              
              <a href="#" onclick="handleAddToCart(event)" data-product-id="<?php echo $product['product_id']; ?>" class="gcp-btn gcp-btn--primary py-3 flex-grow-1 text-center justify-content-center" style="box-shadow: 0 4px 18px rgba(227, 0, 15, 0.40); font-size: 14.5px; border-radius:6px; font-family:'Inter', sans-serif;">
                <i class="bi bi-cart-plus me-2"></i> ADD TO CART
              </a>
            </div>
            
            <a href="#" onclick="openQuoteModal(event)" class="gcp-btn py-3 justify-content-center text-center" style="background: transparent; border: 2px solid #142b64; color: #142b64 !important; font-size: 14.5px; border-radius: 6px; font-family:'Inter', sans-serif;">
              <i class="bi bi-chat-left-quote me-2"></i> GET A CUSTOM QUOTE
            </a>
          </div>

          <!-- Trust Badges Block directly below CTAs -->
          <div class="py-3 px-4 border rounded-3 d-flex flex-column gap-2" style="background:#f0fbf4; border-color:#d1fae5 !important; font-family:'Inter', sans-serif;">
            <div class="d-flex align-items-start gap-2 text-success" style="font-size:13px; font-weight:600; line-height: 1.4;">
              <i class="bi bi-shield-fill-check fs-5" style="color: #22c55e;"></i> <span><strong>Warranty Protection:</strong> 1-Year Comprehensive Warranty Included (Optional 3-Year Coverage Available)</span>
            </div>
            <div class="d-flex align-items-start gap-2 text-success" style="font-size:13px; font-weight:600; line-height: 1.4;">
              <i class="bi bi-truck fs-5" style="color: #22c55e;"></i> <span><strong>Free Shipping:</strong>⚡ Free Commercial Shipping & Fast Nationwide Terminal Delivery</span>
            </div>
            <div class="d-flex align-items-start gap-2 text-success" style="font-size:13px; font-weight:600; line-height: 1.4;">
              <i class="bi bi-check-circle-fill fs-5" style="color: #22c55e;"></i> <span><strong>Tested Parts:</strong> 100% Quality Inspected, Certified, and Backed by Live Experts</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($product['fitment_html'])): ?>
<div style="max-width:1200px; margin:30px auto; background:#fff; padding:25px; border-radius:16px; box-shadow:0 4px 16px rgba(0,0,0,0.06); font-family:'Inter', sans-serif;">
  <h2 style="font-size:20px; font-weight: 700; color: #142b64; margin-bottom:20px; border-left:5px solid #28a745; padding-left:15px;">Fitment Details</h2>
  <div><?php echo $product['fitment_html']; ?></div>
</div>
<?php endif; ?>

<script>
// Thumbnail Swapper helper
function changeMainImage(el, src) {
  document.getElementById('main-product-img').src = src;
  document.querySelectorAll('.product__media--nav__items').forEach(thumb => {
    thumb.style.borderColor = '#e5e8ef';
    thumb.style.borderWidth = '1.5px';
    thumb.classList.remove('active');
  });
  el.style.borderColor = '#142b64';
  el.style.borderWidth = '2.5px';
  el.classList.add('active');
}

// Quantity Counter helper
function updateQty(amount) {
  const input = document.getElementById('qty-input');
  let currentVal = parseInt(input.value) || 1;
  currentVal = Math.max(1, Math.min(5, currentVal + amount));
  input.value = currentVal;
}

// Price updating based on mileage selector (presentation-only display enhancement)
function updatePrice(sel) {
  const priceMap = <?php echo json_encode($mileageOptions); ?>;
  const selected = sel.value;
  if (priceMap[selected]) {
    const priceVal = parseFloat(priceMap[selected]);
    if (isNaN(priceVal) || priceVal <= 0) {
      document.getElementById('price-display').innerText = 'Call For Price';
    } else {
      document.getElementById('price-display').innerText = '$' + priceVal.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }
  }
}
</script>
</body>
</html>




<!-- your newsletter section or footer -->


                        
                
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

    <!-- Custom Quote Modal -->
<div id="quoteModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title" >Get Custom Quote</h3>
      <button type="button" class="close-btn" onclick="closeQuoteModal()">&times;</button>
    </div>

    <div class="modal-body">
      <form id="quoteForm">
        <!-- your form fields here -->
        <label>Enter Your Name*</label>
        <input type="text" name="name" required>

        <label>Enter Your Email*</label>
        <input type="email" name="email" required>

        <label>Contact Number*</label>
        <input type="text" name="phone" required>

        <label>Zipcode*</label>
        <input type="text" name="zipcode" required>

        <label>Preferred Price*</label>
        <input type="text" name="price" required>

        <label>Preferred Miles*</label>
        <input type="text" name="miles" required>

        <label>Notes</label>
        <textarea name="notes"></textarea>

        <label>Need a mechanic?</label>
          <input type="radio" name="mechanic" value="Yes" required> Yes
           <input type="radio" name="mechanic" value="No" required> No

        <br><br>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
</div>



      <?php include 'footer.php'; ?>


    <!-- Quickview Wrapper -->
    <div class="modal fade" id="examplemodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog quickview__main--wrapper modal-dialog-centered">
          <div class="modal-content quickview__main__content">
            <div class="modal-header quickview_m_header">
                <button type="button" class="btn-close quickview__close--btn" data-bs-dismiss="modal" aria-label="Close">✕</button>
            </div>
            <div class="modal-body quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__gallery">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product1.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product1.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product1.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product2.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product2.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product2.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product3.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product3.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product3.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product4.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product4.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product4.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product5.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product5.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product5.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product1.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product2.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product3.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product4.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product5.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"  class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="swiper__nav--btn swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"  class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">Special offer in Pc products </h2>
                                    
                                <div class="product__card--price mb-15">
                                    <span class="current__price">$239.52</span>
                                    <span class="old__price"> $362.00</span>
                                </div>
                                <ul class="rating product__card--rating mb-20 d-flex">
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="rating__review--text">(106) Review</span>
                                    </li>
                                </ul>
                                <p class="product__details--info__desc mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit is. Deserunt totam dolores ea numquam labore!.</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Color :</legend>
                                            <div class="variant__color d-flex">
                                                <div class="variant__color--list">
                                                    <input id="color-red1" name="color" type="radio" checked>
                                                    <label class="variant__color--value red" for="color-red1" title="Red"><img class="variant__color--value__img" src="assets/img/product/small-product/product1.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red2" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red2" title="Black"><img class="variant__color--value__img" src="assets/img/product/small-product/product2.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red3" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red3" title="Pink"><img class="variant__color--value__img" src="assets/img/product/small-product/product3.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red4" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red4" title="Orange"><img class="variant__color--value__img" src="assets/img/product/small-product/product4.webp" alt="variant-color-img"></label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Weight :</legend>
                                            <ul class="variant__size d-flex">
                                                <li class="variant__size--list">
                                                    <input id="weight1" name="weight" type="radio" checked>
                                                    <label class="variant__size--value red" for="weight1">5 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight2" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight2">3 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight3" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight3">2 kg</label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>  
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-15">
                                        <a class="variant__wishlist--icon" href="wishlist.php" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round"  stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.497" height="17.492" viewBox="0 0 19.497 19.492">
                                                    <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

  <!-- All Script JS Plugins here  -->
  <script src="assets/js/vendor/popper.js" defer="defer"></script>
  <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
  <script src="assets/js/plugins/swiper-bundle.min.js"></script>
  <script src="assets/js/plugins/glightbox.min.js"></script>
  

 <!-- Customscript js -->
 <script src="assets/js/script.js"></script>
 <script>
function handleAddToCart(event) {
  event.preventDefault();

  const button = event.target.closest('[data-product-id]');
  const productId = button?.getAttribute('data-product-id');

  if (!productId) {
    alert("Product ID missing");
    return;
  }

  const quantityVal = parseInt(document.getElementById('qty-input')?.value) || 1;

  fetch("add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams({
      product_id: productId,
      quantity: quantityVal
    }),
    credentials: "include"
  })
    .then(res => res.text())
    .then(data => {
      if (data === "not_logged_in") {
        // ✅ Store current full URL (e.g., product-details.php?id=5249)
        sessionStorage.setItem("redirect_after_login", window.location.href);
        window.location.href = "loginpage.php";
      } else if (data === "success") {
        window.location.href = "cart.php";
      } else if (data === "already_exists") {
        alert("Already in cart");
      } else {
        alert("Something went wrong: " + data);
      }
    });
}

</script>


<script>
function openQuoteModal(e) {
  e.preventDefault();
  document.getElementById('quoteModal').style.display = 'flex';
}
function closeQuoteModal() {
  document.getElementById('quoteModal').style.display = 'none';
}

document.getElementById('quoteForm').addEventListener('submit', function(e) {
  e.preventDefault();
  let formData = new FormData(this);
  fetch('getcustomquote.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(() => {
    alert("Your request has been submitted!");
    closeQuoteModal();
  })
  .catch(() => alert("Error submitting form."));
});
</script>
  
</body>
</html>