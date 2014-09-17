<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="/sommerhusSamsoe/includes/js/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <aside>
            <nav>
                <ul>
                    <li><a class="ajax-load" href="fisse.php?filter=newest" data-url="fisse.php" data-query="filter=newest">Nyeste</a></li>
                </ul>
            </nav>
        </aside>
        <section id="content"></section>
        <script>
            $(function(){
               $('.ajax-load').click(function(){
                  $.ajax({
                    type: "GET",
                    url: $(this).data('url'),
                    data: $(this).data('query'),
                    success: function(result){
                        $('#content').html(result);
                    }
                    });
                    return false;
               }); 
            });
        </script>
    </body>
</html>
