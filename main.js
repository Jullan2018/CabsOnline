//Name: Jullan Quevedo ID: 17981982
//main.js file stores all the function needded for this project.

//the bookNow function submits the customer input using AJAX.
function bookNow()
{
  var bookingDetails = 
      {
	"name": document.getElementById("name").value,
	"contactno": document.getElementById("phone").value,
    "pickup": document.getElementById("pickup").value,
    "bookingDate": document.getElementById("date").value,
    "bookingTime": document.getElementById("time").value
  }
  
  // create the HttpRequest
  var xhttp = new XMLHttpRequest();
  
  // when request is sent, then do this
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("successMessage").innerHTML = this.responseText;
    }
  };
  
  // HTTP METHOD asynchronrous
  xhttp.open("POST", "createBooking.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  
  // send the request
  xhttp.send(JSON.stringify(bookingDetails));
}

//the showBooking function display all the details on the customer's booking
function showBooking()
{
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("searchBooking").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","searchBooking.php",true);
  xmlhttp.send();
}

//The assignBooking function updates the status in the database. 
function assignBooking()
{
    var userInput = document.getElementById('search').value;
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) 
    {
        showBooking();
        alert("The booking request" +userInput+ "has been properly assigned");
    }
  }
    xmlhttp.open("PUT","assignBooking.php",true);
    xmlhttp.send(userInput);
    
}