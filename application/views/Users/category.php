<?php include 'header.php'; ?>
   

   <section class="content section" id="top"  data-section="section1">
    <div class="container-fluid">
      <div id="button_content">Contents<button><i class="fa fa-table"></i></button></div>
      <br>
      <div class="row">
      <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12"  id="sidebar">
       
          <?php foreach ($category as $cat) {?>
            <h4><?php echo $cat->name; ?><button><i class="fa fa-plus"></i></button></h4><div>
            <?php foreach ($video as $vid) {
              if($vid->sc_id==$cat->id){?>
              <a href='<?=site_url("Users/category/{$scourse[0]->id}/{$vid->id}") ?>'><?=$vid->name; ?></a>
            <?php }}?></div><?php }?>    
      </div> 
      <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12" id="view_content">
        <h2><?php echo($scourse[0]->name); ?></h2>
        <?php
          if($video!=0) { $src=$video[0]->link;  
                          $code=$video[0]->link; }
          else          {  $src=$scourse[0]->link;
                            $code=0;}
          $src.="?autoplay=1&mute=0";
        ?>
        <div class="video">
          <iframe width="100%" height="400"
              src="<?php // echo $src; ?>" alt="Loading">
          </iframe></div>
        <div class="code">
          <iframe src="https://www.tutorialrepublic.com/html-tutorial/html-iframes.php" style="border: 2px solid black;" name="myframe" width="100%" height="800"></iframe>
          <a href="" target="myframe">Open Src code web</a>
        </div>
      </div></div>

      
    </div>
  </section>
  

  
  
<?php include 'footer.php'; ?>

<script type="text/javascript">
  $('#button_content button').click(function(){
    $('#sidebar').toggle(1000);
    $('.view_content').toggle(1000);    
  });

  $("h4 button").click(function(){
    alert("YSE");
    $('#sidebar div').slideToggle(500);
  });

</script>

<script type="text/javascript">

</script>