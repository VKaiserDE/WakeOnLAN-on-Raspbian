<!DOCTYPE html>
<html lang="en">

    <head>
    
        <title>System</title>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Refresh" content="10">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

        <!-- Navigation Bar  -->

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    
                    <a class="navbar-brand" href="WakeOnLAN">Wake on LAN</a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNavbar">
                    
                    <ul class="nav navbar-nav">
                    <li><a href="WakeOnLAN">Wake on LAN</a></li>
                    <li class="active"><a href="System">System</a></li>
                    
                    
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="LogOut"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>
    
            <!-- Main Container -->

        <div class="container-fluid text-center">    
            
            <div class="row content">
                    
                        <!-- Links -->

                    <div class="col-sm-2 text-center">
                        
                    </div>
                    
                        <!-- Mitte -->

                    <div class="col-sm-8 text-center"> 
                        
                        <h1>System Overview</h1>



                        <div class="well">
                            
                            <br/>
                            
                            <div class="table-responsive">          
                                <table class="table table-hover">
                                    <tbody>

                                        <tr>
                                            <th>System Model: </th>
                                            <th>{system_model}</th>
                                        </tr>

                                        <tr>
                                            <th>Time on System: </th>
                                            <th>{system_time}</th>
                                        </tr>

                                        <tr>
                                            <th>System Uptime: </th>
                                            <th>{system_runningtime}</th>
                                        </tr>
                                        
                                        <tr>
                                            <th>Cpu Model: </th>
                                            <th>{cpu_model}</th>
                                        </tr>

                                        <tr>
                                            <th>Cpu Temperatur: </th>
                                            <th>{cpu_temp} °C</th>
                                        </tr>
                                        
                                        <tr>
                                            <th>Network:</th>
                                            <th></th>
                                        </tr>

                                        <tr>
                                            <th>Download</th>
                                            <th>{network_rx} KB/s</th>
                                        </tr>

                                        <tr>
                                            <th>Upload</th>
                                            <th>{network_tx} KB/s</th>
                                        </tr>

                                        <tr>
                                            <th><strong>Memmory: </strong></th>
                                            <th></th>
                                        </tr>

                                        <tr>
                                            <th>   Total</th>
                                            <th>{mem_total} MB</th>
                                        </tr>

                                        <tr>
                                            <th>   Used</th>
                                            <th>{mem_used} MB </th>
                                        </tr>

                                        <tr>
                                            <th>   Free</th>
                                            <th>{mem_free} MB </th>
                                        </tr>

                                        <tr>
                                            <th><strong>Local Disk Space: </strong></th>
                                            <th></th>
                                        </tr>

                                        <tr>
                                            <th>   Total</th>
                                            <th>{hdd_total} GB </th>
                                        </tr>

                                        
                                        <tr>
                                            <th>   Used</th>
                                            <th>{hdd_used} GB </th>
                                        </tr>

                                        <tr>
                                            <th>   Free</th>
                                            <th>{hdd_free} Gb </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            
                        <br />
                            <div class="progress">

                                <div class="progress-bar progress-bar-warning" role="progressbar" style="width:{hdd_used_percent}%">
                                    Used: {hdd_used_percent}%
                                </div>

                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:{hdd_free_percent}%">   
                                    Free: {hdd_free_percent}%
                                </div>

                            </div>

                        </div>

                    </div>
                    
                        <!-- Rechts -->

                    <div class="col-sm-2 text-center">
                      
                    </div>
            </div>   

        </div>

    </body>

</html>