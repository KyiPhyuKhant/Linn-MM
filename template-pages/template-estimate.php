<?php get_header(); ?>

<?php /*Template Name: Linn Estimate */ ?>

<style type="text/css">
input[type=text],input[type=email],input[type=number]{
	background: #f8f8f8;
    border: 1px solid #dcd9d9;
    height: 40px;
}
.div-inner{
	border: 1px solid #dcd9d9;
    background: #f8f8f8;
    padding: 10px;
    margin-bottom: 10px;
}
.div-inner > p.title {
    color: #006DAE;
}
button.calculate{
	background: #006dae;
    border: 1px solid #006dae;
    padding: 15px 25px;
}

.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4); 
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 70%;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script>
	document.addEventListener('DOMContentLoaded',function(){
		var btnCalculate = document.getElementById("calculate");
		var estimateModal = document.getElementById("estimateModal");
		var spanClose = document.getElementsByClassName("close")[0];

		btnCalculate.onclick = function(e) {
		  e.preventDefault();

		  var width = document.getElementById('width').value;
		  var height = document.getElementById('height').value;
		  var phone = document.getElementById("contact_phone_no").value;
		  var pae_rate_price = (document.querySelector('.pae_rate_price:checked'))?document.querySelector('.pae_rate_price:checked').value:'';
		  var building_design = (document.querySelector('.building_design:checked'))?document.querySelector('.building_design:checked').value:'';
		  var modalContent = estimateModal.querySelector('.modal-content').querySelector("div.content");
		  var error = '';
		  var result = '';
		  var price = '';

		  if(width == ''){
		  	error += "<div class='col-md-12' style='color:red;'>Please enter Width value </div>";
		  }
		  if(height == ''){
		  	error += "<div class='col-md-12' style='color:red;'>Please enter Height value </div>";
		  }
		   if(pae_rate_price == ''){
		  	error += "<div class='col-md-12' style='color:red;'>Please choose PAE Rate & Price value </div>";
		  }
		   if(building_design == ''){
		  	error += "<div class='col-md-12' style='color:red;'>Please choose Building Design value </div>";
		  }

		  if(error == ''){
		  	price = Number(width) * Number(height) * Number(pae_rate_price) * Number(building_design);
		  	result += '<div class="col-md-7 col-xs-12">စုစုပေါင်းခန်.မှန်းကုန်ကျစရိတ်</div><div class="col-md-5 col-xs-12">' + price  + '</div>';
		  	result += '<div class="col-md-7 col-xs-12">ဆက်သွယ်ရန်</div><div class="col-md-5 col-xs-12">' + phone +'</div>';
		  	modalContent.innerHTML = result;
		  }else{
		  	modalContent.innerHTML = error;
		  }

		  
		  estimateModal.style.display = "block";
		}
		spanClose.onclick = function() {
		  estimateModal.style.display = "none";
		}
		window.onclick = function(event) {
		  if (event.target == estimateModal) {
		    estimateModal.style.display = "none";
		  }
		}
	})
	
</script>
<div class="slider_home mr-tp">
	<div class="contact_wrapper">
		<div class="container">
			<div id="content" class="pageContent">
				<form autocomplete="off">
					<div class="row">
						<?php
							$id = get_the_ID();
							$contact_phone_no = get_post_meta($id, 'contact_phone_no', true); 
						?>
						<input type="hidden" name="contact_phone_no" id="contact_phone_no" value="<?php echo $contact_phone_no; ?>">
						<h5 class="entry-title">Estimate Price</h5> 
						<div class="col-md-12 col-xs-12">					
						  <div class="form-group row">
						    <label for="name" class="col-md-12 col-xs-12">Name (အမည်) :</label>
						    <div class="col-md-6 col-xs-12">
						    	<input type="text" class="form-control" id="name"  placeholder="" autocomplete="off">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="email" class="col-md-12 col-xs-12">Email (အီးမေးလ် လိပ်စာ) :</label>
						    <div class="col-md-6 col-xs-12">
						    	<input type="Email" class="form-control" id="email"  placeholder="" autocomplete="off">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="phone" class="col-md-12 col-xs-12">Phone (ဖုန်းနံပါတ်) :</label>
						    <div class="col-md-6 col-xs-12">
						    	<input type="text" class="form-control" id="phone"  placeholder="" autocomplete="off">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="width" class=col-md-12 col-xs-12">Width (အလျား) :</label>
						    <div class="col-md-6 col-xs-12">
						    	<input type="number" class="form-control" id="width"  placeholder="" autocomplete="off">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="height" class="col-md-12 col-xs-12">Height (အနံ) :</label>
						    <div class="col-md-6 col-xs-12">
						    	<input type="number" class="form-control" id="height"  placeholder="" autocomplete="off">
						    </div>
						  </div>
						</div>
					</div>

					<div class="row">
						<h5 class="entry-title">PAE Rate & Price</h5> 
						<?php
						$args = array(  
					        'post_type' => 'pae_rate_price',
					        'post_status' => 'publish',
					        'posts_per_page' => -1, 
					        'order' => 'ASC',
					    );

					    $loop = new WP_Query( $args ); 
					    $pae_rate_price_count = 0 ; 
					    while ( $loop->have_posts() ) : $loop->the_post(); 
					    	$pae_rate_price_count++;
					    ?> 
					        <div class="col-md-3 col-xs-12">
						    	<input type="radio" name="pae_rate_price" class="pae_rate_price" value="<?php echo get_post_meta( get_the_ID(), 'price', true ); ?>">
						    	<div class="div-inner">
						    		<p class="title">
						    			<?php echo $post->post_title; ?>
						    		</p>
						    		<p>
						    			PAE Price : <?php echo get_post_meta( get_the_ID(), 'price', true ); ?> MMK
						    		</p>
						    	</div>
						    	<p>
						    		<?php echo $post->post_content; ?>
						    	</p>
						    </div>
						    <?php if ($count==4) { $count = 0;?>
							        <div class="clearfix"></div>
							<?php } ?>
					    <?php
					    endwhile;

					    wp_reset_postdata(); 
					    ?>
					</div>
					 
					<div class="row">
						<h5 class="entry-title">Building Design</h5> 
						<?php
							$args = array(  
						        'post_type' => 'building_design',
						        'post_status' => 'publish',
						        'posts_per_page' => -1, 
						        'order' => 'ASC',
						    );

						    $loop = new WP_Query( $args ); 
						    $pae_rate_price_count = 0 ; 
						    while ( $loop->have_posts() ) : $loop->the_post(); 
						    	$pae_rate_price_count++;
						?> 
						    <div class="col-md-4 col-xs-12">
								<input type="radio" name="building_design" class="building_design" value="<?php echo get_post_meta( get_the_ID(), 'price', true ); ?>">
								<div class="div-inner">
									<img src="<?php echo get_bloginfo('url').'/wp-content/uploads/2020/09/1.jpg'; ?>" width="" height="" alt="" />
									<?php 
									 $featured_img = wp_get_attachment_image_src( $post->ID );
									 if ( $feature_img ) {
									 ?>
								        <img src="<?php echo $featured_img['url']; ?>" style="width:100%;height:auto;">
								    <?php
								        }
									?>
								</div>
							</div>
						    <?php if ($count==3) { $count = 0;?>
							        <div class="clearfix"></div>
							<?php } ?>
						    <?php
						    endwhile;
						    wp_reset_postdata(); 
					    ?>
					</div>
					<div class="form-group row">
					    <div class="col-xs-12">
					    	  <button class="btn btn-primary calculate" id="calculate">Calculate (တွက်ချက်ရန်)</button>
					    </div>
					 </div>
				</form>
				<div id="estimateModal" class="modal">
				  <div class="modal-content">
				  	<div class="row">
				  		<div class="col-md-12">
				  			 <span class="close">&times;</span>
				  		</div>
				  	</div>
				    <div class="row content">
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>