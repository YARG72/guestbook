<?php 

error_reporting(-1);
require_once 'funcs.php';


if(!empty($_POST)){
	save_mess();
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}

$messages = get_mess();
$messages = array_mess($messages);
// print_arr($messages);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>


<style>
	
.messages{
	border: 1px solid #ccc;
	padding: 10px;
	margin: 2px;


}

</style>

</head>
<body>
	<form action="index.php" method="post">
		<p>
			<lbel for="name">Имя</lbel><br />
			<input type="text" name="name" id="name">
		</p>
		<p>
			<lbel for="text">Текст</lbel><br />
			<textarea name="text" id="text" ></textarea>
		</p>
		<button type="submit">Написать</button>
	</form>


<hr>

<?php if (!empty($messages)) :  ?>
	<?php foreach ($messages as $message) : ?>
	<?php $message = get_format_message($message); ?>	
<div class="messages">
	<p>Автор: <?=$message[0]?> | Дата: <?=$message[2]?></p>
	<div> <?=nl2br(htmlspecialchars($message[1]))?></div>
</div>
	<?php endforeach; ?>
<?php endif; ?>

</body>
</html>