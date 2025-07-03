<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FLAVOURQUEUE</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* Reset and General Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to bottom, #FFBF00, #FFD966);
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }

    .main-content {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
    }

    .header {
      background-color: #FFBF00;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-bottom: 40px;
      font-size: 36px;
      font-weight: bold;
      position: relative;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .header a {
      color: white;
      text-decoration: none;
      font-size: 50px;
      position: absolute;
      left: 20px;
      top: 10px;
    }

    .header a:hover {
      color: #FFD966;
    }

    .content-section {
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 1px solid #FFBF00;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .content-section:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .content-section h2 {
      color: #FFBF00;
      font-size: 24px;
      margin-bottom: 15px;
    }

    .dropdown-btn {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #FFBF00;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .dropdown-btn:hover {
      background-color: #FFD966;
      transform: scale(1.05);
    }

    .summary-content {
      display: none;
      margin-top: 20px;
      padding: 15px;
      background-color: #FFF4CC;
      border-radius: 5px;
      font-size: 16px;
      color: #555;
      line-height: 1.6;
    }

    .faq-question {
      font-size: 18px;
      margin: 10px 0;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #FFBF00;
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .faq-question:hover {
      background-color: #FFD966;
    }

    .faq-answer {
      display: none;
      font-size: 16px;
      margin-top: 10px;
      color: #555;
      padding: 10px;
      background-color: #FFF4CC;
      border-radius: 5px;
    }

    .plus-minus {
      font-size: 20px;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      padding: 15px 0;
      background-color: #FFBF00;
      color: white;
      position: fixed;
      width: 100%;
      bottom: 0;
      font-size: 16px;
      box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }

    .footer a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      margin: 0 10px;
      transition: color 0.3s ease;
    }

    .footer a:hover {
      color: #FFD966;
    }
  </style>
</head>
<body>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <a href="/">&times;</a> <!-- Close button -->
      FLAVOURQUEUE
    </div>

    <!-- About Us Section -->
    <div class="content-section">
      <h2>About Us</h2>
      <button class="dropdown-btn" id="learnMoreAboutUsBtn">Learn More</button>
      <div class="summary-content" id="aboutUsSummary">
        FLAVOURQUEUE is a pioneering food brand dedicated to redefining the dining experience. We offer a wide variety of flavors designed to cater to every palate, from adventurous foodies to those seeking comfort food. Our commitment is to provide high-quality, locally-sourced ingredients to ensure a fresh and sustainable dining experience.
        <br><br>
        Established with the goal of making dining a memorable event, FLAVOURQUEUE focuses on delivering not just meals but experiences. Each dish is crafted with love, inspired by global flavors, and presented in a way that celebrates the joy of eating. We believe food is more than just nourishment; it's an art that brings people together.
        <br><br>
        Our restaurants are designed to be welcoming and comfortable, a place where you can relax and enjoy your meal. Whether you're here for a quick bite or to spend time with loved ones, FLAVOURQUEUE is committed to providing excellent service and delicious food in a vibrant atmosphere.
        <br><br>
        Sustainability is at the heart of everything we do. From sourcing organic ingredients to reducing food waste, we are dedicated to making a positive impact on the environment. FLAVOURQUEUE is not just about food; it’s about creating a better future for our community and the planet.
      </div>
    </div>

    <!-- Contact Us Section -->
    <div class="content-section">
      <h2>Contact Us</h2>
      <button class="dropdown-btn" id="learnMoreContactUsBtn">Get in Touch</button>
      <div class="summary-content" id="contactUsSummary">
        You can reach FLAVOURQUEUE through the following methods:
        <br><br>
        Email: support@flavourqueue.com
        <br>
        Phone: (123) 456-7890
        <br><br>
        Our physical locations are listed on the "Store Locator" page of our website, where you can find our nearest restaurant.
        <br><br>
        We also encourage feedback from our customers to continually improve our services. Feel free to contact us with any questions, concerns, or suggestions.
      </div>
    </div>

    <!-- FAQs Section -->
    <div class="content-section">
      <h2>FAQs</h2>
      <div class="faq-question" id="faq1">
        What makes FLAVOURQUEUE's menu unique?
        <span class="plus-minus">+</span>
      </div>
      <div class="faq-answer" id="answer1">
        We offer a unique blend of global flavors with locally-sourced, high-quality ingredients.
      </div>

      <div class="faq-question" id="faq2">
        How does FLAVOURQUEUE ensure food quality and safety?
        <span class="plus-minus">+</span>
      </div>
      <div class="faq-answer" id="answer2">
        We follow strict food safety guidelines and source only trusted, high-quality ingredients.
      </div>

      <div class="faq-question" id="faq3">
        Does FLAVOURQUEUE offer any vegetarian, vegan, or gluten-free options?
        <span class="plus-minus">+</span>
      </div>
      <div class="faq-answer" id="answer3">
        Yes, we offer a variety of vegetarian, vegan, and gluten-free dishes to accommodate dietary needs.
      </div>

      <div class="faq-question" id="faq4">
        How do I place an order for delivery or takeout from FLAVOURQUEUE?
        <span class="plus-minus">+</span>
      </div>
      <div class="faq-answer" id="answer4">
        You can place an order through our website or app for delivery or pick-up at your convenience.
      </div>

      <div class="faq-question" id="faq5">
        What steps is FLAVOURQUEUE taking to promote sustainability?
        <span class="plus-minus">+</span>
      </div>
      <div class="faq-answer" id="answer5">
        We use eco-friendly packaging, reduce food waste, and source ingredients sustainably.
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('menu') }}">Menu</a>
    <p>&copy; 2025 FLAVOURQUEUE</p>
  </div>

  <script>
    // Learn More button functionality for About Us and Contact Us
    const learnMoreAboutUsBtn = document.getElementById('learnMoreAboutUsBtn');
    const aboutUsSummary = document.getElementById('aboutUsSummary');

    learnMoreAboutUsBtn.addEventListener('click', function() {
      aboutUsSummary.style.display = aboutUsSummary.style.display === 'block' ? 'none' : 'block';
    });

    const learnMoreContactUsBtn = document.getElementById('learnMoreContactUsBtn');
    const contactUsSummary = document.getElementById('contactUsSummary');

    learnMoreContactUsBtn.addEventListener('click', function() {
      contactUsSummary.style.display = contactUsSummary.style.display === 'block' ? 'none' : 'block';
    });

    // Toggle FAQ answer visibility on click
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach((question, index) => {
      question.addEventListener('click', function() {
        const answer = document.getElementById(`answer${index + 1}`);
        const plusMinus = question.querySelector('.plus-minus');

        // Toggle answer display
        if (answer.style.display === 'none' || answer.style.display === '') {
          answer.style.display = 'block';
          plusMinus.textContent = '-'; // Change + to -
        } else {
          answer.style.display = 'none';
          plusMinus.textContent = '+'; // Change - to +
        }
      });
    });
  </script>

</body>
</html>
