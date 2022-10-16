
document.addEventListener("DOMContentLoaded", () => {
  //links mobileslist
  const allTr = document.querySelectorAll("tr");
  
  allTr.forEach(tr => { 
    tr.addEventListener("click", () => {
    const urlMobile = tr.querySelector("a").href;
    window.location=urlMobile;
    })
  });


  //links inputs rating
  const btnInputs = document.getElementById("rating-form").querySelectorAll("input"); 
  
  btnInputs.forEach(input => {
    input.addEventListener("click", () => {
      
      fetch("/mobile", {
        method:"POST",
        headers:{
          "Content-Type":"application/json" 
          //"Content-Type":"application/x-www-form-urlencoded" 
        },
        body: "user_rating="+input.dataset.urating

      })
      .then(response => response.json())
      .then(result => console.log(result));
    });    
  });  


});
