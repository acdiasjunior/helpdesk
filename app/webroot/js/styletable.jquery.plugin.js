/**
 * This plugin can be used to style the tables
 * http://sarfraznawaz.wordpress.com/
 * Author: Sarfraz Ahmed (sarfraznawaz2005@gmail.com)
 */

(function($){

    $.fn.styleTable = function(settings){

        var opts = $.extend({}, $.fn.styleTable.defaults, settings);

        return this.each(function(settings){
           var options = $.extend({}, opts, $(this).data());
           var $this = $(this);
		   var cur_color = null;
			
			// general table start
		   if (options.font_name) {
			$this.css({fontFamily: options.font_name});
		   }

		   if (options.font_size) {
			$this.css({fontSize: options.font_size + 'px'});
		   }
		   // general table end
		   
		   
		   // headings start
		   $('th', $this).css({
			 backgroundColor: options.th_bgcolor,
			 borderTop: '1px solid ' + options.th_border_color,
			 borderBottom: '1px solid ' + options.th_border_color
		   });
			
		   if (options.th_color) {
			$('th', $this).css({color: options.th_color});
		   }

		   if (options.th_image) {
			$('th', $this).css('background-image', 'url(' + options.th_image + ')');
		   }
		   
		   // headings end
		   
			// rows start
		   if (options.tr_odd_color) {
			$('tr:nth-child(odd)', $this).css({color: options.tr_odd_color});
		   }
		   
		   if (options.tr_even_color) {
			$('tr:nth-child(even)', $this).css({color: options.tr_even_color});
		   }

		   if (options.tr_color) {
			$('tr', $this).css({color: options.tr_color});
		   }

		   if (options.tr_border_color) {
			$('td', $this).css({borderBottom: '1px solid ' + options.tr_border_color});
		   }

		   $('tr:nth-child(odd)', $this).css('background-color', options.tr_odd_bgcolor);
		   $('tr:nth-child(even)', $this).css('background-color', options.tr_even_bgcolor);

		   if (options.tr_bgcolor) {
			$('tr', $this).css({backgroundColor: options.tr_bgcolor});
		   }
		   
		   if (options.tr_odd_image) {
			$('tr:nth-child(odd)', $this).css('background-image', 'url(' + options.tr_odd_image + ')');
		   }

		   if (options.tr_even_image) {
			$('tr:nth-child(even)', $this).css('background-image', 'url(' + options.tr_even_image + ')');
		   }

		   if (options.tr_image) {
			$('tr', $this).css('background-image', 'url(' + options.tr_image + ')');
		   }
		   
		   $($this).delegate('tr', 'mouseenter', function() {
			   if (options.tr_hover_image){
			     $.data(this, 'bg', $(this).css('background-image'));
				 $(this).css('background-image', 'url(' + options.tr_hover_image + ')');
				} else {
				 $.data(this, 'bg', $(this).css('background-color'));
				 $(this).css('background-color', options.tr_hover_bgcolor);
			   }
			}).delegate('tr', 'mouseleave', function() {
				 $(this).css('background', $.data(this, 'bg'));
			});
		   // rows end

		   // columns start
		   if (options.td_odd_color) {
			$('td:nth-child(odd)', $this).css({color: options.td_odd_color});
		   }
		   
		   if (options.td_even_color) {
			$('td:nth-child(even)', $this).css({color: options.td_even_color});
		   }

		   $('td:nth-child(odd)', $this).css('background-color', options.td_odd_bgcolor);
		   $('td:nth-child(even)', $this).css('background-color', options.td_even_bgcolor);

		   if (options.td_odd_image || options.td_odd_bgcolor) {
			$('td:nth-child(odd)', $this).css('background-image', 'url(' + options.td_odd_image + ')');
			
			$('td:nth-child(odd)', $this).hover(function(){
			   if (options.td_hover_image){
			     $.data(this, 'bgcol', $(this).css('background-image'));
				 $(this).css('background-image', 'url(' + options.td_hover_image + ')');
				} else {
				 $.data(this, 'bgcol', $(this).css('background-color'));
				 $(this).css('background-color', options.td_hover_bgcolor);
			   }
			}, function(){
				$(this).css('background', $.data(this, 'bgcol'));
			});
			
		   }

		   if (options.td_even_image || options.td_even_bgcolor) {
			$('td:nth-child(even)', $this).css('background-image', 'url(' + options.td_even_image + ')');

			$('td:nth-child(even)', $this).hover(function(){
			   if (options.td_hover_image){
			     $.data(this, 'bgcol', $(this).css('background-image'));
				 $(this).css('background-image', 'url(' + options.td_hover_image + ')');
				} else {
				 $.data(this, 'bgcol', $(this).css('background-color'));
				 $(this).css('background-color', options.td_hover_bgcolor);
			   }
			}, function(){
				$(this).css('background', $.data(this, 'bgcol'));
			});
			
		   }
		   // columns end
		   
        });
    }

  // plugin settings
  $.fn.styleTable.defaults = {
	// settings for headings
    th_bgcolor: '#F0F8FF',
	th_image: '',
	th_color: '',
	th_border_color: '#95BCE2',
	
	// settings for rows
	tr_odd_bgcolor: '#ffffff',
	tr_even_bgcolor: '#f6f6f6',
	tr_bgcolor: '',
	tr_hover_bgcolor: '#FFF3B3',
	tr_odd_image: '',
	tr_even_image: '',
	tr_image: '',
	tr_hover_image: '',	
	tr_odd_color: '',
	tr_even_color: '',
	tr_color: '',
	tr_border_color: '#cccccc',

	// settings for columns
	td_odd_bgcolor: '',
	td_even_bgcolor: '',
	td_hover_bgcolor: '',
	td_odd_image: '',
	td_even_image: '',
	td_hover_image: '',	
	td_odd_color: '',
	td_even_color: '',
	
	// settings for table
	font_name: '',
	font_size: ''
  }

})(jQuery);
