<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Code with ease</title>
    
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('bootstrap/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/mycss.css">
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo(base_url()) ?>assets/css/lightbox.css"> 
    
  </head>

<body>
  <!--header-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="<?= base_url('Users') ?>"><em>Learn</em> Smart</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li class="main1-menu"><a href="#section1">Home</a></li>
        <li class="main1-menu"><a href="#section5">About Us</a></li>
        <!-- <li><a href="#section5">Video</a></li> -->
        <li class="has-submenu"><a href="">Courses</a>
          <ul class="sub-menu">
            <?php 
              if(count($courses)>0){
                foreach ($courses as $course) { 
            ?>
            <li style="padding: 5px 20px;" onclick="click()">
              <?=anchor("Users/courses/{$course->id}",$course->name) ?></li><?php } }?>
          </ul>
        </li>
        <li class="main1-menu"><a href="#section6">Contact</a></li>
        <?php if(!$this->session->userdata('login')):?>
        <li class="main1-menu"><a href="#section3">Register/Login</a></li>
        <?php else: ?>
        <li><a href="<?=base_url('Users/logout') ?>">Logout</a></li>
        <?php endif; ?>  
      </ul>
    </nav>
  </header>
 
 
<section id="login">
<div class="row"><div class="col-md-12 col-xs-12 col-sm-12">
  <p onclick="loginhide()"><b>X</b></p><br><br><br>
  <h1><b>Login Form</b></h1>
  <form id="login_form" method="post">
    <div class="form-group">
      <label for="title">Email:</label>
    <?=form_input(['class'=>'form-control','type'=>'text','placeholder'=>'Your Email','name'=>'email','id'=>'email','value'=>set_value('email')]); ?>
  </div> 
  <div class="form-group">
    <label for="password">Password:</label>
    <?=form_input(['class'=>'form-control','type'=>'password','name'=>'password','placeholder'=>'*****','id'=>'password']) ?>
  </div>
  <div class="form-group">
    <input type="button" value="Submit" class="form-control" onclick="login_form()">
  </div>
  <div class="error">
  <?=validation_errors(); ?></div>
  <?=form_close(); ?> 
</div></div>
</section>


<script type="text/javascript">
  function mylogin(){
  $("html, body").animate({ scrollTop:50 }, 1000);
  setTimeout(function(){$('.content,footer').css("filter","blur(3px)");},1000 );
  $('#login').css({'display':'block'});
  //$('.content,footer').attr('disabled');
}
function loginhide(){
  $('#login').fadeOut(900);
  $('.content,footer').css("filter","blur(0)");
}

function login_form(){
       var dataString = $("#login_form").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Users/login');?>",
            data: dataString,
            //dataType: "json";
            beforeSend: function () {
                $(".error").html("Validating"); 
                $(".error").addClass("alert alert-primary");
               },
            success:function(data){
                //var response=JSON.parse(data);
                $('#login').fadeIn();
                        $('.content,footer').css("filter","blur(1)");
                setTimeout(function(){$(".error").html(data); 
                        $(".error").addClass("alert alert-success");},1000);
                setTimeout(function(){$('#login').fadeOut(1000);
                       $('.content,footer').css("filter","blur(0)");},3000);
                setTimeout(function(){location.reload();},4000);
            }
        });
               
    }



function register_form(){
       var dataString = $("#register_form").serialize();
      
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Users/register');?>",
            data: dataString,
            //dataType: "json";
            beforeSend: function () {
                $(".error").html("Checking your input"); 
                $(".error").addClass("alert alert-primary");
               },
            success:function(data){
                setTimeout(function(){$(".error").html(data); 
                        $(".error").addClass("alert alert-success");},1000);
                setTimeout(function(){location.reload();},3000)
            }
        });
               
    }



/*

function register_form(){
       var dataString = $("#register_form").serialize();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Users/register');?>",
            data: dataString,
            //dataType: "json";
            beforeSend: function () {
                $(".error").html("Validating"); 
                $(".error").addClass("alert alert-primary");
               },
            success:function(data){
                var response=JSON.parse(data);
                alert(response.status);
                if(response.status=='1'){
                  alert(response.msg);
                setTimeout(function(){$(".error").html("Login Successful"); 
                        $(".error").addClass("alert alert-success");},1000);
                setTimeout(function(){$('#login').fadeOut(1000);
                        $('.content,footer').css("filter","blur(0)");},3000);
                }
                if(response.status=='0'){
                    $(".error").addClass("alert alert-danger");
                    $('.content,footer').css("filter","blur(0)");
                }
            }
        });
               
    }

*/


</script>
