
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




  const removeBtns = document.querySelectorAll(".remove-btn");

  removeBtns.forEach(button => {
    button.addEventListener("click", () => {
        const tr = button.parentNode.parentNode;
        const removeMob = tr.dataset.toremove;
        console.log(tr);
        console.log(removeMob);

        fetch("/admin/mobile/" + removeMob, {
            "method":"DELETE",
            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },
              
        })
        .then(response => response.json())
        .then(result => {
            tr.remove();
        })
        .catch(err => alert("Erro, deve tentar mais tarde"));

          
          
      });
          
  });

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




const langBtns = document.querySelectorAll("#lang-form input");

  langBtns.forEach(button => {
    button.addEventListener("click", () => {
      fetch("/", {
        method:"POST",
        headers:{
          "Content-Type":"application/json" 
        },
        body: JSON.stringify({"lang" : button.dataset.lang})
      })

      .then(response => response.json())
      .then(result => console.log(result));
    });    

  });

      





