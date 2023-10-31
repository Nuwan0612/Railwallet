<script>
  var status = "<?php echo $data['status']; ?>"
  if(status == 0){
    alert('Your account has deactivated, Please contact customer support for activate the acoount')
    window.location.href = '<?php echo URLROOT; ?>pages/index';
  }
</script>


</body>
</html>