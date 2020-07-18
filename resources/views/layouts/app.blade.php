@php($page = Request::segment(2))
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Dealapp-Admin') }}</title>
  <link rel="shortcut icon" href="{{ asset('img/c.png')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->'
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('css/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('css/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('css/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 <style>
 tbody tr{
      border-radius: 6px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
  
  background-color: #ffffff;
 }
 .button{
         border-radius: 5px;
    background-color: #53004b;
    padding: 5px 10px;
    color: #fff;
 }
 td img{
         width: 53px;
    vertical-align: middle;
    margin: 0 10px;
    border: 1px solid gold;
    border-radius: 50%;
 }
.adsdes img{
    width: 100%;
    padding: 10px;
}
.adsdes a{
   width: 100%;
    line-height: 5;
    font-size: 18px!Important;
    text-align: center;
}
.bottom-table a {
    color: #01f403;
    font-size: 15px;
    font-weight: 600;
 }
.bottom-table p {
    color: #030303;
    margin: 0 0 10px;
    font-size: 16px;
}
 
 
 .label {
    padding: 0;
    font-size: 17px;
    color: #53004b;
    margin: auto;
    display: block;
  }
/* .bg-w {
    margin: 13px auto;}*/
 #maleprogress ,#femaleprogress {
      margin: auto;
    width: 80px;
    height: auto;
    position: relative;
}
 .small-box h3 {
    text-align: left;
    color: #5a5a5a;
    font-size: 22px;}
    .small-box p {
    text-align: left;
    color: #5a5a5a;
        font-size: 21px;
    }
 .ion{
         color: #01f403;
 }
 .bg-aqua , .bg-green{
         height: auto;
         border-radius: 3px;
    box-shadow: 0 2px 8px 0 rgba(180, 180, 180, 0.16);
    background-color: #f7f8fa!important;
 }
 .cadd p{
      color: #767676;
 }
.chart-container {
 
  margin: 0 auto;
}

.pie-chart-container,
.doughnut-chart-container {
 
  float: left;
}
#myModal .input-group .form-control,  #myModal .input-group .input-group-addon{
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border: unset;
    border-bottom: 2px solid #53400B;}

    #myModal .btn-change{
            background: #53400B;
    color: #fff;
    font-size: 18px;
    margin: 35px 0;
    }

 </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" style="margin-top: -20px;">
 
 <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard.index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img style="width: 100%;
    height: 55px;" src="{{ asset('img/a.png')}}" class="img-fluid"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width: 100%;
    height: 60px" src="{{ asset('img/logo.png')}}" class="img-fluid"></span>
    </a>
   
  
 <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
             <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            
               
          </li>
          <li class="user-menu">
              <p style="font-size:20px;font-family:Lato;"><img src="{{ asset('img/admin-circle.png')}}" style="width:35%;height:40px;">Admin</p>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="glyphicon glyphicon-chevron-down" style="color:#E9B200;" data-toggle="dropdown" style="height: 52px;">
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                
                <div>
                  <a href="#" data-toggle="modal" data-target="#myModal" style="color:black;">Change Password</a>
                </div>
              </li>
              <li class="user-footer">
                <div>
                  <a class="dropdown-item"  style="color:black;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">Logout</a>
                                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Change Password</h4>
      </div>
      <div class="modal-body ">
        <div class="card">
            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
            {{ csrf_field() }}
                <div>
                <label>Type Your Current Password</label>
                    <div class="input-group" id="show_current_password">
                  <input class="form-control" type="password" name="current_password" required>
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                </div>
                <div>
                <label>Type Your New Password</label>
                    <div class="input-group show-password" id="show_new_password">
                  <input class="form-control" type="password" name="new_password" required id="new_password">
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                </div>
                <div>
                <label>Type Your Confirm New Password</label>
                 <div class="input-group" id="show_confirm_password">
                  <input class="form-control" type="password" name="confirm_password" required id="confirm_password">
                  <div class="input-group-addon">
                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                 <button type="submit" class="btn btn-change">CHANGE</button>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@guest

@else
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <br>
      <br>
      <br>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="{{ ($page == 'dashboard') ? 'active' : ''}}"><a href="{{ route('dashboard.index')}}"><i class="glyphicon glyphicon-dashboard"  style="color:white;"></i> <span style="color:white;">Dashboard</span></a></li>
       <li class="treeview {{ in_array($page, ['upcoming', 'ongoing', 'recent', 'past']) ? 'active' : ''}}">
          <a href="#">
            <i class="glyphicon glyphicon-book"  style="color:white;"></i>
            <span style="color:white">Campaigning</span>
          
          </a>
          <ul class="treeview-menu">
            <li style="color:white; background-color: {{ ($page=='upcoming' ? '#e9b200;' : '#53004B;') }}"><a href="{{ route('upcoming.index') }}"><i class="glyphicon glyphicon-dashboard" style="color:white;"></i> Coming Soon</a></li>
            <li style="color:white; background-color: {{ ($page=='ongoing' ? '#e9b200;' : '#53004B;') }}"><a href="{{ route('ongoing.index') }}"><i class="glyphicon glyphicon-dashboard" style="color:white;"></i> On going</a></li>
            <li style="color:white; background-color: {{ ($page=='recent' ? '#e9b200;' : '#53004B;') }}"><a href="{{ route('recent.index') }}"><i class="glyphicon glyphicon-dashboard" style="color:white;"></i> Recently Over</a></li>
            <li style="background-color: {{ ($page=='past' ? '#e9b200;' : '#53004B;') }}"><a href="{{ route('past.index')}}"><i class="glyphicon glyphicon-dashboard" style="color:white;"></i> Past</a></li>
            
          </ul>
        </li>
       
         <li class="{{ ($page == 'product') ? 'active' : ''}}"><a href="{{ route('product.index')}}"><i class="glyphicon glyphicon-list-alt " style="color:white;"></i> <span style="color:white;">Product List</span></a></li>
        <li class="{{ ($page == 'user') ? 'active' : ''}}"><a href="{{ route('user.index')}}"><i class="glyphicon glyphicon-user" style="color:white;"></i> <span style="color:white;">Manage User</span></a></li>
        <li class="{{ ($page == 'winner') ? 'active' : ''}}"><a href="{{ route('winner.index')}}"><i class="glyphicon glyphicon-send" style="color:white;"></i> <span style="color:white;">Winners</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Left side column. contains the logo and sidebar -->
 @endif
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
  </div>      
 <!-- /.content-wrapper -->
 <style>

/* .bg-w {
    margin: 13px auto;
     width:95%;
 
}*/

 </style>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('js/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/dist/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/dist/adminlte.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('js/custom.js')}}"></script>

<!-- page script -->
@if($page == 'dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
     type: 'line',
    data: {
        labels: ['{{$prevM5 ?? ''}}', '{{$prevM4 ?? ''}}', '{{$prevM3 ?? ''}}', '{{$prevM2 ?? ''}}', '{{$prevM1 ?? ''}}', '{{$month ?? ''}}'],
        datasets: [{
            label: '# of Users',
            pointBackgroundColor: 'rgba(83, 0, 75, 1)',
            data: [{{$userMon6Count ?? ''}}, {{$userMon5Count ?? ''}}, {{$userMon4Count ?? ''}},{{$userMon3Count ?? '' ?? ''}},{{$userMon2Count ?? ''}},{{$userMon1Count ?? ''}}],
            fill:'false',
            backgroundColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderWidth: 4
        }]
    },
   options : {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: ''
          }
        }]
      }
    }
});

var ctx1 = document.getElementById('income-chart').getContext('2d');
var myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['{{$prevM5Count ?? ''}}', '{{$prevM4Count ?? ''}}', '{{$prevM3Count ?? ''}}', '{{$prevM2Count ?? ''}}', '{{$prevM1Count ?? ''}}', '{{$monthCount ?? ''}}'],
        datasets: [{
            label: 'Income',
            pointBackgroundColor: 'rgba(83, 0, 75, 1)',
            data: [{{$orderMon6Count ?? ''}}, {{$orderMon5Count ?? ''}}, {{$orderMon4Count ?? ''}}, {{$orderMon3Count ?? ''}}, {{$orderMon2Count ?? ''}}, {{$orderMon1Count ?? ''}}],
            fill:'false',
            backgroundColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderWidth: 0
        }]
    },
    options : {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'probability'
          }
        }]
      }
    }
});

var ctx = document.getElementById('income-chart7days').getContext('2d');
var myChart = new Chart(ctx, {
     type: 'bar',
    data: {
        labels: ['{{$prev6 ?? ''}}', '{{$prev5 ?? ''}}', '{{$prev4 ?? ''}}', '{{$prev3 ?? ''}}', '{{$prev2 ?? ''}}', '{{$prev1 ?? ''}}','{{$today ?? ''}}'],
        datasets: [{
            label: 'Income',
            pointBackgroundColor: 'rgba(83, 0, 75, 1)',
            data: [{{$order7Count ?? ''}}, {{$order6Count ?? ''}}, {{$order5Count ?? ''}}, {{$order4Count ?? ''}}, {{$order3Count ?? ''}}, {{$order2Count ?? ''}}, {{$order1Count ?? ''}}],
            fill:'false',
            backgroundColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderColor: [
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)',
                'rgba(83, 0, 75, 1)'
            ],
            borderWidth: 4
        }]
    },
   options : {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: ''
          }
        }]
      }
    }
});

$(function(){

  //get the doughnut chart canvas
  var ctx1 = $("#doughnut-chartcanvas-1");
  var ctx2 = $("#doughnut-chartcanvas-2");

  //doughnut chart data
   var data1 = {
    labels: [""],
    datasets: [
      {
        label: "",
        data: [{{ $activeUsers ?? '' }}],
        backgroundColor: [
          "#39b54a",
          "#e2ebf5"
        ],
        borderColor: [
          "#39b54a",
          "#e2ebf5"
        ],
        borderWidth: [1, 1]
      }
    ]
  };

  //doughnut chart data
  var data2 = {
    labels: ["Active", "Inactive"],
    datasets: [
      {
        label: "TeamB Score",
        data: [{{ $activeUsers ?? '' }}, 0],
        backgroundColor: [
          "#01f403",
          "#474747",
          "#e2ebf5"
        ],
        borderColor: [
          "#01f403",
          "#474747",
          "#e2ebf5"
        ],
        borderWidth: [1, 1, 1]
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: false,
      position: "top",
      text: "Doughnut Chart",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "right",
      labels: {
        fontColor: "#333",
        fontSize: 13
      }
    }
  };

  //create Chart class object
  var chart1 = new Chart(ctx1, {
    type: "doughnut",
    data: data1,
    options: options
  });

  //create Chart class object
  var chart2 = new Chart(ctx2, {
    type: "doughnut",
    data: data2,
    options: options
  });
});
</script>

@endif
<script type="text/javascript">
  $(".remove").on('click', function(event) {
      var t=$(event.relatedTarget),
      n=$(this),
      i=n.data("action")||n.find("form").attr("action"),
      a=t.data("message")||"this record",
      o=t.data("return-url")||"";
      $('#remove-form').attr("action",i),n.find('input[name="return_url"]').val(o),
      n.find("#message").text(a);
  });

  $(document).on('change', '#productId', function() {
      var id = $(this).val();
      var url = $('#campaign_url').val();
      if(url !="") { 
        window.location = url+"?id="+id;
      } else {
        @if($page == 'upcoming')
        window.location = "{{ route('upcoming.create') }}?id="+id;
        @elseif($page == 'recent')
        window.location = "{{ route('recent.create') }}?id="+id;
        @else
        window.location = "{{ route('ongoing.create') }}?id="+id;
        @endif
      }
    });

  
  $(".block").on('click', function(event) { 
      var t=$(event.relatedTarget),
      n=$(this),
      i=n.data("action")||n.find("form").attr("action"),
      status=n.data("status"),
      a=n.data("message")||"this record",
      o=n.data("return-url")||"";
      $('#block').attr("action",i),n.find('input[name="return_url"]').val(o),
      $(".message").html(a),
      $("#status").val(status);
  });

  $(function () {
  $(".pre-datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
  });
  $(".datepicker").datepicker({
        autoclose: true, 
        todayHighlight: true,
        startDate: '-0m',
  }).on('hide', function(ev) {
    endDate = new Date(ev.date);
        endDate.setDate(endDate.getDate() + 5);
        endDateString = ('0' + endDate.getDate()).slice(-2) + '/'
                        + ('0' + (endDate.getMonth()+1)).slice(-2) + '/'
                        + endDate.getFullYear();
    $(".exp-datepicker").datepicker('setStartDate', endDate);
});

$(".exp-datepicker").datepicker({autoclose: true});


function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [year, month, day].join('-');
 }
  @if($page == 'user' && isset($date))
  @php($uid = Request::segment(3))
    $(".datepicker").on("change", function() {
        var selected = $(this).find('.calander').val();
        window.location = "{{ route('user.show', $uid) }}?date="+selected;
    });
  @endif
  
    $("#select-img").change(function(){
        $('.combine').removeClass('hide');
        readURL(this, 'combine', 'img-preview');
    });
    $("#prize-img").change(function(){
        $('.prize').removeClass('hide');
        readURL(this, 'prize', 'prize-preview');
    });

    $('.decimal').keypress(function (e) {
        var character = String.fromCharCode(e.keyCode)
        var newValue = this.value + character;
        if (isNaN(newValue) || parseFloat(newValue) * 100 % 1 > 0) {
            e.preventDefault();
            return false;
        }
    });
  });
  function readURL(input, cls, preview) {
    setTimeout(function() {
        $('#'+preview).removeClass('hide');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                //do something special
                  $('#'+preview).attr('src', e.target.result);
              
                $('.'+cls).addClass('hide');
            }
            reader.readAsDataURL(input.files[0]);
        }
      }, 1000);  
    }

    $(".winner").on('click', function(event) {
      var t=$(event.relatedTarget);
      n=$(this),
      wn=n.data("name"),
      we=n.data("email"),
      wi=n.data("image"),
      o=n.data("orderType"),
      u=n.data("unit"),
      tn=n.data("num"),
      ul=n.data("url"),
      $("#winner-name").text(wn);
      $("#winner-email").text(we);
      $("#winner-image").attr("src", wi);
      $("#orderType").text(o);
      $("#ticketunit").text(u);
      $("#ticketnum").text(tn);
      $("#winnerUrl").attr("href", ul);
  });

  var password = document.getElementById("new_password");
  var confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;  
</script>
</body>
</html>

