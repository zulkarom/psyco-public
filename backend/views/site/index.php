<?php

use backend\models\Candidate;
use backend\models\Batch;
use backend\models\Answer;
use backend\models\GradeCategory;
use richardfan\widget\JSRegister;

$this->title = 'Dashboard';
?>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo Candidate::countCandidates()?></h3>

                <p>Candidates</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo Batch::countBatches()?></h3>

                <p>Batches</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo Answer::countResultSubmission()?></h3>

                <p>Total Result Submission</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo Answer::countSubmissionToday()?></h3>

                <p>Submission Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <br/>
    <h3><?php echo Batch::defaultBatch()?></h3>
    <br/>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo Answer::countDefaultBatchAnswer()?></h3>

                <p>Answers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
           <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo Answer::countDefaultBatchNotAnswer()?></h3>

                <p>Not Answers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Pie Chart</h3>

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div> -->
            </div>
            <div class="card-body">
              <canvas id="pieChart" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>


<?php
  
  $answer = [];
  $notAnswer = [];

  $answer[] = Answer::countDefaultBatchAnswer();
  $notAnswer[] = Answer::countDefaultBatchNotAnswer();
?>

<?php JSRegister::begin(); ?>
<script>
  $(function () {
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var data_answer = <?php echo json_encode($answer)?>;
    var data_not_answer = <?php echo json_encode($notAnswer)?>;

    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Answers',
          'Not Answers',
      ],
      datasets: [
        {
          data: [data_answer,data_not_answer],
          backgroundColor : ['#17a2b8', '#28a745'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

  });

</script>
<?php JSRegister::end(); ?>