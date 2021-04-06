

function verify()
{
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var email = document.getElementById("email").value;
	var feedback = document.getElementById("feedback").value.trim();


	if ((fname == "") || (lname == "") || (email == "") || (feedback == ""))
	{
		alert("Please fill in all fields!")
	}
	else {
		document.getElementById("aForm").reset();
	}

}