<?php include 'includes/header.php';?>
<?php include 'includes/sidenav.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
                if (isset($_GET['delcat'])) {
                	$delid = $_GET['delcat'];
                	$delquery = "delete from tbl_category where id='$delid'";
                	$deldata = $db->delete($delquery);
                	if($deldata ){
                		  echo "<span class='sucess'>Category delete sucessfully</span>";
                        }else{
                             echo "<span class='error'>Category not delete</span>";
                        }
                }


                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php
								$myQuery = "SELECT * FROM tbl_category";
								$read = $db->select($myQuery);

								if($read){
									$i = 0;
									while($result = $read->fetch_assoc()){
										$i++;
							?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a href="editcategory.php?editcat=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to DELETE!!');" href="?delcat=<?php echo $result['id'];?>">Delete</a></td>

						</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
<?php include 'includes/footer.php';?>
