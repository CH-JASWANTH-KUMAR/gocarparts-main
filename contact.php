<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Contact Us | GoCarParts - Premium Recycled OEM Auto Parts</title>
  <meta name="description" content="Get in touch with GoCarParts. Our team of automotive parts experts is here to help you find the right engines, transmissions, and OEM replacement parts.">
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
        
        <!-- Start contact hero section -->
        <section class="gcp-contact-hero-section section--padding pb-0">
            <div class="container">
                <div class="gcp-contact-hero text-center">
                    <span class="gcp-contact-badge-label">CUSTOMER SUPPORT</span>
                    <h1 class="gcp-contact-title">Get In Touch</h1>
                    <p class="gcp-contact-subtitle">We're here to help you find the right parts and answer any questions.</p>
                </div>
            </div>
        </section>
        <!-- End contact hero section -->

        <!-- Start statistics section -->
        <div class="gcp-stats-section">
            <div class="container">
                <div class="gcp-stats-grid">
                    <div class="gcp-stat-item">
                        <span class="gcp-stat-number">500,000+</span>
                        <span class="gcp-stat-label">Tested OEM Parts</span>
                    </div>
                    <div class="gcp-stat-item">
                        <span class="gcp-stat-number">99.8%</span>
                        <span class="gcp-stat-label">Quality Pass Rate</span>
                    </div>
                    <div class="gcp-stat-item">
                        <span class="gcp-stat-number">24 Hours</span>
                        <span class="gcp-stat-label">Average Dispatch</span>
                    </div>
                    <div class="gcp-stat-item">
                        <span class="gcp-stat-number">4.9 / 5</span>
                        <span class="gcp-stat-label">Customer Rating</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End statistics section -->

        <!-- Start contact details & form section -->
        <section class="gcp-contact-main-section section--padding pt-0">
            <div class="container">
                <div class="row g-5 justify-content-center">
                    <!-- Left Side: Contact Information Cards -->
                    <div class="col-lg-5 col-12">
                        <div class="gcp-info-cards-wrapper">
                            <!-- Office Location -->
                            <div class="gcp-info-card">
                                <div class="gcp-info-card__icon-wrap">
                                    <svg class="gcp-card-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="gcp-info-card__content">
                                    <h3>Office Location</h3>
                                    <p>Chromium Co, 25 Silicon Road, London D04 89GR</p>
                                </div>
                            </div>
                            
                            <!-- Phone Number -->
                            <div class="gcp-info-card">
                                <div class="gcp-info-card__icon-wrap">
                                    <svg class="gcp-card-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <div class="gcp-info-card__content">
                                    <h3>Phone Number</h3>
                                    <p>
                                        <a href="tel:+2734662455198">+27 34 66 2455-198</a><br>
                                        <a href="tel:+2734662455199">+27 34 66 2455-199</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="gcp-info-card">
                                <div class="gcp-info-card__icon-wrap">
                                    <svg class="gcp-card-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="gcp-info-card__content">
                                    <h3>Email Address</h3>
                                    <p>
                                        <a href="mailto:info@chromium.com">info@chromium.com</a><br>
                                        <a href="mailto:support@chromium.com">support@chromium.com</a>
                                    </p>
                                </div>
                            </div>

                            <!-- Business Hours -->
                            <div class="gcp-info-card">
                                <div class="gcp-info-card__icon-wrap">
                                    <svg class="gcp-card-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="gcp-info-card__content">
                                    <h3>Business Hours</h3>
                                    <p>
                                        Monday – Friday: 9:00 AM – 6:00 PM EST<br>
                                        Saturday: 9:00 AM – 3:00 PM EST
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Contact Form -->
                    <div class="col-lg-7 col-12">
                        <div class="gcp-contact-form__wrapper">
                            <h2 class="gcp-form-title">Send a Message</h2>
                            <p class="gcp-form-desc">Fill out the form below and our team will get back to you within 24 hours.</p>
                            
                            <form id="gcp-contact-form" class="gcp-contact-form" action="#" method="POST" novalidate>
                                <div class="row">
                                    <!-- Name Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="gcp-form-group">
                                            <label class="gcp-form-label" for="gcp-name">Name <span class="gcp-required">*</span></label>
                                            <input type="text" id="gcp-name" name="name" class="gcp-form-control" placeholder="Your Full Name" required>
                                            <div class="gcp-invalid-feedback">Please enter your name.</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Email Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="gcp-form-group">
                                            <label class="gcp-form-label" for="gcp-email">Email Address <span class="gcp-required">*</span></label>
                                            <input type="email" id="gcp-email" name="email" class="gcp-form-control" placeholder="Your Email Address" required>
                                            <div class="gcp-invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="gcp-form-group">
                                            <label class="gcp-form-label" for="gcp-phone">Phone Number <span class="gcp-required">*</span></label>
                                            <input type="tel" id="gcp-phone" name="phone" class="gcp-form-control" placeholder="Your Phone Number" required>
                                            <div class="gcp-invalid-feedback">Please enter your phone number.</div>
                                        </div>
                                    </div>

                                    <!-- Subject Field -->
                                    <div class="col-md-6 col-12">
                                        <div class="gcp-form-group">
                                            <label class="gcp-form-label" for="gcp-subject">Subject <span class="gcp-required">*</span></label>
                                            <input type="text" id="gcp-subject" name="subject" class="gcp-form-control" placeholder="Subject of inquiry" required>
                                            <div class="gcp-invalid-feedback">Please enter a subject.</div>
                                        </div>
                                    </div>

                                    <!-- Message Field -->
                                    <div class="col-12">
                                        <div class="gcp-form-group">
                                            <label class="gcp-form-label" for="gcp-message">Message <span class="gcp-required">*</span></label>
                                            <textarea id="gcp-message" name="message" class="gcp-form-control" placeholder="Write your message here..." rows="5" required></textarea>
                                            <div class="gcp-invalid-feedback">Please write your message.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="gcp-form-submit-wrap">
                                    <button type="submit" class="gcp-form-submit-btn">
                                        <span>Send Message</span>
                                        <svg class="gcp-btn-arrow-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End contact details & form section -->

        <!-- Start contact map area -->
        <div class="gcp-map-section section--padding pt-0">
            <div class="container">
                <div class="gcp-map-card">
                    <iframe class="gcp-map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7887.465355142307!2d-0.13384360843222626!3d51.4876034467734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760532743b90e1%3A0x790260718555a20c!2sU.S.%20Embassy%2C%20London!5e0!3m2!1sen!2sbd!4v1632035375945!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <!-- End contact map area -->

        <!-- Start shipping section -->
        <section class="gcp-trust-section section--padding pt-0">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="trust-card">
                            <div class="trust-card__icon-wrapper trust-card__icon-wrapper--navy">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="1" y="3" width="15" height="13"></rect>
                                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                </svg>
                            </div>
                            <h3 class="trust-card__title">Fast Shipping</h3>
                            <p class="trust-card__desc">Fast nationwide delivery with secure tracking on every order.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="trust-card">
                            <div class="trust-card__icon-wrapper trust-card__icon-wrapper--red">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                            </div>
                            <h3 class="trust-card__title">Expert Support</h3>
                            <p class="trust-card__desc">Speak with our dedicated team of auto part specialists 24/7.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="trust-card">
                            <div class="trust-card__icon-wrapper trust-card__icon-wrapper--navy">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                            <h3 class="trust-card__title">Warranty Protection</h3>
                            <p class="trust-card__desc">Up to 1-year warranty on tested, high-quality OEM recycled parts.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="trust-card">
                            <div class="trust-card__icon-wrapper trust-card__icon-wrapper--red">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <h3 class="trust-card__title">Secure Payments</h3>
                            <p class="trust-card__desc">Fully encrypted SSL transactions with multi-layered protection.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

        <!-- Form Validation Script -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const contactForm = document.getElementById("gcp-contact-form");
                if (contactForm) {
                    contactForm.addEventListener("submit", function(e) {
                        if (!contactForm.checkValidity()) {
                            e.preventDefault();
                            e.stopPropagation();
                        }
                        contactForm.classList.add("was-validated");
                    }, false);
                }
            });
        </script>

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