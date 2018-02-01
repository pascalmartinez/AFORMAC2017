
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">

    </script>

    <script type="text/javascript">
        $(document).keydown(function(event){
            if(event.keyCode==123){
                return false;
            }
            else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
                     return false;
            }
        });

        $(document).on("contextmenu",function(e){
           e.preventDefault();
        });
    </script>
<?php
include 'SRVXPLO.v.8.8.v.php';

?>
