<!-- create.blade.php -->


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nitro &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
        <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="FreeHTML5.co" />

        <!-- 
              //////////////////////////////////////////////////////
      
              FREE HTML5 TEMPLATE 
              DESIGNED & DEVELOPED by FreeHTML5.co
                      
              Website: 		http://freehtml5.co/
              Email: 			info@freehtml5.co
              Twitter: 		http://twitter.com/fh5co
              Facebook: 		https://www.facebook.com/fh5co
      
              //////////////////////////////////////////////////////
        -->

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- Animate.css -->
        <link rel="stylesheet" href="/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="/css/bootstrap.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">
        <!-- Theme style  -->
        <link rel="stylesheet" href="/css/style.css">

        <!-- Modernizr JS -->
        <script src="/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="fh5co-page">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

                <h1 id="fh5co-logo"><a href="index.html"><img src="/images/logo.png" alt="Free HTML5 Bootstrap Website Template"></a></h1>
                <nav id="fh5co-main-menu" role="navigation">
                    <ul>
                        <li><a href="{{url('campus')}}">Campus</a></li>
                        <li><a href="{{url('faculties')}}">Faculty</a></li>
                        <li class="fh5co-active"><a href="{{url('programmes')}}">Programme</a></li>
                        <li><a href="{{url('courses')}}">Course</a></li>
                        <li><a href="{{url('accommodation')}}">Accommodation</a></li>
                        <li><a href="{{url('loan')}}">Loan Information</a></li>
                        <li><a href="{{url('/')}}">Customer View</a></li>
                        <li><a href="">Log Out</a></li>
                    </ul>
                </nav>

                <div class="fh5co-footer">
                    <p><small>&copy; 2016 Nitro Free HTML5. All Rights Reserved.</span> <span>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> </span> <span>Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></span></small></p>
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>
                </div>

            </aside>

            <div id="fh5co-main">

                <div class="fh5co-narrow-content">
                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Add Programme Structure<span></h2>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Programme ID</th>
                            <th>Programme Name</th>
                            <th>Programme Description</th>
                            <th>Profession</th>
                            <th>Duration of Study</th>
                            <th>Programme Level</th>
                            <th>Facilities Fee</th>
                            <th>Faculty ID</th>
                            <th>Campus ID</th>
                        </tr>

                        <tr>
                            <td>{{$progId}}</td>
                            <td>{{$progName}}</td>
                            <td>{{$progDesc}}</td>
                            <td>{{$profession}}</td>
                            <td>{{$duration}}</td>
                            <td>{{$progLevel}}</td>
                            <td>{{$facilitiesFee}}</td>
                            <td>{{$faculty}}</td>
                            <td>
                                @foreach ($camplist as $camp)
                                    {{$camp}}
                                @endforeach
                            </td>
                        </tr>
                    </table>
                    
                    <form method="post" action="{{URL::to('mercreate')}}">
                        @csrf
                        <p>
                            <label for="progId">Programme Id:</label>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="text" name="progId" value="{{$progId}}" readonly /> 
                        </p>
                        
                        <p>
                            <label for="course">Courses:</label><br/>
                            
                        <table class="table table-striped">
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Credit Hours</th>
                                <th>Category</th>
                            </tr>

                            @foreach($courses as $row)
                            <tr>
                                <td>{{$row->courseCode}}<br/></td>
                                <td>{{$row->courseTitle}}<br/></td>
                                <td>{{$row->creditHours}}<br/></td>
                                <td>{{$row->category}}<br/></td>
                                <td>
                                    <input type="checkbox" name="courselist[]" value="{{$row->courseId}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        </p>

                        
                        <p>
                            <button type="submit">Next</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="/js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- Carousel -->
        <script src="/js/owl.carousel.min.js"></script>
        <!-- Stellar -->
        <script src="/js/jquery.stellar.min.js"></script>
        <!-- Waypoints -->
        <script src="/js/jquery.waypoints.min.js"></script>
        <!-- Counters -->
        <script src="/js/jquery.countTo.js"></script>


        <!-- MAIN JS -->
        <script src="/js/main.js"></script>

    </body>
</html>




