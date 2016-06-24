var new_todo = "";
var arr_todo = new Array();
var arr_str = new Array();
var old_count = 0;

function activ_prompt()
{
	var string = prompt("Renseignez votre nouveau to do");
	if (string != "")
	{
		arr_str.push(string);
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
	old_count = arr_todo.length;
	new_div.addEventListener("click", function () {delete_node(this)});
	set_cookie();
}

function delete_node(div)
{
	var my_div = document.getElementById('ft_list');
	my_div.removeChild(div);
	var tmp_arr = new Array();
	var tmp_str = new Array();
	var i = 0;
	var j = 0;
	var to_delete = 0;
	for (var key in arr_todo)
	{
		if (arr_todo[key] != div)
		{
			tmp_arr[i] = arr_todo[j];
			tmp_str[i] = arr_str[j]
			i++;
		}
		j++;
	}
	i = 0;
	arr_todo = tmp_arr;
	arr_str = tmp_str;
	set_cookie();
}

function set_cookie()
{
	var i = 0;
	while (arr_str[i])
	{
		var cname = "a"+i;
		var str_c = cname + "=" + arr_str[i] + "; expires=Sun, 15 Jan 2017 12:00:00 UTC";
		document.cookie = str_c;
		i++;
	}
	if (i < old_count)
	{
		var cname2 = "a"+i;
		var str_c2 = cname2 + "=" + "; expires=Thu, 01 Jan 1970 00:00:00 UTC";
		document.cookie = str_c2;
		i++;
	}
}

function get_cookie()
{
	var i = 0;
	var split = document.cookie.split(';');
	if (split[i][0] != 'a')
		return;
	var string = split[i].slice(3, split[i].length)
	new_todo = document.createTextNode(string);
	arr_str.push(string);
	add_todo();
	i++;
	while (split[i] && i < (split.length - 2))
	{
		var string = split[i].slice(4, split[i].length)
		new_todo = document.createTextNode(string);
		arr_str.push(string);
		add_todo();
		i++;
	}
}