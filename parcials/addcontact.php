<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" type="text/css" href="./addcontact.css">
</head>
<body>
    <div class="container">
        <button id="showFormButton" class="popover-button">Add</button>

        <div id="contactFormOverlay" class="contact-form-overlay">
            <div id="contactFormContainer" class="contact-form-container">
                <button id="closeButton" class="close-button">&#10006;</button>
                <h2>Add Contact</h2>
                <form id="contactForm" method="POST" action="add_contact.php">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="website">Website Link:</label>
                        <input type="text" id="website" name="website">
                    </div>
                    <div class="form-group">
                        <label for="twitter">LinkedIn:</label>
                        <input type="text" id="twitter" name="linkedin">
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position">
                    </div>
                    <div class="form-group">
                        <label for="companyname">Company Name:</label>
                        <input type="text" id="companyname" name="companyname">
                    </div>
                    <button type="submit" class="button1">Add</button>
                </form>
            </div>
        </div>
    </div>
    <script>document.addEventListener("DOMContentLoaded", function () {
    const showFormButton = document.getElementById("showFormButton");
    const contactFormOverlay = document.getElementById("contactFormOverlay");

    // Function to toggle the form's visibility
    function toggleForm() {
        contactFormOverlay.classList.toggle("onoverlay");
    }

    // Add a click event listener to the "Add" button
    showFormButton.addEventListener("click", toggleForm);
});
document.addEventListener("DOMContentLoaded", function () {
    const closeButton = document.getElementById("closeButton");
    const contactFormOverlay = document.getElementById("contactFormOverlay");

    // Function to close the contact form
    function closeForm() {
        contactFormOverlay.classList.remove("onoverlay");
    }

    // Add a click event listener to the close button
    closeButton.addEventListener("click", closeForm);
});

</script>
</body>
</html>