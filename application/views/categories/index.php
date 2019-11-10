<?php 
    $this->load->view('partial-views/header');
    $this->load->view('partial-views/navbar'); 
?>
<body>
    <div class="container container2">
        
        <div class="row">
         
             <div class="col-md-12">
                
                <div class="row">

                   <div class="latest-posts-div col-lg-9 col-md-9 col-sm-12 col-xs-12">

                            <h3 class="main_title"><?= $title ?></h3>
                            
                            <div class="fresh-table full-color-orange">
                            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->

                                <div class="toolbar">
                                    <button id="alertBtn" class="btn btn-default">Alert</button>
                                </div>

                                <table id="fresh-table" class="table">
                                    <thead>
                                        <th data-field="id">Serial</th>
                                        <th data-field="name">Category Name</th>
                                        <th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>
                                    </thead>
                                    <tbody>
                                       
                                    <?php
    
                                    $serial = 1;
                                    foreach($categories as $category)
                                    {
                                ?>
                                        <tr>
                                           <td><?php echo $serial; $serial++;?></td>
                                            <td><a href="<?php echo base_url().'categories/posts/'.$category['id']; ?>"><?php echo $category['cat_name']; ?></a></td>
                                            <td></td>
                                            
                                            <td></td>
                                        </tr>
                                    <?php   

                                    }
                                ?>
                                        
                                </tbody>
                            </table>
                        </div>

                         </div>

                         <div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                             <?php
                                
                                $this->load->view('partial-views/sidebar');
                             
                             ?>
                         </div>
                         
                         

                     </div>
                    
                </div>
                 
                 

        </div>
    </div> 
   
   <?php
        $this->load->view('partial-views/scriptLinks');
        $this->load->view('partial-views/footer');
    ?>
    
    
</body>
