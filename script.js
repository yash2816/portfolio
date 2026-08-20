document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Mobile Navigation Toggle
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        hamburger.firstElementChild.classList.toggle('fa-bars');
        hamburger.firstElementChild.classList.toggle('fa-xmark');
    });

    // Close menu when clicking a link
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            hamburger.firstElementChild.classList.add('fa-bars');
            hamburger.firstElementChild.classList.remove('fa-xmark');
        });
    });

    // 2. Add Background to Navbar on Scroll
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 3. Highlight Active Navigation Link on Scroll
    const sections = document.querySelectorAll('section');

    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            const sectionHeight = section.clientHeight;

            if (pageYOffset >= sectionTop) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    });

    // 4. Contact Form Handler (Prevent Default Refresh)
    const contactForm = document.getElementById('contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('name').value;
            
            // Simple submission feedback
            alert(`Thank you, ${name}! Your message has been sent successfully.`);
            contactForm.reset();
        });
    }
});