var new_todo;
var arr_todo = new Array();

function activ_prompt()
{
	var string = prompt("Renseignez votre nouveau to do");
	if (string != "")
	{
		new_todo = document.createTextNode(string);
		add_todo();
	}
}

function add_todo()
{
	var my_div = document.getElementById('ft_list');
	var new_div = document.createElement('div');
	new_div.appendChild(new_todo);
	for (key in arr_todo)
		my_div.removeChild(arr_todo[key]);
	arr_todo.push(new_div);
	var i = 0;
	while (arr_todo[i])
		i++;
	i--;
	while (i >= 0)
	{
		my_div.appendChild(arr_todo[i]);
		i--;
	}
	new_div.addEventListener("click", function () {delete_node(this)});
	store_cookie();
}

function delete_node(div)
{
	var my_div = document.getElementById('ft_list');
	my_div.removeChild(div);
	var tmp_arr = new Array();
	var i = 0;
	var j = 0;
	for (var key in arr_todo)
	{
		if (arr_todo[key] != div)
		{
			tmp_arr[i] = arr_todo[j];
			i++;
		}
		j++;
	}
	arr_todo = tmp_arr;
}

function store_cookie()
{
	var i = 0;
	while (arr_todo[i])
	{
		var cname = "a"+i;
		console.log(cname);
//		document.cookie = cname + "=" + arr_todo[i] + "; expires=Sun, 15 Jan 2017 00:00:00 UTC";
		i++;
	}
} 