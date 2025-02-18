
const toggleButton = document.querySelector('.navbar__toggle');
const navbarMenu = document.querySelector('.navbar__menu');

toggleButton.addEventListener('click', () => {
    const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
    toggleButton.setAttribute('aria-expanded', !isExpanded);
    navbarMenu.classList.toggle('active');
});
