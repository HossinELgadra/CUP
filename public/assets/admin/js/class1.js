$(document).ready(function(){
    $(document).on('input','#search',function(e){
    var search=$(this).val();
    var token_search=$("#token_search").val();
    var ajax_search_url=$("#ajax_search_url").val();
    
    jQuery.ajax({
      url:ajax_search_url,
      type:'post',
      dataType:'html',
      cache:false,
      data:{search:search,"_token":token_search},
      success:function(data){
     
       $("#ajax_responce_serarchDiv").html(data);
      },
      error:function(){
    
      }
    });
    
    
    });
    
    $(document).on('click','#ajax_pagination_in_search a ',function(e){
    e.preventDefault();
    var search=$("#search").val();
    var url=$(this).attr("href");
    var token_search=$("#token_search").val();
    
    jQuery.ajax({
      url:url,
      type:'post',
      dataType:'html',
      cache:false,
      data:{search:search,"_token":token_search},
      success:function(data){
     
       $("#ajax_responce_serarchDiv").html(data);
      },
      error:function(){
    
      }
    });
    
    
    
    });
    
    });