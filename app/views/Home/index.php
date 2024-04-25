<?php require APPROOT . '/views/Home/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/abc/style.css">

<div class="banner" id="Home">
    <div class="navbar">
        <img src="<?php echo URLROOT; ?>public/css/index/logo1.png" class="logo">
        <ul>
            <li><a href="#Home">Home</a></li>
            <li><a href="#contact-us"> Contact Us</a></li>
            <li><a href="#about-section" id="about-link">About</a></li>
            <li><a href="#feedback-section">Feedback</a></li>

        </ul>
    </div>
    <div class="content">
        <h1>Easy Travel With RailWallet</h1><br>
        <p>Let's get started with signing up. If you already have an account,<br>Let's explore RailWallet.</p>
        <div>
            <button type="button" onclick="redirectToSignUp()"><span></span>SignUp</button>
            <button type="button" class="log-in" onclick="redirectToLogin()"><span></span>Login</button>
        </div>
    </div>


    <!--##ChatBox Section##-->

    <!--##FAQ page##-->

    <!-- <button class="container-toggler" onclick="toggleChatContainer()"> -->

    <div class="outer-container">
        
        <button class="container-toggler" onclick="toggleChatContainer()" style="z-index: 1000;">

            <!-- <span class="material-symbols-outlined">+</span> -->
            <img src="<?php echo URLROOT; ?>/img/live-chat.png" alt="">
            <!-- <img src="image.png" alt="Icon"> -->
            <span class="material-symbols-outlined"></span>

        </button>

        <div class="chat-container" style="z-index: 1000;">

            <div id="faq-box" style="display: block;">

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

    <!--##ChatBox Section##-->

    <!--##FAQ page##-->

    <div class="outer-container">
        
        <button class="container-toggler" onclick="toggleChatContainer()" style="z-index: 1000;">


            <!-- <span class="material-symbols-outlined">+</span> -->
            <img src="<?php echo URLROOT; ?>/img/live-chat.png" alt="">
            <!-- <img src="image.png" alt="Icon"> -->
            <span class="material-symbols-outlined"></span>

        </button>

        <div class="chat-container" style="z-index: 1000;">
            <div id="faq-box" style="display: block;">

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

                <?php $qNumber = 1; foreach($data['messages'] as $faq): ?>
                    <div class="tab">

                        <div onclick="displayAnswer(<?php echo $faq->Q_ID?>)">
                            <label>
                                <h2><?php echo $qNumber?></h2>
                                <h3><?php echo $faq->Question?></h3>
                            </label>
                        </div>

                        <div class="answer-box" style="display: none;" id="<?php echo $faq->Q_ID; ?>"><?php echo $faq->Answer?></div>
                    </div>
                <?php $qNumber++; endforeach; ?>            
            </div>


            <!--##livechat page##-->
            <!-- <button class="container-toggler" onclick="toggleChatContainer()" style="z-index: 1000;"> -->
            <div id="chat-box" style="display: none;">
                <header>
                    <div class="" onclick="backtofaq();">
                        <img class="backarrow" src="<?php echo URLROOT; ?>img/back_arrow_icon.png" alt="">
                        <!-- <img id="back-arrow-img" src="back_arrow_icon.png" alt="Back"> -->
                    </div>
                    <p class="LiveChatHeader">Welcome to Live Chat!</p>
                </header>
                <ul class="livechat">
                    <li class="chat incoming">
                        <span class="material-symbols-outlined">
                            <img src="<?php echo URLROOT; ?>/img/live_chat_image.png" alt="">
                            <!-- <img src="live_chat_image.png" alt="Icon"> -->
                        </span>
                        <p>Hi there 👋🏼 <br> How can I help you today?</p>
                    </li>
                    <li class="chat outgoing">
                        <p>khytgdev hdwue ugdw hduw.</p>
                    </li>
                </ul>
                <div class="chat-input">
                    <textarea placeholder="Enter a message..." required></textarea>
                    <span id="send-btn" class="material-symbols-outlined">
                        <img src="<?php echo URLROOT; ?>/img/send_image.png" alt="">
                        <!-- <img src="send_image.png" alt="Icon"> -->
                    </span>
                </div>
            </div>
      
        </div>

    </div>

</div>

<!--##AboutUs Section##-->

<section class="hero" id="about-section">
    <div class="heading">
        <h1>About Us</h1>
    </div>
    <div class="container">
        <div class="aboutcontent">
            <h3>Welcome To RailWallet</h3>
            <p>Welcome to "Online Rail Wallet" – your trusted partner in modernizing train travel.
                <br>We're to provide a hassle-free and user-friendly train travel experience. Join us in this
                journey to make your trips simple and cashless. <br>
        </div>
        <div class="aboutimage">
            <img src="<?php echo URLROOT; ?>public/css/index/ab1.jpg">
        </div>
</section>

<!--###Feedback Section###-->

<section class="Feedback" id="feedback-section">
    <div class="feedbackbg">

        <div class="feedback-container">
            <h1>Feedback</h1>
            <div class="feedback">
                <div class="feedback-column">
                    <div class="feedback-card">
                        <div class="feedback-header">
                            <div class="profile-pic">
                                <img src="<?php echo URLROOT; ?>public/css/index/profile.jpg" alt="Profile Picture1">
                            </div>
                            <h2>Julia Fernando</h2>
                        </div>
                        <div class="feedback-content">
                            <p>"I really love this website. It's user-friendly and has great content."</p>
                        </div>
                    </div>
                </div>
                <div class="feedback-column">
                    <div class="feedback-card">
                        <div class="feedback-header">
                            <div class="profile-pic">
                                <img src="<?php echo URLROOT; ?>public/css/index/profile.jpg" alt="Profile Picture2">
                            </div>
                            <h2>Gauri Abekoon</h2>
                        </div>
                        <div class="feedback-content">
                            <p>"The information on this website is very helpful. Keep up the good work!"</p>
                        </div>
                    </div>
                </div>
                <div class="feedback-column">
                    <div class="feedback-card">
                        <div class="feedback-header">
                            <div class="profile-pic">
                                <img src="<?php echo URLROOT; ?>public/css/index/profile.jpg" alt="Profile Picture3">
                            </div>
                            <h2>Savithi Perera</h2>
                        </div>
                        <div class="feedback-content">
                            <p>"This website has made my life easier. Thank you for providing such a valuable
                                resource."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--## Contact Us ##-->
<section class="contact" id="contact-us">
    <div class="c-content">
        <h2>Contact Us</h2>
        <p>We're here to help! Our dedicated support team is just a message away. Feel free to reach out, and we'll
            do our best to assist you promptly.</p>
    </div>
    <div class="c-container">
        <div class="contactInfo">
            <div class="box">
                <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Address</h3>
                    <p>23/4,<br>Marcus Place,<br>Colombo 07.</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Phone</h3>
                    <p>011 2222555</p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <div class="text">
                    <h3>Email</h3>
                    <p>railwallet123@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="contactForm">
            <form>
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span>Full Name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <textarea required="required"></textarea>
                    <span>Type Your Message ....</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="" value="send">
                </div>
            </form>
        </div>
    </div>
</section>


<!--## faq content script part ##-->

<script>
    const containerToggler = document.querySelector(".container-toggler");
    const containerCloseBtn = document.querySelector(".close-btn");
    const outerContainer = document.querySelector(".outer-container");

    containerCloseBtn.addEventListener("click", () => outerContainer.classList.remove("show-container"));
    containerToggler.addEventListener("click", () => outerContainer.classList.toggle("show-container"));


    function displayAnswer(answer) {

        var question = document.getElementById(answer);
        const boxes = document.querySelectorAll('.answer-box');

        if (question.style.display == "block") {
            boxes.forEach(function (box) {
                box.parentNode.style.background = '';
            });
            question.style.display = "none";
        }
        else {
            boxes.forEach(function (box) {
                box.style.display = 'none';
                box.parentNode.style.background = '';
            });

            question.style.display = "block";
            question.parentNode.style.background = "rgba(0, 160, 136, 0.3)";
            // question.style.fontWeight = "bold"; 
            question.style.lineHeight = "1.5"; // Increasing spacing between lines
            question.style.marginTop = "10px";
        }

    }
</script>

<!--## ChatToggler functioning  ##-->

<script>
    function toggleChatContainer() {

        const containerToggler = document.querySelector('.container-toggler');
        const chatContainer = document.querySelector('.chat-container');

        containerToggler.classList.toggle('clicked');
        chatContainer.classList.toggle('opened');
    }

    function backtofaq() {
        // window.location.href = "live-chat.html";
        document.getElementById("faq-box").style.display = "block";
        document.getElementById("chat-box").style.display = "none";
    }
</script>

<!--## LiveChat Page Loading ##-->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var liveChatHeader = document.getElementById("live-chat-header");
        liveChatHeader.addEventListener("click", function () {
            // window.location.href = "live-chat.html";
            document.getElementById("faq-box").style.display = "none";
            document.getElementById("chat-box").style.display = "block";
        });
    });



    // const ChatBoxToggler = document.querySelector(".ChatBox-toggler");
    // const ChatBoxCloseBtn = document.querySelector(".close-btn");

    // ChatBoxCloseBtn.addEventListener("click", () => document.body.classList.remove("show-ChatBox"));
    // ChatBoxToggler.addEventListener("click", () => document.body.classList.toggle("show-ChatBox"));
</script>



<?php require APPROOT . '/views/Home/inc/footer.php'; ?>