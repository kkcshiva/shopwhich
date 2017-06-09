	 <div class="col-md-3">
            		<div class="category_widget">
			          <h3>Category</h3>
			          <ul class="list-unstyled arrow">
					  <?php
					    while ($resss_data = mysql_fetch_array($resss)) {
			            ?> 
						<li><a href="productesrelated.php?prod=<?php echo base64_encode($resss_data['product_name']); ?>">
						<?php echo $resss_data['product_name']; ?>
					    <!--	<span class="badge pull-right"> <?php //echo $resss_data['count']; ?></span>--></a></li>
			            <!--<li><a href="#">Media <span class="badge pull-right">11</span></a></li>
			            <li><a href="#">Marketing <span class="badge pull-right">31</span></a></li>---->
						<?php } ?>
			          </ul>
        			</div>

        		</div>