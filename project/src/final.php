<?php
session_start();

$final_score = $_SESSION['score'];
$_SESSION['score'] = 0;
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
        <h2>You're Done! </h2>
        <p>Congrats! You have complete the test</p>
        <ul>
          <li>Final Score: <?php echo $final_score; ?></li>
        </ul>
        <a href="question.php?n=1" class="quiz-submit" aria-label="Take Again Quiz"> Take Again</a>
        <a href="index.php" class="quiz-submit" aria-label="Home"> Go Back Home</a>
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
