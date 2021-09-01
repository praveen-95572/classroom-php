<?php
$status=$this->uri->segment(3,0);
$name=''; $rating='';   $description='';  $category=''; $duration=''; $link='';
if($status!='0'){
  $name=$scourses[0]->name;
  $rating=$scourses['0']->rating;
  $duration=$scourses['0']->duration;
  $description=$scourses[0]->description;
  $category=$scourses['0']->course_id;
  $link=$scourses['0']->link;
}
?>
<?php include('header.php');?>
 <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Sub Courses Available</h2>
                <p><b style="color: orange; cursor: pointer;"><a id="addCourses" >Add New Sub Course<i class="fa fa-angle-double-down"></i></a></b></p>
              </div>
              <div class="card-body">
                 <?php 
                    if(count($courses)>0){
                    foreach ($courses as $course){
                      $sno=1;
                      ?>
                      <div id="sub_content">
                    <button class="subcourses"><?php echo $course->name?></button>
                <div class="table-responsive" id="subcourse_content" class="subcourse_content">
                  <table class="table">
                    <thead class=" text-primary">
                      <th style="width: 10%;">
                        S. No.
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Photo Banner
                      </th>
                      <th class="text-center" style="letter-spacing: 5px;">
                        Description
                      </th>
                      <th>
                        Rating
                      </th>
                      <th>
                        Duration
                      </th>
                      <th>
                        Action
                      </th>
                    </thead>
                    <?php   foreach ($scourses as $scourse){
                        if($course->id==$scourse->course_id){
                    ?>
                    <tbody>
                      <tr>
                        <td>
                          <?php echo $sno++; ?>
                        </td>
                        <td>
                          <?php echo $scourse->name; ?>
                        </td>
                        <td>
                          <? ?>
                        </td>
                        <td>
                          <?php echo $scourse->description; ?>
                        </td>
                        <td>
                          <?php echo $scourse->rating; ?>
                        </td>
                        <td>
                          <?php echo $scourse->duration; ?>
                        </td>
                        <td>
                          <?php if($scourse->status==1): ?>
                            <a href="" class="btn btn-danger">Deactivate</a>
                          <?php else: ?>
                             <a href="" class="btn btn-success">Activate</a>
                          <?php endif; ?>
                          <a href='<?=base_url("Admin/subcourses/update/{$scourse->id}") ?>' class="btn btn-primary">update</a>
                        </td>
                      </tr>
                      <?php }} ?>
                    </tbody>
                  </table>
                </div></div>
              <?php }}?>
              </div>
            </div>
          </div>
         
        </div>
      </div>

<section class="admin_form" id="addcourse">
  <div class="container">
    <?=form_open_multipart('Admin/add_subcourse'); ?>
    <div class="form-group">
      <label for="Name">Name</label>
      <?=form_input(['class'=>'form-control','name'=>'name','placeholder'=>'Enter course name','type'=>'text','value'=>$name]) ?>
    </div>
    <div class="form-group">
      <label for="Type">Category</label>
      <select name="type" class="form-control">
        <?php  foreach ($courses as $course){
            if($category==$course->id):
          ?><option value="<?php echo $course->id ?>" selected><?php echo $course->name; ?></option><?php else: ?>
          <option value="<?php echo $course->id ?>"><?php echo $course->name; ?></option><?php endif; }?>

      </select>
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <?=form_textarea(['class'=>'form-control','name'=>'description','placeholder'=>'Enter course description .....','value'=>$description]) ?>
    </div>
    <div class="form-group">
      <label for="link">Youtube Link</label>
      <?=form_input(['class'=>'form-control','name'=>'link','placeholder'=>'copy Url','type'=>'text','value'=>$link]) ?>
    </div>
    <div class="form-group">
      <label for="link">Rating</label>
      <?=form_input(['class'=>'form-control','name'=>'rating','placeholder'=>'course rating','type'=>'text','value'=>$rating]) ?>
    </div>
    <div class="form-group">
      <label for="link">Duration</label>
      <?=form_input(['class'=>'form-control','name'=>'duration','placeholder'=>'total course time','type'=>'text','value'=>$duration]) ?>
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
      <?php if($this->session->flashdata('addcourse_error1')=='success'){ ?>
        <em style="color: green;">Sub Course Added</em><?php } ?>
    </div>
  </div>
</section>
<?php include'footer.php'; ?>     
<script>
  <?php 
  if($status!='0'){?>
    
      alert("YES");
      $('.content').css('visibility','hidden');
      $('#addcourse').css('display','block');
    
 <?php }
 else{

 if($this->session->flashdata('addcourse_error1')){ ?>
    $('.card-body').slideToggle(900,"linear");
    $('#addcourse').toggle(1300,"linear");
    <?php } ?> 

$('#addCourses').click(function(){
 // alert('YESS');
  $('.card-body').slideToggle(900,"linear");
  $('#addcourse').toggle(1300,"linear");
  });

 //$(".subcourses").each(function(){
 $(".subcourses").click(function(){
  $x=$(this).next('div');
  $x.slideToggle(900,"linear");
 }); 
//});
<?php } ?>
//$('.wrapper').css('visibility','hidden');
</script>

