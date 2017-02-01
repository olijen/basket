<h1>Каталог</h1>
<div class='catalog'>
	<table>
		<tr class='th'>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена</th>
		</tr>
	<?php
		foreach($data as $book) {
			echo '<tr>';
				echo '<td>'.$book['author'].'</td>';
				echo '<td>'.$book['title'].'</td>';
				echo '<td>'.$book['pubyear'].'</td>';
				echo '<td>'.$book['price'].'</td>';
				echo '<td><a href="/basket/add?id='.$book['id'].'">Купить</a></td>';
			echo '</tr>';	
		}
	?>
	</table>
</div>