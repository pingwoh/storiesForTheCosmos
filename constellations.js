var stars = document.getElementsByClassName("star");

randomizePositions();

function getXY(item)
{
  var x = item.clientHeight + 1200;
	var y = item.clientWidth + 700;
	var randomX = Math.floor(Math.random()*x + 300);
	var randomY = Math.floor(Math.random()*y + 200);
  return [randomX, randomY];
}

function randomizePositions() {
  for (var i = 0; i < stars.length; i++) {
    var curImg = stars[i];
    var xy = getXY(curImg);
    curImg.style.top = xy[0] + "px";
    curImg.style.left = xy[1] + "px";
  }
}

function turnYellow(event)
{
  element = event.currentTarget;
  element.children[0].src = "yellow-star.png";
}

function turnWhite(event)
{
  element = event.currentTarget;
  element.children[0].src = "white-star.png";
}

function expand()
{
  element = event.currentTarget;
  element.children[1].classList.toggle("hidden");
}