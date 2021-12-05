<?php 

use backend\models\Answer;

?>
<div class="card">
	<div class="card-body">
		<div style="text-align:center"><strong>Name: </strong> <?php echo $user->can_name;?> &nbsp;&nbsp;<strong>No. Kad Pengenalan: </strong> <?php echo $user->username;?></div><br />


		<div class="row">
			<div class="col-md-2">
			</div>

			<div class="col-md-8">
				<table class="table">
				<thead>
				<tr>
				<?php
				$rowstring="";
				foreach($gcat as $grow){
					echo "<th>".$grow->gcat_text ."</th>";
					$result_cat = Answer::getAnswersByCat($user->id,$grow->id);
					$stringdata ="<table class='table'>
					<tr><td><strong>Q</strong></td>
					<td><strong>A</strong></td>
					</tr>";
					$jum = 0;
					foreach($result_cat as $rowcat){
						$stringdata .="<tr>";
						$stringdata .="<td><strong>".$rowcat->quest ."</strong></td>";
						if($rowcat->answer == 1){
							$ans ="<span class='fas fa-check'></span>";
							$jum +=1;
						}else if($rowcat->answer == 0){
							$ans ="<span class='fas fa-times'></span>";
						}else{
							$ans ="NA";
						}
						$stringdata .="<td>".$ans ."</td>";
						$stringdata .="</tr>";
					}
					$stringdata .="<tr><td><strong>Total</strong></td><td>".$jum."</td></tr></table>";
					$rowstring .= "<td>".$stringdata."</td>";
				}
				?>

				</tr>
				<thead>
				<tr>

				<?php echo $rowstring; ?>

				</tr>
				<tbody>
				</tbody>
				</table>

				<h4>Business Idea</h4>

			</div>

			<div class="col-md-2">
			</div>
		</div>
	</div>
</div>




