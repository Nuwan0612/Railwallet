</div>
  <script>
    function searchChecker() {
      const searchQuery = document.getElementById('search-checker').value;
      if (searchQuery.trim() === "") {
        return;
      }
      window.location.href = `<?php echo URLROOT; ?>admins/searchChecker/${searchQuery}`;
    }

    function searchSupporter() {
      const searchQuery = document.getElementById('search-supporter').value;
      if (searchQuery.trim() === "") {
        return;
      }
      window.location.href = `<?php echo URLROOT; ?>admins/searchSupporter/${searchQuery}`;
    }

    function searchTrain() {
      const searchQuery = document.getElementById('search-train').value;
      if (searchQuery.trim() === "") {
        return;
      }
      window.location.href = `<?php echo URLROOT; ?>admins/searchTrain/${searchQuery}`;
    }

    function searchUser() {
      const searchQuery = document.getElementById('search-users').value;
      if (searchQuery.trim() === "") {
        return;
      }
      window.location.href = `<?php echo URLROOT; ?>admins/searchUser/${searchQuery}`;
    }
  </script>
</body>
</html>