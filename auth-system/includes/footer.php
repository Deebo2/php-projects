</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js
"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="rating-plugin/dist/jquery.star-rating-svg.js"></script>
<script>
    $(document).ready(function(){
       

    //search sys
    $("#search_data").keyup(function(){
        var search = $(this).val();
        //alert(search);
        if(search !== ''){
            $("main").css('display','none');
            $.ajax({
                type:"POST",
                url:"search.php",
                data:{
                    search:search
                },
                success:function(data){
                    $("#search-show").css('display','block');
                    $("#search-show").html(data);
                }
            });
        }else{
            $("main").css('display','block');
            $("#search-show").css('display','none');
        }
    });
    });
</script>
</body>
</html>