common.View.create('front.modules.home.Index', {

    onDOMLoad()
    {
        this.initTest();
        this.initSlickslider();
    },

    initTest() {
        console.log('Init: front.modules.home.Index');
    },

    initSlickslider()
    {
        $('#pageSlider').slick({
            arrows: true,
            cssEase: 'linear',
            dots: false,
            fade: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            appendArrows: '.appendButtons',
            prevArrow: '<button type="button" class="slick-prev"><i class="fa-thin fa-arrow-left-long"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa-thin fa-arrow-right-long"></i></button>'
        });
    }

})
