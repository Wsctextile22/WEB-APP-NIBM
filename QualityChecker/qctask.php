<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Task Details
                          
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Task Details</th>
                                    <th>Raw Material</th>
                                    <th>Task Prioraty</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    session_start();
                                    $Wid=$_SESSION['wid'];
                                    //Create a connection
                                    $con=mysqli_connect("localhost:3306","root","");
                                    mysqli_select_db($con,"wsctextiles");
                                   
                                    $sql = "SELECT * FROM worker_task Where worker_id='$Wid'";
                                 
                                        echo "$Wid";
                                    $result = mysqli_query($con,$sql);
                                    
                                    if($row = mysqli_fetch_array($result)){
                                        $Tid=$row[1];
                                      

                                        $query = "SELECT * FROM task Where task_id='$Tid'";
                                        $query_run = mysqli_query($con, $query);
    
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $worker)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $worker['task_name']; ?></td>
                                                    <td><?= $worker['task_details']; ?></td>
                                                    <td><?= $worker['raw_materials']; ?></td>
                                                    <td><?= $worker['task_priority']; ?></td>
                                                  
    
                                                 
                                                     <td>
                                                        <?php
    
                                                
                                                     ?>
                                                 
                                                  </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<h5> No Record Found </h5>";
                                        }
                                    
                                    
                                        }
                                        else
                                        {
                                            
                                        }
                                    ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>