
document.addEventListener("DOMContentLoaded", () => {

  //mobileslist links
  const allTr = document.querySelectorAll("#mobilelist tr");
  
  allTr.forEach(tr => { 
    tr.addEventListener("click", () => {
    const urlMobile = tr.querySelector("a").href;
    window.location=urlMobile;
    })
  });



  //rating inputs
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
      .then(result => console.log(result));
    });    
  });  



  //remove mobile btns
  const removeMobBtns = document.querySelectorAll(".remove-mobbtn");

  removeMobBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trMob = button.parentNode.parentNode;
      const removeMob = trMob.dataset.mobremove;
      console.log(trMob);
      console.log(removeMob);

      fetch("/admin/mobile/" + removeMob, {
          "method":"DELETE",
          headers:{
              "Content-Type":"application/x-www-form-urlencoded"
          },
            
      })
      .then(response => response.json())
      .then(result => {
          trMob.remove();
      })
      .catch(err => alert("Erro, deve tentar mais tarde"));

          
          
    });
          
  });



  //remove comment btns
  const removeComBtns = document.querySelectorAll(".remove-combtn");

  removeComBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trCom = button.parentNode.parentNode;
      const removeCom = trCom.dataset.comremove;
      console.log(trCom);
      console.log(removeCom);

      fetch("/admin/mobile/" + removeCom, {
          "method":"DELETE",
          headers:{
              "Content-Type":"application/x-www-form-urlencoded"
          },
            
      })
      .then(response => response.json())
      .then(result => {
          trCom.remove();
      })
      .catch(err => alert("Erro, deve tentar mais tarde"));

          
           
    });
           
  });



  //remove users btns
  const removeUserBtns = document.querySelectorAll(".remove-usrbtn");

  removeUserBtns.forEach(button => {
    button.addEventListener("click", () => {
      const trUsr = button.parentNode.parentNode;
      const removeUser = trUsr.dataset.usrremove;
      console.log(trUsr);
      console.log(removeUser);

      fetch("/admin/mobile/" + removeUser, {
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



  //show comment btn
  const commentBtn = document.getElementById("comment-btn");
  const commentForm = document.getElementById("comment-form");
  
  commentBtn.addEventListener("click", () => {
    if (commentForm.style.display == "none") {
      commentForm.style.display = "block";
    }
  });

  const confirmBtn = document.getElementById("confirm-btn");
  
  confirmBtn.addEventListener("click", () => {
    if (commentForm.style.display == "block") {
      commentForm.style.display = "none";
    }
  });



});



//lang btns
const langBtns = document.querySelectorAll("#lang-form input");

  langBtns.forEach(input => {
    input.addEventListener("click", () => {
      fetch("/", {
        method:"POST",
        headers:{
          "Content-Type":"application/json" 
        },
        body: JSON.stringify({"lang" : input.dataset.lang})
      })

      .then(response => response.json())
      .then(result => console.log(result));
    });    

  });

      





