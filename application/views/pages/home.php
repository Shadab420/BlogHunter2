<?php 
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar'); 
?>
<body>
    <div class="container container2">
    
        <div class="row">
           
           <div class="col-md-12 animated rubberBand" style="text-align:center;">
               <h2 style="background: darkblue; color:yellow;">Hello Everyone!</h2>
           </div>
           
            
            <div class="col-md-12 animated slideInLeft" style="background:white; color:red; margin-top: 20%; text-align:justify;">
                
                <h4 class="animated fadeInDownBig">
                         This is a blog application that I have built for your personal writing purposes. You can publish your thoughts, your ideas, you can react on some issues, you can teach something but please be honest and gentle! Political issues is not allowed here. There are many places to talk about politics. Also, don't post anything bad that can hurt someone or can put a very bad impact in the society! That's the condition. Thank you... Happy Writing! :)
                </h4>
                
            </div>
            
        </div>
   
   
   
    </div> 
   <?php
        $this->load->view('partial-views/scriptLinks');
        $this->load->view('partial-views/footer');
    ?>
    
</body>

 
