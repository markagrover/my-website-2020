<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML,CSS,JavaScript,web designer, websites,coding,software engineer">
    <meta name="author" content="Mark Grover">
    <meta property="og:title" content="Experienced Web Developer">
    <meta property="og:url" content="http://mawebdesignsolutions.com">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Web design services. Experienced with mobile first design. We build sites that look good on all devices.">
    <meta property="og:image" content="http://mawebdesignsolutions.com/images/jumbotron_sm.jpg">
    <title>Mark Grover Web Designer</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8bad5e6eb3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo"><img src="images/logo.svg" alt=""></div>
        <nav>
            <ul class="hideNav navigation">

                <li><a class="indexLink" href="index.php">Home</a></li>
                <li class="aboutLink"><a href="#">About</a></li>
                <li class="servicesLink"><a href="#">Services</a></li>
                <li class="projectsLink"><a href="#">Projects</a></li>
                <li class="contactLink"><a href="#">Contact</a></li>
            </ul>
            <a href="#" class="hamburgerIcon"">
<!--                <span class="bar"></span>-->
<!--                <span class="bar"></span>-->
<!--                <span class="bar"></span>-->
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>
    <section class="jumbotronContainer">
        <div class="jumbotron">
            <div class="jumbotronOverlay"></div>
<!--            <picture>-->
<!--                <source media="(max-width: 650px)" srcset="images/jumbotron_md.jpg">-->
<!--                <source media="(max-width: 465px)" srcset="images/jumbotron_sm.jpg">-->
<!--                <img class="jumbotronImage" src="images/jumbotron_lg.jpg" alt="Web designer picture">-->
<!--            </picture>-->
<!--            <img class="jumbotronImage" src="images/jumbotron_lg.jpg" alt="web designer picture">-->
        </div>
    </section>
    <section class="servicesSection">
        <div class="horizontalLine"></div>
        <h2 id="services" class="title servicesTitle">Services</h2>
        <div class="horizontalLine"></div>
        <div class="servicesContainer">
            <div class="services">
                <h2 class="serviceTitle">
                    Web Design
                </h2>
                <p class="servicesContent">
                    Providing Web Design Solutions to Small Businesses
                </p>
                <div class="icon">
                    <img src="images/iconfinder_Responsive_Web_Design_770956.svg" alt="Responsive web design" class="svgIcon">
                </div>
            </div>
            <div class="services">
                <h2 class="serviceTitle">
                    Web Site Updates
                </h2>
                <p class="servicesContent">
                    Is your site outdated? We offer web site update services.
                </p>
                <div class="icon">
                    <img src="images/iconfinder_web_design_1304411.svg" alt="Website Updates" class="svgIcon">
                </div>
            </div>
            <div class="services">
                <h2 class="serviceTitle">
                    SEO Optimizations
                </h2>
                <p class="servicesContent">
                    Search Engine Optimizations. Keywords and Search terms.
                </p>
                <div class="icon">
                    <img src="images/iconfinder_SEO_1312536.svg" alt="SEO For Websites" class="svgIcon">
                </div>
            </div>
        </div>
    </section>
    <section class="projects">
        <div class="horizontalLine"></div>
        <h2 id="projects" class="title projectsTitle">Projects</h2>
        <div class="horizontalLine"></div>
    </section>

    <section class="websiteImages">

        <div class="imagesContainer">
            <div class="websiteImage">
                <a href="https://aquarianpoolandspa.com" target="_blank">
                    <img src="images/rsz_1aps.png" alt="Picture of Aquarian Pool and Spa Website"></a>
            </div>
        </div>
        <div class="imagesContainer">
            <div class="websiteImage">
                <a href="https://originalcontracting.com" target="_blank">
                    <img src="images/rsz_original_contracting.png" alt="Picture of Original Contracting Website"></a>
            </div>
        </div>
    </section>
    <div class="aboutContainer">
        <div class="horizontalLine"></div>
        <h2 id="about" class="title aboutTitle">About</h2>
        <div class="horizontalLine"></div>

    </div>
    <section class="about">
        <div class="aboutMeContainer">
            <div class="imgContainer">
                <img src="images/profile.jpeg" alt="">
                <div class="icons">
                    <img src="images/icons8-html-5-50.svg" alt="html5 icon" class="html">
                    <img src="images/icons8-javascript-50.svg" alt="javascript icon" class="javascript">
                    <img src="images/icons8-php-logo-50.svg" alt="php icon" class="php">
                    <img src="images/icons8-python-50.svg" alt="python icon" class="python">
                    <img src="images/icons8-mongodb-50.svg" alt="python icon" class="mongoDB">
                    <img src="images/icons8-mysql-logo-50.svg" alt="python icon" class="sql">
                </div>
            </div>

            <div class="aboutContent">

                <p>
                    Hello, my name is Mark Grover and I'm a self taught Web Designer with more then 5 years Experience designing responsive websites.
                    Programming is my passion. I have experience with <strong>WordPress</strong> and <strong>React</strong>. I also have experience programming with
                    <strong>Javascript, PHP</strong> and <strong>Python</strong>. When having your website built it's important to have your site responsive. You want to make sure your
                    site looks great no matter what the device your users may be on. I design sites that look great on mobile phones, tablets and desktop computers.
                </p>
            </div>

        </div>
    </section>

    <div class="mainContactContainer">
        <div class="horizontalLine"></div>
        <h2 id="contact" class="title contactTitle">Contact</h2>
        <div class="horizontalLine"></div>
        <div class="contactMessage"></div>
        <div class="contactContainer">
            <div class="formContainer">
                <form id="contactForm" action="formSubmit.php" method="get" enctype="application/x-www-form-urlencoded">
                    <div class="formSection">
    <!--                    <label class="formName" for="name">Name:</label>-->
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="formSection">
    <!--                    <label class="formEmail" for="email">Email:</label>-->
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="formSection">
    <!--                    <label class="formPhone" for="phone">Phone:</label>-->
                        <input type="tel" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="formSection textarea">
    <!--                    <label class="formComment" for="comment">Comment:</label>-->
                        <textarea id="comment" name="comment" cols="50" rows="10" placeholder="Comment" maxlength="300"></textarea>
                        <div class="characterCount">300</div>
                    </div>
                    <button class="formSubmit" type="submit">Submit</button>
                </form>

            </div>
            <div id="map"></div>
        </div>


    </div>
    <div id="footerMap"></div>
    <section class="footer">
        <footer>
            <div class="contactInfo">
                <address>
                    2 Franklin Creek Ln <br>
                    Medway Ma, 02053
                </address>
                <p class="phoneNumber">
                    401-332-9183
                </p>
            </div>
            <div class="hoursContainer">
                <p class="operatingHours">

                Sunday    <span class="hours">Closed</span> <br>
                Monday    <span class="hours">8am - 6pm</span> <br>
                Tuesday   <span class="hours">8am - 6pm</span> <br>
                Wednesday <span class="hours">8am - 6pm</span> <br>
                Thursday  <span class="hours">8am - 6pm</span> <br>
                Friday    <span class="hours">8am - 5pm</span> <br>
                Saturday  <span class="hours">10am - 3pm</span>
                </p>
            </div>

            <div class="socialMediaLinks">
                <a href="https://www.facebook.com/Web-Design-Solutions-100369424855851"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/WebDesignSolut4"><i class="fab fa-twitter-square"></i></a>
                <a href="https://aboutme.google.com/u/2/?referer=gplus&pageId=none"><i class="fab fa-google-plus-square"></i></a>
            </div>
        </footer>
    </section>
    <div class="pageUp">
        <i class="fas fa-chevron-circle-up"></i>
    </div>
    <script src="app.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOUsur6ANosEbusDxD2w7CPMEtI1RVDdk&callback=initMap"></script>
</body>
</html>