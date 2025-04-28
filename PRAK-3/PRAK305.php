<?php
$input = '';
$output = '';

if (isset($_POST['submit'])) {
    $input = $_POST['input'];
    $length = strlen($input);
    $outputParts = [];

    for ($i = 0; $i < $length; $i++) {
        $char = $input[$i];
        $first = strtoupper($char);
        $rest = strtolower($char);
        $outputParts[] = $first . str_repeat($rest, $length - 1);
    }

    $output = implode('', $outputParts);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

    <form method="post">
        <input type="text" name="input" value="<?= htmlspecialchars($input) ?>">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <p><strong>Input:</strong><br><?= htmlspecialchars($input) ?></p>
        <p><strong>Output:</strong><br><?= $output ?></p>
    <?php endif; ?>

</body>
</html>
