<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_4/text-logic.php');

if (isset($_GET['preset'])) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/LAB_4/texts/' . $_GET['preset'] . '.txt';
    print_r($path);
    $text = file_get_contents($path);
}

if(isset($_POST['text'])) {
    $text = $_POST['text'];
    $result2 = TextWorker::formAnswerHtml($text);
}
?>
<!-- 2, 8, 13, 18 -->
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/header.php')?>

<form class="m-5" action="text.php" method="post">
        <label class="form-label">Введите текст</label>
        <textarea class="form-control" name="text"><?php if (isset($text)) echo htmlspecialchars($text); ""?></textarea>
        <button class="btn btn-primary mt-2">Отправить</button>
</form>

<form class="m-5" action="text.php" method="get">
    <button class="btn btn-primary" name="preset" value="1">Пример текста 1</button>
    <button class="btn btn-primary" name="preset" value="2">Пример текста 2</button>
    <button class="btn btn-primary" name="preset" value="3">Пример текста 3</button>
    <button class="btn btn-primary" name="preset" value="4">Пример текста 4</button>
</form>

<?php if (isset($result2)): ?>
    <div class="m-5">
        <h2>Результат</h2>
        <?php echo $result2; ?>
    </div>
<?php endif; ?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/footer.php')?>
