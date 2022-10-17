
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
  const idMobile = document.getElementById("rating-form");
  
  btnInputs.forEach(input => {
    input.addEventListener("click", () => {
      
      fetch("/mobile/" + idMobile.dataset.mobileid, {
        method:"POST",
        headers:{
          "Content-Type":"application/json" 
          //"Content-Type":"application/x-www-form-urlencoded" 
        },
        body: JSON.stringify({"user_rating" : input.dataset.urating})
        //user_rating="+input.dataset.urating

      })
      .then(response => response.json())
      .then(result => console.log(result));
    });    
  });  


});
