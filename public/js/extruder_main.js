(function () {
    "use strict";

    /**
     * Animation on scroll
     */
    window.addEventListener("load", () => {
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false,
        });
    });
})();

function fetchData(urlString, idTarget = null) {
    fetch(urlString)
        .then((response) => response.json())
        .then((data) => {
            if (idTarget != null) {
                const txtEle = document.getElementById(idTarget);

                if (txtEle != null) {
                    switch (txtEle.tagName) {
                        case "INPUT":
                            txtEle.value = data;
                            break;

                        default:
                            txtEle.textContent = data;
                            break;
                    }
                } else {
                    idTarget = data;
                }
            }

            console.log(data);
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}
