// Form validation
function validateForm() {
  var name = document.forms["registrationForm"]["name"].value;
  var email = document.forms["registrationForm"]["email"].value;
  var phone = document.forms["registrationForm"]["phone"].value;
  var gender = document.forms["registrationForm"]["gender"].value;
  var address = document.forms["registrationForm"]["address"].value;
  var country = document.forms["registrationForm"]["country"].value;
  var errors = "";

  if (name == "") {
    errors += "Name is required.\n";
  }
  if (email == "") {
    errors += "Email is required.\n";
  } else {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      errors += "Invalid email format.\n";
    }
  }
  if (phone == "") {
    errors += "Phone number is required.\n";
  }
  if (gender == "") {
    errors += "Gender is required.\n";
  }
  if (address == "") {
    errors += "Address is required.\n";
  }
  if (country == "") {
    errors += "Country is required.\n";
  }

  if (errors != "") {
    alert(errors);
    return false;
  } else {
    return true;
  }
}

// Scroll to top button
var scrollToTopBtn = document.querySelector(".scroll-to-top-btn");
window.addEventListener("scroll", function () {
  if (window.pageYOffset > 300) {
    scrollToTopBtn.classList.add("show-scroll-btn");
  } else {
    scrollToTopBtn.classList.remove("show-scroll-btn");
  }
});

// Smooth scroll to top on button click
scrollToTopBtn.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
});
