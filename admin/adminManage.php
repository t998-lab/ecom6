
                        <?php
                        
                        include("includes/connection.php");
                        if(isset($_POST['submit']))
                        {
                          $fullname=$_POST['fullname'];
                          $email=$_POST['email'];
                          $password=$_POST['password'];
                          $query=mysqli_query($conn,"INSERT INTO admin (admin_fullname,admin_email,admin_password)
                                       VALUES('$fullname','$email','$password')");
                         
                        }
                        
                        include("includes/header.html"); ?>
                         <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Admins</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Admin Info</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Full Name</label>
                                                <input  type="text" name="fullname" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Email</label>
                                                <input  type="text" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                   Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $query=mysqli_query($conn,"SELECT * FROM admin");
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                echo"<tr><td>{$row['admin_id']}</td><td>{$row['admin_fullname']}</td><td>{$row['admin_email']}</td>";
                                                echo"<td><a href='EditAdmin.php?id=".$row['admin_id']."'class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='DeleteAdmin.php?id=".$row['admin_id']."' class='btn btn-danger'>Delete</a></td></tr>";
                                            }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
 <?php include("includes/footer.html") ;?>                                