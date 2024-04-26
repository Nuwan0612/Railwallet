setInterval(() => {
  let sender = document.querySelector('.sender').value
  $.ajax({
    type: 'GET',
    url: `http://localhost/railwallet/chats/getMessages/${sender}`,
    success: function (messeges){
    let chatBox = document.querySelector('.chat-box')
    let chatContent = '';

    if(messeges){
      messeges.forEach((ele) => {
        if(ele.sender_id == sender){
          chatContent += `
          <div class="chat outgoing">
            <div class="user-details sup-details">
              <p>${ele.msg}</p>
            </div>
          </div>`
        } else {
          chatContent += `
          <div class="chat incoming">
            <img src="http://localhost/railwallet/pics/userPics/man.png" alt="">
            <div class="user-details sup-details">
              <p>${ele.msg}</p>
            </div>
          </div>`
        }
      })
      chatBox.innerHTML = chatContent
    }

    },
    error: function(xhr, status, error){
      console.log(xhr.responseText)
    }
  })
}, 500)

function sendMessageAgent(){
  let sender = document.querySelector('.sender').value
  let msg = document.querySelector('.input-field').value
  let chatBox = document.querySelector('.chat-box')

  if(!msg){
    return;
  }

  $.ajax({
    type: 'POST',
    url: 'http://localhost/railwallet/chats/ContactWithAgent',
    contentType: 'application/json',
    data: JSON.stringify({
      'sender': sender,
      'msg': msg
    }),
    success: function(response){
      if(response){
        document.querySelector('.input-field').value = '';
      } else {
         chatBox.innerHTML = `
         <div class="chat incoming">
           <img src="http://localhost/railwallet/pics/userPics/man.png" alt="">
           <div class="user-details sup-details">
             <p>Please Wait, We wii contact you with a agent soon</p>
           </div>
         </div>`
      }
    },
    error: function(xhr, status, error){
      console.log(xhr.responseText)
    }
  })

}

function replyToCustomer(){
  let sender = document.querySelector('.sender').value
  let msg = document.querySelector('.input-field').value

  if(!msg){
    return;
  }

  $.ajax({
    type: 'POST',
    url: 'http://localhost/railwallet/chats/ReplyToCustomer',
    contentType: 'application/json',
    data: JSON.stringify({
      'sender': sender,
      'msg': msg
    }),
    success: function(response){
      if(response){
        document.querySelector('.input-field').value = '';
      }  
    },
    error: function(xhr, status, error){
      console.log(xhr.responseText)
    }
  })
}

