$(document).ready(function () {

    $("form").each(function () {


        var user_id = $(this).find('.userid').val();

        var submitButtonId = $(this).find(':input[type="button"]');
        var deleteButton = $('#delete_' + user_id);

        $("select[name='user_type_" + user_id + "']").on('change', function () {
            if (this.value == 'Demo') {
                $("#datepicker_" + user_id).datepicker();
                $(".card-digits-wrapper_" + user_id).hide();
                $(".demo-date-wrapper_" + user_id).show();
            } else if (this.value == 'Live') {

                $(".demo-date-wrapper_" + user_id).hide();
                $(".card-digits-wrapper_" + user_id).show();

            }
        });

        $("#datepicker_" + user_id).datepicker();

        $('#' + submitButtonId.attr('id')).on('click', function (e) {
            e.preventDefault();

            var useremail = $("input[name='email_" + user_id + "']").val();
            var firstname = $("input[name='first_name_" + user_id + "']").val();
            var lastname = $("input[name='last_name_" + user_id + "']").val();
            var usertype = $("select[name='user_type_" + user_id + "']").val();
            var carddigits = $("input[name='credit_card_last_digits_" + user_id + "']").val();
            var demoexpirationdate = $("#datepicker_" + user_id).datepicker({ dateFormat: 'dd-mm-yy' }).val();

            var ajaxDataObj = {
                user_id: user_id,
                user_type: usertype,
                email: useremail,
                first_name: firstname,
                last_name: lastname,
                credit_card_last_digits: carddigits,
                demo_expiration_date: demoexpirationdate,
            }

            $.ajax({
                url: '/api/save_user_details',
                type: "post",
                data: ajaxDataObj,
                dataType: 'JSON',
                success: function (data) {
                    location.reload();
                }
            });

        })

        deleteButton.on('click', function () {
            $.ajax({
                url: '/api/save_user',
                type: "post",
                data: { 'user_id': user_id },
                dataType: 'JSON',
                success: function (data) {
                    location.reload();
                }
            });

        })



        $('#saveUser').on('click', function () {

            var $inputs = $('#new-user-form :input');

            var values = {};
            $inputs.each(function () {
                console.log(this.name);
                if (this.name != '_token' && this.name.length > 0) {
                    values[this.name] = $(this).val();
                }

            });

            $.ajax({
                url: '/api/save_user',
                type: "post",
                data: values,
                dataType: 'JSON',
                success: function (data) {
                    //  location.reload();
                }
            });

        })

    });
});

