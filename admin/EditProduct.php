                        <?php
                         include("includes/connection.php");
                         $id=$_GET['id'];
                        $query=mysqli_query($conn,"SELECT * FROM products WHERE pro_id=$id");
                        $row=mysqli_fetch_assoc($query);
                        $p_n=$row['pro_name'];
                        $p_d=$row['pro_desc'];
                        $p_p=$row['pro_price'];
                        $p_q=$row['qty'];
                      
                        if(isset($_POST['submit']))
                        {
                            $p_name=$_POST['p_name'];
                            $p_desc=$_POST['p_desc'];
                            $p_price=$_POST['p_price'];
                            $p_qty=$_POST['p_qty'];
                            if(!empty($_POST['cateforyID'])){
                             $catOption=$_POST['cateforyID'];
                             $s=mysqli_query($conn,"SELECT cat_id FROM category where cat_name = '$catOption'");
                             $f=mysqli_fetch_assoc($s);
                             $catID=$f['cat_id'];
                             $query=mysqli_query($conn,"UPDATE products SET
                                                 pro_name='$p_name',
                                                 pro_desc='$p_desc',
                                                 pro_price='$p_price',
                                                 cat_id='$catID',
                                                 qty='$p_qty'
                                                 WHERE pro_id='$id'");
                             if($query)
                             {
                                header("location:productManage.php");
                             }
                             
                            }
                         /* $cn=$_POST['cat_n'];
                          $cd=$_POST['cat_d'];
                          $query=mysqli_query($conn,"UPDATE category
                                              SET cat_name='$cn',
                                              cat_desc='$cd'
                                              WHERE cat_id='$id'");
                          if($query){
                            header("location:categoryManage.php");*/
                         // }
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
                                                <input  type="text" class="form-control" name="p_name" value="<?php echo $p_n;?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Description</label>
                                                <input  type="text" class="form-control" name="p_desc" value="<?php echo $p_d;?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Price</label>
                                                <input  type="text" class="form-control" name="p_price" value="<?php echo $p_p;?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Quantity</label>
                                                <input  type="text" class="form-control" name="p_qty" value="<?php echo $p_q;?>">
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
                        
 <?php include("includes/footer.html") ;?>                                