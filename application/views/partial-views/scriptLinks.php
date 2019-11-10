<!-- Main site Script -->

<script>
    
    $(document).ready(function(){
        
        //search autocomplete ajax
        $("#search").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '<?php echo base_url(); ?>categories/getCatJson',
                    type:'POST',
                    dataType: "json",
                    data: {
                        query: request.term
                    },
                    success: function (data) {

                        response(data);
                    },
                    error: function (message) {
                        response([{'label': 'Not found!'}]);
                    }
                });
            },
            minLength: 2
        });
        
        
        
        
    });
    
    
    
    //CKEditor call
    CKEDITOR.replace('body');
</script>