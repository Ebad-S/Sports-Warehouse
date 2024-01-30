document.addEventListener("DOMContentLoaded", function () {
  const burger = document.querySelector(".burger-menu");
  const navMenu = document.querySelector(".nav-menu");

  // Function to check if an element is a child of another element
  const isDescendant = (parent, child) => parent.contains(child);

  const closeMenu = () => {
    burger.classList.remove("active");
    navMenu.classList.remove("active");
    document.removeEventListener("click", handleDocumentClick);
  };

  const handleDocumentClick = (event) => {
    if (!isDescendant(navMenu, event.target) && event.target !== burger) {
      closeMenu();
    }
  };

  burger.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent the click event from propagating to document
    burger.classList.toggle("active");
    navMenu.classList.toggle("active");
    if (navMenu.classList.contains("active")) {
      document.addEventListener("click", handleDocumentClick);
    }
  });

  document.querySelectorAll(".nav-link").forEach((n) => {
    n.addEventListener("click", () => {
      closeMenu();
    });
  });
});
