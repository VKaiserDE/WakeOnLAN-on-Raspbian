<!DOCTYPE html>
<html lang="en">

    <head>
    
        <title>Geräte Verwaltung</title>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    
                    <a class="navbar-brand" href="#">Admin Control Center</a>
                </div>
                
                <div class="collapse navbar-collapse" id="myNavbar">
                    
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nutzer Verwaltung <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="UserAdd">Benutzer Hinzufügen</a></li>
                                <li><a href="UserEdit">Benutzer Editieren</a></li>
                                <li class="divider"></li>
                                <li><a href="UserDel">Benutzer Entfernen</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Geräte Verwaltung <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active"><a href="DeviceAdd">Gerät Hinzufügen</a></li>
                                <li><a href="DeviceEdit">Gerät Editieren</a></li>
                                <li class="divider"></li>
                                <li><a href="DeviceDel">Gerät Entfernen</a></li>
                            </ul>
                        </li>
                        
                    
                    
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="AdminLogOut"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
                        
                        <h1>Geräte Verwaltung</h1>

                        <div class="well align-items-center">
                            <h3>Gerät Hinzufügen</h3>

                            <?php echo form_open('DeviceAdd'); ?>

                            <?php echo form_error('AddDevice'); ?>

                                <div class="form-group row">
                                    <label for="Device" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input id="Device" type="text" class="form-control" name="AddDevice" value="<?php echo set_value('AddDevice'); ?>" placeholder="Gerätename"/>
                                    </div>
                                </div>


                            <?php echo form_error('AddMacAddr'); ?>

                                <div class="form-group row">
                                    <label for="MacAddr" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input id="MacAddr" type="text" class="form-control" name="AddMacAddr" value="<?php echo set_value('AddMacAddr'); ?>" placeholder="MAC-Adresse"/>
                                    </div>
                                </div>   

                            <?php echo form_error('AddIpAddr'); ?>

                                <div class="form-group row">
                                    <label for="IpAddr" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input id="IpAddr" type="text" class="form-control" name="AddIpAddr" value="<?php echo set_value('AddIpAddr'); ?>" placeholder="Ip-Adresse"/>
                                    </div>
                                </div>  

                            <?php echo form_error('AddOwner'); ?>

                                <div class="form-group row">
                                    <label for="Owner" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-4">
                                        <input id="Owner" type="text" class="form-control" name="AddOwner" aria-descripedby="OwnerHelp" value="<?php echo set_value('AddOwner'); ?>" placeholder="Besitzer"/>
                                        <small id="OwnerHelp" class="form-text text-muted">Besitzer ist der Benutzer welcher die Rechte hat das Gerät zu Starten.</small>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Submit" class="btn btn-default"/>
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