                        <?php
                         include("includes/connection.php");
                        include("includes/header.html"); ?>
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
                                                <th>Mobile</th>
                                                <th>address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                             $query=mysqli_query($conn,"SELECT * FROM customer");
                                            while($row=mysqli_fetch_assoc($query))
                                            {
                                                echo"<tr><td>{$row['cust_id']}</td><td>{$row['cust_name']}</td><td>{$row['cust_email']}</td>";
                                                echo"<td>{$row['cust_mobile']}</td><td>{$row['cust_address']}</td>";
                                                
                                            }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
 <?php include("includes/footer.html") ;?>                                