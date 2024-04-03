console.log("linked");
// document.addEventListener("DOMContentLoaded", function () {
//     if (!document.querySelector(".slider")) {
//         return;
//     }

//     const slides = document.querySelectorAll(".slider .slide");
//     let currentIndex = 0;

//     function showSlide(index) {
//         slides[currentIndex].classList.remove("active");
//         slides[index].classList.add("active");
//         currentIndex = index;
//     }

//     function nextSlide() {
//         const nextIndex = (currentIndex + 1) % slides.length;
//         showSlide(nextIndex);
//     }

//     // Show the first slide
//     showSlide(0);

//     // Change slide every 5 seconds
//     setInterval(nextSlide, 5000);
// });

const menuItems = document.querySelector(".menu-items");
const hamburgerMenuBtn = document.querySelector(".hamburger-menu-btn");

hamburgerMenuBtn.addEventListener("click", function () {
    menuItems.classList.toggle("active");
    hamburgerMenuBtn.classList.toggle("open");
});

let dropdownContents = document.querySelectorAll(".dropdown-content");

// Hide all dropdown contents by default and apply animation classes
dropdownContents.forEach(function (content) {
    content.style.display = "none";
    content.classList.add("dropdown-hide"); // Add initial animation class
});

// Get all dropdown buttons
let dropdownBtns = document.querySelectorAll(".dropbtn");

// Loop through each dropdown button and add click event listener
dropdownBtns.forEach(function (dropdownBtn) {
    // Toggle dropdown visibility when the button is clicked
    dropdownBtn.onclick = function (event) {
        event.preventDefault(); // Prevent default link behavior
        var dropdownContent = dropdownBtn.nextElementSibling;

        // Close all other open dropdowns except for the current one and its parents
        closeAllDropdowns(dropdownBtn);

        // Toggle dropdown content visibility with animation
        toggleDropdownVisibility(dropdownContent);
    };
});

// Function to toggle dropdown content visibility with animation
function toggleDropdownVisibility(dropdownContent) {
    if (dropdownContent.style.display === "block") {
        setTimeout(function () {
            dropdownContent.style.display = "none"; // Remove display property
        }, 50);
        dropdownContent.classList.remove("dropdown-show"); // Remove animation class
        dropdownContent.classList.add("dropdown-hide"); // Add animation class
    } else {
        dropdownContent.style.display = "block";
        dropdownContent.classList.remove("dropdown-hide"); // Remove animation class
        dropdownContent.classList.add("dropdown-show"); // Add animation class
    }
}

// Function to close all dropdowns except the current one and its parents
function closeAllDropdowns(currentBtn) {
    var allDropdownContents = document.querySelectorAll(".dropdown-content");
    allDropdownContents.forEach(function (content) {
        if (
            content.previousElementSibling !== currentBtn &&
            !content.contains(currentBtn)
        ) {
            content.classList.remove("dropdown-show"); // Remove animation class
            content.classList.add("dropdown-hide"); // Add animation class
            content.style.display = "none";
        }
    });
}
console.log(window.screen.width);
if (window.screen.width > 700) {
    // Hide dropdowns when user clicks outside any dropdown button or content
    let timer;

    // Function to close all dropdowns after a delay if the cursor is not on any dropdown
    function closeDropdownsAfterDelay() {
        // Clear the existing timer
        clearTimeout(timer);

        // Start a new timer to close dropdowns after 2 seconds
        timer = setTimeout(function () {
            closeAllDropdownsIfCursorOutside();
        }, 1000); // Adjust the delay (in milliseconds) as needed
    }

    // Function to close all dropdowns if the cursor is outside of any dropdown
    function closeAllDropdownsIfCursorOutside() {
        const isCursorOutsideDropdowns =
            !document.querySelector(".dropbtn:hover") &&
            !document.querySelector(".dropdown-content:hover");
        if (isCursorOutsideDropdowns) {
            closeAllDropdowns(null);
        } else {
            closeDropdownsAfterDelay();
        }
    }

    // Event listener for mousemove event
    document.addEventListener("mousemove", function (event) {
        const isCursorOutsideDropdowns =
            !event.target.matches(".dropbtn") &&
            !event.target.matches(".dropdown-content");
        if (isCursorOutsideDropdowns) {
            closeDropdownsAfterDelay();
        }
    });

    // Event listener for click event
    document.addEventListener("click", function (event) {
        const isClickOutsideDropdowns =
            !event.target.matches(".dropbtn") &&
            !event.target.matches(".dropdown-content");
        if (isClickOutsideDropdowns) {
            closeAllDropdowns(null);
        } else {
            closeDropdownsAfterDelay();
        }
    });
}
var images = [];
var currentIndex = 0;

function openModal(imageSrc, index) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImage");
    modal.style.display = "block";
    modalImg.src = imageSrc;
    currentIndex = index;
    images = document.querySelectorAll(".gallery-image");
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// const observer = new IntersectionObserver((entries) => {
//     entries.forEach((entry) => {
//         if (entry.isIntersecting) {
//             entry.target.classList.add("show");
//         }
//     });
// });

// const hiddenElements = document.querySelectorAll(".hidden");
// hiddenElements.forEach((el) => observer.observe(el));

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.boundingClientRect.top >= 200 && entry.isIntersecting) {
                entry.target.classList.add("show");
                observer.unobserve(entry.target);
            } else {
                entry.target.style.opacity = 1;
            }
        });
    },
    { threshold: [0] }
);

const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((el) => observer.observe(el));

function openPDF(pdfUrl) {
    // Open the PDF file in a new window
    window.open(pdfUrl, "_blank");
}
////
document.getElementById("dropdownIcon").addEventListener("click", function () {
    // Trigger the dropdown when the icon is clicked
    // dropdownBtns.click();
    document.getElementById("dropdownButton").click();
});
