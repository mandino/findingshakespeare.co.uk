$(document).ready(function() {

	$('#ex-sidebar .ex-sidebar-nav li:nth-child(1)').addClass('first-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(2)').addClass('second-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(3)').addClass('third-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(4)').addClass('fourth-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(5)').addClass('fifth-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(6)').addClass('sixth-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(7)').addClass('seventh-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(8)').addClass('eigth-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(9)').addClass('ninth-child');
	$('#ex-sidebar .ex-sidebar-nav li:nth-child(10)').addClass('tenth-child');
						   
	var hash = window.location.hash.substr(1);
	var href = $('#ex-sidebar .ex-sidebar-nav li a').each(function(){
		var href = $(this).attr('href');
		if(hash==href.substr(0,href.length-0)){
			var toLoad = hash+'.html #the-post';
			$('#ex_frame_container').load(toLoad)
		}											
	});

	var toLoadtwo = $('#ex-sidebar .ex-sidebar-nav li.first-child a').attr('href')+' #the-post';
		
	$('#ex_frame_container').fadeOut('slow').hide('slow',loadContenttwo);
	$('#load').fadeIn('slow');
		
	function loadContenttwo() {
		$('#main').append('<span id="load"><span class="dn">LOADING...</span></span>');
		$('#ex_frame_container').load(toLoadtwo, showNewContenttwo);
	}
	
	function showNewContenttwo() {
		$('#load').fadeOut('slow').remove();
		$('#ex_frame_container').fadeIn('slow').show('1000');
	}
	
	
	$('#ex-sidebar .ex-sidebar-nav a').click(function(){
		
		var toLoad = $(this).attr('href')+' #the-post';
		
		$('#ex_frame_container').fadeOut('slow').hide('slow',loadContent);
		
		$('#load').fadeIn('slow');
		
		//window.location.hash = $(this).attr('href').substr(0,$(this).attr('href').length-0);
		
		function loadContent() {
			$('.frame-holder').prepend('<span id="load"><span class="dn">LOADING...</span></span>');
			$('#ex_frame_container').load(toLoad, showNewContent);
		}
		
		function showNewContent() {
			$('#load').fadeOut('slow').remove();
			$('#ex_frame_container').fadeIn('slow').show('1000');
		}
		
		function hideLoader() {
			$('#load').fadeOut('normal');
		}
		
		return false;
		
	});

});

$(function() {
		
	$('.post-loader').hover(onHover, hoverOut);
	
		function onHover(){
								
			$('li.loaded-post').fadeOut(loadContentone);
						
				function loadContentone() {
					$('ul#main-nav ul.sub-menu').append('<li id="nav-load"><span class="dn">LOADING...</span></li>');
					$(this).load('/latest-blog-post', showNewContentone);
				}
				
					function showNewContentone() {
						$(this).fadeIn();
						$('li#nav-load').fadeOut().remove();
					}
					
		}

		function hoverOut(){
			$('li.loaded-post').hide();	
		}
		
	$('li.loaded-post').hover( function() { $(this).show(); });

});