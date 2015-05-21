<?php include ('include/head.php'); ?>
<style type="text/css">
.col-md-offset-2 {
    margin-left: 16.6667%;
}
.col-md-8 {
    width: 66.6667%;
}
</style>
<?php

include_once 'check_user_session.php'; 
include_once 'oesdb.php';

/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/


if(!isset($_SESSION['current_que']) || empty($_SESSION['current_que'])){
	$_SESSION['current_que'] = 1;
}

?>
<script type="text/javascript">

	function getPrevQue(){

		var checked_value = $('input[type=radio]:checked').val();
		var current_que = $('#current_que').val();

		$.ajax({
			url: 'submit_que.php',
			type: 'POST',
			data: 'prev=1',
			success: function(data){
				if(data == 1){
					location.reload();
				}
			}
		});

	}

	function getNextQue(){

		var checked_value = $('input[type=radio]:checked').val();
		var current_que = $('#current_que').val();

		//alert(checked_value);
		//alert(current_que);

		$.ajax({
			url: 'submit_que.php',
			type: 'POST',
			data: 'next=1&value='+checked_value+'&current_que='+current_que,
			success: function(data){
				if(data == 1){
					location.reload();
				}
			}
		});

	}
</script>
<div class="container examination-container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="">
				<h4>
					Q.<?php echo $_SESSION['current_que']; echo '  '; echo $_SESSION['qa'][$_SESSION['current_que']]['question']; ?>
				</h4>
			</div>

			<div class="form-group" id="checkbox_div">

				<div class="row">
					<div class="col-md-5">
						<div class="radio">
							<label>
								<input type="radio" name="answer" value="option_a" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_a') { echo 'checked="checked"'; } ?>>
								<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_a']; ?></span>
							</label>
						</div> 
					</div>

					<div class="col-md-5">
						<div class="radio">
							<label>
								<input type="radio" name="answer" value="option_b" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_b') { echo 'checked="checked"'; } ?>>
								<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_b']; ?></span>
							</label>
						</div> 
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="radio">
							<label>
								<input type="radio" name="answer" value="option_c" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_c') { echo 'checked="checked"'; } ?>>
								<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_c']; ?></span>
							</label>
						</div> 
					</div>

					<div class="col-md-5">
						<div class="radio">
							<label>
								<input type="radio" name="answer" value="option_d" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_d') { echo 'checked="checked"'; } ?>>
								<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_d']; ?></span>
							</label>
						</div> 
					</div>
				</div>

			</div>

			<input type="hidden" id="current_que" value="<?php echo $_SESSION['current_que']; ?>" />

			<div class="col-md-6 col-md-offset-3">
				
				<?php if($_SESSION['current_que'] != 1){ ?>
				<button type="" id="prev_button" onclick="getPrevQue(); return false;" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i>Previous</button>
				<?php } ?>

				<?php if($_SESSION['current_que'] != 30){ ?>
				<button type="" id="next_button" onclick="getNextQue(); return false;" class="btn btn-primary">Next<i class="fa fa-fw fa-arrow-right"></i></button>
				<?php } ?>

			</div>

		</div>
	</div>
</div>