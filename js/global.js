
document.addEventListener("DOMContentLoaded", () => {




//# MOBILESLIST

  //MOBILESLIST_links
  const allTr = document.querySelectorAll("#mobilelist tr");
  
  allTr.forEach(tr => { 
    tr.addEventListener("click", () => {
    const urlMobile = tr.querySelector("a").href;
    window.location = urlMobile;
    })
  });




//# MOBILE

  //MOBILE_rating inputs
  const btnInputs = document.querySelectorAll("#rating-form input");
  
  btnInputs.forEach(input => {
    input.addEventListener("click", () => {
      
      fetch("/mobile/" + input.parentNode.dataset.mobid, {
        method:"POST",
        headers:{
          "Content-Type":"application/json" 
        },
        body: JSON.stringify({"user_rating" : input.dataset.urating})
      })

      .then(response => response.json())
      .then(result => {           
        window.location.reload();
        console.log(result)      
      });
    
    });    
  });  


  
  //MOBILE_show comment form
  const commentBtn = document.getElementById("comment-btn");
  const commentForm = document.getElementById("comment-form");

  if(commentBtn) {
      commentBtn.addEventListener("click", () => {      
          commentForm.style.display = "block";        
      });
  }
   

  //MOBILE_hide comment form
  const confirmBtn = document.getElementById("confirm-btn");
  
  if(confirmBtn) {
      confirmBtn.addEventListener("click", () => {
          commentForm.style.display = "none";
      });
  }


  //MOBILE_show reply form
  const replyBtn = document.querySelectorAll(".reply-btn");
  const replyForm = document.querySelectorAll(".reply-form");
  
  if(replyBtn) {
    replyBtn.forEach(button => {
      const btnId = button.dataset.commid;
      button.addEventListener("click", () => {
        replyForm.forEach(reply => { 
          if (btnId == reply.dataset.formrep) {
            reply.style.display = "block";
          }; 
        }); 
      });
    });
  }

  //MOBILE_hide reply form
  const confirmReplyBtn = document.querySelectorAll(".confirmrep-btn");
  
  if(confirmReplyBtn) {
    confirmReplyBtn.forEach(button => {
      button.addEventListener("click", () => {
        replyForm.forEach(form => { 
          form.style.display = "none";
        });
      }); 
    });
  }




//# ADMIN


  //ADMIN_remove mobile btns
  const removeMobBtns = document.querySelectorAll(".remove-mobbtn");

  removeMobBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trMob = button.parentNode.parentNode;
      const removeMob = trMob.dataset.mobremove;
      console.log(trMob);
      console.log(removeMob);

      fetch("/admin/mobiles/" + removeMob, {
          "method":"DELETE",
          headers:{
              "Content-Type":"application/x-www-form-urlencoded"
          },
            
      })
      .then(response => response.json())
      .then(result => {
          console.log(result);
          trMob.remove();
      })
      .catch(err => alert("Erro, deve tentar mais tarde"));
       
    });
          
  });



  //ADMIN_remove comment btns
  const removeComBtns = document.querySelectorAll(".remove-combtn");
  if(removeComBtns) {
  removeComBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trCom = button.parentNode.parentNode;
      const removeCom = trCom.dataset.comremove;
      console.log(trCom);
      console.log(removeCom);

      fetch("/comments/" + removeCom, {
          "method":"DELETE",
          headers:{
              "Content-Type":"application/x-www-form-urlencoded"
          },
            
      })
      .then(response => response.json())
      .then(result => {
          console.log(result);
          trCom.remove();
      })
      .catch(err => alert("Erro, deve tentar mais tarde"));         
           
    });
           
  });
  }



  //ADMIN_remove user btns
  const removeUserBtns = document.querySelectorAll(".remove-usrbtn");

  removeUserBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trUsr = button.parentNode.parentNode;
      const removeUser = trUsr.dataset.usrremove;
      console.log(trUsr);
      console.log(removeUser);

      fetch("/admin/users/" + removeUser, {
          "method":"DELETE",
          headers:{
              "Content-Type":"application/x-www-form-urlencoded"
          },
            
      })
      .then(response => response.json())
      .then(result => {
          console.log(result);
          trUsr.remove();
      })
      .catch(err => alert("Erro, deve tentar mais tarde"));          
           
    });
           
  });












});




      
 



