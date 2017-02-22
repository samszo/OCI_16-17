/*global $ ,console, alert*/

$(function(){
     
    'use strict';
    
    var myHeader = $('.header'),
        mySlider = $('.bxslider');
    
    //adjust header height
    
    myHeader.height($(window).height());

    $(window).resize(function(){
    
    myHeader.height($(window).height());
        
    //Adjust bxslider list item center
    
    mySlider.each(function(){
        
        $(this).css('paddingTop',($(window).height()-$('.bxslider li').height()) / 2);
        
    });

    });
    
    //links add class active
    $('.links li a').click(function(){
        
      $(this).parent().toggleClass('active').siblings().removeClass('active');
    });
    //Adjust bxslider list item center
    
    mySlider.each(function(){
        
        $(this).css('paddingTop',($(window).height()-$('.bxslider li').height()) / 2);
        
    });
    // trigger the slider 
    
      mySlider.bxSlider({pager:false});
    
    //smooth scroll to div
    
    $('.links li a').click(function(){
        
       $('html , body').animate({
           
           scrollTop: $('#'+$(this).data('value')).offset().top
           
       },1000); 
        
    });
    
    //Our auto slider code
    (function autoslider(){
     
        $('.slider .active').each(function(){
        
            if(!$(this).is(':last-child'))
                {
                    $(this).delay(2000).fadeOut(1000,function(){
                    
                    $(this).removeClass('active').next().addClass('active').fadeIn();
                    
                    autoslider()
                    
                    });
                
                }else{
                
                    $(this).delay(2000).fadeOut(1000,function(){
                    
                    $(this).removeClass('active');
                    
                    $('.slider div').eq(0).addClass('active').fadeIn();
                    
                     autoslider()
                    
                    });
                
                }   
        });
    
    }());
    
 });