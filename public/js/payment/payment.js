function calculateChecksum() {
    const merchantSecret = 'OTkxMjUxNTE0NzE2NTAwOTQ1MTg4MTAyNTg2NDMyNDU3MjcxMDM='; // Replace!
    const merchantSecretHASH = md5(merchantSecret).toUpperCase();
    const stringToHash = 
          document.getElementById('payhere-payment-form').merchant_id.value +
          document.getElementById('payhere-payment-form').order_id.value + 
          document.getElementById('payhere-payment-form').amount.value+
          document.getElementById('payhere-payment-form').currency.value
          // ...add other required fields based on PayHere's instructions

      const hash = md5(stringToHash + merchantSecretHASH).toUpperCase();
      document.getElementById('hashField').value = hash;
    

    
  }