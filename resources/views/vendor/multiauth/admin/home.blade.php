@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1><b>Admin Dashboard</b></h1>
@stop
@section('content')
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style:"padding: 10rem 3rem 2rem 3rem;" class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div style="border:white;background-color: white; box-shadow: 3px 3px gray; border-radius: 15px; class="col-lg-4 col-3">
            <!-- small box -->
                <!DOCTYPE html>
                    <html>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <body>
                    
                    <canvas id="myChart" style="height:500px;width:100%;max-width:300px"></canvas>
                    
                    <script>
                    var xValues = ["Male Students", "Female Students"];
                    var yValues = [75, 25];
                    var barColors = [
                      "#32CD32",
                      "#00aba9",
                    ];
                    
                    new Chart("myChart", {
                      type: "doughnut",
                      data: {
                        labels: xValues,
                        datasets: [{
                          backgroundColor: barColors,
                          data: yValues
                        }]
                      },
                      options: {
                        title: {
                          display: true,
                          text: "Total Students 1124"
                        }
                      }
                    });
                    </script>
                    
                    </body>
                    </html>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
          
          <!-- ./col -->
                    <div style="border:white;background-color: white; box-shadow: 3px 3px gray; border-radius: 15px; class="col-lg-4 col-3">
            <!-- small box -->
            <html>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                    <body>
                    
                    <canvas id="myChart1" style="height:500px;width:100%;max-width:300px"></canvas>
                    
                    <script>
                   var xValues = ["Hizb ur Rahman Islamic High School", "Hizb ur Rahman Islamic Science College", "Hizb ur Rahman College of Dars e Nizami", "Hizb ur Rahman Centre for Tahfees ul Quran", "Hizb ur Rahman Tuition Academy"];
var yValues = [200, 300, 144, 224, 315];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
                    ];
                    
                    new Chart("myChart1", {
                      type: "doughnut",
                      data: {
                        labels: xValues,
                        datasets: [{
                          backgroundColor: barColors,
                          data: yValues
                        }]
                      },
                      options: {
                        title: {
                          display: true,
                          text: "Students by Institutes"
                        }
                      }
                    });
                    </script>
                    
                    </body>
                    </html>
              
              
          </div>
          <!-- ./col -->
          
            <!-- small box -->
           
              
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <div>
                
                                                               <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-box {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
  border-radius: 15px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-box-front {
  background-color: white;
  color: black;
}

.flip-box-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}
</style>
</head>
<body>
<div class="flip-box">
  <div class="flip-box-inner">
    <div class="flip-box-front"><br>
      <h5><b>New Admissions Report</b> </h5>
    </div>
    <div class="flip-box-back">
      <head>
<style>
table, th, td {
  margin:5px;
  padding:10;
  align:center;
}
</style>
</head>
<body><br>

<h5><b>New Admissions Report</b> </h5>

<table style="background-color:bule; align=center">
  <tr>
    <th>Today</th>
    <th>&nbsp;&nbsp;This Week</th>
    <th>&nbsp;&nbsp;This Month</th>
  </tr>
  <tr>
    <td>35</td>
    <td>136</td>
    <td>690</td>
  </tr>
  
</table>

</body>
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
      <span class="sr-only">70% Complete</span>
    </div>
  </div>
    </div>
  </div>
</div>

</body>
</html>

                    </div>
              </div>
              
              <div class="container">
  
  
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          </div>
          
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              
            </div>
          </div>

        </div>
        <!-- /.row -->
</div>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
  smsBalance();
});

function smsBalance() {
        $.ajax({
            method: 'get',
            url: "{!!route('getSMSBalance')!!}",
            complete: function (result) {
              console.log(result.responseText);
              $data = JSON.parse(result.responseText); //convert the response to object 
              
               
              document.getElementById('psmsBalance').innerHTML=$data.available_balance.transactional_balance; //Echo out transactional balance
               
            }
        })
    }//end of smsBalance()
</script>
@endsection