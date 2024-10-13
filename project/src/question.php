<?php
session_start();
require_once './database.php';
$number = (int) $_GET['n'];

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

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

// Determine the total number of questions to know if the quiz is over
$query_total = 'SELECT COUNT(*) AS total FROM questions';
$stmt_total = $connection->prepare($query_total);
$stmt_total->execute();
$total_questions = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];

// Handle form submition when the user select an answer
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_choice = (int) $_POST['choice'];
    $question_number = (int) $_POST['number'];

    // Get the correct answer
    $sql = 'SELECT * FROM choices WHERE question_number = :number AND is_correct = 1';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':number', $question_number, PDO::PARAM_INT);
    $stmt->execute();
    $correct_answer = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

    // Compare selected choice with the correct answer
    if ($selected_choice == $correct_answer) {
        $_SESSION['score']++;
    }

    // Redirect to the next question or final page
    $next = $question_number + 1;
    if ($next <= $total_questions) {
        header('Location: question.php?n=' . $next);
        exit();
    } else {
        header('Location: final.php');
        exit();
    }
}

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
        <p><strong>Question <?php echo $number . ' of ' . $total_questions ?></strong> </p>

        <form
          method="post"
          class="quiz-form">
          <ul class="choices">
            <?php foreach ($choices as $choice): ?>
              <li>
                <input name="choice" type="radio" value="<?php echo $choice['id']; ?>">
                <?php echo htmlspecialchars($choice['text']) ?>
              </li>
            <?php endforeach ?>
          </ul>
          <input type="submit" value="Submit" class="quiz-submit">
          <input type="hidden" name="number" value="<?php echo $number ?>">
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
