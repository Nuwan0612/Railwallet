<script>
  // Check if the status is set in $data and is equal to 0
  <?php if (isset($data['status']) && $data['status'] === '0') { ?>
    // Get the status value from PHP and store it in a JavaScript variable
    var status = "<?php echo $data['status']; ?>";

    // Display a flash message using JavaScript
    // You can use any method you prefer for showing the message, such as alert, a modal, or a toast message library
    alert(status); // This is just a basic example using alert

    // Clear the status to prevent showing it again on page refresh
    <?php unset($data['status']); ?>
    
    // Redirect to the home page after clicking "OK"
    window.location.href = "<?php echo URLROOT; ?>"; // Change this URL to your home page URL
  <?php } else { ?>
    // Code to execute when the status is not 0
    // For example, you can put other JavaScript code here
    console.log("Status is not 0");
  <?php } ?>
</script>


</body>
</html>