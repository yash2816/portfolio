<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yash Patel | Portfolio</title>
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
    :root {
    --primary: #ff7a59;
    --secondary: #ffb347;
    --dark: #fff8f2;
    --surface: #ffffff;
    --text-main: #2d3748;
    --text-dim: #718096;
    --gradient: linear-gradient(135deg, #ff7a59, #ffb347);
}

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

         body {
    background: #f8fafc;
    color: var(--text-main);
    line-height: 1.6;
    overflow-x: hidden;
}

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--dark); }
        ::-webkit-scrollbar-thumb { background: var(--surface); border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary); }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 34px;
            font-weight: 700;
            background: var(--gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-menu a {
            color: var(--text-main);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-menu a:hover {
            color: var(--secondary);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 100px 10% 60px;
    background:
    radial-gradient(circle at top right,
    rgba(255,122,89,0.2), transparent),
    radial-gradient(circle at bottom left,
    rgba(255,179,71,0.2), transparent),
    #fff8f2;

        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 50px;
            max-width: 1200px;
        }

        .hero-text h3 {
            color: var(--secondary);
            font-size: 20px;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .hero-text h1 {
            font-size: clamp(40px, 6vw, 70px);
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-text p {
            color: var(--text-dim);
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 500px;
        }

        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .hero-image img {
            width: 380px;
            height: 380px;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            object-fit: cover;
            border: 4px solid var(--primary);
            animation: morph 8s ease-in-out infinite alternate;
            box-shadow: 0 0 50px rgba(99, 102, 241, 0.3);
        }

        @keyframes morph {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            100% { border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%; }
        }

        /* Buttons */
        .btn-group { display: flex; gap: 15px; }
        
        .btn {
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.4);
        }

        .btn-outline {
    border: 2px solid var(--primary);
    color: var(--primary);
}

.btn-outline:hover {
    background: var(--gradient);
    color: white;
}   
         

        /* Sections General */
        section { padding: 100px 10%; }
        
        .section-title {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--gradient);
            margin: 10px auto;
            border-radius: 2px;
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            background: #eef2ff;
            padding: 50px 10%;
        }

        .stat-card {
            text-align: center;
            padding: 20px;
        }

        .stat-card h2 {
            font-size: 40px;
            background: var(--gradient);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Project Cards */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .project-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.4s;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .project-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
        }

        .project-img {
            width: 100%;
            height: 200px;
            background: #2d3748;
            object-fit: cover;
        }

        .project-info { padding: 25px; }
        .project-info h3 { margin-bottom: 10px; color: var(--secondary); }
        .project-info p { color: var(--text-dim); font-size: 14px; margin-bottom: 20px; }

        /* Skills Card */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .skill-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.05);
            transition: 0.3s;
             box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

        .skill-card i {
            font-size: 40px;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .skill-card:hover {
            background: var(--surface);
            border-color: var(--secondary);
        }

        /* Experience Section */
        .experience-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .experience-card {
            background: var(--surface);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
            transition: 0.3s;
        }

        .experience-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .exp-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .exp-header h3 {
            color: var(--text-main);
            font-size: 22px;
        }

        .exp-date {
            background: var(--gradient);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .company-name {
            color: var(--secondary);
            font-size: 16px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .exp-details {
            color: var(--text-dim);
        }

        .exp-details li {
            margin-bottom: 8px;
            position: relative;
            padding-left: 20px;
            list-style-type: none;
        }

        .exp-details li::before {
            content: '▹';
            position: absolute;
            left: 0;
            color: var(--primary);
            font-weight: bold;
            font-size: 18px;
        }
        /* Contact Section */
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 50px;
            background: var(--surface);
            padding: 40px;
            border-radius: 20px;
             background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .contact-form input,
.contact-form textarea {
    background: #f8fafc;
    color: #1e293b;
    border: 1px solid #dbeafe;
}

        .contact-form input:focus { border-color: var(--secondary); }

        /* Footer */
        footer {
    background: white;
    border-top: 1px solid #e2e8f0;
    color: #64748b;
}

        /* Responsive */
        @media (max-width: 900px) {
            .hero-content { grid-template-columns: 1fr; text-align: center; }
            .hero-text p { margin: 0 auto 30px; }
            .hero-image img { width: 280px; height: 280px; }
            .contact-container { grid-template-columns: 1fr; }
            .nav-menu { display: none; } /* Add a burger menu JS in real use */
        }
        .social-links{
    margin-top:20px;
}

.social-links a{
    font-size:24px;
    margin-right:15px;
    color:var(--primary);
    transition:.3s;
}

.social-links a:hover{
    color:var(--secondary);
    transform:translateY(-3px);
}
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">YP.Dev</div>
        <div class="nav-menu">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#experience"> Experience</a>
            <a href="#projects">Projects</a>
            <a href="#skills">Skills</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>

    <section class="hero" id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h3>WEB DEVELOPER</h3>
                <h1>Hi, I'm <span style="color: var(--secondary)">Yash Patel</span></h1>
                <p>Crafting high-performance, beautiful websites and mobile experiences with modern technologies.</p>
                <div class="btn-group">
                    <div class="social-links">
                        <a href="https://github.com/yash2816" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="https://www.instagram.com/in/its_me.yash028" target="open"><i class="fab fa-instagram"></i></a>
                    </div>
                    <a href="#contact" class="btn btn-primary">Hire Me</a>
                    <a href="Yash Patel (Resume).pdf" class="btn btn-outline" style="color:black;">Download CV</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="images/y1.jpg" alt="Yash Patel">
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stat-card">
            <h2>4+</h2>
            <p>Projects</p>
        </div>
        <div class="stat-card">
            <h2>1</h2>
            <p>Internships</p>
        </div>
        <div class="stat-card">
            <h2>5+</h2>
            <p>Tools Mastered</p>
        </div>
    </section>

    <section id="about">
        <h2 class="section-title">About Me</h2>
        <div style="max-width: 800px; margin: 0 auto; text-align: center; color: var(--text-dim);">
            <p>I am a passionate <strong>Frontend Developer</strong> based in India. I specialize in building digital experiences that merge functionality with aesthetic design. With a background in PHP and Flutter, I bridge the gap between complex backend logic and intuitive user interfaces.</p>
        </div>
    </section>

    <section id="experience">
        <h2 class="section-title">Experience</h2>
        <div class="experience-container">
            
            <!-- Internship 2 (Most Recent) -->
            <div class="experience-card">
                <div class="exp-header">
                    <h3>Web Developer Intern</h3>
                    <span class="exp-date">Jan 2026 - Present</span>
                </div>
                <h4 class="company-name">Company Name / Tech Agency</h4>
                <ul class="exp-details">
                    <li>Developed and maintained responsive web applications using HTML, CSS, and JavaScript.</li>
                    <li>Collaborated with the design team to implement UI/UX improvements, increasing user engagement.</li>
                    <li>Optimized database queries, improving application load time and performance.</li>
                </ul>
            </div>

            <!-- Internship 1 (Older) -->
            <div class="experience-card">
                <div class="exp-header">
                    <h3>Mobile / Frontend Developer Intern</h3>
                    <span class="exp-date">Jun 2025 - Dec 2025</span>
                </div>
                <h4 class="company-name">Another Tech Company</h4>
                <ul class="exp-details">
                    <li>Built interactive frontend features using HTML5, CSS3, and modern JavaScript frameworks.</li>
                    <li>Assisted in the development of cross-platform mobile applications using Flutter and Dart.</li>
                    <li>Participated in daily stand-ups and code reviews to ensure code quality and maintainability.</li>
                </ul>
            </div>

        </div>
    </section>

    <section id="projects">
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project-card">
                <div class="project-info">
                    <h3>Hospital Management</h3>
                    <p>A full-stack PHP/MySQL solution for healthcare automation, featuring appointment booking and patient records.</p>
                    <a href="Hospital Management/Login.php" class="btn btn-outline" style="padding: 8px 20px; font-size: 12px; color:black;">View Case Study</a>
                </div>
            </div>
            <!-- Project 2 -->
            <div class="project-card">
                <div class="project-info">
                    <h3>WearNest E-Comm</h3>
                    <p>A modern fashion store UI built with advanced CSS and JS animations for a premium shopping experience.</p>
                    <a href="WearNest/WearNest.php" class="btn btn-outline" style="padding: 8px 20px; font-size: 12px; color:black;">View Case Study</a>
                </div>
            </div>
            <!-- Project 3 -->
            <div class="project-card">
                <div class="project-info">
                    <h3>Society Secretary App</h3>
                    <p>A Flutter-based mobile application for managing housing society workflows and communication.</p>
                    <a href="Societymanager/login page.html" class="btn btn-outline" style="padding: 8px 20px; font-size: 12px; color:black;">View Case Study</a>
                </div>
            </div>

            <!-- Project 4 -->
            <div class="project-card">
                <div class="project-info">
                    <h3>Vamanya Jewellery</h3>
                    <p>A Flutter-based mobile application for the Jewellery Store to take there Store Online by which there name will grow more.</p>
                    <a href="vamanya/customer_login.php" class="btn btn-outline" style="padding: 8px 20px; font-size: 12px; color:black;">View Case Study</a>
                </div>
            </div>

            <!-- Project 5 -->
            <div class="project-card">
                <div class="project-info">
                    <h3>Residential Website</h3>
                    <p>A website in which Society resident can see there profile, maintanence, any society notice and many more.</p>
                    <a href="Resident/Login.html" class="btn btn-outline" style="padding: 8px 20px; font-size: 12px; color:black;">View Case Study</a>
                </div>
            </div>
        </div>
    </section>

    <section id="skills">
        <h2 class="section-title">My Skills</h2>
        <div class="skills-grid">
            <div class="skill-card">
                <i class="fab fa-html5"></i>
                <h3>Frontend</h3>
                <p>HTML5, CSS3, JS, React Basics</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-database"></i>
                <h3>Backend</h3>
                <p>PHP, MySQL, Firebase</p>
            </div>
            <div class="skill-card">
                <i class="fas fa-mobile-alt"></i>
                <h3>Mobile</h3>
                <p>Flutter, Dart, UI/UX Design</p>
            </div>
        </div>
    </section>

    <section id="contact">
        <h2 class="section-title">Let's Connect</h2>
        <div class="contact-container">
            <div class="contact-info">
                <h3>Contact Info</h3>
                <p><i class="fas fa-envelope" style="color:var(--secondary)"></i> yashpatel859635@gmail.com</p>
                <p><i class="fas fa-phone" style="color:var(--secondary)"></i> +91 9427836272</p>
                <p><i class="fas fa-map-marker-alt" style="color:var(--secondary)"></i> Surat, Gujarat, India</p>
            </div>
            <div class="contact-form">
                <form action="https://api.web3forms.com/submit" method="POST">
                    
                    <input type="hidden" name="access_key" value="f86a58ff-18d4-4bd9-8797-f3d862792605">
                    
                    <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 Yash Patel. Designed with <span style="color: #e25555;">&#9829;</span></p>
        
    </footer>

</body>
</html>