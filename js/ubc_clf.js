// Functions for UBC CLF
(function ($) {

  Drupal.behaviors.ubcCLFBasic = {
    attach: function (context, settings) {
      // Search form
      var search_field = $("#UbcSearchForm input.UbcSearchField");
      var default_text = search_field.attr("value");        
              
      search_field.focus(function () {
        if ($(this).val() == default_text) {
          $(this).removeClass("search-input-innertext");
          $(this).val('');
        }
      });
      search_field.blur(function () {
        if ($(this).val() == "") {
          $(this).addClass("search-input-innertext");
          $(this).val(default_text);
        }
      });
      search_field.blur();
      
      /**
       * CLF Megamenu
       */
      $('#UbcMainNav > li').hover(
        function () {
          $(this).find('ul').show();
        },
        function () {
          $(this).find('ul').hide();
        }
      );
      $('.grey_background ul.UbcSubMenu li.UbcSubMenuSection a').prepend('> ');
      
      /**
       * Carousel options 
       */
      $('#UBCHeadlineWidget').each(function () {
        var cycle_speed = $('#UBCHeadlineWidget').attr('data-speed');
        var cycle_timeout = $('#UBCHeadlineWidget').attr('data-duration');
        if ($(this).hasClass('thumbnails')) {
          $(this).find('.carousel .view-content').after('<ul id="nav">').cycle({
            speed: cycle_speed,
            timeout: cycle_timeout,
            pager: '#nav',
            pagerAnchorBuilder: function(idx, slide) { 
             return '<li><a href="#"><img src="' + jQuery('.views-field-field-news-article-image img', slide).attr("src") + '" width="70" height="50" /></a></li>'; 
            } 
          });
          var slide_image = $(this).find('#nav img');
          var number_of_slides = slide_image.size();
          slide_image.width(545/number_of_slides).height(290/number_of_slides);
          $('#nav li').width(545/number_of_slides);
          // determine margin between slides based on number of slides
          switch (number_of_slides) {
            case 1:
              $('#nav li').css('margin-right', '0px');
              $('.thumbnails, .carousel').css('height', '470px');
              break;
            case 2: 
              $('#nav li').css('margin-right', '18px');
              $('.thumbnails, .carousel').css('height', '520px');
              break;
            case 3:          
              $('#nav li').css('margin-right', '10px');
              $('.thumbnails, .carousel').css('height', '470px');
              break;
            case 4:          
              $('#nav li').css('margin-right', '6.9px');
              $('.thumbnails, .carousel').css('height', '447px');
              break;
            case 5:          
              $('#nav li').css('margin-right', '6px');
              $('#nav li:first-child').css('margin-left', '-3.8px');
              $('.thumbnails, .carousel').css('height', '430px');
              break;
          }
          $('#nav li:nth-child(' + number_of_slides + ')').css('margin-right', '0'); 
        }
        else if ($(this).hasClass('transparent_slider')) {
          $(this).find('.carousel .view-content').cycle({
            fx: 'scrollRight',
            speed: cycle_speed,
            timeout: cycle_timeout
          });
          $(this).find('.carousel .view-content .views-field-title').after('<div class="transparent-carousel-bg">');
        }
        // default
        else if ($(this).hasClass('default')) {
          $(this).find('.carousel .view-content')
            .after('<div class="carouselControls"><div class="start"></div><div class="stop"></div><div id="prev"></div><div class="UbcHeadlineNavPageCount"></div><div id="next"></div></div>')
            .cycle({
            fx: 'fade',
            speed: cycle_speed,
            timeout: cycle_timeout,
            next: '#next',
            prev: '#prev',
            after:onAfter
            });
          $(this).find('.carousel .view-content .views-field-title').after('<div class="transparent-carousel-bg">');
          $('.stop-start').click(function () {
            $(this).toggleClass('stop');
          });
        }
        else if ($(this).hasClass('sliding_gallery')) {
          $(this).find('.carousel .view-content').after('<div id="nav">').cycle({
            fx: 'scrollRight',
            speed: cycle_speed,
            timeout: cycle_timeout,
            pager: '#nav'
          });        
          $(this).find('.carousel .view-content .views-field-title').after('<div class="transparent-carousel-bg">');
        }
      });
      
      
    }
  };

  /* added May 27, 2012 */
  function onAfter (curr,next,opts) {
    var caption = '' + (opts.currSlide + 1) + ' / ' + opts.slideCount;
    $('.UbcHeadlineNavPageCount').html(caption);
    return false; 
  }


}(jQuery));