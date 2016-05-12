 <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="../index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                                <span>Welcome,</span>
                            <h2><?php 
                                if($_SESSION['admin_id']!=''){
                                        $name = explode('@', $_SESSION['admin_email']);
                                       echo $name[0]; 
                                         } ?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                 <li><a href="advertisement.php"><i class="fa fa-table"></i> Home Add </a>
                                    
                                </li>
                               <!--  <li><a href="trending_ad.php"><i class="fa fa-table"></i> Trending Add </a>
                                    
                                </li> -->
                                <li><a><i class="fa fa-table"></i> Unite Of Measure <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="add_uom.php">Add</a>
                                        </li>
                                        <li><a href="view_uom.php">View</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-table"></i> Product Category <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="add_category.php">Add</a>
                                        </li>
                                        <li><a href="view_category.php">View</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li><a href="blog.php"><i class="fa fa-edit"></i> Blog </a>
                                   
                                </li>
                                 <li><a><i class="fa fa-home"></i> Contact <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="users.php">Registered Users</a>
                                        </li>
                                        <li><a href="contact.php">Contact Us</a>
                                        </li>
                                       
                                    </ul>
                                </li>
								<li><a href="pages.php"><i class="fa fa-home"></i> Pages </a> </li> 
                                 <li><a href="medicine_view.php"><i class="fa fa-home"></i>Search Medicine </a>
                                    
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                 </div>
            </div>

             <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php if($_SESSION['admin_id']!=''){
                            $name = explode('@', $_SESSION['admin_email']);
                                       echo $name[0]; 
                                         }  ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a>
                                    </li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>