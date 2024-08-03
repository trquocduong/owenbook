document.getElementById("openMenu").addEventListener("click", function () {
    document.getElementById("sideMenu").classList.add("show");
});

document.getElementById("closeMenu").addEventListener("click", function () {
    document.getElementById("sideMenu").classList.remove("show");
});
document.querySelectorAll(".cursor-pointer").forEach(function (img) {
    img.addEventListener("click", function () {
        document.getElementById("mainImage").src = this.src;
    });
});
