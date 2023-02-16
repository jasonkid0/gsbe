<div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="card-description">Allowed Books <small>(per User)</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="box">
                                        <div class="box-body">
                                            <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="card-description">Quantity</th>
                                                <th class="card-description">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysql_error());
                                        while ($row11= mysqli_fetch_array ($allowed_book_query) ){
                                        $id=$row11['allowed_book_id'];
                                        ?>
                                            <tr>
                                                <td><?php echo $row11['qntty_books']; ?></td>
                                                <td>
                                                    <a class="btn btn-primary" for="ViewAdmin" href="#edit<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id;?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </td>

                                    <!-- edit modal -->
                                    <div class="modal fade" id="edit<?php  echo $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Quantity</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="alert alert-primary">
                                        <?php
                                            $query1=mysqli_query($con,"select * from allowed_book where allowed_book_id='$id'")or die(mysql_error());
                                            $row22=mysqli_fetch_array($query1);
                                        ?>
                                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label">Quantity <span class="required" style="color:red;">*</span>
                                                    </label>
                                                    <div class="">
                                                        <input type="number" min="0" max="100" step="1" name="qntty_books" value="<?php echo $row22['qntty_books']; ?>" id="first-name2" class="form-control">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" name="submit1" style="margin-bottom:5px;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true">No</button>
                                                
                                                </div>
                                            </form>
                                                
                                                <?php
                                                    if (isset($_POST['submit1'])) {
                                                    
                                                    $qntty_books = $_POST['qntty_books'];
                                                    
                                                    {
                                                        mysqli_query ($con," UPDATE allowed_book SET qntty_books='$qntty_books' ") or die (mysql_error());
                                                    }
                                                    {
                                                        echo "<script>alert('Edit Successfully!'); window.location='settings.php'</script>";
                                                    }
                                                        
                                                    }
                                                ?>
                                                
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                                
                                            </tr>
                            <?php } ?>
                                        </tbody>
                                    </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>