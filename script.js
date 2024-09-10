const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
});


document.addEventListener('DOMContentLoaded', function () {
    
    const slideElements = document.querySelectorAll('.slide-in');

    const slideInOnScroll = () => {
        slideElements.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom >= 0) {
                element.classList.add('visible');
            }
        });
    };

    window.addEventListener('scroll', slideInOnScroll);
    slideInOnScroll(); // Run on page load
});
