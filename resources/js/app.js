import "./bootstrap";
// Dark mode toggle
const themeToggleButton = document.getElementById("theme-toggle");
const htmlElement = document.documentElement;

function toggleDarkMode() {
    htmlElement.classList.toggle("dark");
    localStorage.setItem("darkMode", htmlElement.classList.contains("dark"));
    updateThemeToggleIcon();
}

function updateThemeToggleIcon() {
    const icon = themeToggleButton.querySelector("i");
    if (htmlElement.classList.contains("dark")) {
        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");
        themeToggleButton.querySelector("span").textContent =
            "Toggle Light Mode";
    } else {
        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");
        themeToggleButton.querySelector("span").textContent =
            "Toggle Dark Mode";
    }
}

// Check for saved theme preference
const savedTheme = localStorage.getItem("darkMode");
if (savedTheme === "true") {
    htmlElement.classList.add("dark");
    updateThemeToggleIcon();
}

themeToggleButton.addEventListener("click", toggleDarkMode);
