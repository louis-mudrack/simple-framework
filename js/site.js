// Dynamic navi

const nav = document.querySelector("ul.navi");
const mobileNav = document.querySelector(".mobile-nav ul");
const footerNav = document.querySelector("footer ul");

// Get Content of the site.contents.json
fetch("misc/navi.json")
    .then((response) => response.json())
    .then((data) => {
        // Loop through the content and create the list items
        data.forEach((item) => {
            if (item.navExclude != true) {
                const li = document.createElement("li");
                const a = document.createElement("a");
                a.href = item.url;
                a.title = item.title;
                a.alt = item.title;
                a.textContent = `${item.name}`;
                if (item.external) {
                    a.setAttribute("target", "_blank");
                }
                if (item.class) {
                    const classes = item.class.split(" ");
                    classes.forEach((className) => {
                        a.classList.add(className);
                    });
                }
                li.appendChild(a);
                li.classList.add(item.name.replace(/\s+/g, "-"));
                nav.appendChild(li);
                const mobileLi = li.cloneNode(true);
                mobileNav.appendChild(mobileLi);

                // Check if current page pathname is same as item url, then add active class
                if (window.location.pathname === item.url) {
                    a.classList.add("active");
                }
                // delete the active class from other links
                a.addEventListener("click", () => {
                    const links = document.querySelectorAll("ul.navi li a");
                    links.forEach((link) => {
                        link.classList.remove("active");
                    });
                    a.classList.add("active");
                });
            } else if (item.footerNav) {
                const li = document.createElement("li");
                const a = document.createElement("a");
                a.href = item.url;
                a.title = item.title;
                a.alt = item.title;
                a.textContent = `${item.name}`;
                if (item.external) {
                  a.setAttribute("target", "_blank");
                }
                li.appendChild(a);
                li.classList.add(item.name.replace(/\s+/g, "-"));
                footerNav.appendChild(li);
            }
            if (
                window.location.pathname === item.url &&
                item.noIndex === true
            ) {
                const meta = document.createElement("meta");
                meta.setAttribute("name", "robots");
                meta.setAttribute("content", "noindex");
                document.head.appendChild(meta);
            }
        });
    })
    .catch((error) => console.error(error));

// set body classes from document name
const documentName = document.location.pathname.trim() === "/" ? "index" : document.location.pathname.split("/").filter(Boolean);

if (Array.isArray(documentName)) {
  documentName.forEach((element) => {
    document.body.classList.add(element);
  });
} else {
    document.body.classList.add(documentName);
}

// Back to top btn
let backToTop = document.createElement("span");
backToTop.id = "back-to-top";
backToTop.classList.add("icon-arrow-up2");

// Watch if window is scrolling and where its position is at

window.onscroll = function () {
    if (scrollY > 0) {
        document.body.classList.add("scrolling");
        document.body.classList.remove("at-top");
        document.body.appendChild(backToTop);
    } else {
        document.body.classList.remove("scrolling");
        document.body.classList.add("at-top");
        document.body.removeChild(backToTop);
    }
};

// Give the back-to-top btn a function

backToTop.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

// if form exists on page -> add form class to body

const form = document.querySelector("form");
if (typeof form != "undefined" && form != null) {
    document.body.classList.add("form");
}

// Validate the form
if (document.body.classList.contains("form")) {
    let required = form.querySelectorAll("[required]");
    const submitBtn = form.querySelector("input[type=submit");
    const phone = form.querySelector("input[type=tel]");
    const callback = form.querySelector("input[name=callback]");

    // prevent the form submit

    submitBtn.addEventListener("click", function (noSubmit) {
        // if the callback is checked -> add required to input:tel
        if (callback.checked == true) {
            phone.setAttribute("required", "");
        } else {
            phone.removeAttribute("required", "");
            phone.classList.remove("error");
        }
        required = form.querySelectorAll("[required]");
        // check for not valide inputs
        for (let i = 0; i < required.length; i++) {
            if (!required[i].validity.valid) {
                noSubmit.preventDefault();
                required[i].classList.add("error");
            } else {
                required[i].classList.remove("error");
            }
        }
    });
}
