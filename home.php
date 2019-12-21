                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                            <h3>- Selamat Datang Kamu, Iya Kamu! -</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active">
								<a href="#home-pills" data-toggle="tab" aria-expanded="true">Beranda</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4>Hallo <?php echo $_SESSION['username']; ?></h4>
                                    <p>
                                        Kode User    : <?php echo $_SESSION['id_user']; ?> </br>
                                        Username     : <?php echo $_SESSION['username']; ?> </br>
										Departemen     : <?php echo $_SESSION['departemen']; ?> - <?php echo $_SESSION['hak_akses']; ?></br>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
 