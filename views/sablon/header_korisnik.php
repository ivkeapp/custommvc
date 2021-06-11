<html>
    <head>
        <title>Vesti</title>
    </head>
    <body>
        <a href="?controller=korisnik&akcija=index">Sve vesti</a> 
        <a href="?controller=korisnik&akcija=mojevesti">Moje vesti</a> 
        <a href="?controller=korisnik&akcija=dodajvest">Dodaj vest</a>
        <div style="float: right">
            Autor: <?php echo $_SESSION['autor']->ime." ".$_SESSION['autor']->prezime." "; ?>
            <a href="?controller=korisnik&akcija=logout">Izloguj se</a>
        </div>
        <br>
        <hr>