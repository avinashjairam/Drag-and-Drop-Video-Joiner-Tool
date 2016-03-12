<html>

<head>
<meta charset="utf-8">
<title>Merge your videos</title>



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="./css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="./css/stylesheet1.css" media="all" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="./js/fileinput.min.js" type="text/javascript"></script>
<script src="./js/fileinput.js" type="text/javascript"></script>     
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="http://necolas.github.com/normalize.css/2.0.1/normalize.css">
<link rel="stylesheet" href="./css/stylesheet.css" />
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>

<script>
    $(function() {
        $( "#sortable" ).sortable({ 
            placeholder: "ui-sortable-placeholder" 
        });
    });
</script>


</head>


<body>


<div class="container contentContainer">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Merger Your Videos</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">How to Use<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        
      </ul>
     
     <!--  <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<label class="control-label">Select File</label>
<input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">

<br>

<ul id="sortable">
    <li class="ui-state-default">Item 1</li>
    <li class="ui-state-default">Item 2</li>
    <li class="ui-state-default">Item 3</li>
    <li class="ui-state-default">Item 4</li>
    <li class="ui-state-default">Item 5</li>
    <li class="ui-state-default">Item 6</li>
    <li class="ui-state-default">Item 7</li>
</ul>


<br>

<a href="#" class="btn btn-success col-md-6 col-md-offset-3"><span class="glyphicon glyphicon-cog"></span>MERGE!!!</a>
</div>

<script>

// initialize with defaults
$("#input-2").fileinput();

// with plugin options
$("#input-2").fileinput({'showUpload':false, 'previewFileType':'any'});

</script>

</body>



</html>