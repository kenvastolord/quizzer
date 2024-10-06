<?php
require_once './database.php';

$sql = 'SELECT COUNT(*) AS total_questions FROM questions';
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_questions = $result['total_questions'];

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
          <li><strong>Number of Questions: </strong> <?php echo $total_questions ?></li>
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
