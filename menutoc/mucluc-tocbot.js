// menu tocbot hien thi tren cung
tocbot.init({
        tocSelector: '.toc',
        contentSelector: '.noidungtoc',
		headingSelector: 'h1, h2, h3, h4', // chinh the h hien thi
        hasInnerContainers: true,
		collapseDepth  :  6,
        headingsOffset :  1,
        orderedList    :  true
    });
// an hien toc
function muclucan() {
  document.getElementById("tocbottren").style.display = "none";
  document.getElementById("nuttocbot").style.display = "none"; 
document.getElementById("nuttocbot2").style.display = "inline-block";
}

function mucluchien() {
  document.getElementById("tocbottren").style.display = "block";
  document.getElementById("nuttocbot").style.display = "inline-block";  
  document.getElementById("nuttocbot2").style.display = "none";
}
// kiem tra co noi dung trong tocbot hay khong
if(document.getElementById('tocbottren').innerHTML.trim().length == 0) {
   document.getElementById("mucluc-content").style.display = "none";
   document.getElementById("mucluc-icon").style.display = "none";
}
// hien thi nut tocbot khi keo xuong duoi
tocbot.init({
        tocSelector: '.tocbot',
        contentSelector: '.noidungtoc',
		headingSelector: 'h1, h2, h3, h4', // chinh the h hien thi
        hasInnerContainers: true,
		collapseDepth  :  6,
        headingsOffset :  1,
        orderedList    :  true
    });
var cao = document.getElementById("hientoc");
var btn = document.getElementById("menutoc");
var span = document.getElementsByClassName("menuclose")[0];
btn.onclick = function() {
  cao.style.display = "block";
}

span.onclick = function() {
  cao.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == cao) {
    cao.style.display = "none";
  }
}
// keo chuot moi hien thị tocbot
var mybutton = document.getElementById("menutoc");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}