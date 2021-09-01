<?php include('header.php');?>
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Sub Courses -> Category Available</h2>
                <p><b style="color: orange; cursor: pointer;"><a id="addCourses" >Add New Sub Course<i class="fa fa-angle-double-down"></i></a></b></p>
              </div>
              <div class="card-body">
                 <?php 
                    if(count($courses)>0){
                    foreach ($courses as $course){
                      $sno=1;
                      ?>
                    <div><button class="cname" disabled><?php echo $course->name?></button><button class="arrow dropdown"><i class="fa fa-caret-down "></i></button></div><div class="dropdown-content">
                    <?php   foreach ($scourses as $scourse){
                        if($course->id==$scourse->course_id){
                    ?>
                    <a href=""><?=$scourse->name?></a>
                      <?php }} ?></div>
              <?php }}?>
              </div>
            </div>
          </div>
         
        </div>
      </div>

<section class="admin_form" id="addcourse">
  <div class="container">
    <?=form_open('Admin/add_subcourse'); ?>
    <div class="form-group">
      <label for="Name">Name</label>
      <?=form_input(['class'=>'form-control','name'=>'name','placeholder'=>'Enter course name','type'=>'text']) ?>
    </div>
    <div class="form-group">
      <label for="Type">Category</label>
      <select name="type" class="form-control">
        <?php  foreach ($courses as $course){?><option value="<?php echo $course->id ?>"><?php echo $course->name; ?></option>
               <?php }?>
      </select>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <?=form_textarea(['class'=>'form-control','name'=>'description','placeholder'=>'Enter course description .....']) ?>
    </div>
    <div class="form-group">
      <label for="link">Youtube Link</label>
      <?=form_input(['class'=>'form-control','name'=>'link','placeholder'=>'copy Url','type'=>'text']) ?>
    </div>
    <div class="form-group">
      <label for="link">Rating</label>
      <?=form_input(['class'=>'form-control','name'=>'rating','placeholder'=>'course rating','type'=>'text']) ?>
    </div>
    <div class="form-group">
      <label for="link">Duration</label>
      <?=form_input(['class'=>'form-control','name'=>'duration','placeholder'=>'total course time','type'=>'text']) ?>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select name="status" class="form-control">
        <option value="1">Activate</option>
        <option value="0">Deactivate</option>
      </select>
    </div>
    <div class="form-group">
      <?=form_input(['type'=>'submit','value'=>'Submit','class'=>'form-control']) ?>
    </div>
    <div class="error">
      <?php echo (validation_errors()); ?>
      <?php if($this->session->flashdata('addcourse_error1')=='success'){ ?>
        <em style="color: green;">Sub Course Added</em><?php } ?>
    </div>
  </div>
</section>
<?php include'footer.php'; ?>     

<?php if($this->session->flashdata('addcourse_error1')){ ?>
<script>
  $('.card-body').slideToggle(900,"linear");
 $('#addcourse').toggle(1300,"linear");
</script>
<?php } ?> 
<script type="text/javascript">

$('#addCourses').click(function(){
 // alert('YESS');
 $('.card-body').slideToggle(900,"linear");
 $('#addcourse').toggle(1300,"linear");
});
</script>