                        <?php
                         include("includes/connection.php");
                          if(isset($_POST['submit']))
                        {
                          $product_name=$_POST['p_name'];
                          $product_desc=$_POST['p_desc'];
                          $price=$_POST['p_price'];
                          $qty=$_POST['p_qty'];
                          if(!empty($_POST['cateforyID'])){
                             $catOption=$_POST['cateforyID'];
                             $s=mysqli_query($conn,"SELECT cat_id FROM category where cat_name = '$catOption'");
                             $f=mysqli_fetch_assoc($s);
                             $catID=$f['cat_id'];
                             $query=mysqli_query($conn,"INSERT INTO products(pro_name,pro_desc,pro_price,qty,cat_id)
                                                 VALUES('$product_name','$product_desc','$price','$qty','$catID')");
                             
                            }
                        }
                        include("includes/header.html"); ?>
                         <div class="row">
                           <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Products</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Product Info</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Product Name</label>
                                                <input  type="text" class="form-control" name="p_name">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control" name="p_desc">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Price</label>
                                                <input  type="text" class="form-control" name="p_price">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Quantity</label>
                                                <input  type="text" class="form-control" name="p_qty">
                                            </div>
                                            <div class="custom-file  mb-3">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose Image</label>
                                            </div>
                                            <select name="cateforyID" class="custom-select mb-3">
                                              <?php
                                                    
                                                    $query=mysqli_query($conn,"SELECT cat_id,cat_name FROM category");
                                                    while($row=mysqli_fetch_assoc($query)):;?>
                                                   <option name=""><?php echo $row['cat_name'];?></option>
                                                   <?php endwhile; ?> 
                                            </select>
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
                                                <th>description</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                             $query=mysqli_query($conn,"SELECT * FROM products");
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                echo"<tr><td>{$row['pro_id']}</td><td>{$row['pro_name']}</td><td>{$row['pro_desc']}</td>";
                                                echo"<td>{$row['pro_price']}</td><td>{$row['qty']}</td><td></td>";
                                                echo"<td><a href='EditProduct.php?id=".$row['pro_id']."'class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='DeleteProduct.php?id=".$row['pro_id']."' class='btn btn-danger'>Delete</a></td></tr>";
                                            }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
 <?php include("includes/footer.html") ;?>                                