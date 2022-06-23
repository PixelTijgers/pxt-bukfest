common.View.create('front.modules.contact.Index', {

    onDOMLoad()
    {
        this.initTest();
        this.initGoogleMaps();
        this.initReCaptcha();
    },

    initTest() {
        console.log('Init: front.modules.contact.Index');
    },

    initGoogleMaps() {
        // The location of Uluru
        const location = { lat: 51.22716, lng: 3.79249 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 16,
          center: location,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: location,
          map: map,
        });
    },

    initReCaptcha() {
        function onSubmit(token) {
         document.getElementById('contactForm').submit();
       }
    },

})
