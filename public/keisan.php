<?php
$value_1 = rand(1, 10);
$value_2 = rand(1, 10);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if ($_POST['value_1'] + $_POST['value_2'] == $_POST['answer']) {
        $kekka = 'ピンポーン！天才！';
    } else {
        $kekka = 'ブブー！アホりー！';
    }
} else {
    $kekka = '';
}
?>

<html>
<head>
<meta charset="utf-8">
<title>計算ゲーム</title>
</head>

<body>

<h1>計算ゲーム</h1>

<?php echo $kekka; ?>

<form action="" method="post">
<input type="hidden" name="value_1" value="<?php echo $value_1; ?>" />
<input type="hidden" name="value_2" value="<?php echo $value_2; ?>" />
<?php echo $value_1; ?> + <?php echo $value_2; ?> = <input type="text" name="answer" /> 

<input type="submit" value="答える" />
</form>

</body>

</html>

