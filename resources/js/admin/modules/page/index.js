common.View.create('admin.modules.page.Index', {

    onDOMLoad()
    {
        this.initTest();
        this.toastrOptions();
        this.initSortable();
    },

    initTest() {
        console.log('Init: admin.modules.page.Index');
    },

    toastrOptions()
    {
        toastr.options = {
            'closeButton': false,
            'debug': true,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-bottom-right',
            'preventDuplicates': true,
            'onclick': null,
            'showDuration': '200000',
            'hideDuration': '500',
            'timeOut': '3000',
            'extendedTimeOut': '1000',
            'showEasing': 'easeOutBack',
            'hideEasing': 'easeInBack',
            'showMethod': 'slideDown',
            'hideMethod': 'slideUp'
        }
    },

    initSortable()
    {
        $(function() {
            $('#nestedPages').sortableLists({
                currElClass: 'dragedElement',
                placeholderClass: 'placeholderElement',
                hintClass: 'hintClass',
                insertZone: 100,
                insertZonePlus: true,
                ignoreClass: 'clickable'
            });

            $('.saveOrder').on('click', function() {

                var _token = $('input[name="_token"]').val();
                var url = $('.sortableLists').attr('data-url');
                var sortableOrder = $('#nestedPages').sortableListsToArray();

                $.ajax({
                    type: 'POST',
                    dataType: 'JSON',
                    url: url,
                    data: {
                        sortableOrder: sortableOrder,
                        _token: _token
                    },
                    success: function success(response, status) {
                        if (status == 'success') toastr.success('Volgorde succesvol opgeslagen.');
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                    }
                });

            });

        });

    },

})
