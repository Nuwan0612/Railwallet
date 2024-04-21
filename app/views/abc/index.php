<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chatbot in JavaScript</title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/abc/style.css">
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> -->
        <!-- <script src="script.js" defer></script> -->
    </head>
    <body>
        
        <div class="outer-container">
            <button class="container-toggler">
                <!-- <span class="material-symbols-outlined">+</span> -->
                <img src="image.png" alt="Icon">
                <span class="material-symbols-outlined"></span>
                
            </button>
    
            <div class="chat-container">
                <div class="title">
                        <p>Chat With Us</p>
                </div>
    
                <div class="Chat">
                    <header id="live-chat-header">
                        <h1>Live Chat</h1>
                    </header>
                </div>
                <header id="faqs-header">
                <h1>FAQs?</h1>
                <span class="close-btn material-symbols-outlined">close</span>
            </header>
                <div class="tab">
                    <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        <h2>01</h2>
                        <h3>How do I create an account on RailWallet?</h3>
                    </label>
                    <div class="content"><p>Creating an account on RailWallet is simple! 
                    Just click on the "Sign Up" button and follow the instructions to 
                    set up your account with your email address and password.</p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc2">
                    <label for="acc2">
                        <h2>02</h2>
                        <h3>Can I top up my RailWallet using cash?</h3>
                    </label>
                    <div class="content"><p>Currently, RailWallet supports online top-ups
                         through various payment methods. We do not support cash top-ups 
                         at this time for security reasons.</p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc3">
                    <label for="acc3">
                        <h2>03</h2>
                        <h3>How do I reserve a seat using RailWallet?</h3>
                    </label>
                    <div class="content"><p>Once you've logged into your RailWallet account, 
                        navigate to the "Seat Reservation" section, select your desired 
                        train and seat, and follow the prompts to complete your reservation.</p>
                    </div>
                </div>
                <div class="tab">
                    <input type="radio" name="acc" id="acc4">
                    <label for="acc4">
                        <h2>04</h2>
                        <h3>What should I do if my train is delayed?</h3>
                    </label>
                    <div class="content"><p> In case of train delays, you will receive 
                        notifications via email or SMS provided during registration. 
                        You can also check the updated train schedule on our website 
                        for real-time information.</p>
                    </div>
                </div>
            </div>   
        </div>

        <script>
            const containerToggler = document.querySelector(".container-toggler");
            const containerCloseBtn = document.querySelector(".close-btn");
            const outerContainer = document.querySelector(".outer-container");

            containerCloseBtn.addEventListener("click", () => outerContainer.classList.remove("show-container"));
            containerToggler.addEventListener("click", () => outerContainer.classList.toggle("show-container"));
        </script>
        
    </body>
</html>