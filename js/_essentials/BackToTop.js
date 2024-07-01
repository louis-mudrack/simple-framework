export function initBackToTopButton() {
    let backToTop = document.createElement("span");
    backToTop.id = "back-to-top";
    backToTop.classList.add("icon-arrow-up2");

    window.onscroll = function () {
        if (scrollY > 0) {
            document.body.classList.add("scrolling");
            document.body.classList.remove("at-top");
            document.body.appendChild(backToTop);
        } else {
            document.body.classList.remove("scrolling");
            document.body.classList.add("at-top");
            if (document.body.contains(backToTop)) {
                document.body.removeChild(backToTop);
            }
        }
    };

    backToTop.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
}
