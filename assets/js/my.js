jQuery(document).ready(function ($) {
                $('.teknolar li').click(function(){
                    $('.teknolar li').removeClass('active');
                    $(this).addClass('active');

                    var index = $('.teknolar li').index(this);
                    $('.teknolarYazi li').removeClass('active');
                    $('.teknolarYazi li:eq('+index+')').addClass('active');

                });
            });