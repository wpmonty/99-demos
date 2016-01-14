// 1) section 1: extracted only what's related to the masonry grid from utils.js ; file renamed to port-support.js
// 2) section 2: copy/pasted all of script.js into bottom of this file



// SECTION 1: from utils.js
var s;
var browser = {
	basewid: 2500,
	basehei: 1175,
	wid: 0,
	hei: 0,
    font: 0,
    setFont: function(){
    	this.wid = document.documentElement.clientWidth;
        this.hei = document.documentElement.clientHeight;
	    this.font = this.wid * 12 / this.basewid;
	    document.body.style.fontSize =  Math.min(Math.max(browser.font, 9), 12) + 'px';
    },
	resize: function (init) {
		if(!init){
			this.setFont();
			if($('.slidemover').length)
				customslide.resize();
		}
		
		this.wid = $(window).width();

	    if ($('.fluid-grid').length)
	    	this.positionWorkGrid(init);

	    if ($('.screenshots').length) {
			if(init){
				$(".screenshots").grid({
					cellWidth: 915,
					aspect: 0.563,
					minCols: 2,
					cellPadding: 8,
					debug: true,
					scaleCells: true
				});
			}
			else
				$(".screenshots").grid("refresh");
	    }

	    if($('#news').length)
	    	news.load(0);
	},
	updateBackground: function (st) {
	    var el = $('.slide0 .rel').length? $('.slide0 .rel') : $('.slides-wr'),
	        factor = st/browser.hei,
	        yPos = -1*(factor*5) + 'em',
	        op = 1-(factor*0.9),
	        bannerYpos = -1*(factor*50) + 'em';
	    el.css({
	        top: yPos,
	        opacity: op
	    });
		$('.bannertext').css({
	        top: bannerYpos
	    });
	},
	fixfilter: function(){
	    var content = $('.work .filters')[0].getBoundingClientRect();
	    if(content.top <= 0)
	        $('.showme').addClass('fix');
	    else
	       	$('.showme').removeClass('fix');
	},
	swapcolor: function(st){
		$('.section').each(function(){
			var sel = '#'+this.id+' .section-text',
				curpos = browser.hei+st,
				dist = curpos-$(sel).offset().top-(browser.hei/3);
			if(dist>0)
				$('.slide2').attr('data-name', this.id);
		});
		//Nav
		var slide2 = $('.slide2')[0].getBoundingClientRect(),
			slide2bot = slide2.bottom-browser.hei;		
		if(slide2.top>=0)
			$('.section-nav').attr('data-position', 'top');
		else if(slide2bot<=0)
			$('.section-nav').attr('data-position', 'bottom');
		else
			$('.section-nav').attr('data-position', 'fixed');
	},
	positionWorkGrid: function(){
		var cols = this.wid>1024? 4 : 2;
		$(".fluid-grid").grid({
			cellWidth: 570,
			aspect: 1.14,
			minCols: cols,
			cellPadding: 0,
			debug: false,
			scaleCells: true
		});
	}
};
var browserhistory = {	
	_object: '',
	baseUrl: '',
	curPage: '',
	parseUrl: function(url){
		if(this.baseUrl == '') 
			this.baseUrl = this.getBaseURL();
		var str = url.replace(this.baseUrl, '');
		return str;
	},
	getBaseURL: function(){
		var url = location.href;
		var baseURL = url.substring(0, url.indexOf('/', 14));

		if (baseURL.indexOf('http://localhost') != -1) {
			var url = location.href;
			var pathname = location.pathname;
			var index1 = url.indexOf(pathname);
			var index2 = url.indexOf("/", index1 + 1);
			var baseLocalUrl = url.substr(0, index2);
			return baseLocalUrl + "/";
		}
		else 
			return baseURL + "/";
	},
	init: function(){
		this._object = window.History;
		var historyobject = this._object;
		if (!historyobject || !historyobject.enabled){
			return false;
		}
		historyobject.Adapter.bind(window,'statechange',function(){
			var State = historyobject.getState(),
				patt = /\/news\/[0-9]+\/\w/g,
				link = '/'+$.trim(browserhistory.parseUrl(State.url));
			if((/news\/[0-9]+\/\w/g).test(link))
				news.detail(link);
			else if((/news\/author\/[0-9]+\/\w/g).test(link) || (/news\/all/g).test(link))
				news.filter(link);
			else if((/news/g).test(link))
				news.load(1);
			else
				news.unload();
		});
	}
};




// SECTION 2: from script.js

$(function () {
    browser.resize(1);

    //menu
    $('.menu, .first-level').css('width', $('.first-level').outerWidth());
    $('.menu').css({
        'visibility': 'visible',
        'display': 'none'
    });
    $('a.menu-tr').click(function(){
        if($(this).hasClass('clicked'))
            closeMenu();
        else{
            $('.menu').show('slide', { direction: 'right' }, 400, 'easeInOutCubic');
            $(this).addClass('clicked');   
        }
    });
    $('a.openofficelist').click(function(){
        $(this).toggleClass('opened');
        $('.second-level').toggle('slide', { direction: 'right' }, 400, 'easeInOutCubic');
    });
	
	//scroll
	$('.who a.serv').click(function(e){
        var serv = '[data-serv="'+$(this).data('loc')+'"]',
			hei = $('.showme').outerHeight();
		console.log($(serv).offset().top, hei);
		$('html, body').animate({
			'scrollTop': $(serv).offset().top - hei -40
		}, 'slow', 'linear');
    });

    //filter
    $('.showme a.filter').click(function(){
        $('.taglist').slideToggle(400, 'easeInOutCubic');
    });
    $('.tag-close a').click(function(){
        $('.taglist').slideUp(400, 'easeInOutCubic');
    });
    $('.taglist .actions a').click(function(){
        $(this).toggleClass('select');
    });
    $('.taglist a.equal').click(function(){
        var temp = '';
        $('.tag-close a').click();
        $('.actions a.select').each(function(){
            var id = $(this).data('id');
            temp+=', [data-belongs*="#'+id+'#"]';
        });
        if(temp != ''){
            $('.thumbnails .workthumb').not(temp.substring(2)).appendTo('.thumnails-filter-hold');
            $(temp.substring(2)).appendTo('.thumbnails');
        }
        else{
            $('.thumnails-filter-hold>div').appendTo('.thumbnails');
        }
        $(".thumbnails>div").tsort("",{attr:"id"});
        browser.positionWorkGrid();
        $('.thumnails-filter-hold>div').focus().addClass('scaledown');
        $('.thumbnails .workthumb').focus().removeClass('scaledown');
    });

    //carousel
    $('body').on('click', '.carousel a.nav', function (e) {
        e.preventDefault();
        e.stopPropagation();
        if ($(this).hasClass('navl')) {
            slideshow.prev();
        }
        else {
            slideshow.next();
        }
    });
	
	//Slider
    $('body').on('click', '.slide-nav a', function(e){
        e.stopPropagation();
        e.preventDefault();
        if($(this).hasClass('l'))
            customslide.prev();
        else
            customslide.next();
    });
	$('body').on('click', 'a[data-linkto]', function(e){
        e.stopPropagation();
        e.preventDefault();
        $('a[href="'+$(this).data('linkto')+'"]:first').click();
    });

    $('.viewport.home a.trigwork, a.scroll').on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            'scrollTop': $('.content-wr').offset().top - (browser.font * 18.44)
        }, 'slow');
        if($(this).hasClass('trigwork'))
            closeMenu();
    });

    $('.viewport.home').on('click', 'a.trigclients', function (e) {
        e.preventDefault();
        $('html, body').animate({
            'scrollTop': $('.clients').offset().top - (browser.font * 4.11)
        }, 'slow');
        closeMenu();
    });

    $('html.has-no-touch:not(.oldie)').on('click', '.viewport:not(.no-ajax) a.trignews', function (e) {
        e.preventDefault();
        e.stopPropagation();
        browserhistory._object.pushState(null, null, '/news');
        closeMenu();
    });

    $('html.has-no-touch:not(.oldie)').on('click', '.newsfilter a', function (e) {
        e.preventDefault();
        e.stopPropagation();
        browserhistory._object.pushState(null, null, this.href);
    });

    $('html.has-no-touch:not(.oldie)').on('click', '.newslink', function(e){
        e.stopPropagation();
        e.preventDefault();
        browserhistory._object.pushState(null, null, this.href);
    });

    $('html.has-no-touch:not(.oldie)').on('mouseup', '.news-float', function (e) {
        var container = $(".news-bg");
        if (!container.is(e.target) && container.has(e.target).length === 0){
           browserhistory._object.pushState(null, null, browserhistory.curPage);
        }
    });

    //Display Videos
    $('body').on('click', 'a.play', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.fancybox({
            'autoPlay': true,
            'autoScale': false,
            'width': '80%',
            'height': '80%',
            'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type': 'iframe',
            'swf': {
                'wmode': 'transparent',
                'allowfullscreen': 'true'
            }
        });
    });

    //About page
    $('.section-nav').on('click', 'a', function(e){
        e.stopPropagation();
        e.preventDefault();
        var sel = '#'+$(this).data('slide');
        $('html, body').animate({
            'scrollTop': $(sel).offset().top
        }, 1000, 'easeOutCirc');
    });

    //Scroll to required positions
    var path = window.location.pathname;
    browserhistory.curPage = path;
    $('a[href="'+path+'"]').addClass('active');
    setTimeout(function () {
        switch (path) {
            case '/work':
                $('a.trigwork').click();
                break;
            case '/clients':
                $('a.trigclients').click();
                break;
        }
    }, 200);
	
	//Resize the window
	$(window).resize(function(){
		browser.resize(0);
	});

    //Scroll
    var workfilter = $('.work .filters').length,
        sections = $('.section').length,
        oldie = $('html').hasClass('oldie');

    if($('html').hasClass('has-no-touch')){ //For desktop
        browserhistory.init();
        $(window).scroll(function(){
            var st = $(this).scrollTop();
            browser.updateBackground(st);
            if(workfilter)
                browser.fixfilter();
            if(sections && !oldie)
                browser.swapcolor(st);
        });
    }
    else if(workfilter){ //Touch devices
        $(window).scroll(function(){
            browser.fixfilter();
        });
    }
});

function closeMenu(){
    var timer = 0;
    if($('a.openofficelist').hasClass('opened')){
        $('a.openofficelist').removeClass('opened');
        $('.second-level').hide('slide', { direction: 'right' }, 400, 'easeInOutCubic');
        timer = 500;
    }
    setTimeout(function(){
        $('.menu').hide('slide', { direction: 'right' }, 400, 'easeInOutCubic');
        $('a.menu-tr').removeClass('clicked');
    }, timer);
}
