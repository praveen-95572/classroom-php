<?php include 'header.php'; ?>

<div class="content">  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="<?= base_url()?>assets/images/course-video.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="caption">
              <h6>Smart way of Learning</h6>
              <h2><em>Learn</em> Smart</h2>
              <div class="main-button">
                  <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
              </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->


  <section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content"> 
              <div class="content-show">
                <h4 style="cursor: pointer;"><i class="fa fa-pencil"></i>All Courses</h4>
              </div>
              <div class="content-hide">
                <b style="text-decoration: none;"><?php 
                    if(count($courses)>0){
                    foreach ($courses as $course){
                      ?>
                      <?=anchor("Users/courses/{$course->id}",$course->name) ?>
                      <?php
                      }}?></b>
                <div class="scroll-to-section"><a href="#section2">More Info.</a></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4 style="cursor: pointer;"><i class="fa fa-graduation-cap"></i>Virtual Class</h4>
              </div>
              <div class="content-hide">
                <p><b>A virtual classroom enables students to access quality teachers anywhere on the planet so long as they both have a reliable internet connection. This can break down most of the common barriers to synchronous learning: cost, distance and timing.</b></p>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4 style="cursor: pointer;"><i class="fa fa-book"></i>Availability</h4>
              </div>
              <div class="content-hide">
                <b><p>Source code</p>
                <p>Recorded Lecture</p>
                <p>Support via video conference</p>
                <p>Assignment</p></b>
                <div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Why choose Learn Smart?</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div id='tabs'>
            <ul>
              <li><a href='#tabs-1'>Best Education</a></li>
              <li><a href='#tabs-2'>Top Management</a></li>
              <li><a href='#tabs-3'>Quality Meeting</a></li>
            </ul>
            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="assets/images/choose-us-image-01.png" alt="">
                  </div>
                  <div class="col-md-6">
                    <h4>Best Education</h4>
                    <p>Learn Smart is free educational web development site. Feel free to use it for educational purposes. Please tell your friends about us. Thank you.<br>“Education is the most powerful weapon which you can use to change the world”</p>
                  </div>
                </div> 
              </article>
              <article id='tabs-2'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="assets/images/choose-us-image-02.png" alt="">
                  </div>
                  <div class="col-md-6">
                    <h4>Top Level</h4>
                    <p>Pursuing a career in the field of web development is an excellent option for <?php echo date('Y'); ?> as it is constantly growing, and the demand for skilled web developers does not seem to decline shortly.  This is proved by the fact that there is a great demand for skilled web developers in each and every field of IT.
                      <strong><em>For any project source code you can <a href="<?= base_url('contact.php') ?>">Contact Us</a></em></strong></p>
                  </div>
                </div>
              </article>
              <article id='tabs-3'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="assets/images/choose-us-image-03.png" alt="">
                  </div>
                  <div class="col-md-6" style="color: white;">
                    <h4>Quality Meeting</h4>
                    <p>
                      Your safety is your personal responsibility.<br>
                      Always follow the correct procedures.<br>
                      Never take shortcuts.<br>
                      Take responsibility and clean up if you made a mess.<br>
                      Clean and organize your workspace.<br>
                      Ensure a clear and easy route to emergency exits and equipment.<br>
                      Be alert and awake on the job.</p>
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

 
  <section class="section courses" data-section="section4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Choose Your Course</h2>
          </div>
        </div>
        <div class="owl-carousel owl-theme">
          <?php 
              if(count($courses)>0){
                foreach ($courses as $course) {
            ?>

          <div class="item">
            <a href='<?=base_url("Users/courses/{$course->id}") ?>'>
            <img src="assets/images/courses-01.jpg" alt="Course #1">
            </a>
            <div class="down-content">
              <h4><?php echo $course->name; ?></h4>
              <p style="height: 200px; overflow-y: hidden; color: black;"><?php echo $course->description; ?></p>
              <div class="author-image">
                <img src="assets/images/author-01.png" alt="Author 1">
              </div>
              <div class="text-button-pay">
                <p>Free/Paid <i class="fa fa-angle-double-right"></i></p>
              </div>
            </div>
          </div><?php }} ?>
        </div>
      </div>
    </div>
  </section>
  
</div>
  
  
<?php include 'footer.php'; ?>


<script type="text/javascript">
  $('.content-show').click(function(){
    $(this).next('.content-hide').slideToggle(500);
  })
</script>