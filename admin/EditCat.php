                        <?php
                        include("includes/connection.php");
                        $id=$_GET['id'];
                        $query=mysqli_query($conn,"SELECT * FROM category WHERE cat_id=$id");
                        $row=mysqli_fetch_assoc($query);
                        $catName=$row['cat_name'];
                        $catDesc=$row['cat_desc'];
                      
                        if(isset($_POST['submit']))
                        {
                          $cn=$_POST['cat_n'];
                          $cd=$_POST['cat_d'];
                          $query=mysqli_query($conn,"UPDATE category
                                              SET cat_name='$cn',
                                              cat_desc='$cd'
                                              WHERE cat_id='$id'");
                          if($query){
                            header("location:categoryManage.php");
                          }
                        }
                        
                        include("includes/header.html"); ?>
                         <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Catrgory Info</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Category Name</label>
                                                <input  type="text" class="form-control" name="cat_n" value="<?php echo $catName;?>"> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="cat_d" value="<?php echo $catDesc;?>">
                                            </div>
                                          
                                            <div>
                                                <button id="payment-button" type="submit"  name="submit"class="btn btn-lg btn-info btn-block">
                                                   Update
                                                </button>
                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                        </div>
 <?php include("includes/footer.html") ;?>                                