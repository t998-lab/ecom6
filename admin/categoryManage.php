                        <?php
                        include("includes/connection.php");
                        if(isset($_POST['submit']))
                        {
                          $catName=$_POST['cat_name'];
                          $catDesc=$_POST['cat_desc'];
                          
                          $query=mysqli_query($conn,"INSERT INTO category (cat_name,cat_desc)
                                       VALUES('$catName','$catDesc')");
                         
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
                                                <input  type="text" class="form-control" name="cat_name">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control"  name="cat_desc">
                                            </div>
                                            <div class="custom-file  mb-1">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose Image</label>
                                              </div>
                                            <div>
                                                <button id="payment-button" type="submit"  name="submit"class="btn btn-lg btn-info btn-block">
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
                                                <th>description</th>
                                                <th>image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                           $query=mysqli_query($conn,"SELECT * FROM category");
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                echo"<tr><td>{$row['cat_id']}</td><td>{$row['cat_name']}</td><td>{$row['cat_desc']}</td><td></td>";
                                                echo"<td><a href='EditCat.php?id=".$row['cat_id']."'class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='DeleteCat.php?id=".$row['cat_id']."' class='btn btn-danger'>Delete</a></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
 <?php include("includes/footer.html") ;?>                                