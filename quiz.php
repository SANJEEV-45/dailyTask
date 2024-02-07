<?php
// Define questions and answers
$questions = array(
    "What is the capital of France?" => array(
        "A" => "Paris",
        "B" => "London",
        "C" => "Berlin",
        "D" => "Rome"
    ),
    "Who is the author of 'To Kill a Mockingbird'?" => array(
        "A" => "Harper Lee",
        "B" => "F. Scott Fitzgerald",
        "C" => "Ernest Hemingway",
        "D" => "Mark Twain"
    ),
    "What is the chemical symbol for water?" => array(
        "A" => "H2O",
        "B" => "CO2",
        "C" => "NaCl",
        "D" => "O2"
    )
);

// Define correct answers
$correct_answers = array(
    "What is the capital of France?" => "A",
    "Who is the author of 'To Kill a Mockingbird'?" => "A",
    "What is the chemical symbol for water?" => "A"
);

// Initialize score
$score = 0;

// Check answers
foreach ($questions as $question => $choices) {
    $user_answer = $_POST[$question]; // Get user's answer from form
    $correct_answer = $correct_answers[$question];
    if ($user_answer === $correct_answer) {
        $score++;
    }
}

// Display result
echo "<h2>Your Quiz Result</h2>";
echo "Total Questions: " . count($questions) . "<br>";
echo "Correct Answers: " . $score . "<br>";
echo "Percentage: " . ($score / count($questions)) * 100 . "%<br>";

?>

<h2>Quiz</h2>
<form method="post" action="">
    <?php foreach ($questions as $question => $choices) : ?>
        <p><?php echo $question; ?></p>
        <?php foreach ($choices as $choice => $value) : ?>
            <input type="radio" name="<?php echo $question; ?>" value="<?php echo $choice; ?>"> <?php echo $value; ?><br>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <br>
    <input type="submit" value="Submit">
</form>