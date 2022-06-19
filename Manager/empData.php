
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Employees</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css>
    
</head>
<body>
    <div class="container" style = "max-width: 50%;">
        <div class ="text-center mt-5 mb-4">
            <h1 style="background-color:powderblue;">WSC Textiles(pvt) Ltd</h1> 
            <h2>Employee Search</h2>
            <p>Please type a keyword to search</p>
        </div>
        <input type ="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
    </div>
    <div id="searchresult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input=$(this).val();
                //alert(input);

                if(input !=""){
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){

                            $("#searchresult").html(data);
                            $("#searchresult").css("display","block");
                        }
                    });
                }else{
                    $("#searchresult").css("display","none");
                }
            });
        });
    </script>
</body>
</html>