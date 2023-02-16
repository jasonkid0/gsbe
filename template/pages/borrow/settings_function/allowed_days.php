<div class="col-md-6 col-sm-6 col-xs-12"><Br>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="card-description">Allowable <small>(days)</small></h2>
                                    <div class="clearfix"></div>
                                </div>	
                                <div class="x_content">
                                    <div class="box">
                                    	<div class="box-body">
                                    		<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="card-description">No. of Day/Days</th>
                                                <th class="card-description">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$penalty_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysql_error());
										while ($row33= mysqli_fetch_array ($penalty_query) ){
										$allowed_days_id=$row33['allowed_days_id'];
										?>
                                            <tr>
                                                <td><?php echo $row33['no_of_days']; ?></td>
                                                <td>
													<a class="btn btn-primary" for="ViewAdmin" href="#edit1<?php echo $id;?>" data-bs-toggle="modal" data-bs-target="#edit1<?php echo $id;?>">
														<i class="fa fa-edit"></i> Edit
													</a>
												</td>

									<!-- edit modal -->
									<div class="modal fade" id="edit1<?php  echo $id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Day/s</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
										<div class="alert alert-primary">
										<?php
											$query2=mysqli_query($con,"select * from allowed_days where allowed_days_id='$allowed_days_id'")or die(mysql_error());
											$row44=mysqli_fetch_array($query2);
										?>
											<form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" >
												<div class="form-group">
													<label class="control-label">Day/s <span class="required" style="color:red;">*</span>
													</label>
													<div class="">
														<input type="number" min="0" max="100" step="1" name="no_of_days" value="<?php echo $row44['no_of_days']; ?>" id="first-name2" class="form-control">
													</div>
												</div>
												</div>
												<div class="modal-footer">
												<button type="submit" name="update" style="margin-bottom:5px;" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
												<button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-hidden="true">No</button>
												
												</div>
											</form>
												
												<?php
													if (isset($_POST['update'])) {
													
													$no_of_days1 = $_POST['no_of_days'];
													
													{
														mysqli_query ($con," UPDATE allowed_days SET no_of_days='$no_of_days1' ") or die (mysql_error());
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