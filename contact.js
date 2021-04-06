

function verify()
{
	var fname = getElementById("fname");
	var lname = getElementById("lname");
	var email = getElementById("email");

	if ((fname == "") || (lname == "") || (email == ""))
	{
		alert("Empty field, please fill all fields!");
	}

}