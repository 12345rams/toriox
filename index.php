<?php
    include './nav.php'
  ?> 
  <?php
if (isset($_SESSION['user_id'])) {
    // User is already logged in, redirect to the home page or any other page
    $text = "Welcome To Toriox";
}
else{
    $text = "Signup";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TorioxLead</title>

    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./nav.css">
    <link rel="stylesheet" href="./parcials/footer.css">
</head>
<body>
 


<div class="context">
    <div class="homeContainer">
        <div class="box">
            <div class="heading">
                <h1>Easy and Powerful way to Drive Huge Results, FAST!</h1>
            </div>
            <div class="heading2">
                <h3>See why over 1,000,00 people joined TorioxLead last year Meet some of the 16,000 sales teams that move business forward with TorioxLead.</h3>
            </div>
            <div>
                <a href="./parcials/signup.php"><button class="button-40" role="button"><?php echo "$text"?></button></a>
            </div>
            <div class='rating'>
                <h3>Rating 4.5</h3>
                <!-- Add your Rating component here -->
            </div>
        </div>
        <div class="imageBox">
            <img src="./parcials/images/lead2.jpg" alt="" />
        </div>
    </div>
</div>

<!-- Include your Chatbot component here -->

<div class="area">
 
</div>
<section>
        <div class="header">
            <i class="google-icon"></i>
            <h1 class="main-title">Easy and Powerful to Drive Huge Results</h1>
            <p class="subtitle"></p>
            <div class="cta-link"><a href="#">See our proven 3-step process</a></div>
        </div>

        <div class="options-container">
            <div class="option" id="option1">Grow Your Email List</div>
            <div class="option" id="option2">Capture More Leads</div>
            <div class="option" id="option3">Increase Sales Conversion</div>
        </div>

        <div class="feature-section">
            <h2>Global Workforce Solutions</h2>
            <p>Unlock Prosperity: Toriox is more than an idea; it's a global vision. We facilitate wealth creation by connecting rising talents worldwide with developed nations, offering cost-effective solutions. Our journey extends from India to the shores of the US, UK, Canada, Australia, and beyond. We're dedicated to understanding the Indian IT narrative and tapping into the best talent pools in Accounts and Finance.</p>
        </div>

        <!-- ... Other sections ... -->

        <div class="cta-section">
            <div class="cta-box">
                <h2 class="cta-title">Get Started Today!</h2>
                <p class="cta-subtitle">Join our community and start optimizing your conversions.</p>
                <button class="cta-button"><a href="./parcials/signup.php"><?php echo "$text"?></a></button>
            </div>
        </div>
    </section>
<?php include './footer.php'?>
    <script src="./parcials/index.js"></script>
</body>
</html>