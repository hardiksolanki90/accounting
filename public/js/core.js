$(document).ready(function(e) {
    $(".select_search").SumoSelect({ search: true, searchText: "Enter here." });

    $(document).on('click', '.addMore', function (e) {
        e.preventDefault();
        var billing_type = $('#billing_type').val();
        if (billing_type == 'hourly') {
            var rate = $('.rate').val();
            console.log(rate);
            $('.hours.admr').append('<div class="row"><div class="form-group col-md-4"><div class="position-relative has-icon-left"> <label for="description" class="">description</label> <input id="description" type="text" class="form-control" name="description[]" required placeholder="Description" autocomplete="description" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="hours" class="">hours</label> <input id="hours" type="text" class="hours form-control" name="hours[]" min="00:00" max="24:00" required placeholder="Hours" autocomplete="hours" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="per_hour_price" class="">per hour price</label> <input id="per_hour_price" type="text" class="per_hour_price form-control" name="per_hour_price[]" value="'+rate+'" required placeholder="Per Hour Price" autocomplete="per_hour_price" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="total" class="">total</label> <input id="total" type="text" class="form-control name="total[]" required placeholder="Total" autocomplete="total" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2 deletetbtn"> <button type="button" class="btn remove btn-danger waves-effect waves-light m-1"><i class="fa fa fa-trash-o"></i> <span>Delete</span></button></div></div>');
            // $('.cloneData > .hours > .row').first().clone()
            // .find("input:text").val("").end()
            // .insertBefore('.new-column');

            $('.hours').datetimepicker({
                // format: 'LT'
                format : 'HH:mm'
            });
        }
    });
    
    $(document).on('click', '.remove', function (e) {
        e.preventDefault();
        var parent = $(this).parent().parent();
        parent.remove();
    });

    $(document).on('change', '.bil_type', function (e) {
        if($('.bil_type').val() == 'bank') {
            $('.bank_detail').show(); 
        } else {
            $('.bank_detail').hide(); 
        }
    });

    $(document).on('change', '#billing_type', function (e) {
        console.log();
        if($(this).val() == 'hourly') {
            $('.fix').hide();
            $('.hours').show();
            $('.addMoreWrap').show();
        } else {
            $('.fix').show();
            $('.hours').hide();
            $('.addMoreWrap').hide();
        }
    });

    $(document).on('change', '#invoice_number', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var url = ADMIN_URL + '/get/invoice-details/' + id;
        $.get(url,'', '', 'json').always(function (data) {
            if (data.total) {
                $('#amount').val(data.total);
            }
        });
    });

    $(document).on('change', '#client_id', function (e) {
        e.preventDefault();
        var id = $(this).val();
        var url = ADMIN_URL + '/get/client-details/' + id;
        $.get(url,'', '', 'json').always(function (data) {
            if (typeof(data)) {
                $('.rate').val(data.hourly_rate);
                // $('.cost').val(data.hourly_rate);
                $('.per_hour_price').val(data.hourly_rate);
                $('#applicable_tax_percentage').val(data.applicable_tax_percentage);
            }
        });
    });

    $('.hours').datetimepicker({
        // format: 'LT'
        format : 'HH:mm'
    });

    $(document).on('dp.change', '.hours', function (e) {
        var hms = $(this).val();   // your input string
        console.log(hms);
        var a = hms.split(':'); // split it at the colons
        var minutes = (+a[0]) * 60 + (+a[1]);
        var rate = $('.rate').val();
        var final = minutes * rate;
        console.log(final);
    });

});
