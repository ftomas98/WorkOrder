<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WorkOrder</title>
        <link rel="stylesheet" href="../../DZ1/styles.css">
    </head>
    <body>
        <header>
            <div class="naslov">
                <h1>WorkOrder</h1>
            </div>
            <nav>
                <ul class="menu">
                    <li class="item"><a href="#">Home</a></li>
                    <li class="item"><a href="#">Dashboard</a></li>
                    <li class="item"><a href="#">Calendar</a></li>
                    <li class="item"><a href="#">About Us</a></li>
                    <li class="item"><a href="../DZ2.2/pretraga.html">Pretraga Dispatchera</a></li>
                    <li class="item"><a href='?controller=managers&action=index'>Managers</a></li>
	                <li class="item"><a href='?controller=locations&action=index'>Locations</a></li>
	                <li class="item"><a href='?controller=companies&action=index'>Companies</a></li>
                    <li class="item"><a href="#">Login</a></li>
                </ul>
            </nav>
        </header>
        <?php require_once('routes.php'); ?>
        <section>
            <div class="tekst"><p>Sign up as...</p></div>
            <div class="izbornik">  
                <div class="contractor">
                    <img src="./slike/contractor1.jpg" alt="contractor" class="slika1">
                    <h2>CONTRACTOR</h2>
                </div>
                <div class="dispatcher">
                    <img src="./slike/dispatcher1.jpg" alt="dispatcher" class="slika1">
                    <h2>DISPATCHER</h2>
                </div>
                <div class="client">
                    <img src="./slike/client1.jpg" alt="client" class="slika1">
                    <h2>CLIENT</h2>
                </div>
            </div>
        </section>
        <footer>
            <h3>Copyright @ 2022 FT & SR</h3>
        </footer>
    </body>
</html>