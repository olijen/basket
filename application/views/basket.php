<h1>Корзина</h1>
<table>
	<tr class='th'>
		<th>Автор</th>
		<th>Название</th>
		<th>Количество</th>
		<th>Цена</th>
		<th>Общая стоимость</th>
	</tr>
	<?php
		$sum = 0;
		foreach($data as $item) {
			$sum += $item['quantity'] * $item['price'];
			echo '<tr>';
				echo '<td>'.$item['author'].'</td>';
				echo '<td>'.$item['title'].'</td>';
				echo '<td>';
					echo '<form action="/basket/update" method="post">';
						echo '<input type="text" value="'.$item['quantity'].'" name="quantity">';
						echo '<input type="hidden" value="'.$item['id'].'" name="id">';
					echo '</form>';
				echo '</td>';
				echo '<td>'.$item['price'].'</td>';
				echo '<td>'.$item['quantity'] * $item['price'].'</td>';
				echo '<td><a href="/basket/del?id='.$item['id'].'">Удалить</a></td>';
			echo '</tr>';	
		}
	?>
</table>
<hr>
<h3>Сумма: <?php echo $sum; ?></h3>