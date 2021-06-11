<html>
    <head>
        <title>Vesti</title>
    </head>
    <body>
        <a href="?controller=admin&akcija=index">Sve vesti</a> 
        <div style="float: right">
            Administrator: <?php echo $_SESSION['autor']->ime." ".$_SESSION['autor']->prezime." "; ?>
            <a href="?controller=admin&akcija=logout">Izloguj se</a>
        </div>
        <br>
        <hr>