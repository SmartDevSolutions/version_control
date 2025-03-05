console.log("✅ scriptFront.js is LOADED!");

document.addEventListener("DOMContentLoaded", function () {
    const navMenu = document.querySelector(".nav-menu");
    const menuToggle = document.querySelector(".menu-toggle");

    // Toggle navigation menu
    menuToggle.addEventListener("click", function (e) {
        e.preventDefault();
        navMenu.classList.toggle("active");
    });

    const gridItems = document.querySelectorAll(".grid-item");
    const expandedView = document.getElementById("expandedView");
    const expandedTitle = document.getElementById("expandedTitle");
    const closeBtn = document.querySelector(".close-btn");

    // Show expanded view on grid item click
    gridItems.forEach((item) => {
        item.addEventListener("click", function () {
            const appName = this.querySelector("span").textContent;
            expandedTitle.textContent = appName;
            expandedView.style.display = "flex";
            document.body.style.overflow = "hidden";
        });
    });

    // Close expanded view
    closeBtn.addEventListener("click", function () {
        expandedView.style.display = "none";
        document.body.style.overflow = "auto";
    });

    expandedView.addEventListener("click", function (e) {
        if (e.target === expandedView) {
            expandedView.style.display = "none";
            document.body.style.overflow = "auto";
        }
    });
});
