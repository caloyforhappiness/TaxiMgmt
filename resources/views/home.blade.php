
<!DOCTYPE html>

<html lang="en">
    <head>
        <title> @yield('pageTitle') | Taxi Time Keeping and Service Management System</title>
        <link rel="icon"  type="" href=""/>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content="For taxi services and time keeping system"/>
        <meta name="author" content="Paula and friends.."/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- CSS Links Start -->
        <link href="package/css/bootstrap.css" rel="stylesheet"/>
        <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="bootstrapvalidator-v0.5.2-0/dist/css/bootstrapValidator.css"/>
        <link href="DataTables-1.10.11/media/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
        <link href="css/responsive.css" rel="stylesheet"/>
        <link href="package/css/mdb.css" rel="stylesheet"/>
        <link href="sweetalert-master/dist/sweetalert.css" rel="stylesheet"/ >
        <style>
            header, main, footer {
                padding-left: 240px;
            }

            @media only screen and (max-width : 992px) {
                header, main, footer {
                    padding-left: 0;
                }
            }
        </style>
        <!-- Scripts Start -->
        <!-- <script type="text/javascript" src="bootstrapvalidator-v0.5.2-0/vendor/jquery/jquery-1.10.2.min.js"></script> -->
        <script type="text/javascript" src="package/js/jquery-3.1.1.js"></script>
        <!-- <script type="text/javascript" src="package/js/tether.js"></script> -->
        <!-- <script type="text/javascript" src="package/js/bootstrap.js"></script> -->
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="DataTables-1.10.11/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="bootstrapvalidator-v0.5.2-0/dist/js/bootstrapValidator.js"></script>
        <script type="text/javascript" src="sweetalert-master/dist/sweetalert.min.js"></script>
        <!-- Scripts End -->
    </head>

    <!-- <body class="nav-md"> -->
    <body class="fixed-sn red-skin">
        <!--Double navigation-->
        <header>
            <!-- Sidebar navigation -->
            <ul id="slide-out" class="side-nav fixed">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper sn-ad-avatar-wrapper">
                        <img src="" class="img-fluid rounded-circle">
                        <div class="rgba-stylish-strong">
                            <p class="user white-text">Paula Marie S. Perlado<br>Administrator</p>
                        </div>
                    </div>
                </li>
                <!--/. Logo -->
                <hr class="my2"/ >
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-dashboard"></i> 
                                Home
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="/home" class="waves-effect">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-edit"></i> 
                                Maintenance
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="/car_brand" class="waves-effect">Car Brand</a></li>
                                    <li><a href="/car_model" class="waves-effect">Taxi Model</a></li>
                                    <li><a href="/create_shift" class="waves-effect">Shift Template</a></li>
                                    <li><a href="/create_boundary" class="waves-effect">Boundary</a></li>
                                    <li><a href="/driver_info" class="waves-effect">Driver's Information</a></li>
                                    <li><a href="/fee_charges" class="waves-effect">Fee's & Charges</a></li>
                                    <li><a href="/accounts" class="waves-effect">Accounts</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-wrench"></i> 
                                Utilities 
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="/company_information" class="waves-effect">Company Information</a>
                                        <a href="/reactivation" class="waves-effect">Reactivation</a>
                                         <a href="#" class="waves-effect">Business Rules</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-desktop"></i> 
                                Transaction
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="#" class="waves-effect">Empty</a>
                                    </li>
                                    <li>
                                        <a href="#" class="waves-effect">Empty</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-book"></i>
                                Queries
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Empty</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Empty</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="collapsible-header waves-effect arrow-r">
                                <i class="fa fa-building"></i>
                                Reports
                                <i class="fa fa-angle-down rotate-icon"></i>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Empty</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <!--/. Sidebar navigation -->
            
            <!--Navbar-->
            <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">
                <!-- SideNav slide-out button -->
                <div class="float-xs-left">
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                </div>
                <!-- Breadcrumb-->
                <div class="breadcrumb-dn" style="margin-left:200px">
                    <p><i class="fa fa-taxi"></i>   {{ Session::get('compname')}}</p>
                </div>

                <div class="breadcrumb-dn" style="margin-left:640px">
                  <p id="datee"></p></div>
               
                <ul class="nav navbar-nav float-xs-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="hidden-sm-down">Profile</span></a>
                        <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="#">Logout</a>
                            <a class="dropdown-item" href="#">My account</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!--/.Navbar-->
        </header>
        <!--/Double navigation-->

        <!--Main layout-->
        <main>
            <div class="container-fluid" style="margin-left:180px">
                @yield('content')
            </div>
        </main>
        <!--/Main layout-->
        

        <script type="text/javascript" src="package/js/mdb.js"></script>
        <script type="text/javascript" src="tables.js"></script>
        <script>
            $(document).ready(function() {
                // SideNav init
                $(".button-collapse").sideNav('show');
                var el = document.querySelector('.custom-scrollbar');
                // Ps.initialize(el);
                $('.mdb-select').material_select();
                $('.datepicker').pickadate();
                $('#starttimeshift').pickatime({
                    twelvehour: true
                });
                $('#endtimeshift').pickatime({
                    twelvehour: true
                });

                $('#editstarttimeshift').pickatime({
                    twelvehour: true
                });
                $('#editendtimeshift').pickatime({
                    twelvehour: true
                });

                var now = new Date();
              document.getElementById("datee").innerHTML=now.toDateString();
            });
            new WOW().init();
        </script>
    </body>
</html>
