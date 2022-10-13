//links mobileslist
document.addEventListener("DOMContentLoaded", () => {
  const allTr = document.querySelectorAll("tr");

  allTr.forEach((tr) => {
    tr.addEventListener("click", () => {
      const mobile_id = tr.dataset.mob_id;
      const urlMobile = document.getElementById(mobile_id).getAttribute("href");

      window.location.href = urlMobile;
    });
  });
});
