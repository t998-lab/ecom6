
                        <?php
                        
                        include("includes/connection.php");
                        $id=$_GET['id'];
                        $query=mysqli_query($conn,"SELECT * FROM admin WHERE admin_id=$id");
                        $row=mysqli_fetch_assoc($query);
                        $email=$row['admin_email'];
                        $name=$row['admin_fullname'];
                        $pass=$row['admin_password'];
                        if(isset($_POST['submit']))
                        {
                          $n=$_POST['fullname'];
                          $e=$_POST['email'];
                          $p=$_POST['password'];
                          $query=mysqli_query($conn,"UPDATE admin
                                              SET admin_email='$e',
                                              admin_fullname='$n',
                                              admin_password='$p'
                                              WHERE admin_id='$id'");
                          if($query){
                            header("location:adminManage.php");
                          }
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
                                                <input  type="text" name="fullname" class="form-control" value="<?php echo $name;?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Email</label>
                                                <input  type="text" name="email" class="form-control" value="<?php echo $email;?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Password</label>
                                                <input type="text" name="password" class="form-control" value="<?php echo $pass;?>">
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
 <?php include("includes/footer.html") ;?>                                