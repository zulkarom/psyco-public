<?php 

use backend\models\Answer;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\ExcelAsset;
?>



<div class="card">
	<div class="card-body">

		<div style="text-align:center">
		<div class="form-group">   
			<input type="file" id="xlf" style="display:none;" />
			<button type="button" id="btn-importexcel" class="btn btn-info"><span class="fa fa-upload"></span> UPLOAD ANSWERS </button>
		</div>
		</div>

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

<?php 
$this->registerJs('

$("#btn-importexcel").click(function(){
  
  if(confirm("Are you sure to import this excel file? Please note that this action will override all data in this table.")){
  document.getElementById("xlf").click();
}
        
});

var X = XLSX;
  
  function fixdata(data) {
    var o = "", l = 0, w = 10240;
    for(; l<data.byteLength/w; ++l) o+=String.fromCharCode.apply(null,new Uint8Array(data.slice(l*w,l*w+w)));
    o+=String.fromCharCode.apply(null, new Uint8Array(data.slice(l*w)));
    return o;
  }
  
  function to_jsObject(workbook) {
    var result = {};
    workbook.SheetNames.forEach(function(sheetName) {
      var roa = X.utils.sheet_to_json(workbook.Sheets[sheetName], {header:1});
      if(roa.length) result[sheetName] = roa;
    });
    return result;

  }

  var xlf = document.getElementById(\'xlf\');
  
  function handleFile(e) {
    var files = e.target.files;
    var f = files[0];
  
    {
      var reader = new FileReader();
      reader.onload = function(e) {
        var data = e.target.result;
        var wb;
        var arr = fixdata(data);
          wb = X.read(btoa(arr), {type: \'base64\'});
          //console.log(to_jsObject(wb)); 
          var obj = to_jsObject(wb) ;
          for (var key in obj) {
            var sheet = obj[key];
            for(var row in sheet){
              var row = sheet[row];
              //console.log(row);
              $("#"+row[1]+"-total_student").val(row[5]);
              $("#"+row[1]+"-max_lecture").val(row[6]);
              $("#"+row[1]+"-prefix_lecture").val(row[7]);
              $("#"+row[1]+"-max_tutorial").val(row[8]);
              $("#"+row[1]+"-prefix_tutorial").val(row[9]);
            }
            break;
          }
          
      };
      reader.readAsArrayBuffer(f);
    }
    
  }

  if(xlf.addEventListener){
  
  xlf.addEventListener(\'change\', handleFile, false);

  }

');

?>

<?php
    
    ExcelAsset::register($this);
?>


