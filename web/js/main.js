jQuery(document).ready(function($){
	var tabItems = $('.cd-tabs-navigation a'),
		tabContentWrapper = $('.cd-tabs-content');

	tabItems.on('click', function(event){
		event.preventDefault();
		var selectedItem = $(this);
		if( !selectedItem.hasClass('selected') ) {
			var selectedTab = selectedItem.data('content'),
				selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
				slectedContentHeight = selectedContent.innerHeight();
			
			tabItems.removeClass('selected');
			selectedItem.addClass('selected');
			selectedContent.addClass('selected').siblings('li').removeClass('selected');
			//animate tabContentWrapper height when content changes 
			tabContentWrapper.animate({
				'height': slectedContentHeight
			}, 200);
		}
	});

	//hide the .cd-tabs::after element when tabbed navigation has scrolled to the end (mobile version)
	checkScrolling($('.cd-tabs nav'));
	$(window).on('resize', function(){
		checkScrolling($('.cd-tabs nav'));
		tabContentWrapper.css('height', 'auto');
	});
	$('.cd-tabs nav').on('scroll', function(){ 
		checkScrolling($(this));
	});

	function checkScrolling(tabs){
		var totalTabWidth = parseInt(tabs.children('.cd-tabs-navigation').width()),
		 	tabsViewport = parseInt(tabs.width());
		if( tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
			tabs.parent('.cd-tabs').addClass('is-ended');
		} else {
			tabs.parent('.cd-tabs').removeClass('is-ended');
		}
	}
    
	function foo () {
		$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
			namespace: "callbacks",
			pager: true,
		});
	}
	foo();
    delCountItemCart();
    delAllCountItemCart();
});
function delCountItemCart(){
    $("body").on('click', '.close1', function() {
        var cover = $(this).closest(".cart-header");
        var str = cover.find($(".qty :first-child p")).text();
        var price = str.match(/\d+.\d+/g);
        $(".cart.box_1 .total :first-child").text(($(".cart.box_1 .total :first-child").text() - price).toFixed(2));
        $("#simpleCart_quantity").text($("#simpleCart_quantity").text() - 1);
    });
}
function delAllCountItemCart(){
    $("body").on('click', '.order', function() {
        console.log("ok");
        $(".cart.box_1 .total :first-child").text(0);
        $("#simpleCart_quantity").text(0);
    })
}
