<!DOCTYPE html>
<html>
    <head>
        <title>ZS:B</title>
    </head>
    <body>
		
    </body>	
</html>
<script>
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'http://localhost/phones.json', false);
	xhr.send();
	
	if (xhr.status != 200) {
		// обработать ошибку
		document.body.innerHTML =  xhr.status + ': ' + xhr.statusText; // пример вывода: 404: Not Found
	} else {
		var table = document.createElement('table');
		document.body.appendChild(table);
		table.border = 1;
		
		// вывести результат
		var phones = JSON.parse(xhr.responseText);
		
		//заголовок таблицы
		var tableHead = document.createElement('tr');
		for(var key in phones[0]) {
			var field = document.createElement('td');
			field.innerHTML = key;
			tableHead.appendChild(field);		
		}
		table.appendChild(tableHead);
		
		//само содержимое
		for(var i = 0; i < phones.length; i++) {
			var row = document.createElement('tr');
			for(var key in phones[i]) {
				var cell = document.createElement('td');
				cell.innerHTML = phones[i][key];
				row.appendChild(cell);
			}
			table.appendChild(row);
		}
	}
</script>