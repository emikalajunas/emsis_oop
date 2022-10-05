   <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>dashboard</small>
                        </h1>                   
                   <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $session->count; ?></div>
                                        <div>New Views</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                     
                                  <span class="pull-left">View Details</span> 
                               <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-photo fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Photo:: count_all(); ?></div>
                                        <div>Photos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="photos.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Photos in Gallery</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo User:: count_all(); ?>

                                        </div>

                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Users</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                      <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo Comment:: count_all(); ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Total Comments</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                        </div> <!--First Row-->
                        
                        <div class="row">
                            <div id="piechart" style="width: 900px; height: 500px;">

                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        <?php

//                        echo INCLUDES_PATH;

//                        $photo = new Photo();
//                        $photo->title = "Padlioooga";
//                        $photo->size = "20";
//                        $photo->photo_id = "5";
//
//                        $photo->create();

                        //$user = User::find_by_id(30);
//                        $user->last_name = "trecuzeris";
//                        $user->first_name = "trecuzeris";
                        //echo $user->username;

//                         $photo = Photo::find_by_id(4);
//                        echo $photo->title;
//                        $user->update();


//                        $user = User::find_user_by_id(8);
//                        $user->delete();

//                        $user = User::find_user_by_id(5);
//                        $user->password = '8_atnaujintas_SN';
//                        $user->save();
//
//                        $user = new User();
//                        $user->find_by_id(30);
//                        //$user->username = 'neveikia_pdate';
//                        //$user->update();
//                        $user->delete();

//                        $photo = new Photo();
//                        //$photo->photo_id = 11111;
//                        $photo->title = 'testinissssss';
//                        $photo->save();




                        //$sql = "SELECT * FROM users WHERE id = 1" ;
                        //$result = $database->query($sql);
                        //$user_found = mysqli_fetch_array($result);
                        //echo $user_found['username'];

                        //instantiating class
                        //$user = new User; User OLD version before made Method STATIC

                        //calling User class METHOD find_all_users
                        //$result_set = $user->find_all_users(); User OLD version before made Method STATIC
                        //$result_set = User::find_all_users();

                        //loop through table
                        //while($row = mysqli_fetch_array($result_set)){
                            //echo $row['username'] . "<br>";
                        //}


                        //set number of user id to find it in database
                        //$found_user = User::find_user_by_id(1);

                        //new way OOP version to get propiertie without array and key with public static method instantiation()

                        //$user = User::instantiation($found_user);
                        //echo $user->id;
                        //echo '<br>';
                        //echo $user->username;
                        //echo '<br>';
                        //echo $user->first_name;
                        //echo '<br>';
                        //echo $user->last_name;

                        //we get only 1 result, so we dont need a loop
                        //echo $found_user['username']; // old way returning an array with key username

                        //
//                        $photos = Photo::find_all();
//                        foreach($photos as $photo){
//
//                            echo $photo->title . "<br>";
//
//                        }

//                        $found_user = User::find_user_by_id(1);
                        //echo $found_user->username;

                        //checking if session is SET

                        //echo $_SESSION['user_id'];


                        ?>

<!--
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        
                        
                        
                        
                        
                        
                        
                        
-->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
