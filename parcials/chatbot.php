<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="chatbot.css">
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h1>Chatbot</h1>
            <button id="close-button" class="close-button">X</button>
        </div>
        <div class="chat-messages" id="chat-messages">
            <div class="message bot">Welcome! How can I assist you today?</div>
        </div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Type a message...">
            <button id="send-button" class="send-button">Send</button>
        </div>
    </div>
    <button id="open-button" class="chat-button">Open Chat</button>
    <script src="chatbot.js"></script>
</body>
</html>
