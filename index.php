<?php
include 'includes/init.php';

include 'includes/navbar.php';
?>

<div class="home">
   <!-- Hero Section -->
   <section class="hero">
        <div class="hero-content">
            <h1>Streamline Your School Administration</h1>
            <p>Comprehensive Solutions for Managing Your School Effectively</p>
            <a href="register.php" class="btn">Get Started</a>
            <a href="#features" class="btn">Learn More</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <h2>Features</h2>
        <div class="feature-list">
            <div class="feature-item">
                <img src="path/to/icon1.png" alt="User Management">
                <h3>User Management</h3>
                <p>Manage students, teachers, and parents efficiently.</p>
            </div>
            <div class="feature-item">
                <img src="path/to/icon2.png" alt="Class Management">
                <h3>Class Management</h3>
                <p>Organize classes and schedules with ease.</p>
            </div>
            <div class="feature-item">
                <img src="path/to/icon3.png" alt="Timetable Management">
                <h3>Timetable Management</h3>
                <p>Create and manage timetables seamlessly.</p>
            </div>
            <div class="feature-item">
                <img src="path/to/icon4.png" alt="Exam Management">
                <h3>Exam Management</h3>
                <p>Conduct exams and manage results effectively.</p>
            </div>
            <div class="feature-item">
                <img src="path/to/icon5.png" alt="Attendance Tracking">
                <h3>Attendance Tracking</h3>
                <p>Monitor attendance with ease and accuracy.</p>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about">
        <h2>About Us</h2>
        <p>Our school management system provides comprehensive solutions for managing all aspects of school administration, from student records to timetable management and beyond.</p>
        <p>Mission: To streamline school administration and enhance educational experiences.</p>
        <p>Vision: To be the leading school management solution globally.</p>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>What Our Users Say</h2>
        <div class="testimonial-item">
            <p>"This system has revolutionized the way we manage our school. Highly recommended!"</p>
            <p>- School Administrator</p>
        </div>
        <div class="testimonial-item">
            <p>"Managing classes and timetables has never been easier. Great tool!"</p>
            <p>- Teacher</p>
        </div>
        <div class="testimonial-item">
            <p>"The system is user-friendly and makes tracking my child's progress simple."</p>
            <p>- Parent</p>
        </div>
        <div class="testimonial-item">
            <p>"I love how I can access all my class information in one place. Very convenient!"</p>
            <p>- Student</p>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <form action="contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="btn">Send Message</button>
        </form>
        <div class="contact-info">
            <p>Address: 123 School Lane, City, Country</p>
            <p>Phone: +123 456 7890</p>
            <p>Email: info@schoolmanagementsystem.com</p>
            <div class="social-media">
                <a href="https://facebook.com"><img src="path/to/facebook-icon.png" alt="Facebook"></a>
                <a href="https://twitter.com"><img src="path/to/twitter-icon.png" alt="Twitter"></a>
                <a href="https://linkedin.com"><img src="path/to/linkedin-icon.png" alt="LinkedIn"></a>
                <a href="https://instagram.com"><img src="path/to/instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </section>
</div>
<?php include './includes/footer.php';?>
