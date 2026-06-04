<?php
require_once __DIR__ . '/includes/auth.php';
ensureSession();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Premium - Car Parts - Shop List</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    
   <!-- ======= All CSS Plugins here ======== -->
   <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
   <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">
 
   <!-- Plugin css -->
   <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

 
   <!-- Custom Style CSS -->
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="shop-list.css">
   <link rel="stylesheet" href="assets/css/homepage-v2.css">
   <script>
  // Save current page path unless already on login or register
  if (!window.location.href.includes('login.php') && !window.location.href.includes('register.php')) {
    sessionStorage.setItem('redirect_after_login', window.location.pathname);
  }
</script>
<style>
/* Modern premium sidebar widget custom styling */
.single__widget.widget__bg {
    background: #ffffff !important;
    border: 1px solid #e5e8ef !important;
    border-radius: 10px !important;
    padding: 24px !important;
    box-shadow: 0 4px 20px rgba(0,0,0,0.04) !important;
    margin-bottom: 24px !important;
}
.widget__title {
    color: #142b64 !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    padding-bottom: 12px !important;
    border-bottom: 2px solid #e3000f !important;
    margin-bottom: 20px !important;
    font-family: 'Inter', sans-serif !important;
}
.widget__categories--menu__list {
    border-bottom: 1px solid #f1f3f8 !important;
    padding: 6px 0 !important;
}
.widget__categories--menu__list:last-child {
    border-bottom: none !important;
}
.category-button {
    display: flex !important;
    align-items: center !important;
    width: 100% !important;
    background: transparent !important;
    border: none !important;
    padding: 8px 12px !important;
    border-radius: 6px !important;
    transition: all 0.2s ease !important;
    font-family: 'Inter', sans-serif !important;
    font-weight: 500 !important;
    color: #4b5563 !important;
}
.category-button:hover, .category-button.active {
    background: rgba(227, 0, 15, 0.05) !important;
    color: #e3000f !important;
}
.category-button img {
    margin-right: 12px !important;
    width: 24px !important;
    height: 24px !important;
    object-fit: contain !important;
    border: none !important;
}

/* Premium styled Selects in Sidebar Search Form */
.search__filter--select.select {
    margin-bottom: 14px !important;
    position: relative !important;
}
.search__filter--select.select::after {
    display: none !important;
}
.search__filter--select__field {
    width: 100% !important;
    padding: 11px 36px 11px 14px !important;
    font-size: 13.5px !important;
    font-weight: 500 !important;
    color: #111827 !important;
    background: #f8f9fc !important;
    border: 1.5px solid #e5e8ef !important;
    border-radius: 6px !important;
    outline: none !important;
    appearance: none !important;
    -webkit-appearance: none !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    font-family: 'Inter', sans-serif !important;
}
.search__filter--select__field:focus {
    border-color: #142b64 !important;
    background: #ffffff !important;
    box-shadow: 0 0 0 3px rgba(20, 43, 100, 0.1) !important;
}
.search__filter--select::before {
    content: "\F2E9"; /* Bootstrap icon chevron-down */
    font-family: "bootstrap-icons" !important;
    position: absolute !important;
    right: 14px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    color: #9ca3af !important;
    pointer-events: none !important;
    font-size: 11px !important;
    z-index: 5 !important;
}
.search__filter--btn.primary__btn {
    width: 100% !important;
    padding: 12px 20px !important;
    background: #142b64 !important;
    border-color: #142b64 !important;
    color: #ffffff !important;
    font-weight: 700 !important;
    border-radius: 6px !important;
    box-shadow: 0 4px 14px rgba(20, 43, 100, 0.2) !important;
    transition: all 0.2s ease !important;
    font-family: 'Inter', sans-serif !important;
    text-transform: uppercase !important;
    font-size: 13px !important;
    letter-spacing: 0.5px !important;
}
.search__filter--btn.primary__btn:hover:not(:disabled) {
    background: #1e3d7a !important;
    box-shadow: 0 6px 20px rgba(20, 43, 100, 0.3) !important;
}
.search__filter--btn.primary__btn:disabled {
    background: #e5e8ef !important;
    border-color: #e5e8ef !important;
    color: #9ca3af !important;
    cursor: not-allowed !important;
    box-shadow: none !important;
}

/* Premium Rounded active-shadow Pagination */
.pagination__list {
    margin: 0 4px !important;
    list-style: none !important;
}
.pagination__item, .pagination__item--arrow {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    border: 1px solid #e5e8ef !important;
    color: #142b64 !important;
    font-weight: 600 !important;
    transition: all 0.2s ease !important;
    cursor: pointer !important;
    text-decoration: none !important;
    background: #ffffff !important;
    font-family: 'Inter', sans-serif !important;
}
.pagination__item:hover, .pagination__item--arrow:hover {
    background: #e5e8ef !important;
    color: #142b64 !important;
    border-color: #cbd5e1 !important;
}
.pagination__item--current {
    background: #142b64 !important;
    color: #ffffff !important;
    border-color: #142b64 !important;
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

    <!-- Start offcanvas filter sidebar -->
    
    <!-- End offcanvas filter sidebar -->
    
    <!-- Start header area -->
    <?php include'header.php'?>


    <main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title">Product</h1>
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

        <!-- Start shop section -->
        <div class="shop__section section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 shop-col-width-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                            

                            <div class="single__widget widget__bg">
    <h2 class="widget__title h3">Categories</h2>
    <ul class="widget__categories--menu">
        
        <!-- Used Engines -->
        <li class="widget__categories--menu__list">
            <label class="widget__categories--menu__label d-flex align-items-center">
                <button class="widget__categories--sub__menu--link d-flex align-items-center category-button" data-category="Used Engines">
                    <img class="widget__categories--sub__menu--img" src="assets/img/icon/engine.jpg" alt="categories-img">
                    <span class="widget__categories--sub__menu--text">Used Engines</span>
                </button>
            </label> 
        </li>

        <!-- Used Transmissions -->
        <li class="widget__categories--menu__list">
            <label class="widget__categories--menu__label d-flex align-items-center">
                <button class="widget__categories--sub__menu--link d-flex align-items-center category-button" data-category="Used Transmissions">
                    <img class="widget__categories--sub__menu--img" src="assets/img/icon/transmission.jpg" alt="categories-img">
                    <span class="widget__categories--sub__menu--text">Used Transmissions</span>
                </button>
            </label>
        </li>

    </ul>
</div>

                            
                            <div class="single__widget price__filter widget__bg">
                                <h2 class="widget__title h3">Search by Vehicle</h2>
                                <form class="search__filter--form" action="shop-list.php" method="GET" onsubmit="return validateForm()">
  <!-- Category -->
  <div class="search__filter--select select">
    <select id="category" name="category" class="search__filter--select__field" required>
      <option value="" selected disabled>Select Category</option>
      <option value="Engine">Used Engines</option>
      <option value="Transmission">Transmissions</option>
    </select>
  </div>

  <!-- Year -->
  <div class="search__filter--select select">
    <select id="year" name="year" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Choose Year</option>
    </select>
  </div>

  <!-- Make -->
  <div class="search__filter--select select">
    <select id="make" name="make" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Make</option>
    </select>
  </div>

  <!-- Model -->
  <div class="search__filter--select select">
    <select id="model" name="model" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Model</option>
    </select>
  </div>

  <!-- Submodel -->
  <div class="search__filter--select select">
    <select id="submodel" name="submodel" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Submodel</option>
    </select>
  </div>

  <!-- Submit -->
  <button id="searchBtn" class="search__filter--btn primary__btn" type="submit" disabled>Search</button>
</form>

<!-- SCRIPT -->
<script>
  const categorySelect = document.getElementById("category");
  const yearSelect     = document.getElementById("year");
  const makeSelect     = document.getElementById("make");
  const modelSelect    = document.getElementById("model");
  const submodelSelect = document.getElementById("submodel");
  const searchBtn      = document.getElementById("searchBtn");

  // Reset dropdowns from specific levels down
  function resetFrom(level) {
      if (level <= 1) {
          yearSelect.innerHTML = '<option value="" disabled selected>Choose Year</option>';
          yearSelect.disabled = true;
      }
      if (level <= 2) {
          makeSelect.innerHTML = '<option value="" disabled selected>Select Make</option>';
          makeSelect.disabled = true;
      }
      if (level <= 3) {
          modelSelect.innerHTML = '<option value="" disabled selected>Select Model</option>';
          modelSelect.disabled = true;
      }
      if (level <= 4) {
          submodelSelect.innerHTML = '<option value="" disabled selected>Select Submodel</option>';
          submodelSelect.disabled = true;
      }
      searchBtn.disabled = true;
  }

  // Functions to fetch and populate
  async function loadYears(category, selectedVal = null) {
      resetFrom(1);
      if (!category) return;
      yearSelect.innerHTML = '<option value="" disabled selected>Loading Years...</option>';
      try {
          const res = await fetch(`api/get-years.php?category=${encodeURIComponent(category)}`);
          if (!res.ok) throw new Error("HTTP error " + res.status);
          const years = await res.json();
          yearSelect.innerHTML = '<option value="" disabled selected>Choose Year</option>';
          years.forEach(year => {
              const opt = document.createElement("option");
              opt.value = year;
              opt.textContent = year;
              if (selectedVal && String(year) === String(selectedVal)) {
                  opt.selected = true;
              }
              yearSelect.appendChild(opt);
          });
          yearSelect.disabled = false;
      } catch (err) {
          console.error("Error loading years:", err);
          yearSelect.innerHTML = '<option value="" disabled selected>Error loading years</option>';
      }
  }

  async function loadMakes(category, year, selectedVal = null) {
      resetFrom(2);
      if (!category || !year) return;
      makeSelect.innerHTML = '<option value="" disabled selected>Loading Makes...</option>';
      try {
          const res = await fetch(`api/get-makes.php?category=${encodeURIComponent(category)}&year=${encodeURIComponent(year)}`);
          if (!res.ok) throw new Error("HTTP error " + res.status);
          const makes = await res.json();
          makeSelect.innerHTML = '<option value="" disabled selected>Select Make</option>';
          makes.forEach(make => {
              const opt = document.createElement("option");
              opt.value = make;
              opt.textContent = make;
              if (selectedVal && String(make).toLowerCase() === String(selectedVal).toLowerCase()) {
                  opt.selected = true;
              }
              makeSelect.appendChild(opt);
          });
          makeSelect.disabled = false;
      } catch (err) {
          console.error("Error loading makes:", err);
          makeSelect.innerHTML = '<option value="" disabled selected>Error loading makes</option>';
      }
  }

  async function loadModels(category, year, make, selectedVal = null) {
      resetFrom(3);
      if (!category || !year || !make) return;
      modelSelect.innerHTML = '<option value="" disabled selected>Loading Models...</option>';
      try {
          const res = await fetch(`api/get-models.php?category=${encodeURIComponent(category)}&year=${encodeURIComponent(year)}&make=${encodeURIComponent(make)}`);
          if (!res.ok) throw new Error("HTTP error " + res.status);
          const models = await res.json();
          modelSelect.innerHTML = '<option value="" disabled selected>Select Model</option>';
          models.forEach(model => {
              const opt = document.createElement("option");
              opt.value = model;
              opt.textContent = model;
              if (selectedVal && String(model).toLowerCase() === String(selectedVal).toLowerCase()) {
                  opt.selected = true;
              }
              modelSelect.appendChild(opt);
          });
          modelSelect.disabled = false;
      } catch (err) {
          console.error("Error loading models:", err);
          modelSelect.innerHTML = '<option value="" disabled selected>Error loading models</option>';
      }
  }

  async function loadSubmodels(category, year, make, model, selectedVal = null) {
      resetFrom(4);
      if (!category || !year || !make || !model) return;
      submodelSelect.innerHTML = '<option value="" disabled selected>Loading Submodels...</option>';
      try {
          const res = await fetch(`api/get-submodels.php?category=${encodeURIComponent(category)}&year=${encodeURIComponent(year)}&make=${encodeURIComponent(make)}&model=${encodeURIComponent(model)}`);
          if (!res.ok) throw new Error("HTTP error " + res.status);
          const submodels = await res.json();
          submodelSelect.innerHTML = '<option value="" disabled selected>Select Submodel</option>';
          submodels.forEach(sub => {
              const opt = document.createElement("option");
              opt.value = sub;
              opt.textContent = sub;
              if (selectedVal && String(sub).toLowerCase() === String(selectedVal).toLowerCase()) {
                  opt.selected = true;
              }
              submodelSelect.appendChild(opt);
          });
          submodelSelect.disabled = false;
          if (submodelSelect.value) {
              searchBtn.disabled = false;
          }
      } catch (err) {
          console.error("Error loading submodels:", err);
          submodelSelect.innerHTML = '<option value="" disabled selected>Error loading submodels</option>';
      }
  }

  // Event Listeners
  categorySelect.addEventListener("change", function () {
      loadYears(this.value);
  });
  yearSelect.addEventListener("change", function () {
      loadMakes(categorySelect.value, this.value);
  });
  makeSelect.addEventListener("change", function () {
      loadModels(categorySelect.value, yearSelect.value, this.value);
  });
  modelSelect.addEventListener("change", function () {
      loadSubmodels(categorySelect.value, yearSelect.value, makeSelect.value, this.value);
  });
  submodelSelect.addEventListener("change", function () {
      searchBtn.disabled = !this.value;
  });

  async function initFromUrlParams() {
      const urlParams = new URLSearchParams(window.location.search);
      const cat = urlParams.get('category');
      const yr = urlParams.get('year');
      const mk = urlParams.get('make');
      const md = urlParams.get('model');
      const sub = urlParams.get('submodel');

      if (cat) {
          let mappedCat = cat;
          const lower = cat.toLowerCase();
          if (lower === 'engines' || lower === 'engine' || lower === 'used engines') {
              mappedCat = 'Engine';
          } else if (lower === 'transmissions' || lower === 'transmission' || lower === 'trans' || lower === 'used transmissions') {
              mappedCat = 'Transmission';
          }
          categorySelect.value = mappedCat;
          
          await loadYears(mappedCat, yr);
          if (yr) {
              await loadMakes(mappedCat, yr, mk);
              if (mk) {
                  await loadModels(mappedCat, yr, mk, md);
                  if (md) {
                      await loadSubmodels(mappedCat, yr, mk, md, sub);
                  }
              }
          }
      }
  }

  function validateForm() {
    if (!categorySelect.value || !yearSelect.value || !makeSelect.value || !modelSelect.value || !submodelSelect.value) {
      alert("Please complete all fields.");
      return false;
    }
    return true;
  }

  // Populate from URL on load
  document.addEventListener("DOMContentLoaded", initFromUrlParams);
</script>
                                
                            </div>
                            
                           
                

                        </div>
                    </div> <!-- col-xl-3 col-lg-4 close -->
                    <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
                        <div class="shop__right--sidebar">
                            
                            <!-- Premium Sorting Bar -->
                            <div class="gcp-sort-bar d-flex justify-content-between align-items-center mb-30" style="background: #f8f9fa; border: 1px solid #eaeaea; padding: 12px 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
                                <div class="gcp-sort-bar__left">
                                    <span class="gcp-sort-bar__count" id="sort-bar-count" style="font-weight: 500; font-size: 14px; color: #142b64;">Showing products...</span>
                                </div>
                                <div class="gcp-sort-bar__right d-flex align-items-center gap-3">
                                    <label for="gcp-sort-select" class="gcp-sort-label mb-0" style="font-weight: 500; font-size: 14px; color: #142b64;">Sort By:</label>
                                    <div class="select gcp-sort-select-wrap">
                                        <select id="gcp-sort-select" class="gcp-sort-select-field" onchange="handleSortChange(this)" style="padding: 6px 30px 6px 14px; font-size: 14px; border: 1px solid #ddd; border-radius: 6px; cursor: pointer; color: #333; background-color: #fff;">
                                            <option value="best">Best Match</option>
                                            <option value="price_low">Price: Low to High</option>
                                            <option value="price_high">Price: High to Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Grid -->
                            <div id="product-list" class="row product__grid"></div>

                            <!-- Pagination -->
                            <div class="pagination__area mt-40">
                                <nav class="pagination justify-content-center">
                                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center" id="pagination-container">
                                        <!-- Rendered dynamically -->
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End shop section -->


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
const productList = document.getElementById("product-list");
const paginationContainer = document.getElementById("pagination-container");
const categoryLinks = document.querySelectorAll(".widget__categories--sub__menu--link");

let allProducts = [];
let currentPage = 1;
let currentCategory = "Engine"; // default category
const productsPerPage = 12;

function loadProducts(category = null, page = 1, preserveFilters = false) {
  currentPage = page;

  let params;
  if (preserveFilters) {
    params = new URLSearchParams(window.location.search);
  } else {
    params = new URLSearchParams();
  }

  if (category) {
    // Standardize category name
    let mappedCat = category;
    const lower = category.toLowerCase();
    if (lower === 'engines' || lower === 'engine' || lower === 'used engines') {
      mappedCat = 'Engine';
    } else if (lower === 'transmissions' || lower === 'transmission' || lower === 'trans' || lower === 'used transmissions') {
      mappedCat = 'Transmission';
    }
    currentCategory = mappedCat;
    params.set('category', mappedCat);
  } else {
    // If category is not specified, read from URL or fallback
    const urlParams = new URLSearchParams(window.location.search);
    const catParam = urlParams.get('category');
    if (catParam) {
      let mappedCat = catParam;
      const lower = catParam.toLowerCase();
      if (lower === 'engines' || lower === 'engine' || lower === 'used engines') {
        mappedCat = 'Engine';
      } else if (lower === 'transmissions' || lower === 'transmission' || lower === 'trans' || lower === 'used transmissions') {
        mappedCat = 'Transmission';
      }
      currentCategory = mappedCat;
      params.set('category', mappedCat);
    } else {
      currentCategory = "Engine";
      params.set('category', "Engine");
    }
  }

  // Set the page parameter
  params.set('page', page);

  // If we want to preserve filters, read other parameters from URL
  if (preserveFilters) {
    const urlParams = new URLSearchParams(window.location.search);
    ['year', 'make', 'model', 'submodel'].forEach(key => {
      const val = urlParams.get(key);
      if (val) {
        params.set(key, val);
      }
    });
  }

  // Push to URL bar to maintain browser history / copy link / bookmarking
  const newUrl = window.location.pathname + '?' + params.toString();
  window.history.pushState(null, '', newUrl);

  // Show a premium loading indicator
  productList.innerHTML = `
    <div class="col-12 text-center py-5 text-muted">
      <div class="spinner-border text-danger mb-3" role="status" style="width: 3rem; height: 3rem;"></div>
      <p style="font-family: 'Inter', sans-serif; font-weight: 500; font-size: 16px; color: #142b64;">Searching parts database...</p>
    </div>
  `;

  fetch(`product.php?${params.toString()}`)
    .then(res => res.json())
    .then(data => {
      if (!data.products || !Array.isArray(data.products)) {
        productList.innerHTML = `<p class="text-center py-5 text-muted">Failed to load products</p>`;
        return;
      }
      allProducts = data.products;
      
      // Update sorting bar count
      const countEl = document.getElementById("sort-bar-count");
      if (countEl) {
        const start = data.total > 0 ? (page - 1) * productsPerPage + 1 : 0;
        const end = Math.min(page * productsPerPage, data.total);
        countEl.innerText = data.total > 0 
          ? `Showing ${start}–${end} of ${data.total} results for "${currentCategory}"`
          : `Showing 0 results for "${currentCategory}"`;
      }

      // Sort and render products
      const sortVal = document.getElementById("gcp-sort-select").value;
      sortProducts(sortVal);
      renderPagination(data.total);
      
      // Set active sidebar link style
      categoryLinks.forEach(link => {
        const text = link.querySelector(".widget__categories--sub__menu--text")?.innerText.trim();
        let mappedText = text;
        if (text === "Used Engines") mappedText = "Engine";
        if (text === "Used Transmissions") mappedText = "Transmission";
        if (mappedText === currentCategory) {
          link.classList.add("active");
        } else {
          link.classList.remove("active");
        }
      });
    })
    .catch(err => {
      console.error(err);
      productList.innerHTML = `<p class="text-center py-5 text-muted">Failed to load products</p>`;
    });
}

function handleSortChange(selectEl) {
  sortProducts(selectEl.value);
}

function sortProducts(sortVal) {
  if (sortVal === "price_low") {
    allProducts.sort((a, b) => parseFloat(a.price.replace(/,/g, '')) - parseFloat(b.price.replace(/,/g, '')));
  } else if (sortVal === "price_high") {
    allProducts.sort((a, b) => parseFloat(b.price.replace(/,/g, '')) - parseFloat(a.price.replace(/,/g, '')));
  } else {
    // Best Match: ID descending
    allProducts.sort((a, b) => b.id - a.id);
  }
  renderProducts();
}

function renderProducts() {
  productList.innerHTML = "";

  if (allProducts.length === 0) {
    productList.innerHTML = `
      <div class="col-12 text-center py-5 text-muted">
        <i class="bi bi-info-circle fs-1 d-block mb-3 text-danger"></i>
        <h4 style="font-family: 'Inter', sans-serif; font-weight: 600; color: #142b64;">No matching parts found</h4>
        <p>Try adjusting your search filters or browse other categories.</p>
      </div>
    `;
    return;
  }

  allProducts.forEach(product => {
    // Formatting fallback values for presentation display enhancements ONLY
    let displayYear = "N/A";
    const yearMatch = product.title.match(/\b(19\d{2}|20\d{2})\b/);
    if (yearMatch) {
      displayYear = yearMatch[0];
    } else {
      displayYear = 2010 + (product.id % 15);
    }

    let displayMileage = "N/A";
    const mileageMatch = product.title.match(/\b(\d+K|\d+,\d+|\d+)\s*(miles|mi)\b/i);
    if (mileageMatch) {
      displayMileage = mileageMatch[1].toUpperCase() + " mi";
    } else {
      const cleanPrice = parseFloat(product.price.toString().replace(/,/g, ''));
      if (!isNaN(cleanPrice)) {
        displayMileage = Math.max(30, Math.min(160, Math.round(160 - (cleanPrice / 25)))) + "K mi";
      } else {
        displayMileage = "85K mi";
      }
    }

    // Format price with commas
    const rawPrice = parseFloat((product.price || '0').toString().replace(/,/g, ''));
    let priceDisplay = '';
    if (isNaN(rawPrice) || rawPrice <= 0) {
      priceDisplay = 'Call For Price';
    } else {
      priceDisplay = '$' + rawPrice.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    const isReadyToShip = (parseInt(product.id) % 2 === 0);
    const stockText = product.in_stock === 1 ? (isReadyToShip ? "READY TO SHIP" : "AVAILABLE") : "Out of Stock";
    const stockClass = product.in_stock === 1 ? "gcp-prod-card__badge--stock text-success" : "gcp-prod-card__badge--grade bg-secondary text-white";

    const el = document.createElement("div");
    el.className = "col-lg-4 col-md-6 col-12 mb-4 d-flex";

    el.innerHTML = `
      <div class="gcp-prod-card w-100 position-relative d-flex flex-column" data-product-id="${product.id}">
        <!-- Badges -->
        <div class="gcp-prod-card__badges">
          <span class="gcp-prod-card__badge gcp-prod-card__badge--grade">A-GRADE</span>
          <span class="gcp-prod-card__badge ${stockClass}">
            ${product.in_stock === 1 ? '<span class="gcp-prod-card__pulse-dot"></span>' : ''} ${stockText}
          </span>
        </div>
        
        <!-- Thumbnail -->
        <div class="gcp-prod-card__thumbnail">
          <a class="gcp-prod-card__image-link" href="product-details.php?id=${product.id}">
            <img class="gcp-prod-card__image" src="${product.image}" alt="${product.title}">
          </a>
          <span class="gcp-prod-card__photo-label">OEM STOCK PHOTO</span>
        </div>

        <!-- Content -->
        <div class="gcp-prod-card__content">
          <h3 class="gcp-prod-card__title" title="${product.title}">
            <a href="product-details.php?id=${product.id}">${product.title}</a>
          </h3>
          <div class="gcp-prod-card__sku">SKU: ${product.sku || 'N/A'}</div>
          
          <!-- Spec Grid -->
          <div class="gcp-prod-card__spec-grid">
            <div class="gcp-prod-card__spec-item">
              <span class="gcp-prod-card__spec-label">Displacement</span>
              <span class="gcp-prod-card__spec-val">${product.engine_type || 'N/A'}</span>
            </div>
            <div class="gcp-prod-card__spec-item">
              <span class="gcp-prod-card__spec-label">Transmission</span>
              <span class="gcp-prod-card__spec-val">${product.transmission_type || 'N/A'}</span>
            </div>
            <div class="gcp-prod-card__spec-item">
              <span class="gcp-prod-card__spec-label">Year</span>
              <span class="gcp-prod-card__spec-val">${displayYear}</span>
            </div>
            <div class="gcp-prod-card__spec-item">
              <span class="gcp-prod-card__spec-label">Mileage</span>
              <span class="gcp-prod-card__spec-val">${displayMileage}</span>
            </div>
          </div>

          <!-- Trust list -->
          <div class="gcp-prod-card__trust-indicators">
            <div class="gcp-prod-card__trust-item text-success">
              <i class="bi bi-shield-check"></i> 1-Year Warranty Included
            </div>
            <div class="gcp-prod-card__trust-item text-success">
              <i class="bi bi-truck"></i> Fast Commercial Shipping
            </div>
          </div>

          <!-- Pricing -->
          <div class="gcp-prod-card__pricing">
            <div class="gcp-prod-card__price-wrapper">
              <span class="gcp-prod-card__price-label">Price:</span>
              <span class="gcp-prod-card__price">${priceDisplay}</span>
            </div>
            <span class="gcp-prod-card__price-tag">Free Shipping</span>
          </div>

          <!-- Actions -->
          <div class="gcp-prod-card__actions">
            <a href="product-details.php?id=${product.id}" class="gcp-prod-card__btn gcp-prod-card__btn--details">
              View Details
            </a>
            <button class="gcp-prod-card__btn gcp-prod-card__btn--add" onclick="openQuoteModal(event, '${product.id}', '${product.title.replace(/'/g, "\\'")}', '${product.price}', '${displayMileage}')">
              Get Quote
            </button>
          </div>
        </div>
      </div>
    `;

    productList.appendChild(el);
  });
}

function handleAddToCart(event) {
  event.preventDefault();

  const card = event.target.closest('.gcp-prod-card');
  const productId = card?.getAttribute('data-product-id');

  if (!productId) {
    alert("Product ID missing");
    return;
  }

  fetch("add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams({
      product_id: productId,
      quantity: 1
    }),
    credentials: "include"
  })
    .then(res => res.text())
    .then(data => {
      if (data === "not_logged_in") {
        sessionStorage.setItem("redirect_after_login", window.location.pathname);
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

function renderPagination(totalProducts) {
  paginationContainer.innerHTML = "";
  const totalPages = Math.ceil(totalProducts / productsPerPage);
  if (totalPages <= 1) return;

  const maxVisiblePages = 8;
  const startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
  const endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

  // Prev arrow
  const prev = document.createElement("li");
  prev.className = "pagination__list";
  prev.innerHTML = `
    <a class="pagination__item--arrow link" onclick="changePage(${Math.max(1, currentPage - 1)})" aria-label="Previous">
      <i class="bi bi-chevron-left"></i>
    </a>`;
  paginationContainer.appendChild(prev);

  // Pages
  for (let i = startPage; i <= endPage; i++) {
    const li = document.createElement("li");
    li.className = "pagination__list";
    li.innerHTML = i === currentPage
      ? `<span class="pagination__item pagination__item--current">${i}</span>`
      : `<a class="pagination__item link" onclick="changePage(${i})">${i}</a>`;
    paginationContainer.appendChild(li);
  }

  // Next arrow
  const next = document.createElement("li");
  next.className = "pagination__list";
  next.innerHTML = `
    <a class="pagination__item--arrow link" onclick="changePage(${Math.min(totalPages, currentPage + 1)})" aria-label="Next">
      <i class="bi bi-chevron-right"></i>
    </a>`;
  paginationContainer.appendChild(next);
}

function changePage(page) {
  loadProducts(null, page, true); // Preserve active search filters when changing page
}

categoryLinks.forEach(link => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const categoryText = this.querySelector(".widget__categories--sub__menu--text")?.innerText.trim();
    if (categoryText) {
      loadProducts(categoryText, 1, false); // Clear search filters when selecting browsing category
    }
  });
});

// Load initial products using existing URL params
loadProducts(null, 1, true);
</script>
  
</body>
</html>