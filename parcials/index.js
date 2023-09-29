// JavaScript for handling option clicks and changing styles
const options = document.querySelectorAll(".option");
const featureSection = document.querySelector(".feature-section");

options.forEach(option => {
    option.addEventListener("click", () => {
        // Remove the selected class from all options
        options.forEach(opt => opt.classList.remove("selected"));
        // Add the selected class to the clicked option
        option.classList.add("selected");

        // Update the feature section content based on the selected option
        const selectedOptionId = option.getAttribute("id");
        if (selectedOptionId === "option1") {
            featureSection.innerHTML = `
                <h2>Global Workforce Solutions</h2>
                <p>Unlock Prosperity: Toriox is more than an idea; it's a global vision. We facilitate wealth creation by connecting rising talents worldwide with developed nations, offering cost-effective solutions. Our journey extends from India to the shores of the US, UK, Canada, Australia, and beyond. We're dedicated to understanding the Indian IT narrative and tapping into the best talent pools in Accounts and Finance.</p>
            `;
        } else if (selectedOptionId === "option2") {
            featureSection.innerHTML = `
                <h2>Technology and Quality Workforce</h2>
                <p>India's Finest: India's exceptional educational infrastructure has nurtured a highly skilled workforce. Toriox champions the fusion of technology and quality personnel, proving the potential of India's capabilities on the global stage. As the world seeks smarter solutions to reduce costs and enhance efficiency, we empower companies to achieve their goals and share risks with partner firms.</p>
            `;
        } else if (selectedOptionId === "option3") {
            featureSection.innerHTML = `
                <h2>Partnering for Growth</h2>
                <p>At Toriox, we're more than consultants; we're growth partners. We empower companies to sharpen their focus, implement cutting-edge technologies, and optimize operational costs. Join our journey of success, and let's share the risks and rewards together.</p>
            `;
        }
    });
});

// Initialize the first option as selected
options[0].click();

