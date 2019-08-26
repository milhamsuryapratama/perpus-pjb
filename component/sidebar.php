<section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info" style="background: none;">
                    <div class="image">
                        <img src="../assets/img/PJB_LOGO.jpg" width="100" style="border-radius: 0;">
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; font-weight: bold;">Login By <?=$_SESSION['nama']?></div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li <?php if ($_GET['page'] == 'dashboard') { ?>
                            class="active"
                        <?php } else {echo "";} ?>>
                            <a href="?page=dashboard" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li <?php if ($_GET['page'] == 'account'): ?>
                            class="active"
                        <?php endif ?>>
                            <a href="?page=account" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Account</span>
                            </a>
                        </li>


                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <li>
                                <a href="javascript:void(0);" <?php if ($_GET['page'] == 'buku' OR $_GET['page'] == 'tambah_buku' OR $_GET['page'] == 'edit_buku' OR $_GET['page'] == 'parent' OR $_GET['page'] == 'tambah_parent' OR $_GET['page'] == 'edit_parent' OR $_GET['page'] == 'rak' OR $_GET['page'] == 'tambah_rak' OR $_GET['page'] == 'edit_rak' OR $_GET['page'] == 'kategori' OR $_GET['page'] == 'tambah_kategori' OR $_GET['page'] == 'edit_kategori' OR $_GET['page'] == 'history') {
                                    echo "class='menu-toggle waves-effect waves-block'";
                                } else {
                                    echo "class='menu-toggle waves-effect waves-block toggled'";
                                } ?>>
                                    <i class="material-icons">view_list</i>
                                    <span>Menu</span>
                                </a>
                                <ul class="ml-menu" style="display: block;">
                                   <li <?php if ($_GET['page'] == 'buku' OR $_GET['page'] == 'tambah_buku' OR $_GET['page'] == 'edit_buku') { ?>
                                       class="active"
                                   <?php } ?>>
                                        <a href="?page=buku" class=" waves-effect waves-block">
                                            <i class="material-icons">text_fields</i>
                                            <span>Buku</span>
                                        </a>
                                    </li>
                                    <li <?php if ($_GET['page'] == 'parent' OR $_GET['page'] == 'tambah_parent' OR $_GET['page'] == 'edit_parent') { ?>
                                       class="active"
                                   <?php } ?>>
                                        <a href="?page=parent" class=" waves-effect waves-block">
                                            <i class="material-icons">text_fields</i>
                                            <span>Parent</span>
                                        </a>
                                    </li>
                                    <li <?php if ($_GET['page'] == 'rak' OR $_GET['page'] == 'tambah_rak' OR $_GET['page'] == 'edit_rak') { ?>
                                       class="active"
                                   <?php } ?>>
                                        <a href="?page=rak" class=" waves-effect waves-block">
                                            <i class="material-icons">text_fields</i>
                                            <span>Rak</span>
                                        </a>
                                    </li>
                                    <li <?php if ($_GET['page'] == 'kategori' OR $_GET['page'] == 'tambah_kategori' OR $_GET['page'] == 'edit_kategori') { ?>
                                       class="active"
                                   <?php } ?>>
                                        <a href="?page=kategori" class=" waves-effect waves-block">
                                            <i class="material-icons">text_fields</i>
                                            <span>Kategori</span>
                                        </a>
                                    </li>   
                                    <li <?php if ($_GET['page'] == 'history') { ?>
                                       class="active"
                                   <?php } ?>>
                                        <a href="?page=history" class=" waves-effect waves-block">
                                            <i class="material-icons">text_fields</i>
                                            <span>History</span>
                                        </a>
                                    </li>                           
                                </ul>
                            </li>  

                            <li>
                                <a href="?page=transaksi" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Transaksi</span>
                                </a>
                            </li> 

                            <li>
                                <a href="?page=master_kondisi" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Master Kondisi</span>
                                </a>
                            </li> 

                            <li <?php if ($_GET['page'] == 'users' || $_GET['page'] == 'tambah_user' || $_GET['page'] == 'edit_user') { ?>
                                class="active"
                            <?php } ?>>
                                <a href="?page=users" class=" waves-effect waves-block">
                                    <i class="material-icons">text_fields</i>
                                    <span>Users</span>
                                </a>
                            </li>
                        <?php } ?>                          

                        <li>
                            <a href="../query/keluar.php" class=" waves-effect waves-block">
                                <i class="material-icons">text_fields</i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
<!--                         <small><strong>Copyright © <script>document.write(new Date().getFullYear());</script> </strong> </strong></small> -->
                        <small><strong>DIGITAL LIBRARY PT PJB UBJ O&M PLTU PAITON</strong> </strong></small>
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->

            <!-- <script src="../assets/adminBSB/plugins/jquery/jquery.min.js"></script>

            <script>
                function keluar() {
                    $.get("../query/keluar.php", {}, (response) => {
                        window.location = "/pjb_buku";
                    })
                }
            </script> -->