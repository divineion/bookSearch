<?php
require_once './classes/book.class.php';
require_once './classes/library.class.php';
require_once './lib.php';



//W3S La fonction feof() vérifie si la "fin de fichier" (EOF) a été atteinte pour un fichier ouvert.
//Astuce : Cette fonction est utile pour parcourir des données de longueur inconnue.
//lecture et traitement direct du fichier csv
$file = fopen("goodreads_Top100_YAFiction.csv","r");
$i = 0;
$books = [];
while(! feof($file))
  {
    $i++;
    $bookData = fgetcsv($file);
    if ($i==1) {
        $header = $bookData; 
        continue;
    }
    
    if ($bookData !== false) {
      $bookData = array_combine($header, $bookData); //on crée un array avec en-têtes du CSV et valeurs des bouquins
      $books[] = new Book($bookData);  // on crée un nouvel objet Book en utilisant $bookData pour initialiser ses propriétés
    }
    
  }
   

fclose($file);

$library = new Library($books);

$library->getAllGenres();
 
$sortResult = $library->sortByFilters("rank");

if (isset($_GET['category'])) {
    $sortResult = $library->getBooksByCategory($_GET['category']);
}



if (isset($_POST['sortby'])) {
    $sortResult = $library->sortByFilters($_POST['sortby']);
}




?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Books Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--FEUILLE DE STYLLE PERSO -->
    <link rel="stylesheet" href="./css/scss/main.scss">
    <link rel="stylesheet" href="https://template.hasthemes.com/boighor/boighor/css/plugins.css">
    <link rel="stylesheet" href="https://template.hasthemes.com/boighor/boighor/css/style.css">

    <!-- Cusom css -->
    <link rel="stylesheet" href="https://template.hasthemes.com/boighor/boighor/css/custom.css">

    <!-- Modernizer js -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main wrapper -->
<div class="wrapper" id="wrapper">

    <!-- Header -->
    <header id="wn__header" class="oth-page header__area header__absolute sticky__header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-7 col-lg-2">
                    <div class="logo">
                        <a href="index.html">
                            <img src="https://template.hasthemes.com/boighor/boighor/images/logo/logo.png" alt="logo images">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="row d-none">
                <div class="col-lg-12 d-none">
                    <nav class="mobilemenu__nav">
                        <ul class="meninmenu">
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Style Default</a></li>
                                    <li><a href="index-2.html">Home Style Two</a></li>
                                    <li><a href="index-3.html">Home Style Three</a></li>
                                    <li><a href="index-box.html">Home Box Style</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="portfolio.html">Portfolio</a>
                                        <ul>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-three-column.html">Portfolio 3 Column</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="error404.html">404 Page</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="team.html">Team Page</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-grid.html">Shop</a>
                                <ul>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-no-sidebar.html">Shop No sidebar</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
            </div>
            <!-- Mobile Menu -->
        </div>
    </header>
    <!-- //Header -->
    <!-- Start Search Popup -->
    <div class="box-search-content search_active block-bg close__top">
        <form id="search_mini_form" class="minisearch" action="#">
            <div class="field__search">
                <input type="text" placeholder="Search entire store here...">
                <div class="action">
                    <a href="#"><i class="zmdi zmdi-search"></i></a>
                </div>
            </div>
        </form>
        <div class="close__wrap">
            <span>close</span>
        </div>
    </div>
    <!-- End Search Popup -->
    <!-- Start breadcrumb area -->
    <div class="ht__breadcrumb__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__inner text-center">
                        <h2 class="breadcrumb-title">Shop Grid</h2>
                        <nav class="breadcrumb-content">
                            <a class="breadcrumb_item" href="index.html">Home</a>
                            <span class="brd-separator">/</span>
                            <span class="breadcrumb_item active">Shop Grid</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb area -->
    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="widget__categories products--cat">
                            <h3 class="widget__title">Product Categories</h3>
                            <ul>
                                <?php
                                foreach ($library->genres as $category => $number) {

                                    echo '<li><a href="index.php?category='.$category.'">'.$category.'<span>('.$number.')</span></a></li>';
                                }
                                ?>
                            </ul>
                        
                        </aside>
                        <aside class="widget__categories pro--range">
                            <h3 class="widget__title">Filter by price</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="#" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Price :</span><input type="text" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <a href="#">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget__categories products--tag">
                            <h3 class="widget__title">Product Tags</h3>
                            <ul>
                                <li><a href="#">Biography</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Cookbooks</a></li>
                                <li><a href="#">Health & Fitness</a></li>
                                <li><a href="#">History</a></li>
                                <li><a href="#">Mystery</a></li>
                                <li><a href="#">Inspiration</a></li>
                                <li><a href="#">Religion</a></li>
                                <li><a href="#">Fiction</a></li>
                                <li><a href="#">Fantasy</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Toys</a></li>
                                <li><a href="#">Hoodies</a></li>
                            </ul>
                        </aside>
                        <aside class="widget__categories sidebar--banner">
                            <img src="images/others/banner_left.jpg" alt="banner images">
                            <div class="text">
                                <h2>new products</h2>
                                <h6>save up to <br> <strong>40%</strong>off</h6>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div
                                    class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-grid"
                                       role="tab"><i class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-list" role="tab"><i
                                            class="fa fa-list"></i></a>
                                </div>
                                <p>Showing <?php echo count($sortResult) ?> of <?php echo count($books) ?> results</p>
                                <div class="orderby__wrapper">
                                    <span>Sort by</span>
                                    <form action="index.php" method="post" onchange="this.submit()">
                                        <select class="shot__byselect" id="filters" name="sortby">
                                            <option value="null" 
                                                <?php if(isset($_GET['sortby']) && $_GET['sortby'] === "null" ) { 
                                                    echo "selected";
                                                    } ?>
                                                    > Default  </option>
                                            <option value="title" 
                                            <?php if(isset($_GET['sortby']) && $_GET['sortby'] === "title" ) { 
                                                echo "selected";
                                                } ?>
                                                > Title </option>
                                            <option value="author" <?php if(isset($_GET['sortby']) && $_GET['sortby'] === "author" ) { 
                                                echo "selected";} ?>
                                                >Author</option>
                                            <option value="rating" <?php if(isset($_GET['sortby']) && $_GET['sortby'] === "rating" ) { 
                                                echo "selected";
                                                } ?>
                                                >Rating</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container tab-content">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                <?php
                                    foreach ($sortResult as $book) {
                                        $imageURL = $book->coverImg;
                                        echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product__thumb">
                                            <a class="first__img" href="single-product.html"><img src="' . $imageURL . '" alt="Book Cover"></a>
                                            <div class="hot__box">
                                                <span class="hot-label">BEST SALLER</span>
                                            </div>
                                        </div>
                                        <div class="product__content content--center">
                                            <h4><a href="single-product.html">'.$book->author.'<br>'.$book->title.'</a></h4>
                                            <ul class="price d-flex">
                                                <li>$35.00</li>
                                                <li class="old_price">$35.00</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="cart.html"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i
                                                                class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a class="compare" href="#"><i
                                                                class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-bs-toggle="modal" title="Quick View"
                                                               class="quickview modal-view detail-link"
                                                               href="#productmodal"><i class="bi bi-search"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__hover--content">
                                                <ul class="rating d-flex">
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> ';
                                    }
                                ?>
                               
                            </div>
                            <ul class="wn__pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
                            <div class="list__view__wrapper">
                                <!-- Start Single Product -->
                                <div class="list__view mt--40">
                                    <div class="thumb">
                                        <a class="first__img" href="single-product.html"><img
                                                src="images/product/3.jpg" alt="product images"></a>
                                        <a class="second__img animation1" href="single-product.html"><img
                                                src="images/product/6.jpg" alt="product images"></a>
                                    </div>
                                    <div class="content">
                                        <h2><a href="single-product.html">Madeness Overated</a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="price__box">
                                            <li>$111.00</li>
                                            <li class="old__price">$220.00</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                            augue nec est tristique auctor. Donec non est at libero vulputate
                                            rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                            vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a href="cart.html">Add to cart</a></li>
                                            <li class="wishlist"><a href="cart.html"></a></li>
                                            <li class="compare"><a href="cart.html"></a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="list__view mt--40">
                                    <div class="thumb">
                                        <a class="first__img" href="single-product.html"><img
                                                src="images/product/4.jpg" alt="product images"></a>
                                        <a class="second__img animation1" href="single-product.html"><img
                                                src="images/product/6.jpg" alt="product images"></a>
                                    </div>
                                    <div class="content">
                                        <h2><a href="single-product.html">Watching You</a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="price__box">
                                            <li>$111.00</li>
                                            <li class="old__price">$220.00</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                            augue nec est tristique auctor. Donec non est at libero vulputate
                                            rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                            vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a href="cart.html">Add to cart</a></li>
                                            <li class="wishlist"><a href="cart.html"></a></li>
                                            <li class="compare"><a href="cart.html"></a></li>
                                        </ul>

                                    </div>
                                </div>
                                <!-- End Single Product -->
                                <!-- Start Single Product -->
                                <div class="list__view mt--40">
                                    <div class="thumb">
                                        <a class="first__img" href="single-product.html"><img
                                                src="images/product/5.jpg" alt="product images"></a>
                                        <a class="second__img animation1" href="single-product.html"><img
                                                src="images/product/9.jpg" alt="product images"></a>
                                    </div>
                                    <div class="content">
                                        <h2><a href="single-product.html">Court Wings Run</a></h2>
                                        <ul class="rating d-flex">
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li class="on"><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <ul class="price__box">
                                            <li>$111.00</li>
                                            <li class="old__price">$220.00</li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                            augue nec est tristique auctor. Donec non est at libero vulputate
                                            rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi,
                                            vulputate adipiscing cursus eu, suscipit id nulla.</p>
                                        <ul class="cart__action d-flex">
                                            <li class="cart"><a href="cart.html">Add to cart</a></li>
                                            <li class="wishlist"><a href="cart.html"></a></li>
                                            <li class="compare"><a href="cart.html"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
    <!-- Footer Area -->
    <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
        <div class="footer-static-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__widget footer__menu">
                            <div class="ft__logo">
                                <a href="index.html">
                                    <img src="images/logo/3.png" alt="logo">
                                </a>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered duskam alteration variations of passages</p>
                            </div>
                            <div class="footer__content">
                                <ul class="social__net social__net--2 d-flex justify-content-center">
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                </ul>
                                <ul class="mainmenu d-flex justify-content-center">
                                    <li><a href="index.html">Trending</a></li>
                                    <li><a href="index.html">Best Seller</a></li>
                                    <li><a href="index.html">All Product</a></li>
                                    <li><a href="index.html">Wishlist</a></li>
                                    <li><a href="index.html">Blog</a></li>
                                    <li><a href="index.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="copyright">
                            <div class="copy__right__inner text-start">
                                <p>&copy; 2021, Boighor. Made with <i class="fa fa-heart text-danger"></i> by <a
                                        href="//hasthemes.com" target="_blank">HasThemes</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="payment text-end">
                            <img src="images/icons/payment.png" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //Footer Area -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry
                                    and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social__net social__net--2 d-flex justify-content-start">
                                            <li class="facebook"><a href="#" class="rss social-icon"><i
                                                    class="zmdi zmdi-rss"></i></a></li>
                                            <li class="linkedin"><a href="#" class="linkedin social-icon"><i
                                                    class="zmdi zmdi-linkedin"></i></a></li>
                                            <li class="pinterest"><a href="#" class="pinterest social-icon"><i
                                                    class="zmdi zmdi-pinterest"></i></a></li>
                                            <li class="tumblr"><a href="#" class="tumblr social-icon"><i
                                                    class="zmdi zmdi-tumblr"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END QUICKVIEW PRODUCT -->
</div>
<!-- //Main wrapper -->

<!-- JS Files -->
<script src="https://template.hasthemes.com/boighor/boighor/js/vendor/jquery.min.js"></script>
<script src="https://template.hasthemes.com/boighor/boighor/js/popper.min.js"></script>
<script src="https://template.hasthemes.com/boighor/boighor/js/vendor/bootstrap.min.js"></script>
<script src="https://template.hasthemes.com/boighor/boighor/js/plugins.js"></script>
<script src="https://template.hasthemes.com/boighor/boighor/js/active.js"></script>

</body>

</html>