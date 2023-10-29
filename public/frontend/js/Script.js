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

function cart_form_submit() {
    var qty = document.getElementById("qty").value;

    document.getElementById("qtny").value = qty;
    var form = document.getElementById("cart_form");

    form.submit();
}
$("#terms").change(function () {
    if ($(this).is(":checked")) {
        console.log("x");
        $("#place-order-button").prop("disabled", false);
    } else {
        console.log("y");
        $("#place-order-button").style.display = "none";
        $("#place-order-button").prop("disabled", true);
    }
});
