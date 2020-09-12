<!DOCTYPE html>
<html>
<head>
	<title>Список заявок</title>
	<style type="text/css">
	table {
		border: 1px solid black;
		border-collapse: collapse;
	}
	th {
		background-color: lightgray;
	}
	th, td {
		border: 1px solid black;
		padding: 5px 7px;
	}

	</style>
</head>
<body>
	<table>
	<tr>
		<th>Дата и время</th>
		<th>Имя</th>
		<th>Телефон</th>
		<th>E-mail</th>
	</tr>
	
	<?php
    $dbh = new PDO('mysql:host=localhost;dbname=cp60848_sk', 'cp60848_sk', 'sktest123');
		$sth = $dbh->prepare("SELECT `time`, name, email, phone FROM sk_test ORDER BY `time` DESC");
		$sth->execute();
		$result = $sth->fetchAll();

		foreach ($result as $item) {
			?><tr>
				<td><?=$item['time'] ?></td>
				<td><?=$item['name'] ?></td>
				<td><?=$item['phone'] ?></td>
				<td><?=$item['email'] ?></td>
			</tr><?php
		}
	?>
	</table>
</body>
</html>

