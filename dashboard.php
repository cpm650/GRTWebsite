<?php
    $summer_data=file_get_contents('../../summer_data.csv');
    $summer_parsed=str_getcsv($summer_data,"\n");
    $summer_all=array();
    foreach($summer_parsed as $summer_tmp) array_push($summer_all,str_getcsv($summer_tmp));
    $test="{result:[['Terman',4],['JLS',5],['Juana Briones',5]]}";
    $grades=array(5=>0,6=>0,7=>0,8=>0,'mid'=>0);
    foreach($summer_all as $summer_tmp) {$grades[$summer_tmp[14]]+=1;}
    $grades_pie='{result:[[\'5\','.strval($grades[5]).'],[\'6\','.strval($grades[6]);
    $grades_pie=$grades_pie.'],[\'7\','.strval($grades[7]).'],[\'8\','.strval($grades[8]);
    $grades_pie=$grades_pie.'],[\'9+\','.strval($grades['mid']).']]}';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Layouts &raquo; Two-and-One</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

  <!-- Demo Dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.3.2/holder.min.js" type="text/javascript"></script>
  <script>
    Holder.add_theme("white", { background:"#fff", foreground:"#a7a7a7", size:10 });
  </script>

  <!-- keen-analysis@1.2.2 -->
  <!--<script src="https://d26b395fwzu5fz.cloudfront.net/keen-analysis-1.2.2.js" type="text/javascript"></script>-->

  <!-- keen-dataviz@1.1.3 -->
  <!--<link href="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.1.3.css" rel="stylesheet" />
  <script src="https://d26b395fwzu5fz.cloudfront.net/keen-dataviz-1.1.3.js" type="text/javascript"></script>-->

  <!--Previously:
    <link src="CSS/keen-dataviz.css" rel="stylesheet" type="text/css" />
    Learned the difference between src and href the hard way
    -->
    <link href="CSS/keen-dataviz.css" rel="stylesheet" type="text/css" />

  <!-- Dashboard -->
  <link rel="stylesheet" type="text/css" href="CSS/keen-dashboards.css" />
  <!--<script src="JS/dashboard.js" type="text/javascript"></script>-->
</head>
<body class="keen-dashboard" style="padding-top: 80px;">

  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="navbar-brand" href="./">Dashboard Starter UI</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li><a href="https://keen.io">Home</a></li>
          <li><a href="https://keen.io/team">Team</a></li>
          <li><a href="https://github.com/keenlabs/dashboards/tree/gh-pages/layouts/two-and-one">Source</a></li>
          <li><a href="https://groups.google.com/forum/#!forum/keen-io-devs">Community</a></li><li><a href="http://stackoverflow.com/questions/tagged/keen-io?sort=newest&pageSize=15">Technical Support</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Total sign-ups
          </div>
          <div class="chart-stage" id="count" style="height:350px">
          </div>
          <!--<div class="chart-notes">
            This is a sample text region to describe this chart.
          </div>-->
        </div>
      </div>

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            School distribution
          </div>
          <div class="chart-stage" id="pie-school" style="height:350px;">
              <!--<img data-src="holder.js/100%x350/white">-->
          </div>
          <!--<div class="chart-notes">
            Notes go down here
          </div>-->
        </div>
      </div>

      <div class="col-sm-4">
        <div class="chart-wrapper">
          <div class="chart-title">
            Grade distribution
          </div>
          <div class="chart-stage" id="pie-grade" style="height:350px;">
              <!--<img data-src="holder.js/100%x350/white">-->
          </div>
          <!--<div class="chart-notes">
            Notes go down here
          </div>-->
        </div>
      </div>

    </div>
    <div class="row">

      <div class="col-sm-12">
        <div class="chart-wrapper">
          <div class="chart-title">
            Impressions by advertiser
          </div>
          <div class="chart-stage" id="history" style="height:250px;">
          </div>
        </div>
      </div>

    </div>

  </div>
  <?php echo $summer_all[2][14]; echo $grades['mid'];?>
  <div class="container-fluid">
    <p class="small text-muted">Built with <a href="https://keen.io">Keen IO</a></p>
  </div>

  <script type="text/javascript" src="JS/keen-dataviz.js"></script>
    <script>
    console.log('Hi!');
    const area_chart = new KeenDataviz({
        container: '#count', // querySelector
        type: 'metric'
    });
    /*area_chart.render({result:[1,2,3,4,50]});*/
    /*area_chart.render({result: ['data1', 300, 350, 300, 0, 0, 0]});*/
    area_chart.render({result: 14});
    const pie_school = new KeenDataviz({
        container: '#pie-school', // querySelector
        type: 'pie',
    });
    pie_school.render(<?php echo $test?>);
    const pie_chart = new KeenDataviz({
        container: '#pie-grade', // querySelector
        type: 'pie',
    });
    pie_chart.render(<?php echo $grades_pie?>);
    const history_chart = new KeenDataviz({
        container: '#history',
        type: 'area',
    });
    history_chart.render({result:[3,4,3,5,6,4,3]});
    </script>

  <!-- Project Analytics -->
  <!--<script type="text/javascript" src="dashboards-gh-pages/assets/js/keen-analytics.js"></script>-->
</body>
</html>
