// =====================
// LOGIN / SIGNUP POPUP
// =====================
const popup = document.getElementById("popup");
const formWrapper = document.getElementById("formWrapper");

function openPopup() {
  popup.classList.add("active");
}

function closePopup() {
  popup.classList.remove("active");
  showLogin(); // reset to login by default
}

function showSignup() {
  formWrapper.style.transform = "translateX(-50%)";
}

function showLogin() {
  formWrapper.style.transform = "translateX(0)";
}

// =====================
// MOBILE MENU TOGGLE
// =====================
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
if (mobileMenuBtn) {
  mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
}

// =====================
// ACTIVE NAV LINK ON SCROLL
// =====================
const sections = ['home', 'products', 'about', 'gallery', 'contact', 'careers', 'faq', 'enquiry'];
const navLinks = document.querySelectorAll('nav ul li a, #mobile-menu ul li a');

function setActiveNav() {
  let scrollPos = window.scrollY + 120;
  let current = 'home';
  for (const section of sections) {
    const el = document.getElementById(section);
    if (el && el.offsetTop <= scrollPos) {
      current = section;
    }
  }
  navLinks.forEach(link => {
    link.classList.remove('nav-link-active');
    if (link.getAttribute('href').slice(1) === current) {
      link.classList.add('nav-link-active');
    }
  });
}
window.addEventListener('scroll', setActiveNav);
setActiveNav();

// =====================
// ENQUIRY FORM HANDLING
// =====================
const enquiryForm = document.getElementById('enquiryForm');
const enquirySuccess = document.getElementById('enquirySuccess');

if (enquiryForm) {
  enquiryForm.addEventListener('submit', e => {
    e.preventDefault();
    enquirySuccess.textContent = "Thank you for your enquiry! Our team will get back to you soon.";
    enquirySuccess.classList.remove('hidden');
    enquiryForm.reset();
  });
}

// =====================
// CONTACT FORM HANDLING
// =====================
const contactForm = document.getElementById('contactForm');
const formSuccess = document.getElementById('formSuccess');
const formError = document.getElementById('formError');

if (contactForm) {
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    formSuccess.classList.add('hidden');
    formError.classList.add('hidden');

    const name = contactForm.name.value.trim();
    const email = contactForm.email.value.trim();
    const message = contactForm.message.value.trim();

    if (!name || !email || !message) {
      formError.textContent = 'Please fill in all required fields.';
      formError.classList.remove('hidden');
      return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      formError.textContent = 'Please enter a valid email address.';
      formError.classList.remove('hidden');
      return;
    }

    setTimeout(() => {
      formSuccess.textContent = 'Thank you for contacting D Tex India! We will respond shortly.';
      formSuccess.classList.remove('hidden');
      contactForm.reset();
    }, 1000);
  });
}
