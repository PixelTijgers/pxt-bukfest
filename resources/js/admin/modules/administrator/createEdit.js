common.View.create('admin.modules.administrator.CreateEdit', {

    onDOMLoad()
    {
        this.initTest();
        this.userPermissions();
        this.changeUserInput();
    },

    initTest() {
        console.log('Init: admin-modules-administrator.CreateEdit');
    },

    userPermissions()
    {
        var role = $('input[name="role"]:checked').val();

        if (!role) {
            $('input[name="role"][value="user"]').prop("checked",true);

            $('.administrator input').prop('disabled', true).prop('checked', false);
            $('input.destroy').prop('disabled', true).prop('checked', false);
        }

        if(role == 'editor')
        {
            $('.post input[type="checkbox"]').prop('disabled', false).prop('checked', true);
            $('.administrator input').prop('disabled', true).prop('checked', false);
        }
        else if(role == 'user')
        {
            $('.administrator input').prop('disabled', true).prop('checked', false);
            $('input.destroy').prop('disabled', true).prop('checked', false);
        }
    },

    changeUserInput()
    {
        $('.admin-permissions-switcher input').on('change', function(){

            var role = $('input[name="role"]:checked').val();
            console.log($(this));

            if(role === 'administrator')
            {
                $('input[type="checkbox"]').prop('disabled', false).prop('checked', true);
            }
            else if(role === 'editor')
            {
                $('.post input[type="checkbox"]').prop('disabled', false).prop('checked', true);
                $('.administrator input').prop('disabled', true).prop('checked', false);
            }
            else if(role === 'user')
            {
                $('.administrator input').prop('disabled', true).prop('checked', false);
                $('input.destroy').prop('disabled', true).prop('checked', false);
            }
        });
    }
})
