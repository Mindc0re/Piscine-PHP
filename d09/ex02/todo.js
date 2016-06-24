var new_todo;
var arr_todo = new Array();
var count_todo = 0;

function activ_prompt()
{
	var string = prompt("Renseignez votre nouveau to do");
	if (string != "")
	{
		new_todo = document.createTextNode(string);
		count_todo++;
		add_todo();
	}
}

function add_todo()
{
	var my_div = document.getElementById('ft_list');
	var new_div = document.createElement('div');
	new_div.addEventListener("click", function () {safe_delete(this)});
	console.log(count_todo);
	new_div.appendChild(new_todo);
	arr_todo.push(new_div);
	if (count_todo >= 2)
		my_div.insertBefore(new_div, arr_todo[count_todo - 2]);
	else
		my_div.appendChild(new_div);
}

function safe_delete(to_delete)
{
	var my_div = document.getElementById('ft_list');
	my_div.removeChild(to_delete);
	count_todo--;
	var tmp_arr = new Array();
	var i = 0;
	var j = 0;
	for (var key in arr_todo)
	{
		if (key != to_delete)
		{
			tmp_arr[i] = arr_todo[j];
			i++;
		}
		j++;
	}
	arr_todo = tmp_arr;
}