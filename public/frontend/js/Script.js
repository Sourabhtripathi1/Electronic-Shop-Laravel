window.addEventListener("resize", () => {
    const windowWidth = window.innerWidth;

    if (windowWidth >= 992) {
        document.getElementById("sidebar").classList.remove("menuOpen");
        document
            .getElementById("sidebar-container")
            .classList.remove("menuContainerOpen");
    }
});

document.getElementById("menu2").addEventListener("click", function () {
    document.getElementById("sidebar").classList.add("menuOpen");
    document
        .getElementById("sidebar-container")
        .classList.add("menuContainerOpen");

    document
        .getElementById("sidebar-container")
        .addEventListener("click", function (event) {
            const sidebar = document.getElementById("sidebar");

            if (event.target != sidebar) {
                // console.log(event.target)

                document.getElementById("sidebar").classList.remove("menuOpen");
                document
                    .getElementById("sidebar-container")
                    .classList.remove("menuContainerOpen");
            }
        });
});

function add_click() {
    document.getElementById("detail").style.display = "none";
    document.getElementById("pswd_section").style.display = "block";
}
