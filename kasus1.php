<?php
include "config.php";
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_POST['tahun1'])) {
$adw = $_SESSION['tahun1'];
}
if (isset($_POST['tahun2'])) {
$aww = $_SESSION['tahun2'];
}

?>

<!DOCTYPE html>
<html lang="en">



    <head>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/highcharts.js" type="text/javascript"></script>
        <script src="js/exporting.js" type="text/javascript"></script>
        <script src="Chart.bundle.js"></script>
    <style type="text/css">
            .container {
                width: 10%;
                margin: auto;
                }

                .table1 {
                    border: 1;
                    font-family: sans-serif;
                    color: #444;
                    border-collapse: collapse;
                    width: 75%;
                    border: 1px solid #f2f5f7;
                }

                .table1 tr th{
                    background: #35A9DB;
                    color: #fff;
                    font-weight: normal;
                    text-align: center;
                }

                .table1, th, td {
                    padding: 8px 20px;
                    text-align: center;
                }

                .table1 tr:hover {
                    background-color: #f5f5f5;
                }

                .table1 tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
            
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Data Warehouse Pasien Rumah Sakit</title>
        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="images/logo.png" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
                        <form class="form form-search" action="search-results.html">
                            <input type="search" class="form-control" placeholder="Search" />
                        </form>
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                              <li class="divider"></li>
                              <li><a href="#"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
            <div class="mainwrapper">
                <div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="images/photos/profile.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Admin</h4>
                            <small class="text-muted">Ez</small>
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title"> </h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>                        
                        <li class="parent"><a href=""><i class="fa fa-edit"></i> <span>Menu Kasus</span></a>
                            <ul class="children">
                                <li><a href="kasus1.php">Kasus 1</a></li>
                                <li><a href="kasus2.php">Kasus 2</a></li>
                                <li><a href="kasus3.php">Kasus 3</a></li>
                            </ul>
                        </li>                        
                    </ul>                    
                </div><!-- leftpanel -->
                <div class="mainpanel">
                    <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li><a href="">Menu Kasus</a></li>
                                    <li>Kasus 1</li>
                                </ul>
                                <h4>Kasus 1</h4>
                            </div>
                        </div><!-- media -->
                    </div><!-- pageheader -->
                    
                    <div class="contentpanel">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-btns">
                                    <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <h4 class="panel-title">Kasus 1 - Query Untuk Menampilkan Jumlah Pasien yang Dirawat Berdasarkan Tahun </h4>
                                <br>
                                

                                     
                                <form action="" method="post">
                                Menampilkan Data Pasien Tahun  
                                     <select name="tahun1">
                                    <?php
                                        $atahun= mysql_query("SELECT DISTINCT  tahun FROM dim_waktu ORDER BY tahun ASC;");
                                        while( $waw = mysql_fetch_row($atahun)){
                                     ?>

                                     <option value="<?php echo $waw[0]; ?>"><?php echo $waw[0]; ?></option>
                                     <?php } ?>
                                     </select>
                                        Sampai dengan Tahun
                                    <select name="tahun2">  
                                     <?php
                                        $atahun2= mysql_query("SELECT DISTINCT  tahun FROM dim_waktu ORDER BY tahun ASC;");
                                        while( $waw = mysql_fetch_row($atahun2)){
                                     ?>

                                     <option value="<?php echo $waw[0]; ?>"><?php echo $waw[0]; ?></option>
                                     <?php } ?>
                                     </select>  
                                     <button type="submit">Select</button>
                                 </form>   
                                
                            </div><!-- panel-heading -->
                            <div class="panel-body">    
                            <h4 align="center"><?php echo "Grafik Pasien Tahun"; 
                                                                for($i=$_POST['tahun1'];$i<=$_POST['tahun2'];$i++){
                                                                 $test= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND m.tahun='$i' ORDER BY m.tahun ASC;");
                                                                    $hit=mysql_num_rows($test); echo " $i.";}; ?></h4>
                         
                                <canvas id="myChart" width="100" height="20"></canvas>
                          

                               <script>
                                    var ctx = document.getElementById("myChart");
                                    var myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: [<?php 
                                                            for($i=$_POST['tahun1'];$i<=$_POST['tahun2'];$i++){
                                                                 $test= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND m.tahun='$i' ORDER BY m.tahun ASC;");
                                                                    $hit=mysql_num_rows($test); echo "$i,";}?>],
                                            datasets: [{
                                                    label: '',
                                                    data: [<?php 
                                                            for($i=$_POST['tahun1'];$i<=$_POST['tahun2'];$i++){
                                                                 $test= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND m.tahun='$i' ORDER BY m.tahun ASC;");
                                                                    $hit=mysql_num_rows($test); echo "$hit,";}?>],
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                        },
                                        options: {
                                            scales: {
                                                yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                            }
                                        }
                                    });
                                </script> 

                                    <?php      
                                    
                                
                                        $aww=$_POST['tahun1'];
                                        $adw=$_POST['tahun2'];
                                         $tampil= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND m.tahun BETWEEN '$aww' AND '$adw' ORDER BY m.tanggal ASC;");
                                    ?>

                                    

        

                            <div class="panel-body">
                            <h4 align="center"><?php echo "Tabel Pasien Tahun"; 
                                                                for($i=$_POST['tahun1'];$i<=$_POST['tahun2'];$i++){
                                                                 $test= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND m.tahun='$i' ORDER BY m.tahun ASC;");
                                                                    $hit=mysql_num_rows($test); echo " $i.";}; ?></h4>
                            <br>
                            <table class="table1" align="center">
                                    <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Diagnosa</th>
                                    <th>Tahun</th>
                                    </tr>
                                        <?php 
                                        $x=1;
                                        while($data=mysql_fetch_row($tampil)){   ?>
                                        <tr>
                                        <td><?php echo $x;?></td>
                                        <td><?php echo $data[0];?></td>
                                        <td><?php echo $data[1];?></td>
                                        <td><?php echo $data[2];?></td>
                                        <td><?php echo $data[3];?></td>
                                        <td><?php echo $data[4];?></td>
                                        </tr>
                                        <?php
                                        $x++;}
                                        ?>
                            </table>

                            </div><!-- row -->
                        </div><!-- panel -->                        
                    </div><!-- contentpanel -->
                </div><!-- mainpanel -->
            </div><!-- mainwrapper -->
        </section>


        

    </body>
</html>
