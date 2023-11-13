$(document).ready(function () {
    // Get the theme switch checkbox and body element
    const themeSwitch = document.getElementById('themeSwitch');
    const body = document.body;

    // Add an event listener to the theme switch
    themeSwitch.addEventListener('change', () => {
        // Toggle dark mode class on the body
        body.classList.toggle('dark-mode', themeSwitch.checked);

        // Save the user's preference to localStorage
        localStorage.setItem('theme', themeSwitch.checked ? 'dark' : 'light');
    });

    // Check the user's preference from localStorage (if available)
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        themeSwitch.checked = true;
    } else {
        body.classList.remove('dark-mode');
        themeSwitch.checked = false;
    }
});
