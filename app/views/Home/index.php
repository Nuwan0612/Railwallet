<?php require APPROOT . '/views/Home/inc/header.php';?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/abc/style.css">

<div class="banner" id="Home">
            <div class="navbar">
                <img src="<?php echo URLROOT;?>public/css/index/logo1.png" class="logo">
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
        <!--##ChatBox##-->

        <div class="outer-container">
            <button class="container-toggler">
                <!-- <span class="material-symbols-outlined">+</span> -->
                <img src="<?php echo URLROOT;?>/img/messenger_image.png" alt="">
                <!-- <img src="image.png" alt="Icon"> -->
                <span class="material-symbols-outlined"></span>
                
            </button>
    
            <div class="chat-container" style="z-index: 1000;">
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

                    <div onclick="displayAnswer('ans1')">
                        <label>
                            <h2>01</h2>
                            <h3>How do I create an account on RailWallet?</h3>
                        </label>
                    </div>

                    <div class="answer-box" style="display: none;" id="ans1">Creating an account on RailWallet is simple! 
                    Just click on the "Sign Up" button and follow the instructions to 
                    set up your account with your email address and password.
                    </div>
                    
                </div>

                <div class="tab">

                    <div onclick="displayAnswer('ans2')">
                        <label>
                            <h2>02</h2>
                            <h3>Can I top up my RailWallet using cash?</h3>
                        </label>
                    </div>

                    <div class="answer-box" style="display: none; border: 1px solid red" id="ans2">Currently, RailWallet supports online top-ups
                         through various payment methods. We do not support cash top-ups 
                         at this time for security reasons.
                    </div>

                    <!-- <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        
                    </label> -->
                    
                </div>

                <div class="tab">

                    <div onclick="displayAnswer('ans3')">
                        <label>
                            <h2>03</h2>
                            <h3>How do I reserve a seat using RailWallet?</h3>
                        </label>
                    </div>

                    <div class="answer-box" style="display: none; border: 1px solid red" id="ans3">Once you've logged into your RailWallet account, 
                        navigate to the "Seat Reservation" section, select your desired 
                        train and seat, and follow the prompts to complete your reservation.
                    </div>

                    <!-- <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        
                    </label> -->
                    
                </div>

                <div class="tab">

                    <div onclick="displayAnswer('ans4')">
                        <label>
                            <h2>04</h2>
                            <h3>What should I do if my train is delayed?</h3>
                        </label>
                    </div>

                    <div class="answer-box" style="display: none; border: 1px solid red" id="ans4">In case of train delays, you will receive 
                        notifications via email or SMS provided during registration. 
                        You can also check the updated train schedule on our website 
                        for real-time information.
                    </div>

                    <!-- <input type="radio" name="acc" id="acc1">
                    <label for="acc1">
                        
                    </label> -->
                    
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
                        <br>We're to provide a hassle-free and user-friendly train travel experience. Join us in this journey to make your trips simple and cashless. <br>
                        
                </div>
            <div class="aboutimage">
                 <img src="<?php echo URLROOT;?>public/css/index/ab1.jpg">
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
                                <img src="<?php echo URLROOT;?>public/css/index/profile.jpg" alt="Profile Picture1">
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
                                <img src="<?php echo URLROOT;?>public/css/index/profile.jpg" alt="Profile Picture2">
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
                                <img src="<?php echo URLROOT;?>public/css/index/profile.jpg" alt="Profile Picture3">
                            </div>
                            <h2>Savithi Perera</h2>
                        </div>
                        <div class="feedback-content">
                            <p>"This website has made my life easier. Thank you for providing such a valuable resource."</p>
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
        <p>We're here to help! Our dedicated support team is just a message away. Feel free to reach out, and we'll do our best to assist you promptly.</p>
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

<script>
    const containerToggler = document.querySelector(".container-toggler");
    const containerCloseBtn = document.querySelector(".close-btn");
    const outerContainer = document.querySelector(".outer-container");

    containerCloseBtn.addEventListener("click", () => outerContainer.classList.remove("show-container"));
    containerToggler.addEventListener("click", () => outerContainer.classList.toggle("show-container"));


    function displayAnswer(answer) {

        var question = document.getElementById(answer);
        const boxes = document.querySelectorAll('.answer-box');

        if (question.style.display == "block")
        {
            boxes.forEach(function(box) {
                box.parentNode.style.background = '';
            });
            question.style.display = "none";
        }
        else
        {
            boxes.forEach(function(box) {
                box.style.display = 'none';
                box.parentNode.style.background = '';
            });

            question.style.display = "block";
            question.parentNode.style.background = "green";
        }

    }


</script>

<?php require APPROOT . '/views/Home/inc/footer.php';?>