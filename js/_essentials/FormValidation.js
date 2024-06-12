export function initFormValidation() {
  const form = document.querySelector("form");
  if (form) {
      document.body.classList.add("form");
      let required = form.querySelectorAll("[required]");
      const submitBtn = form.querySelector("input[type=submit");
      const phone = form.querySelector("input[type=tel]");
      const callback = form.querySelector("input[name=callback]");

      submitBtn.addEventListener("click", function (noSubmit) {
          if (callback.checked) {
              phone.setAttribute("required", "");
          } else {
              phone.removeAttribute("required");
              phone.classList.remove("error");
          }
          required = form.querySelectorAll("[required]");
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
}
