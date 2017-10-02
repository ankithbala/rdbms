


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<link href="css/main.css" rel="stylesheet">

  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  


<div class="jumbotron text-center" style="height:200px;padding-top:10px;padding-bottom:26px">
       <img class="img-responsive center-block" src="{% static 'logo.png' %}">
    <h1>Smart Water Management</h1>
  <h3>Be smarter and save water</h3>

</div>





<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>

<div class="col-sm-8 text-left"> 
<div class="panel panel-info">
      <div class="panel-heading">Panel with panel-info class</div>
      <div class="panel-body">      

<form name="f1" action="index.php" method="post">
ID: <input type="number" name="id1"></input>
Name: <input type="text" name="name1"></input>
<input type="submit" name="submit" value="Submit"></input>

</form>
<form name="f2" action="select.php" method="post">
<input type="submit" name="submit" value="Log data"></input>


<h3> <marquee direction="right">Please Select Your Items</marquee><h3>
       
<form action="fd.php" method="get">
    
      <div>
<div class="form-group">
      <label for="sel1">Select list (select one):</label>
      <select class="form-control" id="sel1">
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
      </select>
</div>
            Item ID
            <input type="text" id="itemid">
           <input type="button" value="Add to Cart" onClick="addItem(document.getElementById('sel1').value)"></div>            
  <table class="one" cellpadding=3 cellspacing=4 id="items">

<tr><br>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    
                </tr>

</table>
<br>
 </div>


<input type="submit" value="Checkout"></td>
Grand Total : <input type="number" id="grandtotal" disabled>

</div>
    </div>


    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>


