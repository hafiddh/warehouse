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
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Data Warehouse Pasien Rumah Sakit</title>

        <link href="css/style.default.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/select2.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="style.css">
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
                                    <li>Kasus 3</li>
                                </ul>
                                <h4>Kasus 3</h4>
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
                                  
                             <h4 class="panel-title">Kasus 3 - Menampilkan Data Pasien yang Masih Aktif/Tidak pada Tahun Tertentu </h4>
                                <br>
                                

                                     
                                <form action="" method="post">
                                Menampilkan Data Pasien yang    
                                     <select name="aktif">
                                    <?php
                                        $aktif= mysql_query("SELECT nama_status FROM dim_status ;");
                                        while( $waw = mysql_fetch_row($aktif)){
                                     ?>

                                     <option value="<?php echo $waw[0]; ?>"><?php echo $waw[0]; ?></option>
                                     <?php } ?>
                                     </select>

                                       pada Tahun

                                    <select name="aktif2">  
                                     <?php
                                        $aktif2= mysql_query("SELECT DISTINCT  tahun FROM dim_waktu ORDER BY tahun ASC;");
                                        while( $waw = mysql_fetch_row($aktif2)){
                                     ?>

                                     <option value="<?php echo $waw[0]; ?>"><?php echo $waw[0]; ?></option>
                                     <?php } ?>


                                     </select>  
                                        <button type="submit">Select</button>
                                 </form>   

                            <div class="panel-body">
                                    <?php      
                                    $stat=$_POST['aktif'];
                                    $stat2=$_POST['aktif2']; 
                                        $tampil= mysql_query("SELECT  m.tanggal,n.nama_pasien,n.jenis_kelamin,o.nama_diagnosa,q.nama_status,m.tahun FROM dim_waktu m, dim_pasien n, dm_diagnosa o,fact_pasien_rawat p,dim_status q WHERE p.ID_waktu=m.ID_waktu AND p.IDpasien=n.IDpasien AND p.IDdiagnosa=o.IDdiagnosa AND nama_status='$stat' AND tahun='$stat2' ORDER BY m.tanggal ASC;");
                                    ?>     


                            <div class="panel-body">
                             <h4 align="center">
                            <?php $lol=$_POST['aktif'];
                                    $lol2=$_POST['aktif2']; 
                                echo "Tabel Data Pasien $lol Pada Tahun $lol2";
                            ?></h4>
                            <br>
                            <table class="table1" align="center">
                                    <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Diagnosa</th>
                                    <th>Status</th>
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
                                        <td><?php echo $data[5];?></td>
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


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/modernizr.min.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/retina.min.js"></script>
        <script src="js/jquery.cookies.js"></script>
        
        <script src="js/flot/jquery.flot.min.js"></script>
        <script src="js/flot/jquery.flot.resize.min.js"></script>
        <script src="js/flot/jquery.flot.spline.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/raphael-2.1.0.min.js"></script>
        <script src="js/bootstrap-wizard.min.js"></script>
        <script src="js/select2.min.js"></script>

        <script src="js/custom.js"></script>
        <script src="js/dashboard.js"></script>

    </body>
</html>
