document.addEventListener("DOMContentLoaded", function () {
  const openMenu = document.getElementById('openMenu');
  const closeMenu = document.getElementById('closeMenu');
  const mobileNav = document.getElementById('mobileNav');

  openMenu.addEventListener('click', () => {
    mobileNav.classList.add('open');
    openMenu.style.display = "none"; // Hide the toggle
  });

  closeMenu.addEventListener('click', () => {
    mobileNav.classList.remove('open');
    openMenu.style.display = "block"; // Show toggle again
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Mobile nav toggle
  const openMenu = document.getElementById("openMenu");
  const closeMenu = document.getElementById("closeMenu");
  const mobileNav = document.getElementById("mobileNav");

  openMenu?.addEventListener("click", () => mobileNav.classList.add("open"));
  closeMenu?.addEventListener("click", () => mobileNav.classList.remove("open"));

  // Observer for tick animation
  const target = document.querySelector(".soon-wrapper");
  if (target) {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          target.classList.add("active");
          observer.unobserve(target);
        }
      },
      { threshold: 0.5 }
    );
    observer.observe(target);
  }

  // Universal Enquiry Modal logic
  const modal = document.getElementById("enquiryModal");
  const closeBtn = modal.querySelector(".close");

  // Target all buttons that should open modal
  const triggerButtons = [
    ...document.querySelectorAll(".enquire-btn"),
    ...document.querySelectorAll(".brochure-btn"),
    ...document.querySelectorAll(".price-btn"),
    ...document.querySelectorAll(".location-enquire-btn"),
    ...document.querySelectorAll(".floorplan-button"),
  ];

  triggerButtons.forEach(button => {
    button.addEventListener("click", function (e) {
      e.preventDefault(); // prevent anchor jumps
      modal.style.display = "flex";
    });
  });

  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });

  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  });
});
