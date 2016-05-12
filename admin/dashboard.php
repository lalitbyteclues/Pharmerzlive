<!DOCTYPE html>
<html lang="en">
<?php 
include('../home/include/dbconnection.php');
session_start(); 
if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
 }
   if(isset($_GET['username'])) 
   {
    $email = $_GET['username'];
    $password = $_COOKIE['password'];
    $get_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE `email`= '$email'");
    if(mysqli_num_rows($get_user)>0)
    {
        // die('j');
        $queRow = mysqli_fetch_array($get_user);
        $_SESSION['admin_id'] = $queRow['id'];
        $_SESSION['admin_email'] = $queRow['email'];
    }
    else
    { 
       // $q = "INSERT INTO `user`(email,password,loginToken,loginTokenTS) VALUES ('".$_GET['username']."','".$_COOKIE['password']."','".$_GET['lt']."','".$_GET['lts']."')";
        $q = "INSERT INTO `admin`(email,password) VALUES ('$email','$password')";
        
        $insdata = mysqli_query($conn,$q);
        $user_id = mysqli_insert_id($conn);
        
        $get_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE `id`= '$user_id'");
        if(mysqli_num_rows($get_user)>0)
        {
          $queRow = mysqli_fetch_array($get_user);
          $_SESSION['admin_id'] = $queRow['id'];
          $_SESSION['admin_email'] = $queRow['email'];
         
        }
    }
}
   


/*if($_SESSION['admin_id'] == '')
 {
    header('Location:index.php');
 }
*/
 /*if(isset($_GET['username']))
{

  $get_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE `email`= '".$_GET['username']."'");
  if(mysqli_num_rows($get_user)>0)
  {
    $queRow = mysqli_fetch_array($get_user);
    $_SESSION['admin_id'] = $queRow['id'];
    $_SESSION['email'] = $queRow['email'];
    $_SESSION['username'] = $queRow['username'];
  }
  else
  { 
    $q = "INSERT INTO `admin`(email,password) VALUES ('".$_GET['username']."','".$_COOKIE['password']."')";
    $insdata = mysqli_query($conn,$q);
    $user_id = mysqli_insert_id($conn);
    
    $get_user = mysqli_query($conn,"SELECT * FROM `admin` WHERE `id`= '$user_id'");
    if(mysqli_num_rows($get_user)>0)
    {
        $queRow = mysqli_fetch_array($get_user);
        $_SESSION['admin_id'] = $queRow['id'];
        $_SESSION['email'] = $queRow['email'];
        $_SESSION['username'] = $queRow['username'];
    }
  }
}*/
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmerz | Admin Panel</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
   <style>
        .Chartjs-figure {
            height: 250px;
        }
		#view-selector-3-container{display:none;}
    </style>
    <link href="https://ga-dev-tools.appspot.com/public/css/index.css" rel="stylesheet" />
    <script type="text/javascript">
        (function (w, d, s, g, js, fs) {
            g = w.gapi || (w.gapi = {}); g.analytics = { q: [], ready: function (f) { this.q.push(f); } };
            js = d.createElement(s); fs = d.getElementsByTagName(s)[0];
            js.src = 'https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js, fs); js.onload = function () { g.load('analytics'); };
        }(window, document, 'script'));
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head> 
<body class="nav-md"> 
    <div class="container body"> 
        <div class="main_container"> 
            <?php include('sidebar.php');  ?> 
            <div class="right_col" role="main">  
 <div id="embed-api-auth-container"></div>
			 <div class="Dashboard Dashboard--full">
        <header class="Dashboard-header">
            <ul class="FlexGrid">
                <li class="FlexGrid-item">
                    <div class="Titles">
                        <h1 class="Titles-main" id="view-name">Select a View</h1>
                        <div class="Titles-sub">Various visualizations</div>
                    </div>
                </li>
                <li class="FlexGrid-item FlexGrid-item--fixed">
                    <div id="active-users-container"></div>
                </li>
            </ul>
            <div id="view-selector-container"></div>
        </header>

        <ul class="FlexGrid FlexGrid--halves">
            <li class="FlexGrid-item">
                <div class="Chartjs">
                    <header class="Titles">
                        <h1 class="Titles-main">This Week vs Last Week</h1>
                        <div class="Titles-sub">By sessions</div>
                    </header>
                    <figure class="Chartjs-figure" id="chart-1-container"></figure>
                    <ol class="Chartjs-legend" id="legend-1-container"></ol>
                </div>
            </li>
            <li class="FlexGrid-item">
                <div class="Chartjs">
                    <header class="Titles">
                        <h1 class="Titles-main">This Year vs Last Year</h1>
                        <div class="Titles-sub">By users</div>
                    </header>
                    <figure class="Chartjs-figure" id="chart-2-container"></figure>
                    <ol class="Chartjs-legend" id="legend-2-container"></ol>
                </div>
            </li>
            <li class="FlexGrid-item">
                <div class="Chartjs">
                    <header class="Titles">
                        <h1 class="Titles-main">Top Browsers</h1>
                        <div class="Titles-sub">By pageview</div>
                    </header>
                    <figure class="Chartjs-figure" id="chart-3-container"></figure>
                    <ol class="Chartjs-legend" id="legend-3-container"></ol>
                </div>
            </li>
            <li class="FlexGrid-item">
                <div class="Chartjs">
                    <header class="Titles">
                        <h1 class="Titles-main">Top Countries</h1>
                        <div class="Titles-sub">By sessions</div>
                    </header>
                    <figure class="Chartjs-figure" id="chart-4-container"></figure>
                    <ol class="Chartjs-legend" id="legend-4-container"></ol>
                </div>
            </li>
			<li>
			 <div id="page-titles"></div>  
				<div id="view-selector-3-container"></div> 
			</li>
        </ul>
    </div> 

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script type="text/javascript" src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/view-selector2.js"></script>
    <script type="text/javascript" src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/date-range-selector.js"></script>
    <script type="text/javascript" src="https://ga-dev-tools.appspot.com/public/javascript/embed-api/components/active-users.js"></script>
    <script type="text/javascript"> gapi.analytics.ready(function () { 
            gapi.analytics.auth.authorize({
                container: 'embed-api-auth-container',
                clientid: '827131610908-i2oh1ijnljreh19e552t709u31ikfjps.apps.googleusercontent.com'
            }); 
			var activeUsers = new gapi.analytics.ext.ActiveUsers({container: 'active-users-container', pollingInterval: 5});
            activeUsers.once('success', function () {
                var element = this.container.firstChild;
                var timeout; 
                this.on('change', function (data) {
                    var element = this.container.firstChild;
                    var animationClass = data.delta > 0 ? 'is-increasing' : 'is-decreasing';
                    element.className += (' ' + animationClass);

                    clearTimeout(timeout);
                    timeout = setTimeout(function () {
                        element.className =
                            element.className.replace(/ is-(increasing|decreasing)/g, '');
                    }, 3000);
                });
            }); 
            var viewSelector = new gapi.analytics.ext.ViewSelector2({container: 'view-selector-container',}).execute();
            viewSelector.on('viewChange', function (data) {
                var title = document.getElementById('view-name');
                title.innerHTML = data.property.name + ' (' + data.view.name + ')';
                activeUsers.set(data).execute(); 
                renderWeekOverWeekChart(data.ids);
                renderYearOverYearChart(data.ids);
                renderTopBrowsersChart(data.ids);
                renderTopCountriesChart(data.ids);
            }); 
            function renderWeekOverWeekChart(ids) { 
                var now = moment();  
                var thisWeek = query({'ids': ids,'dimensions': 'ga:date,ga:nthDay','metrics': 'ga:sessions',
                    'start-date': moment(now).subtract(1, 'day').day(0).format('YYYY-MM-DD'),
                    'end-date': moment(now).format('YYYY-MM-DD')
                });

                var lastWeek = query({
                    'ids': ids,
                    'dimensions': 'ga:date,ga:nthDay',
                    'metrics': 'ga:sessions',
                    'start-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'week')
                        .format('YYYY-MM-DD'),
                    'end-date': moment(now).subtract(1, 'day').day(6).subtract(1, 'week')
                        .format('YYYY-MM-DD')
                });

                Promise.all([thisWeek, lastWeek]).then(function (results) {

                    var data1 = results[0].rows.map(function (row) { return +row[2]; });
                    var data2 = results[1].rows.map(function (row) { return +row[2]; });
                    var labels = results[1].rows.map(function (row) { return +row[0]; });

                    labels = labels.map(function (label) {
                        return moment(label, 'YYYYMMDD').format('ddd');
                    });

                    var data = {
                        labels: labels,
                        datasets: [
                          {
                              label: 'Last Week',
                              fillColor: 'rgba(220,220,220,0.5)',
                              strokeColor: 'rgba(220,220,220,1)',
                              pointColor: 'rgba(220,220,220,1)',
                              pointStrokeColor: '#fff',
                              data: data2
                          },
                          {
                              label: 'This Week',
                              fillColor: 'rgba(151,187,205,0.5)',
                              strokeColor: 'rgba(151,187,205,1)',
                              pointColor: 'rgba(151,187,205,1)',
                              pointStrokeColor: '#fff',
                              data: data1
                          }
                        ]
                    };

                    new Chart(makeCanvas('chart-1-container')).Line(data);
                    generateLegend('legend-1-container', data.datasets);
                });
            }


            /**
             * Draw the a chart.js bar chart with data from the specified view that
             * overlays session data for the current year over session data for the
             * previous year, grouped by month.
             */
            function renderYearOverYearChart(ids) {

                // Adjust `now` to experiment with different days, for testing only...
                var now = moment(); // .subtract(3, 'day');

                var thisYear = query({
                    'ids': ids,
                    'dimensions': 'ga:month,ga:nthMonth',
                    'metrics': 'ga:users',
                    'start-date': moment(now).date(1).month(0).format('YYYY-MM-DD'),
                    'end-date': moment(now).format('YYYY-MM-DD')
                });

                var lastYear = query({
                    'ids': ids,
                    'dimensions': 'ga:month,ga:nthMonth',
                    'metrics': 'ga:users',
                    'start-date': moment(now).subtract(1, 'year').date(1).month(0)
                        .format('YYYY-MM-DD'),
                    'end-date': moment(now).date(1).month(0).subtract(1, 'day')
                        .format('YYYY-MM-DD')
                });

                Promise.all([thisYear, lastYear]).then(function (results) {
                    var data1 = results[0].rows.map(function (row) { return +row[2]; });
                    var data2 = results[1].rows.map(function (row) { return +row[2]; });
                    var labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                  'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                    // Ensure the data arrays are at least as long as the labels array.
                    // Chart.js bar charts don't (yet) accept sparse datasets.
                    for (var i = 0, len = labels.length; i < len; i++) {
                        if (data1[i] === undefined) data1[i] = null;
                        if (data2[i] === undefined) data2[i] = null;
                    }

                    var data = {
                        labels: labels,
                        datasets: [
                          {
                              label: 'Last Year',
                              fillColor: 'rgba(220,220,220,0.5)',
                              strokeColor: 'rgba(220,220,220,1)',
                              data: data2
                          },
                          {
                              label: 'This Year',
                              fillColor: 'rgba(151,187,205,0.5)',
                              strokeColor: 'rgba(151,187,205,1)',
                              data: data1
                          }
                        ]
                    };

                    new Chart(makeCanvas('chart-2-container')).Bar(data);
                    generateLegend('legend-2-container', data.datasets);
                })
                .catch(function (err) {
                    console.error(err.stack);
                });
            }


            /**
             * Draw the a chart.js doughnut chart with data from the specified view that
             * show the top 5 browsers over the past seven days.
             */
            function renderTopBrowsersChart(ids) {

                query({
                    'ids': ids,
                    'dimensions': 'ga:browser',
                    'metrics': 'ga:pageviews',
                    'sort': '-ga:pageviews',
                    'max-results': 5
                })
                .then(function (response) {

                    var data = [];
                    var colors = ['#4D5360', '#949FB1', '#D4CCC5', '#E2EAE9', '#F7464A'];

                    response.rows.forEach(function (row, i) {
                        data.push({ value: +row[1], color: colors[i], label: row[0] });
                    });

                    new Chart(makeCanvas('chart-3-container')).Doughnut(data);
                    generateLegend('legend-3-container', data);
                });
            }


            /**
             * Draw the a chart.js doughnut chart with data from the specified view that
             * compares sessions from mobile, desktop, and tablet over the past seven
             * days.
             */
            function renderTopCountriesChart(ids) {
                query({
                    'ids': ids,
                    'dimensions': 'ga:country',
                    'metrics': 'ga:sessions',
                    'sort': '-ga:sessions',
                    'max-results': 5
                })
                .then(function (response) {

                    var data = [];
                    var colors = ['#4D5360', '#949FB1', '#D4CCC5', '#E2EAE9', '#F7464A'];

                    response.rows.forEach(function (row, i) {
                        data.push({
                            label: row[0],
                            value: +row[1],
                            color: colors[i]
                        });
                    });

                    new Chart(makeCanvas('chart-4-container')).Doughnut(data);
                    generateLegend('legend-4-container', data);
                });
            }
  gapi.analytics.ready(function () {
            gapi.analytics.auth.authorize({ container: 'embed-api-auth-container', clientid: '827131610908-i2oh1ijnljreh19e552t709u31ikfjps.apps.googleusercontent.com' });
             var viewSelector3 = new gapi.analytics.ViewSelector({ container: 'view-selector-3-container' }); 
       
            viewSelector3.execute();
         
var pageTitles = new gapi.analytics.googleCharts.DataChart({
                query: {'dimensions': 'ga:pagePath','metrics': 'ga:pageviews','segment': 'gaid::-1','sort': '-ga:pageviews','filters': 'ga:pagePath!=/'},
                chart: {type:'TABLE',container: 'page-titles',options: {title: 'Top Pageviews',width: '100%'}
                }
});

            pageTitles.on('success', function (result) {
                // Print the total pageview count to the console.
                console.log(result.response.totalsForAllResults['ga:pageviews']);
            });
            pageTitles.execute();  
            viewSelector3.on('change', function (ids) { pageTitles.set({ query: { ids: ids } }).execute(); });
        });

            /**
             * Extend the Embed APIs `gapi.analytics.report.Data` component to
             * return a promise the is fulfilled with the value returned by the API.
             * @param {Object} params The request parameters.
             * @return {Promise} A promise.
             */
            function query(params) {
                return new Promise(function (resolve, reject) {
                    var data = new gapi.analytics.report.Data({ query: params });
                    data.once('success', function (response) { resolve(response); })
                        .once('error', function (response) { reject(response); })
                        .execute();
                });
            }


            /**
             * Create a new canvas inside the specified element. Set it to be the width
             * and height of its container.
             * @param {string} id The id attribute of the element to host the canvas.
             * @return {RenderingContext} The 2D canvas context.
             */
            function makeCanvas(id) {
                var container = document.getElementById(id);
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                container.innerHTML = '';
                canvas.width = container.offsetWidth;
                canvas.height = container.offsetHeight;
                container.appendChild(canvas);

                return ctx;
            }


            /**
             * Create a visual legend inside the specified element based off of a
             * Chart.js dataset.
             * @param {string} id The id attribute of the element to host the legend.
             * @param {Array.<Object>} items A list of labels and colors for the legend.
             */
            function generateLegend(id, items) {
                var legend = document.getElementById(id);
                legend.innerHTML = items.map(function (item) {
                    var color = item.color || item.fillColor;
                    var label = item.label;
                    return '<li><i style="background:' + color + '"></i>' + label + '</li>';
                }).join('');
            }


            // Set some global Chart.js defaults.
            Chart.defaults.global.animationSteps = 60;
            Chart.defaults.global.animationEasing = 'easeInOutQuart';
            Chart.defaults.global.responsive = true;
            Chart.defaults.global.maintainAspectRatio = false;

        });
    </script>
			
			
			
               
            </div> 
      
 <footer><div class=""><p class="pull-right"> <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a></p></div>
                    <div class="clearfix"></div>
                </footer>   </div>
    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

    <script src="js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script> 
    <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.1.min.js"></script>
    <script type="text/javascript" src="js/maps/gdp-data.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script> 
</body>

</html>
