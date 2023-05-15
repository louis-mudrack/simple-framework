// Give body classes from document name

let documentName = document.location.pathname;

const documentName = document.location.pathname.trim() === '/' ? 'index' : document.location.pathname.split('/').filter(Boolean);

documentName.forEach((element) => {
  document.body.classList.add(element.replace('.php', ''));
});

// Back to top btn
let backToTop = document.createElement("span");
backToTop.id = "back-to-top";
backToTop.classList.add("icon-arrow-up2");

// Watch if window is scrolling and where its position is at

window.onscroll = function() {
  if(scrollY > 0) {
    document.body.classList.add("scrolling");
    document.body.classList.remove("at-top");
    document.body.appendChild(backToTop)
  } else {
    document.body.classList.remove("scrolling");
    document.body.classList.add("at-top");
    document.body.removeChild(backToTop)
  }
};

// Give the back-to-top btn a function

backToTop.addEventListener("click", function() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// if form exists on page -> add form class to body

const form = document.querySelector("form");
if(typeof(form) != "undefined" && form != null) {
  document.body.classList.add("form")
};

// Validate the form
if(document.body.classList.contains("form")) {
  let required = form.querySelectorAll("[required]");
  const submitBtn = form.querySelector("input[type=submit");
  const phone = form.querySelector("input[type=tel]");
  const callback = form.querySelector("input[name=callback]");
  
  // prevent the form submit
  
  submitBtn.addEventListener("click", function(noSubmit) {
    // if the callback is checked -> add required to input:tel
    if (callback.checked == true) {
      phone.setAttribute("required", "")
    } else {
      phone.removeAttribute("required", "");
      phone.classList.remove("error")
    };
    required = form.querySelectorAll("[required]");
    // check for not valide inputs
    for (let i = 0; i < required.length; i++) {
        if(!required[i].validity.valid) {
          noSubmit.preventDefault();
          required[i].classList.add("error")
        } else {
          required[i].classList.remove("error");
        } 
    };
  });
};
