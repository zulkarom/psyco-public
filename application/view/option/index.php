
<div class="container">
	<div class="row">
	<div class="col-md-8">
	<div class="ptitle">
	
	<h4><br />
				IJAZAH SARJANA MUDA KEUSAHAWANAN (2u2i)<br />
				FAKULTI KEUSAHAWANAN DAN PERNIAGAAN</h4>
	
				<i><h4><br />
				BACHELOR OF ENTREPRENEURSHIP<br />
				FACULTY OF ENTREPRENEURSHIP AND BUSINESS</h4></i>
	
	</div>
	<br />
	<strong>Nama/<i>Name</i>:</strong> <?php echo $this->user->can_name ;?><br />
	<strong>NRIC/PASSPORT NO:</strong>  <?php echo $this->user->user_name ;?>
	
	</div>

	</div>
	

    <div class="box">
	
	<div>
	<strong>ANDA PERLU MENJAWAB DAN HANTAR KEDUA-DUA BAHAGIAN BERIKUT:</strong>
	<br />
	<i>YOU NEED TO ANSWER BOTH OF THESE TWO SECTION:</i>
	
	</div>
<br />
		<div class="form-group">
		<a href="<?=Config::get('URL')?>test" class="btn btn-primary">UJIAN PSIKOMETRIK / PSYCHOMETRIC TEST</a> <a href="<?=Config::get('URL')?>test2" class="btn btn-primary">IDEA PERNIAGAAN / BUSINESS IDEA</a>
		</div>
		


<a href='<?php echo Config::get('URL'); ?>login/logout'>LOGOUT</a>
		
		



    </div>
	
	
	

</div>
