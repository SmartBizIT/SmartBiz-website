<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        $to = "smartbizitsolutions@outlook.com"; // Your Email
        $subject = "New Contact Form Submission from " . $name;
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $body = "You have received a new message from your website contact form.\n\n";
        $body .= "Name: " . $name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Message:\n" . $message . "\n";

        if (mail($to, $subject, $body, $headers)) {
            header("Location: thank-you.php"); // Redirect after successful submission
            exit;
        } else {
            $error = "Failed to send email. Please try again.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartBiz | IT Solutions | Canada</title>
  <link rel="icon" href="logo_nobg2.png" type="image/x-icon">
  <link rel="stylesheet" href="styles.css">
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
</head>
<body>

  <header>
    <div class="container">
      <div class="logo">
        <img src="logo_nobg.png" alt="SmartBiz IT Solutions Logo">
      </div>
      <nav>
        <ul class="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section id="home" class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <h2><span id="typed-output"></span> with IT Solutions</h2>
      <p>Innovative Data & AI-driven Solutions for Your Success.</p>
      <a href="#services" class="cta-btn">Explore Services</a>
    </div>
  </section>

  <section id="about" class="about-section">
    <div class="container about-container">
      <div class="about-text">
        <h2>About SmartBiz IT Solutions</h2>
        <p>
          At <strong>SmartBiz IT Solutions</strong>, our mission is to empower small and medium-sized businesses (SMBs) with cutting-edge data science and business intelligence solutions that drive smarter decision-making, operational efficiency, and sustainable growth.
        </p>
        <p>
          We understand that every business is unique, which is why we offer tailored data-driven solutions designed to address your specific challenges and unlock new opportunities across industries such as healthcare, education, retail, tourism, and manufacturing.
        </p>
        <ul>
          <li><strong>Data Analysis & Reporting Dashboards:</strong> Transform raw data into meaningful insights with interactive, easy-to-understand dashboards.</li>
          <li><strong>Predictive Analytics:</strong> Forecast sales trends, manage inventory efficiently, and stay ahead of market shifts with advanced predictive models.</li>
          <li><strong>Customer Behavior Analysis:</strong> Gain a deeper understanding of your customers to enhance engagement, retention, and satisfaction.</li>
          <li><strong>Business Process Optimization:</strong> Identify inefficiencies and streamline operations to improve productivity and reduce costs.</li>
          <li><strong>Automation of Repetitive Tasks:</strong> Leverage data tools to automate routine tasks, freeing up your team to focus on what matters most.</li>
        </ul>
        <p>
          At SmartBiz IT Solutions, we don’t just provide technology—we deliver actionable insights that help your business thrive in a data-driven world.
        </p>
      </div>
      <div class="about-logo">
        <img src="logo_nobg.png" alt="SmartBiz IT Solutions Logo">
      </div>
    </div>
  </section>

  <section id="services" class="services-section">
    <div class="container">
      <h2>Our Services</h2>
      <div class="services-container">
        <div class="service-card">
          <h3>Data Analytics & Visualization</h3>
          <p>Transform raw data into valuable insights with interactive dashboards and reports.</p>
        </div>
        <div class="service-card">
          <h3>Custom Business Intelligence</h3>
          <p>Develop tailored BI solutions to optimize decision-making and business performance.</p>
        </div>
        <div class="service-card">
          <h3>Machine Learning Models</h3>
          <p>Implement AI-driven predictive analytics and automation for smarter business strategies.</p>
        </div>
        <div class="service-card">
          <h3>Data Cleaning & Integration</h3>
          <p>Ensure your data is accurate, reliable, and seamlessly integrated across platforms.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="contact-section">
    <div class="container">
      <h2>Contact Us</h2>

      <?php if (!empty($error)) : ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="cta-btn">Send Message</button>
      </form>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2025 SmartBiz IT Solutions. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="scripts.js"></script>

</body>
</html>
