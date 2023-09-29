document.addEventListener("DOMContentLoaded", function() {
    const chatContainer = document.querySelector(".chat-container");
    const openButton = document.querySelector("#open-button");
    const closeButton = document.querySelector("#close-button");
    const userInput = document.querySelector("#user-input");
    const sendButton = document.querySelector("#send-button");
    const chatMessages = document.querySelector("#chat-messages");

    openButton.addEventListener("click", () => {
        chatContainer.style.display = "block";
        showSampleQuestions();
    });

    closeButton.addEventListener("click", () => {
        chatContainer.style.display = "none";
    });

    sendButton.addEventListener("click", () => {
        sendMessage();
    });

    userInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            sendMessage();
        }
    });

    function sendMessage() {
        const userMessage = userInput.value.trim();
        if (userMessage === "") return;

        appendMessage(userMessage, "user");

        // Simulate bot response (replace with actual responses)
        setTimeout(() => {
            const botResponse = getBotResponse(userMessage);
            appendMessage(botResponse.text, "bot");
        }, 1000);

        userInput.value = "";
    }

    function appendMessage(text, sender) {
        const message = document.createElement("div");
        message.classList.add("message", sender);
        message.textContent = text;
        if (sender === "bot") {
            message.style.cursor = "pointer";
            message.addEventListener("click", () => {
                // When a bot message is clicked, send the answer to the user
                appendMessage(getBotResponse(text).text, "user");
            });
        }
        chatMessages.appendChild(message);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getBotResponse(userMessage) {
        // Replace with your chatbot logic here
        const responses = {
            "Hello": "Hi! How can I help you today?",
            "How are you?": "I'm just a bot, but I'm here to assist you!",
            "How can cloud technologies enhance lead generation?": "Cloud technologies can enhance lead generation by providing scalable storage, processing power, and data analytics tools. They enable businesses to collect, store, and analyze lead data more efficiently.",
            "What are the advantages of using cloud-based tools for lead generation?": "Some advantages of using cloud-based tools for lead generation include cost-effectiveness, scalability, accessibility from anywhere, and the ability to integrate with other software solutions.",
            // Add more responses for other questions
        };

        return { text: responses[userMessage] || "I'm sorry, I don't have an answer to that question." };
    }

    // Function to show sample questions related to cloud lead generation
    function showSampleQuestions() {
        const sampleQuestions = [
            "How can cloud technologies enhance lead generation?",
            "What are the advantages of using cloud-based tools for lead generation?",
            // Add more sample questions here
        ];

        // Display sample questions in the chat
        sampleQuestions.forEach((question) => {
            setTimeout(() => {
                appendMessage(question, "bot");
            }, 1000);
        });
    }
});
