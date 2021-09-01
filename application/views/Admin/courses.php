<?php
$status=$this->uri->segment(3,0);
$name=''; $type='';   $description='';
if($status!='0'){
  $name=$courses['0']->name;
  $type=$courses['0']->type;
  $description=$courses[0]->description;
}
?>

<?php include('header.php');?>
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"> Courses Available</h2>
                <p><b style="color: orange; cursor: pointer;"><a id="addCourses" >Add New Course<i class="fa fa-angle-double-down"></i></a></b></p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        S. No.
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Type
                      </th>
                      <th class="text-center" style="letter-spacing: 5px;">
                        Description
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <tbody>
                      <?php 
                    if(count($courses)>0){
                      $sno=1;
                    foreach ($courses as $course){
                      ?>
                      <tr>
                        <td>
                          <?php echo $sno++; ?>
                        </td>
                        <td>
                          <?php echo $course->name; ?>
                        </td>
                        <td>
                          <?php echo $course->type; ?>
                        </td>
                        <td>
                          <?php echo $course->description; ?>
                        </td>
                        <td>
                          <?php if($course->status==1): ?>
                            <a href="" class="btn btn-danger">Deactivate</a>
                          <?php else: ?>
                             <a href="" class="btn btn-success">Activate</a>
                          <?php endif; ?>
                          <a href='<?=base_url("Admin/courses/update/{$course->id}") ?>' class="btn btn-primary">update</a>
                        </td>
                      </tr>
                      <?php }}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>

<section class="admin_form" id="addcourse">
  <div class="container">
    <?=form_open("Admin/add_course/{$status}/{$courses[0]->id}"); ?>
    <div class="form-group">
      <label for="Name">Name</label>
      <?=form_input(['class'=>'form-control','name'=>'name','placeholder'=>'Enter course name','type'=>'text','value'=>$name]) ?>
    </div>
    <div class="form-group">
      <label for="Type">Type</label>
      <select name="type" class="form-control">
        <option value="CS/IT">CS/IT</option>
        <option value="ME">ME</option>
        <option value="CE">CE</option>
        <option value="ECE">ECE</option> 
        <option value="EE">EE</option>        
      </select>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <?=form_textarea(['class'=>'form-control','name'=>'description','placeholder'=>'Enter course description .....','value'=>$description]) ?>
    </div>
    <div class="form-group">
      <label for="photo">Photo Banner</label>
      <i class="fa fa-picture-o fa-2x"><?=form_upload(['name'=>'photo']) ?></i>
      <em class="text-danger" style="overflow-x: hidden;"><?php if(isset($upload_error)) echo $upload_error; ?></em>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="1" selected>Activate</option>
        <option value="0">Deactivate</option>
      </select>
    </div>
    <div class="form-group">
      <?=form_input(['type'=>'submit','value'=>'Submit','class'=>'form-control']) ?>
    </div>
    <div class="error">
      <?php echo (validation_errors()); ?>
      <?php if($this->session->flashdata('addcourse_error')=='success'){ ?>
        <em style="color: green;">Course Added</em><?php } ?>
    </div>
  </div>
</section>
<?php include'footer.php'; ?>     

<?php 
  if($status!='0'){?>
    <script>
      $('.content').css('visibility','hidden');
      $('#addcourse').css('display','block');
    </script>
 <?php }
 else{
?>
<?php if($this->session->flashdata('addcourse_error')){ ?>
<script>
  $('.card-body').slideToggle(1000,"linear");
 $('#addcourse').toggle(1300,"linear");
</script>
<?php } ?> 
<script type="text/javascript">

$('#addCourses').click(function(){
 // alert('YESS');
 $('.card-body').slideToggle(1000,"linear");
 $('#addcourse').toggle(1300,"linear");
});
<?php } ?>

 </script>

