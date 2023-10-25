document.getElementById("menu2").addEventListener("click", function () {
    document.querySelector(".sidebar").style.display = "block";
    document.querySelector(".sidebar").style.height = "100%";
    document.querySelector(".sidebar").style.width = "250px";
    document.querySelector(".sidebar").style.position = "fixed";
    document.querySelector(".sidebar").style.left = 0;
    document.querySelector(".sidebar").style.top = 0;
    document.querySelector(".sidebar").style.zIndex = 999;
});

function add_click() {
    document.getElementById("detail").style.display = "none";
    document.getElementById("pswd_section").style.display = "block";
}
