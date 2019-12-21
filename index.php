<?php
include 'class.php';
if(empty($_SESSION['id_user']))
{
    echo "<script>alert('login dulu');</script>";
    echo "<script>window.location='login.php';</script>";
}

if(isset($_GET['aksi']))
{
    if($_GET['aksi']=='logout')
    {
        $pengguna->logout_pengguna();
        echo "<script>alert('anda telah logout');</script>";
        echo "<script>window.location='login.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- AUTO COMPLETE-->
  <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery-1.9.1.js"></script>
  <script src="js/jquery-ui.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="index.php"><b>|A.P.A.P.K|</b></a> 
				<br>
            </div>
		
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="index.php?aksi=logout" class="btn btn-default square-btn-adjust"><i class ="fa fa-bell-o"></i> Logout</a> </div>
        </nav>   
		<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"></div>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">					
                    <li>
                        <a  href="index.php?halaman=home"><i class="fa fa-desktop fa-3x"></i> Beranda </a>
                    </li>
                        <?php
                        if(($_SESSION['hak_akses']=="ADMIN")){
                        ?><li>
                        <a href="#"><i class="fa fa-qrcode fa-3x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						<li>
                                <a href="index.php?halaman=datauser">User</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=databrg">Barang</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=dataaset">Aset</a>
                            </li>
                        </ul>
                    </li>    
					<?php
						}
						?>
						<?php
                        if(($_SESSION['hak_akses']=="ADMIN")){
                        ?>    
                    <li>
                        <a href="#"><i class="fa fa-laptop fa-3x"></i>Data Transaksi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                    <li>
                        <a href="index.php?halaman=datandp">Daftar Permintaan<span></span></a>                      
                    </li>
					<li>
					 <a href="index.php?halaman=datasp">Surat Pengantar<span></span></a>
                           
                    </li>
					<li>
					 <a href="index.php?halaman=datanop">Order Pemesanan<span></span></a>
					 </li>
                       </ul> 
                    </li>
					 <li>
                        <a  href="index.php?halaman=laporanaset"><i class="fa fa-table fa-3x"></i> Laporan Persediaan Aset</a>
                    </li>
					<?php
						}
						?>
						<?php
                        if(($_SESSION['hak_akses']=="USER")){
                        ?>    
                    <li>
                         
                        <a href="index.php?halaman=datandpuser"><i class="fa fa-edit fa-3x"></i>Daftar Permintaan</a>
                           
                    </li>
                          <?php 
                        } 
                        ?>		
						<?php
                        if(($_SESSION['hak_akses']=="FINANCE")){
                        ?>    
                    <li>
                        <a href="index.php?halaman=datanopfi"><i class="fa fa-edit fa-2x"></i> Order Pemesanan</a>
                    </li>
                          <?php 
                        } 
                        ?>		 						
            </div>          
        </nav>  
        <!-- /. NAV SIDE  -->
		<section class="content-header" align="center">
        </section>
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
            include "connect.php";

            if(isset($_GET['halaman']))
            {
                if($_GET['halaman']=='databrg')
                {
                    include 'databrg.php';
                }
				elseif ($_GET['halaman']=='tambahbrg') 
                {
                        include 'barang/tambahbrg.php';
                }
                elseif($_GET['halaman']=='savebrg')
                {
                    include 'barang/save.php';
                }
				elseif ($_GET['halaman']=='ubahdatabrg')
                {
                         include 'barang/ubahbrg.php';
                }                    
                elseif ($_GET['halaman']=='ubahbrg') 
                {
                        include 'barang/ubah.php';
                }
                elseif($_GET['halaman']=='hapusbrg')
                {
                    include 'barang/hapus.php';	
                }   
				elseif($_GET['halaman']=='datauser')
                {
                    include 'datauser.php';
                }
				elseif ($_GET['halaman']=='tambahformuser') 
                {
                        include 'user/tambahuser.php';
                }
				elseif($_GET['halaman']=='saveuser')
                {
                       include 'user/save.php';
                }    
				elseif ($_GET['halaman']=='ubahformuser')
                {
                         include 'user/ubahuser.php';
                }                    
				elseif ($_GET['halaman']=='ubahuser') 
                {
                        include 'user/ubah.php';
                }
				elseif($_GET['halaman']=='hapususer')
                {
				include 'user/ubah.php';
                }
				elseif($_GET['halaman']=='hapususer')
                {
                    include 'admin/datansp.php';
                }                            
                elseif($_GET['halaman']=='datansp')
                {
                    include 'datansp.php';
					}
					elseif($_GET['halaman']=='tambahnsp')
					{
					include 'nsp/tambahnsp.php';
                }
				elseif($_GET['halaman']=='savensp')
					{
					include 'nsp/save.php';
                }
				 elseif ($_GET['halaman']=='dataaset') 
                {
                        include 'dataaset.php';
                }
                elseif ($_GET['halaman']=='tambahdataaset') 
                {
                        include 'aset/tambahaset.php';
                }
                elseif($_GET['halaman']=='saveaset')
                {
                       include 'aset/save.php';
                }    
                elseif ($_GET['halaman']=='ubahdataaset')
                {
                         include 'aset/ubahaset.php';
                }                    
                elseif ($_GET['halaman']=='ubahaset') 
                {
                        include 'aset/ubah.php';
                }
                elseif($_GET['halaman']=='hapusaset')
                {
                    include 'aset/hapus.php';
                }                                 
                elseif($_GET['halaman']=='datadp')
                {
                    include 'datadp.php';
                }
				 elseif($_GET['halaman']=='datadpuser')
                {
                    include 'datadpuser.php';
                }
                elseif ($_GET['halaman']=='tambahdp') 
                {
                        include 'dp/tambahdp.php';
                }
                elseif($_GET['halaman']=='savedp')
                {
                       include 'dp/save.php';
                }    
                elseif ($_GET['halaman']=='ubahdp')
                {
                         include 'dp/ubahdp.php';
                }                    
                elseif ($_GET['halaman']=='ubahdpp') 
                {
                        include 'dp/ubah.php';
                }
                elseif($_GET['halaman']=='hapusdp')
                {
                    include 'dp/hapus.php';
				}
                elseif ($_GET['halaman']=='home') 
                {                        
                        include 'home.php';
						
                }
			    elseif ($_GET['halaman']=='datasp') 
                {
                        include 'datasp.php';
                }
                elseif ($_GET['halaman']=='tambahsp') 
                {
                        include 'sp/tambahsp.php';
                }
                elseif($_GET['halaman']=='savesp')
                {
                       include 'sp/save.php';
                }    
                elseif ($_GET['halaman']=='ubahdatasp')
                {
                         include 'sp/ubahsp.php';
                }                    
                elseif ($_GET['halaman']=='ubahsp') 
                {
                        include 'sp/ubah.php';
                }
                elseif($_GET['halaman']=='hapussp')
                {
                    include 'sp/hapus.php';
                }   
				elseif($_GET['halaman']=='dataop')
                {
                    include 'dataop.php';
                }
				elseif($_GET['halaman']=='dataopfi')
                {
                    include 'dataopfi.php';
                }
				elseif($_GET['halaman']=='tambahop')
                {
                    include 'op/tambahop.php';
                }
				elseif($_GET['halaman']=='saveop')
                {
                    include 'op/save.php';
                }
				elseif($_GET['halaman']=='ubahdataop')
                {
                    include 'op/ubahop.php';
                }
				elseif($_GET['halaman']=='ubahop')
                {
                    include 'op/ubah.php';
                }
				elseif($_GET['halaman']=='hapusop')
                {
                    include 'op/hapus.php';
                }
				elseif ($_GET['halaman']=='datadpuser') 
                {
                    include 'datadpuser.php';
						}
                elseif ($_GET['halaman']=='dataspuser') 
                {
                        include 'dataspuser.php';
                		}		
						  elseif ($_GET['halaman']=='datandp') 
                {
                        include 'datandp.php';
                		}	
						 elseif ($_GET['halaman']=='datandpuser') 
                {
                        include 'datandpuser.php';
                		}	
							  elseif ($_GET['halaman']=='tambahndp') 
                {
                        include 'ndp/tambahndp.php';
                		}	
										  elseif ($_GET['halaman']=='savendp') 
                {
                        include 'ndp/save.php';
                		}
						 elseif ($_GET['halaman']=='ubahdatandp') 
                {
                        include 'ndp/ubahndp.php';
                		}
						 elseif ($_GET['halaman']=='ubahndp') 
                {
                        include 'ndp/ubah.php';
                		}
				  elseif ($_GET['halaman']=='hapusndp') 
                {
                        include 'ndp/hapus.php';
                		}
				elseif ($_GET['halaman']=='datanop') 
                {
                        include 'datanop.php';
                		}	
						 elseif ($_GET['halaman']=='datanopfi') 
                {
                        include 'datanopfi.php';
                		}	
							  elseif ($_GET['halaman']=='tambahnop') 
                {
                        include 'nop/tambahnop.php';
                		}	
				elseif ($_GET['halaman']=='savenop') 
                {
                        include 'nop/save.php';
                		}
						 elseif ($_GET['halaman']=='ubahdatanop') 
                {
                        include 'nop/ubahnop.php';
                		}
						 elseif ($_GET['halaman']=='ubahnop') 
                {
                        include 'nop/ubah.php';
                		}
				  elseif ($_GET['halaman']=='hapusnop') 
                {
                        include 'nop/hapus.php';
                		}	
				elseif ($_GET['halaman']=='laporanaset') 
                {
                include 'lapaset.php';
                }						
            }
            else
            {
                include 'home.php';
            }
            ?>
			 	 <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
               <strong><center>Copyright &copy; Sumboro 2016<a href="http://stmi.ac.id"> Politeknik STMI Jakarta</a>.</strong> All rights reserved.</center>
      </footer>
            </div>
             <!-- /. PAGE INNER  -->
		
        </div>
         <!-- /. PAGE WRAPPER  -->
		 
		
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>