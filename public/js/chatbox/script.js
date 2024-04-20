
document.addEventListener("DOMContentLoaded", function() {
    const containerToggler = document.querySelector(".container-toggler");
    const containerCloseBtn = document.querySelector(".close-btn");
    const outerContainer = document.querySelector(".outer-container");

    containerCloseBtn.addEventListener("click", () => outerContainer.classList.remove("show-container"));
    containerToggler.addEventListener("click", () => outerContainer.classList.toggle("show-container"));
});






// <!---------------------- Redirect to Live Chat ----------------------> 

// document.addEventListener("DOMContentLoaded", function() {
//     var liveChatHeader = document.getElementById("live-chat-header");
//     liveChatHeader.addEventListener("click", function() {
//         window.location.href = "live-chat.html";
//     });
// });



// const ChatBoxToggler = document.querySelector(".ChatBox-toggler");
// const ChatBoxCloseBtn= document.querySelector(".close-btn");

// ChatBoxCloseBtn.addEventListener("click", () => document.body.classList.remove("show-ChatBox"));
// ChatBoxToggler.addEventListener("click", () => document.body.classList.toggle("show-ChatBox"));

// // <!------------Go Back To The Previous Page------------>

// document.addEventListener("DOMContentLoaded", function() {
//     // Find the back arrow image element
//     var backArrowImg = document.getElementById("back-arrow-img");

//     // Add a click event listener to the back arrow image
//     backArrowImg.addEventListener("click", function() {
//         // Redirect the user to the index.html page
//         window.location.href = "index.html";
//     });
// });







