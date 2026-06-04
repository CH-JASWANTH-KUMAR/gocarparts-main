<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();
?>
<!-- ==========================================================================
     GO CAR PARTS — Premium Header V2
     Phase 1 Implementation

     FUNCTIONAL HOOKS PRESERVED (all used by assets/js/script.js):
     · header element            → sticky scroll calculation
     · .main__header.header__sticky → receives .sticky class on scroll
     · .header__sticky--none     → hides on sticky, shows normally
     · .header__sticky--block    → shows on sticky, hides normally
     · .offcanvas__header--menu__open--btn [data-offcanvas] → opens mobile menu
     · .offcanvas__header        → mobile sidebar panel
     · .offcanvas__close--btn [data-offcanvas] → closes mobile menu
     · .offcanvas__menu / _ul / _li / _item / __sub_menu → mobile nav structure
     · .search__open--btn [data-offcanvas] → opens search overlay
     · .predictive__search--box  → search overlay panel
     · .predictive__search--close__btn [data-offcanvas] → closes search
     · .minicart__open--btn [data-offcanvas] → opens minicart sidebar
     · .offcanvas__stikcy--toolbar → mobile bottom toolbar
     ========================================================================== -->

<!-- ══════════════════════════════════════════════════════════════════════
     SECTION A: PREMIUM TRUST TOPBAR
     Brand: Deep Navy #142b64 · Accent: Red #e3000f
     Content: Business hours · Quick links · Promo · Sign In · Cart · Social
════════════════════════════════════════════════════════════════════════ -->
<div class="gcp-topbar">
    <div class="container">
        <div class="gcp-topbar__inner">

            <!-- ── Left: Quick info links ── -->
            <ul class="gcp-topbar__nav">
                <li>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Mon–Sat: 9AM – 6PM EST
                </li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="privacy-policy.php">Warranty</a></li>
                <li>
                    <a href="mailto:info@gocarparts.com">
                        <svg width="13" height="11" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.368 9.104C7.261 9.179 7.139 9.216 7 9.216C6.861 9.216 6.744 9.179 6.648 9.104L0.36 4.624C0.264 4.56 0.179 4.549 0.104 4.592C0.04 4.624 0.008 4.699 0.008 4.816V11.984C0.008 12.112 0.051 12.219 0.136 12.304C0.221 12.389 0.323 12.432 0.44 12.432H13.56C13.677 12.432 13.779 12.389 13.864 12.304C13.96 12.219 14.008 12.112 14.008 11.984V4.816C14.008 4.699 13.971 4.624 13.896 4.592C13.821 4.549 13.736 4.56 13.64 4.624L7.368 9.104Z" fill="currentColor"/>
                            <path d="M6.76 8.32C6.845 8.373 6.925 8.4 7 8.4C7.085 8.4 7.165 8.373 7.24 8.32L12.52 4.56C12.637 4.464 12.696 4.352 12.696 4.224V0.784C12.696 0.667 12.653 0.571 12.568 0.496C12.493 0.411 12.397 0.368 12.28 0.368H1.72C1.603 0.368 1.507 0.411 1.432 0.496C1.357 0.571 1.32 0.667 1.32 0.784V4.224C1.32 4.373 1.373 4.485 1.48 4.56L6.76 8.32Z" fill="currentColor"/>
                        </svg>
                        info@gocarparts.com
                    </a>
                </li>
            </ul>

            <!-- ── Center: Promo message ── -->
            <div class="gcp-topbar__promo">
                <span>🚚 Free Shipping on Commercial Addresses &nbsp;&mdash;&nbsp; <strong>Financing Now Available</strong></span>
            </div>

            <!-- ── Right: Actions + Social ── -->
            <div class="gcp-topbar__right">
                <ul class="gcp-topbar__actions">
                    <?php if (isLoggedIn()): ?>
                        <li>
                            <span class="gcp-topbar__username text-white" style="font-size: 13px; margin-right: 12px; font-weight: 500; display: inline-flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="opacity: 0.8;">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                </svg>
                                <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>
                            </span>
                        </li>
                        <li>
                            <a href="my-account.php" class="gcp-topbar__signin" style="margin-right: 10px;">My Account</a>
                        </li>
                        <li>
                            <a href="logout.php" class="gcp-topbar__signin text-danger">Logout</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="loginpage.php" class="gcp-topbar__signin">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                                </svg>
                                Sign In
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="cart.php" class="gcp-topbar__cart-btn" style="position:relative; display:inline-flex; align-items:center; gap:5px;">
                            <svg width="17" height="15" viewBox="0 0 14.706 13.534" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)"/>
                                <path d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)"/>
                                <path d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)"/>
                            </svg>
                            <span class="gcp-cart-badge">0</span>
                            Cart
                        </a>
                    </li>
                </ul>

                <!-- Social icons -->
                <ul class="gcp-topbar__social">
                    <li>
                        <a href="https://www.facebook.com" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank" rel="noopener" aria-label="Twitter">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com" target="_blank" rel="noopener" aria-label="Instagram">
                            <svg width="13" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/></svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com" target="_blank" rel="noopener" aria-label="YouTube">
                            <svg width="14" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0117 2.16797C14.8477 1.51172 14.3281 0.992188 13.6992 0.828125C12.5234 0.5 7.875 0.5 7.875 0.5C7.875 0.5 3.19922 0.5 2.02344 0.828125C1.39453 0.992188 0.875 1.51172 0.710938 2.16797C0.382812 3.31641 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 8.21094 0.710938 9.38672C0.875 10.043 1.39453 10.5352 2.02344 10.6992C3.19922 11 7.875 11 7.875 11C7.875 11 12.5234 11 13.6992 10.6992C14.3281 10.5352 14.8477 10.043 15.0117 9.38672C15.3398 8.21094 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 3.31641 15.0117 2.16797ZM6.34375 7.99219V3.5625L10.2266 5.77734L6.34375 7.99219Z" fill="currentColor"/></svg>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- /gcp-topbar -->

<!-- ══════════════════════════════════════════════════════════════════════
     SECTION B: MODERN MAIN HEADER
     White background · Sticky on scroll · Logo · Desktop Nav · Actions
════════════════════════════════════════════════════════════════════════ -->
<header class="gcp-main-header header__section">
    <!-- .header__sticky is required by script.js for scroll detection -->
    <div class="main__header header__sticky">
        <div class="container">
            <div class="gcp-header__inner main__header--inner position__relative d-flex justify-content-between align-items-center">

                <!-- ── Mobile hamburger (required hook: .offcanvas__header--menu__open--btn [data-offcanvas]) ── -->
                <div class="offcanvas__header--menu__open">
                    <a class="offcanvas__header--menu__open--btn gcp-hamburger-btn"
                       href="javascript:void(0)"
                       data-offcanvas
                       aria-label="Open navigation menu">
                        <span class="burger-bar"></span>
                        <span class="burger-bar"></span>
                        <span class="burger-bar"></span>
                    </a>
                </div>

                <!-- ── Brand Logo ── -->
                <div class="gcp-logo__wrap main__logo">
                    <a class="main__logo--link" href="index.php" title="Go Car Parts — Home">
                        <img class="main__logo--img gcp-logo__img"
                             src="assets/img/logo/logo.jpg"
                             alt="Go Car Parts Logo">
                    </a>
                </div>

                <!-- ── Desktop Navigation (.header__menu required by script.js resize handler) ── -->
                <div class="gcp-nav-wrap header__menu d-none d-lg-block">
                    <nav class="header__menu--navigation" aria-label="Main navigation">
                        <ul class="header__menu--wrapper d-flex">

                            <li class="header__menu--items">
                                <a class="header__menu--link active" href="index.php">Home</a>
                            </li>

                            <li class="header__menu--items">
                                <a class="header__menu--link" href="shop-list.php?category=Engine">Engines</a>
                            </li>

                            <li class="header__menu--items">
                                <a class="header__menu--link" href="shop-list.php?category=Transmission">Transmissions</a>
                            </li>

                            <li class="header__menu--items">
                                <a class="header__menu--link" href="blog-left-sidebar.php">Blogs</a>
                            </li>

                            <li class="header__menu--items mega__menu--items">
                                <a class="header__menu--link" href="#">
                                    Pages
                                    <svg class="menu__arrowdown--icon"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="11" height="7"
                                         viewBox="0 0 12 7.41">
                                        <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                              transform="translate(-6 -8.59)"
                                              fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items">
                                        <a href="about.php" class="header__sub--menu__link">About Us</a>
                                    </li>
                                    <li class="header__sub--menu__items">
                                        <a href="contact.php" class="header__sub--menu__link">Contact Us</a>
                                    </li>
                                    <li class="header__sub--menu__items">
                                        <a href="faq.php" class="header__sub--menu__link">FAQs</a>
                                    </li>
                                    <li class="header__sub--menu__items">
                                        <a href="cart.php" class="header__sub--menu__link">Cart Page</a>
                                    </li>
                                    <li class="header__sub--menu__items">
                                        <a href="privacy-policy.php" class="header__sub--menu__link">Privacy Policy</a>
                                    </li>
                                    <li class="header__sub--menu__items">
                                        <a href="loginpage.php" class="header__sub--menu__link">Login Page</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="header__menu--items">
                                <a class="header__menu--link" href="contact.php">Contact</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <!-- ── Header Actions: Search · Account · Cart (.header__sticky--none = visible in normal state) ── -->
                <div class="gcp-header__actions header__account header__sticky--none">

                    <!-- Search Toggle (hook: .search__open--btn [data-offcanvas]) -->
                    <button class="gcp-action-btn search__open--btn"
                            aria-label="Search products"
                            data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                  fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                  stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/>
                        </svg>
                    </button>

                    <!-- Account (desktop only) -->
                    <a class="gcp-action-btn d-none d-lg-flex"
                       href="my-account.php"
                       aria-label="My Account">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </a>

                    <!-- Cart (hook: .minicart__open--btn [data-offcanvas]) -->
                    <a class="gcp-action-btn gcp-cart-action minicart__open--btn"
                       href="cart.php"
                       aria-label="My Cart"
                       data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                             viewBox="0 0 14.706 13.534" fill="currentColor">
                            <path d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)"/>
                            <path d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)"/>
                            <path d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)"/>
                        </svg>
                        <span class="gcp-cart-badge-main">0</span>
                    </a>

                </div>

                <!-- ── Sticky State Actions (.header__sticky--block = visible only when sticky) ── -->
                <div class="header__account header__sticky--block">
                    <ul class="header__account--wrapper d-flex align-items-center">
                        <li class="header__account--items header__account--search__items d-sm-2-none">
                            <a class="header__account--btn search__open--btn"
                               href="javascript:void(0)"
                               data-offcanvas
                               aria-label="Search">
                                <svg class="product__items--action__btn--svg"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                          fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                          stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/>
                                </svg>
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>
                        <li class="header__account--items header__minicart--items">
                            <a class="header__account--btn minicart__open--btn"
                               href="cart.php"
                               data-offcanvas
                               aria-label="Cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                                    <path d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                    <path d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                    <path d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                </svg>
                                <span class="visually-hidden">My Cart</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- /gcp-main-header -->

<!-- ══════════════════════════════════════════════════════════════════════
     SECTION C: MOBILE OFFCANVAS MENU
     Required hook: .offcanvas__header (opened by script.js offcanvasHeader())
     All class names below are REQUIRED — do not rename them.
════════════════════════════════════════════════════════════════════════ -->
<div class="offcanvas__header">
    <div class="offcanvas__inner">

        <!-- Logo bar (navy branded) -->
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="index.php" title="Go Car Parts">
                <img src="assets/img/logo/logo.jpg"
                     alt="Go Car Parts Logo"
                     width="148" height="36">
            </a>
            <!-- Required hook: .offcanvas__close--btn [data-offcanvas] -->
            <button class="offcanvas__close--btn" data-offcanvas aria-label="Close menu">close</button>
        </div>

        <!-- Mobile navigation (required hooks: .offcanvas__menu, .offcanvas__menu_ul, etc.) -->
        <nav class="offcanvas__menu" aria-label="Mobile navigation">
            <ul class="offcanvas__menu_ul">

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="index.php">Home</a>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="shop-list.php?category=Engine">Engines</a>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="shop-list.php?category=Transmission">Transmissions</a>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="blog-left-sidebar.php">Blogs</a>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="#">Pages</a>
                    <!-- .offcanvas__sub_menu hook required for accordion toggle by script.js -->
                    <ul class="offcanvas__sub_menu">
                        <li class="offcanvas__sub_menu_li">
                            <a href="about.php" class="offcanvas__sub_menu_item">About Us</a>
                        </li>
                        <li class="offcanvas__sub_menu_li">
                            <a href="contact.php" class="offcanvas__sub_menu_item">Contact Us</a>
                        </li>
                        <li class="offcanvas__sub_menu_li">
                            <a href="faq.php" class="offcanvas__sub_menu_item">FAQs</a>
                        </li>
                        <li class="offcanvas__sub_menu_li">
                            <a href="cart.php" class="offcanvas__sub_menu_item">Cart Page</a>
                        </li>
                        <li class="offcanvas__sub_menu_li">
                            <a href="privacy-policy.php" class="offcanvas__sub_menu_item">Privacy Policy</a>
                        </li>
                        <li class="offcanvas__sub_menu_li">
                            <a href="loginpage.php" class="offcanvas__sub_menu_item">Login Page</a>
                        </li>
                    </ul>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="about.php">About</a>
                </li>

                <li class="offcanvas__menu_li">
                    <a class="offcanvas__menu_item" href="contact.php">Contact</a>
                </li>

            </ul>

            <!-- Login/Register CTA -->
            <div class="offcanvas__account--items">
                <?php if (isLoggedIn()): ?>
                    <div class="offcanvas__account--items__btn d-flex flex-column align-items-start" style="gap: 12px; width: 100%; border: 1px solid #eee; padding: 12px; border-radius: 8px; background: #fafafa;">
                        <span class="offcanvas__account--items__label" style="font-weight: 700; color: #142b64; font-size: 15px;">
                            Hi, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>
                        </span>
                        <div class="d-flex" style="gap: 15px;">
                            <a href="my-account.php" class="btn btn-sm btn-outline-primary" style="font-size: 13px; padding: 4px 10px;">My Account</a>
                            <a href="logout.php" class="btn btn-sm btn-outline-danger" style="font-size: 13px; padding: 4px 10px;">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a class="offcanvas__account--items__btn d-flex align-items-center" href="loginpage.php">
                        <span class="offcanvas__account--items__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512">
                                <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                      fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                      fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                            </svg>
                        </span>
                        <span class="offcanvas__account--items__label">Login / Register</span>
                    </a>
                <?php endif; ?>
            </div>

        </nav>
    </div>
</div>
<!-- /offcanvas__header -->

<!-- ══════════════════════════════════════════════════════════════════════
     SECTION D: MOBILE STICKY BOTTOM TOOLBAR
     Required hook: .offcanvas__stikcy--toolbar (used by script.js resize)
════════════════════════════════════════════════════════════════════════ -->
<div class="offcanvas__stikcy--toolbar">
    <ul class="d-flex justify-content-between">

        <li class="offcanvas__stikcy--toolbar__list">
            <a class="offcanvas__stikcy--toolbar__btn" href="index.php">
                <span class="offcanvas__stikcy--toolbar__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17">
                        <path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"/>
                    </svg>
                </span>
                <span class="offcanvas__stikcy--toolbar__label">Home</span>
            </a>
        </li>

        <li class="offcanvas__stikcy--toolbar__list">
            <a class="offcanvas__stikcy--toolbar__btn" href="shop-list.php">
                <span class="offcanvas__stikcy--toolbar__icon">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443" viewBox="0 0 448 512">
                        <path d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z"/>
                    </svg>
                </span>
                <span class="offcanvas__stikcy--toolbar__label">Shop</span>
            </a>
        </li>

        <!-- Search (hook: .search__open--btn [data-offcanvas]) -->
        <li class="offcanvas__stikcy--toolbar__list">
            <a class="offcanvas__stikcy--toolbar__btn search__open--btn"
               href="javascript:void(0)"
               data-offcanvas
               aria-label="Search">
                <span class="offcanvas__stikcy--toolbar__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                              fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                              stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/>
                    </svg>
                </span>
                <span class="offcanvas__stikcy--toolbar__label">Search</span>
            </a>
        </li>

        <!-- Cart (hook: .minicart__open--btn [data-offcanvas]) -->
        <li class="offcanvas__stikcy--toolbar__list">
            <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn"
               href="javascript:void(0)"
               data-offcanvas
               aria-label="Cart">
                <span class="offcanvas__stikcy--toolbar__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                        <path d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                        <path d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                        <path d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                    </svg>
                </span>
                <span class="offcanvas__stikcy--toolbar__label">Cart</span>
            </a>
        </li>

    </ul>
</div>
<!-- /offcanvas__stikcy--toolbar -->

<!-- ══════════════════════════════════════════════════════════════════════
     SECTION E: PREMIUM SEARCH OVERLAY
     Required hooks: .predictive__search--box (opened/closed by script.js)
     .predictive__search--close__btn [data-offcanvas] (closes the overlay)
════════════════════════════════════════════════════════════════════════ -->
<div class="predictive__search--box">
    <div class="predictive__search--box__inner">
        <h2 class="predictive__search--title">Search Products</h2>
        <form class="predictive__search--form" action="shop-list.php" method="GET">
            <label style="flex:1; margin:0; display:flex;">
                <input class="predictive__search--input"
                       placeholder="Search for engines, transmissions, auto parts..."
                       type="search"
                       name="search"
                       autocomplete="off">
            </label>
            <button class="predictive__search--button text-white"
                    type="submit"
                    aria-label="Search">
                <svg class="product__items--action__btn--svg"
                     xmlns="http://www.w3.org/2000/svg"
                     width="20" height="20" viewBox="0 0 512 512">
                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                          fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                          stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/>
                </svg>
                Search
            </button>
        </form>
    </div>
    <!-- Required hook: .predictive__search--close__btn [data-offcanvas] -->
    <button class="predictive__search--close__btn"
            aria-label="Close search"
            data-offcanvas>
        <svg class="predictive__search--close__icon"
             xmlns="http://www.w3.org/2000/svg"
             width="28" height="28"
             viewBox="0 0 512 512">
            <path fill="currentColor" stroke="currentColor"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
                  d="M368 368L144 144M368 144L144 368"/>
        </svg>
    </button>
</div>
<!-- /predictive__search--box -->