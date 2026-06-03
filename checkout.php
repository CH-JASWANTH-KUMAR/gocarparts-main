<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Premium-Car Parts</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="productlist.css">
  <!-- Plugin css -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
                                <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="main checkout__mian">
                            <div id="checkoutMessage" style="margin-bottom: 10px;"></div>
                            <form id="checkoutForm" method="POST" action="place-order.php">
                                    <div class="checkout__content--step section__contact--information">
                                    <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <h2 class="section__header--title h3">Contact information</h2>
                                        
                                    </div>
                                    <div class="customer__information">
                                        <div class="checkout__email--phone mb-12">
                                            <label>
                                                <input class="checkout__input--field border-radius-5"name="email_or_mobile" placeholder="Email or mobile phone mumber"  type="text">
                                            </label>
                                        </div>
                                        <div class="checkout__checkbox">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label" for="check1">
                                                Email me with news and offers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__content--step section__shipping--address">
                                    <div class="section__header mb-25">
                                        <h2 class="section__header--title h3">Billing Details</h2>
                                    </div>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="first_name" placeholder="First name (optional)" id="input1"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input2">Last Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="last_name" placeholder="Last name" id="input2"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input3">Company Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="company_name" placeholder="Company (optional)" id="input3" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="address" placeholder="Address1" id="input4" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="city" placeholder="City" id="input5" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="country">Country/region <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5" name="country" id="country">
                                                            <option value="1">India</option>
                                                            <option value="2">United States</option>
                                                            <option value="3">Netherlands</option>
                                                            <option value="4">Afghanistan</option>
                                                            <option value="5">Islands</option>
                                                            <option value="6">Albania</option>
                                                            <option value="7">Antigua Barbuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input6">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="postal_code" placeholder="Postal code" id="input6" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <details>
                                        <summary class="checkout__checkbox mb-20">
                                            <input class="checkout__checkbox--input" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <span class="checkout__checkbox--label">Ship to a different address?</span>
                                        </summary>
                                        <div class="section__shipping--address__content">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list ">
                                                        <label class="checkout__input--label mb-5" for="input7">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input7"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input8">Last Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input8"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input9">Company Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input9" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input10">Address <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input10" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Town/City <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="City" id="input11" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="country2">Country/region <span class="checkout__input--label__star">*</span></label>
                                                        <div class="checkout__input--select select">
                                                            <select class="checkout__input--select__field border-radius-5" id="country2">
                                                                <option value="1">India</option>
                                                                <option value="2">United States</option>
                                                                <option value="3">Netherlands</option>
                                                                <option value="4">Afghanistan</option>
                                                                <option value="5">Islands</option>
                                                                <option value="6">Albania</option>
                                                                <option value="7">Antigua Barbuda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input12" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </details>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="checkbox2">
                                            Save this information for next time</label>
                                    </div>
                                </div>
                                <input type="hidden" name="cart_data" id="cart_data">
                                <input type="hidden" name="total_price" id="total_price">
                               <input type="hidden" id="currentOrderId" name="currentOrderId" value="">


                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-5" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                   <textarea class="checkout__notes--textarea__field border-radius-5" name="order_notes" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                </div>
                                <input type="hidden" name="payment_method" value="Cash on Delivery">
<input type="hidden" name="payment_method" value="Cash on Delivery">

                                <div class="checkout__content--step__footer d-flex align-items-center">
<button type="submit" class="continue__shipping--btn primary__btn border-radius-5">Continue Shiping</button>                                    <a class="previous__link--content" href="cart.php">Return to cart</a>
                                </div>
                            </form>
 
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <aside id="orderSummary" class="checkout__sidebar sidebar border-radius-10 blurred">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                      <!-- -------------- -->
                                    </tbody>
                                </table> 
                            </div>
                            <div class="checkout__discount--code">
                               <form id="checkoutForm">
                                    <label>
                                        <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">
                                    </label>
                                    <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                                </form>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Subtotal </td>
                                            <td class="checkout__total--amount text-right "id="subtotalAmount ">$0.00</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Shipping</td>
                                            <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right" id="totalAmount">$860.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment__history mb-30">
                                <h3 class="payment__history--title mb-20">Payment</h3>
                                <ul class="payment__history--inner d-flex">
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                                </ul>
                            </div>
                            <button class="checkout__now--btn primary__btn " id="pay-button" type="submit">Checkout Now</button>
                        </aside>
                    </div>
                    
                </div>
            </div>
        </div>
        
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   


     <script>
document.getElementById('pay-button').onclick = function (e) {
    e.preventDefault();

    // Step 1: Get total amount
    let totalAmountText = document.getElementById('totalAmount').innerText;
    totalAmountText = totalAmountText.replace(/[^\d.]/g, '');
    let totalAmount = parseFloat(totalAmountText);

    if (isNaN(totalAmount) || totalAmount <= 0) {
        alert("Invalid total amount!");
        return;
    }

    let amountInPaise = Math.round(totalAmount * 100);

    // Step 2: Create Razorpay order
    fetch('create-order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ amount: amountInPaise })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert("Error: " + data.error);
            return;
        }

        // ✅ Step 3: Configure Razorpay options
        var options = {
            key: "rzp_test_YTFvGbR4erKz2B",
            amount: data.amount,
            currency: "INR",
            name: "Demo Test",
            order_id: data.id,

            // ✅ Final payment handler
            handler: function (response) {
                alert("Payment successful! ID: " + response.razorpay_payment_id);

                const orderId = document.getElementById("currentOrderId").value;
                const cartData = JSON.parse(document.getElementById("cart_data").value);  // hidden input has cart_data

                fetch("update-order-items.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        order_id: orderId,
                        payment_id: response.razorpay_payment_id,
                        cart_data: cartData
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === "success") {
                        alert("Order placed successfully!");
                        window.location.href = "my-account.php";
                    } else {
                        alert("Failed to save payment info: " + (data.message || "Unknown error"));
                    }
                })
                .catch(err => {
                    console.error("Error:", err);
                    alert("An error occurred during order confirmation.");
                });
            },

            prefill: {
                name: "Test User",
                email: "test@example.com",
                contact: "9876543210"
            },
            theme: {
                color: "#3399cc"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    })
    .catch(error => {
        alert("Failed to initiate payment.");
        console.error("Fetch error:", error);
    });
};
</script>
  

 <script>
document.getElementById("checkoutForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("place-order.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        if (response.status === "success") {
            // Set the hidden input with the order ID
            document.getElementById("currentOrderId").value = response.order_id;

            // Optional: show confirmation
            const summary = document.getElementById("orderSummary");
            summary.classList.remove("blurred");
            summary.classList.add("unblurred");

            document.getElementById("checkoutMessage").innerHTML = "✅ Continue Shipping!";
            document.getElementById("checkoutMessage").className = "success-msg";
        } else {
            document.getElementById("checkoutMessage").innerHTML = "❌ Error placing order.";
            document.getElementById("checkoutMessage").className = "error-msg";
        }
    });
});
</script> 



        <!-- End checkout page area -->

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
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("fetch-cart.php?action=fetch", { credentials: "include" })
    .then(res => res.json())
    .then(cartItems => {
      const tbody = document.querySelector(".cart__table--body");
      const subtotalEl = document.querySelectorAll(".checkout__total--amount");
      const totalEl = document.querySelectorAll(".checkout__total--footer__amount");

      let subtotal = 0;
      let cartData = [];

      if (!cartItems.length) {
        tbody.innerHTML = "<tr><td colspan='2'>Your cart is empty.</td></tr>";
        return;
      }

      let html = "";
      cartItems.forEach(item => {
        const price = parseFloat(item.price);
        const qty = parseInt(item.quantity);
        const hasPrice = !isNaN(price) && price > 0;
        const total = hasPrice ? (price * qty) : 0;
        subtotal += total;

        cartData.push({
          product_name: item.title,
          product_image: item.image,
          price: price,
          quantity: qty
        });

        html += `
          <tr class="cart__table--body__items">
            <td class="cart__table--body__list">
              <div class="product__image two__columns">
                <img src="${item.image}" alt="${item.title}" style="width: 60px;">
                <div><h5>${item.title}</h5><span>Qty: ${qty}</span></div>
              </div>
            </td>
            <td class="cart__table--body__list">${hasPrice ? '$' + total.toFixed(2) : 'Call For Price'}</td>
          </tr>
        `;
      });

      tbody.innerHTML = html;
      subtotalEl.forEach(el => el.textContent = subtotal <= 0 ? "Call For Price" : `$${subtotal.toFixed(2)}`);
      totalEl.forEach(el => el.textContent = subtotal <= 0 ? "Call For Price" : `$${subtotal.toFixed(2)}`);

      // Set hidden form values
      document.getElementById("cart_data").value = JSON.stringify(cartData);
      document.getElementById("total_price").value = subtotal.toFixed(2);
    });
});
</script>





  
</body>
</html>