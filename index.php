<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>House Rental Management System</title>
        <link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
        <!-- bootstrap css CDN included -->
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"
        />
        <!-- fonts CDN included -->
        <link
            href="https://fonts.googleapis.com/css2?family=Epilogue&family=Roboto&display=swap"
            rel="stylesheet"
        />
        <!-- custom CSS files included -->
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <!-- welcome section begins -->
        <section class="welcome-section">
            <header>
                <!-- navbar section begins -->
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <a
                            href="index.html"
                            class="navbar-brand text-dark font-weight-bold"
                            >CustomCastle</a
                        >
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#collapsenav"
                        >
                            <span>
                                <img
                                    src="img/menuHamburger.svg"
                                    width="35px"
                                    height="35px"
                                    alt="menu-hamberger-icon"
                                />
                            </span>
                        </button>
                        <div
                            class="collapse navbar-collapse text-center"
                            id="collapsenav"
                        >
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a href="#home" class="nav-link text-dark"
                                        >home</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="#about_us"
                                        class="nav-link text-dark"
                                        >about us</a
                                    >
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="#contact_us"
                                        class="nav-link text-dark"
                                        >contact us</a
                                    >
                                </li>
                                <?php 
                                    if(isset($_SESSION['name'])){
                                        ?>
                                            <!-- <li class="nav-item">
                                                <a
                                                    href="dashboard.php"
                                                    class="nav-link text-dark"
                                                    ><?php echo $_SESSION['name']; ?>
                                                    </a
                                                >
                                            </li>
                                            <li class="nav-item">
                                                <a
                                                    href="logout.php"
                                                    class="nav-link text-dark"
                                                    >log out
                                                    </a
                                                >
                                            </li> -->

                                            <div class="btn-group">
                                                <button class="btn btn-sm" type="button">
                                                <?php echo $_SESSION['name']; ?>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="dashboard.php">dashboard</a>
                                                    <a class="dropdown-item" href="logout.php">log out</a>
                                                </div>
                                            </div>
                                        <?php
                                    }else{
                                        ?>
                                            <li class="nav-item">
                                                <a
                                                    href="login.php"
                                                    class="nav-link text-dark"
                                                    >login</a
                                                >
                                            </li>
                                            <li class="nav-item signup">
                                                <a
                                                    href="register.php"
                                                    class="nav-link text-dark"
                                                    >register</a
                                                >
                                            </li>
                                        <?php
                                    }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- navbar ends -->
            </header>
            <!-- main content begins -->
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-10 col-12">
                            <div class="main-text">
                                <p>
                                    find your dream house <br />
                                    <span>in an affordable price</span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-10 col-12">
                            <div class="search-form form-group">
                                <form action="viewresults.php" method="POST" target="_blank">
                                    <input
                                        type="text"
                                        maxlength="6"
                                        name="pcode"
                                        placeholder="pin code"
                                        class="form-control"
                                    />
                                    <input
                                        type="submit"
                                        name="submit"
                                        value="search"
                                        id="search-btn"
                                        class="form-control"
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content header ends -->
        </section>
        <!-- welcome section ends -->
        <!-- property type selection -->
        <section class="property-selection" id="home">
            <h1 class="section-heading">we offer</h1>
            <div class="property-type-selection">
                <div class="apartment">
                    <img
                        class="img-fluid"
                        src="img/apartment.jpg"
                        alt="apartment"
                    />
                    <p class="property-title">apartment</p>
                </div>
                <div class="house">
                    <img
                        class="img-fluid"
                        src="img/house.jpg"
                        alt="independent-house"
                    />
                    <p class="property-title">house</p>
                </div>
                <div class="hostel">
                    <img class="img-fluid" src="img/hostel.jpg" alt="hostel" />
                    <p class="property-title">hostle</p>
                </div>
                <div class="office">
                    <img class="img-fluid" src="img/office.jpg" alt="office" />
                    <p class="property-title">office</p>
                </div>
                <div class="shop">
                    <img class="img-fluid" src="img/shop.jpg" alt="shop" />
                    <p class="property-title">shop</p>
                </div>
            </div>
        </section>
        <!-- our vision section starts -->
        <section class="our-vision">
            <h1 class="section-heading">our vision</h1>
            <div class="easy-access">
                <img
                    class="easy-access-img"
                    src="img/easy-access.png"
                    alt="demo"
                />
                <h3 class="easy-access-heading">easy access</h3>
                <p class="easy-access-text">
                    Custom Castle gives you access to hundreds of houses at
                    almost every location across the country, making it easy for
                    you to relocate to your destination without being physically
                    present.
                </p>
            </div>
            <div class="cheap-price">
                <img class="cheap-price-img" src="img/best-price.png" alt="" />
                <h3 class="cheap-price-heading">Best price</h3>
                <p class="cheap-price-text">
                    A number of landlords and owners from countrywide locations
                    are taking part in publishing their property online with us
                    for rent, making the customer to compare prices and choose
                    the desired house of their choice, making it really
                    "affordable" for them.
                </p>
            </div>
            <div class="sustainable-platform">
                <img
                    class="sustainable-platform-img"
                    src="img/sustainable-platform.svg"
                    alt=""
                />
                <h3 class="sustainable-platform-heading">
                    sustainable platform
                </h3>
                <p class="sustainable-platform-text">
                    Custom Castle provides a platform for both owners as well as
                    tenants to fulfill their needs of property rental service
                    easily. it saves time and effort of both owners and tenants
                    for physically searching and advertising for rental
                    services.
                </p>
            </div>
        </section>
        <!-- about us starts -->
        <section class="about-us" id="about_us">
            <h1 class="section-heading">about us</h1>
            <p class="about-us-text">
                CustomCastle offers you a query free platform to search for a
                best home as well as someone who takes care of your home like
                their own. In this era , where it's a major challenge to find a
                better shelter, we offer you the easiest solution that will make
                you find the best one. Hope we will make you find your dream
                house with affordable cost.
            </p>
        </section>
        <!-- contact us starts -->
        <section class="contact-us" id="contact_us">
            <h1 class="section-heading">contact us</h1>
            <div class="contact-us-form">
                <form action="contact.php" method="POST">
                    <div class="contact-name">
                        <label>name:</label>
                        <input type="text" name="u_name" required />
                    </div>
                    <div class="contact-email">
                        <label>email:</label>
                        <input type="email" name="u_email" required />
                    </div>
                    <div class="contact-text">
                        <label>your message:</label>
                        <textarea name="u_message" required></textarea>
                    </div>
                    <div class="send-message-btn">
                        <input type="submit" value="send" name="submit" />
                    </div>
                </form>
            </div>
        </section>
        <!-- footer section starts -->
        <section class="footer">
            <h1 class="footer-heading">custom castle</h1>
            <p class="github-repo">
                <img
                    class="github-icon"
                    src="img/github-ico.png"
                    alt="github-icon"
                />
                <a href="https://github.com/predator2v0/hrms" target="_blank"
                    >github repository</a
                >
            </p>
            <p class="copyright">&copy;2021 all rights reserved.</p>
        </section>
        <!-- scripts -->
        <!-- bootstrap js CDN included -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
