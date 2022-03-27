<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WorkOrder</title>
        <link rel="stylesheet" href="dispatcher.css?v=<?php echo time(); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
                    <li class="item"><a href="#">Login</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <div class="searchDiv">
                <input type="text" id="search">
            </div>
            <div class="tablicaDiv">
                <table class="tablica">
                    <thead class="tablicaHead">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                    </tbody>
                </table>
            </div>
        </section>
        <footer>
            <h3>Copyright @ 2022 FT & SR</h3>
        </footer>



        <script type="text/javascript">
            $(document).ready(function(){
                $("#search").keypress(function(){
                    $.ajax({
                        type:'POST',
                        url:'search.php',
                        data:{
                            name:$("#search").val(),
                        },
                    success:function(data){
                        $("#output").html(data);
                    }
                });
            });
        });
        </script>
    </body>
</html>