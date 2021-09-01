<?php include 'header.php'; ?>


  <section class="content section" id="top"  data-section="section1">
    <div class="container-fluid">
      
        <?php 
            if(count($scourses)>0){
            foreach ($scourses as $sub_course){?>
            <div class="row thumbnail"> 
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <h4>Power HTML Template</h4>
                    <div class="video">
                      <h2>dzfgxfhghjcvb</h2>
                    <video autoplay muted loop>
                      <source src='<?php echo $sub_course->link ?>' type='video/mp4'>
                    </video></div>
                    
                </div>
                <div class="col-md-7 col-xs-12 col-sm-12">
                  <a href='<?= site_url("Users/category/{$sub_course->id}") ?>'>
                  <h1><?= $sub_course->name ?></h1></a>
                  <h5><?= $sub_course->description ?></h5>
                  <h3><b>Rating : </b><?php echo $sub_course->rating; ?></h3>
                  <h3><b>Duration : </b><?php echo $sub_course->duration; ?></h3>

                </div>
              </div>  
            <?php }}?>
    
    </div>
  </section>
  

  
  
<?php include 'footer.php'; ?>
