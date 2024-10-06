<?php
require_once './database.php';
$number = (int) $_GET['n'];

/* get questions */
$sql = 'SELECT * FROM questions WHERE question_number = :number';
$stmt = $connection->prepare($sql);
$stmt->bindParam(':number', $number, PDO::PARAM_INT);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC);

/* get Answers */

$sql = 'SELECT * FROM choices WHERE question_number = :number';
$stmt = $connection->prepare($sql);
$stmt->bindParam(':number', $number, PDO::PARAM_INT);
$stmt->execute();
$choices = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <!-- Display the question text dynamically -->
        <h2><?php echo htmlspecialchars($question['text']); ?></h2>
        <p><strong>Question <?php echo $number; ?> of 5</strong> </p>

        <form method="post" action="process.php" class="quiz-form">
          <ul class="choices">
            <?php foreach ($choices as $choice): ?>
              <li>
                <input name="choice" type="radio" value="<?php echo $choice['id']; ?>"> <?php echo $choice['text'] ?>
              </li>
            <?php endforeach ?>
          </ul>
          <input type="submit" value="Submit" class="quiz-submit">
        </form>
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
