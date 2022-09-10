function resNav() {
    var x = document.getElementById("topnav");
    if (x.className === "topnav-container") {
      x.className += " responsive";
    } else {
      x.className = "topnav-container";
    }
}