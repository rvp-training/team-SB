  
$(function() {
    $('#image_1').click(function() {
     
        $('.active').removeClass('active');
      
        $('.picture_l').eq(0).addClass('active');
      
    });

    $('#image_2').click(function() {

        $('.active').removeClass('active');

        $('.picture_l').eq(1).addClass('active');
    
    });

    $('#image_3').click(function() {
    
        $('.active').removeClass('active');
    
        $('.picture_l').eq(2).addClass('active');
    
    });

    $('#image_4').click(function() {
    
        $('.active').removeClass('active');
    
        $('.picture_l').eq(3).addClass('active');
    
    });
    
    $('#image_5').click(function() {
    
        $('.active').removeClass('active');
    
        $('.picture_l').eq(4).addClass('active');
    
    });
});