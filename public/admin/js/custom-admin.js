function addVariant() {
    var var_no = document.querySelector("#var_no");
    var var_value = var_no.value;
    var_no.value = ++var_value;

    const contain = document.getElementById("variantContainer");

    const variant = document.createElement("div");
    variant.classList.add("variants");
    variant.classList.add("bg-white");
    variant.classList.add("mx-1");
    variant.classList.add("my-4");
    variant.classList.add("p-4");

    var close = document.createElement("button");
    close.setAttribute("type", "button");

    close.textContent = "x";
    close.setAttribute("class", "btn btn-primary");
    close.setAttribute("id", "close");

    variant.appendChild(close);

    close.addEventListener("click", function () {
        var var_no = document.querySelector("#var_no");
        var var_value = var_no.value;
        if (var_value > 1) {
            var_no.value = --var_value;
            variant.remove();
        }
    });

    const labels = ["Color", "Stock", "Price", "Picture"];

    labels.forEach((x) => {
        const formGroup = document.createElement("div");
        formGroup.classList.add("form-group");

        const label = document.createElement("label");

        label.textContent = x;

        const input = document.createElement("input");

        if (x == "Picture") {
            input.setAttribute("type", "file");
            input.setAttribute("multiple", "true");
            input.setAttribute("name", `${x}[${var_value}][]`);
        } else {
            input.setAttribute("type", "text");
            input.setAttribute("name", `${x}[]`);
        }

        input.classList.add("form-control");

        formGroup.appendChild(label);
        formGroup.appendChild(input);

        variant.appendChild(formGroup);
    });

    contain.appendChild(variant);
}

function removeVariant() {
    var variant = document.querySelectorAll(".variants");
    var x = variant.length;

    if (x > 1) {
        var var_no = document.querySelector("#var_no");

        var var_value = var_no.value;

        var_no.value = --var_value;
        variant[x - 1].remove();
    }
}
