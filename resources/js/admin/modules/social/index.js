common.View.create('admin.modules.social.Index', {

    onDOMLoad()
    {
        this.initTest();
        this.toastrOptions();
        this.initSortable();
    },

    initTest() {
        console.log('Init: admin.modules.social.Index');
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
        var _token = $('input[name="_token"]').val();
        var url =  $('table').attr('data-url');
        var sortableOrder = [];

        $('.sortable-ui').sortable({
            items: 'tr',
            cursor: 'grabbing',
            opacity: 0.6,
            update: function() {

                $('.sortable-ui tbody tr').each(function(index, element) {

                    sortableOrder.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $('button.saveOrder').on('click', function(){

                    $.ajax({
                        type: 'POST',
                        dataType: 'JSON',
                        url: url,
                        data: {
                            sortableOrder: sortableOrder,
                            _token: _token,
                        },
                        success: function(response, status) {
                            if (status == 'success')
                                toastr.success('Volgorde succesvol opgeslagen.');
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(thrownError);
                        }
                    });
                });
            }
        });
    },
})
