
 <footer>
   <section class="section coming-soon" data-section="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-xs-12">
          <div class="continer centerIt">
            <div>
              <h4>Take <em>any online course</em> and shape your Knowledge</h4>
              <div class="counter">

                <div class="days">
                  <div style="font-size: .4em; margin-top: 40px!important;"><?php echo date('d-m-Y D'); ?></div>
                  <span>Date/Day</span>
                </div>

                <div class="hours">
                  <div style="font-size: .4em; margin-top: 40px!important;"><?php echo date('H'); ?></div>
                  <span>Hours</span>
                </div>
                

                <div class="minutes">
                  <div style="font-size: .4em; margin-top: 40px!important;"><?php echo date('i'); ?></div>
                  <span>Minutes</span>
                </div>

                <div class="seconds">
                  <div style="font-size: .4em; margin-top: 40px!important;"><?php echo date('s'); ?></div>
                  <span>Seconds</span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="right-content">
            <?php if(!$this->session->userdata('login')):?>
            <div class="top-content">
              <h6>Register your free account and <em>get immediate</em> access to online courses</h6>
              <button onclick="mylogin()" style="float: right; background-color: rgba(22,34,57,0.95); color: white;" class="btn">Login</button>
            </div>
            <form id="register_form">
              <div class="row">
                <div class="col-md-12">
                  <fieldset>
                    <?php echo form_input(['name'=>'name','type'=>"text",'class'=>"form-control","placeholder"=>"Your Name",'value'=>set_value('name')]); ?>
                  </fieldset>
                </div>
                <div class="col-md-12"><fieldset>
                  <?php echo form_error('name','<div class="error text-danger">','</div>'); ?>
                </fieldset></div>
                <div class="col-md-12">
                  <fieldset>
                    <?php echo form_input(['name'=>'email','type'=>"email",'class'=>"form-control","placeholder"=>"Email address",'value'=>set_value('email')]); ?>
                  </fieldset>
                </div>
                <div class="col-md-12"><fieldset>
                  <?php echo form_error('email','<div class="error text-danger">','</div>'); ?>
                </fieldset></div>
                <div class="col-md-12">
                  <fieldset>
                    <?php echo form_input(['name'=>'mobile','type'=>"number",'class'=>"form-control","placeholder"=>"Mobile no.",'value'=>set_value('mobile')]); ?>
                  </fieldset>
                </div>
                <div class="col-md-12"><fieldset>
                  <?php echo form_error('mobile','<div class="error text-danger">','</div>'); ?>
                </fieldset></div>
                <div class="col-md-12">
                  <fieldset>
                    <?php echo form_password(['name'=>'password','type'=>"password",'class'=>"form-control","placeholder"=>"Password",'value'=>set_value('password')]); ?>
                  </fieldset>
                </div>
                <div class="col-md-12"><fieldset>
                  <?php echo form_error('password','<div class="error text-danger">','</div>'); ?>
                </fieldset></div>
                <div class="error"></div>
                <div class="row">
                <div class="col-md-6">
                    <button type="button" class="button" onclick="register_form()">Get it now</button></div>
                <div class="col-md-6">
                    <button type="reset" id="form-submit" class="button">Reset</button></div>    </div>

                  </fieldset>
                </div>
              </div>
            </form>
          </div><?php else:
                          endif; ?> 
        </div>
      </div>
    </div>
  </section>

 <section class="section video" data-section="section5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="left-content">
            <span>our presentation is for you</span>
            <h4>Watch the video to learn more <em>about New Technology and upgrade your skills to the high level.</em></h4>
            <p>We will provide a template ZIP file as a project/assignment. However, you can use this template to convert into a specific theme for any kind of CMS platform such as WordPress. You may <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">contact us to fullfil your project demand</a>
            
          </div>
        </div>
        <div class="col-md-6">
          <article class="video-item">
            <div class="video-caption">
              <h4>Power HTML Template</h4>
            </div>
            <figure>
              <a href="https://www.youtube.com/watch?v=r9LtOG6pNUw" class="play"><img src="assets/images/main-thumb.png"></a>
            </figure>
          </article>
        </div>
      </div>
    </div>
  </section>



 <section class="section contact" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Let’s Keep In Touch</h2>
          </div>
        </div>
        <div class="col-md-6">
        
        <!-- Do you need a working HTML contact-form script?
                  
                    Please visit https://templatemo.com/contact page -->
                    
          
          <form method="post" id="contact">
            <div class="row">
              <div class="col-md-6">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Your Name">
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" placeholder="Your Email">
                  </fieldset>
                </div>
              <div class="col-md-12">
                <fieldset>
                  <textarea name="msg" rows="6" class="form-control" id="message" placeholder="Your message..."></textarea>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <button type="submit" class="button">Send Message Now</button><br>
                  <?=form_error('email','<div class="text-danger">','</div>') ?><br>
                  <div class="error" style="font-size: 1.2em;"></div>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div id="map">
            <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="422px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

 

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright <?php echo date('Y'); ?> by Learn Smart  
          
           | Design: <a href="https://templatemo.com" rel="sponsored" target="_parent">Praveen.corp</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
 <script src="<?=base_url('assets/js/jqueryui.js')?>"></script>
 <script src="<?= base_url() ?>bootstrap/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>bootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/isotope.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl-carousel.js"></script>
    <script src="<?= base_url() ?>assets/js/myjs.js"></script>
   
<script type="text/javascript">
  
   $("#contact").submit(function(){
        var dataString=$('#contact').serialize();
        $.ajax({
            type:'post',
            url:"<?php echo base_url('Users/contact');?>",
            data:dataString,
            beforeSend: function () {
                $(".error").html("Validating"); 
                $(".error").addClass("alert alert-primary");},
            success:function(data){
                setTimeout(function(){$(".error").html(data); 
                        $(".error").addClass("alert alert-success");},1000);
            }
        });
        return false;
    });


</script>





   <script type="text/javascript">
             //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

 var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

$('.main1-menu, .scroll-to-section').on('click', 'a', function (e) {
          
          e.preventDefault();
          $('#menu').removeClass('active');
          var x=$(this).attr('href');
          showSection($(this).attr('href'), true);
        });

$(window).scroll(function () {
          checkSection();
        });
   </script>
</body>
</html>