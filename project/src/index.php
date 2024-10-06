<?php
require_once './database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>PHP Quizzer</title>
  <link rel="stylesheet" href="./css/style.css" type="text/css" />
</head>

<body>
  <header>
    <div class="header-container">
      <h1>PHP Quizzer</h1>
    </div>
  </header>
  <main>
    <section class="quiz-info">
      <div class="quiz-container">
        <h2>Test Your PHP Knowledge</h2>
        <p>This is a multiple choice quiz to test your knowledge of PHP</p>
        <ul>
          <li><strong>Number of Questions: </strong>5</li>
          <li><strong>Type: </strong>Multiple Choice</li>
          <li><strong>Estimated Time: </strong>4 Minutes</li>
        </ul>
        <a href="question.php?n=1" class="quiz-submit" aria-label="Start the PHP Quiz">Start Quiz</a>
      </div>
    </section>
  </main>
  <footer class="footer">
    <div class="footer-container">
      Copyright &copy; 2024, PHP Quizzer
    </div>
  </footer>
</body>

</html>
