$(document).ready(function(e) {
    $(".select_search").SumoSelect({ search: true, searchText: "Enter here." });

    $(document).on("click", ".addMore", function(e) {
        e.preventDefault();
        var billing_type = $("#billing_type").val();
        if (billing_type == "hourly") {
            var rate = $(".rate").val();
            console.log(rate);
            $(".hours.admr").append(
                '<div class="row"><div class="form-group col-md-4"><div class="position-relative has-icon-left"> <label for="description" class="">description</label> <input id="description" type="text" class="form-control" name="description[]" required placeholder="Description" autocomplete="description" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="hours" class="">hours</label> <input id="hours" type="text" class="in_hours form-control" name="hours[]" min="00:00" max="24:00" required placeholder="Hours" autocomplete="hours" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="per_hour_price" class="">per hour price</label> <input id="per_hour_price" type="text" class="per_hour_price form-control" name="per_hour_price[]" value="' +
                    rate +
                    '" required placeholder="Per Hour Price" autocomplete="per_hour_price" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2"><div class="position-relative has-icon-left"> <label for="total" class="">total</label> <input id="total" type="text" class="in_total form-control" name="total[]" required placeholder="Total" autocomplete="total" autofocus /><div class="form-control-position"><i class="icon-user"></i></div></div></div><div class="form-group col-md-2 deletetbtn"> <button type="button" class="btn remove btn-danger waves-effect waves-light m-1"><i class="fa fa fa-trash-o"></i> <span>Delete</span></button></div></div>'
            );

            // $('.cloneData > .hours > .row').first().clone()
            // .find("input:text").val("").end()
            // .insertBefore('.new-column');

            $(".in_hours").datetimepicker({
                // format: 'LT'
                format: "HH:mm",
                icons: {
                    next: "fa fa-angle-right",
                    previous: "fa fa-angle-left"
                }
            });
        }
    });

    $(document).on("click", ".remove", function(e) {
        e.preventDefault();
        var parent = $(this)
            .parent()
            .parent();
        parent.remove();
    });

    $(document).on("change", ".bil_type", function(e) {
        if ($(".bil_type").val() == "bank") {
            $(".bank_detail").show();
        } else {
            $(".bank_detail").hide();
        }
    });

    $(document).on("change", "#billing_type", function(e) {
        console.log();
        if ($(this).val() == "hourly") {
            $(".fix").hide();
            $(".hours").show();
            $(".addMoreWrap").show();
        } else {
            $(".fix").show();
            $(".hours").hide();
            $(".addMoreWrap").hide();
        }
    });

    $(document).on("change", "#invoice_number", function(e) {
        e.preventDefault();
        var id = $(this).val();
        var url = ADMIN_URL + "/get/invoice-details/" + id;
        $.get(url, "", "", "json").always(function(data) {
            if (data.total) {
                $("#amount").val(data.total);
            }
        });
    });

    $(document).on("change", "#client_id", function(e) {
        e.preventDefault();
        var id = $(this).val();
        var url = ADMIN_URL + "/get/client-details/" + id;
        $.get(url, "", "", "json").always(function(data) {
            if (typeof data) {
                $(".rate").val(data.hourly_rate);
                // $('.cost').val(data.hourly_rate);
                $(".per_hour_price").val(data.hourly_rate);
                $("#applicable_tax_percentage").val(
                    data.applicable_tax_percentage
                );
            }
        });
    });

    $(".in_hours").datetimepicker({
        format: "HH:mm",
        // inline: true,
        // sideBySide: true,
        icons: {
            next: "fa fa-angle-right",
            previous: "fa fa-angle-left"
        }
    });

    $("#date_of_transaction, #date, #due_date").val(
        new Date().toISOString().slice(0, 10)
    );

    $(document).on("dp.change", ".in_hours", function(e) {
        var hms = $(this).val(); // your input string
        // console.log(hms);
        var a = hms.split(":"); // split it at the colons
        var minutes = +a[0] * 60 + +a[1];

        // var hours = (minutes / 60);
        // console.log(hours);
        // var rhours = Math.floor(hours);
        // console.log(rhours);
        // var minutes2 = (hours - rhours) * 60;
        // console.log(minutes2);

        var rate = $(".rate").val();
        var final = (minutes * rate) / 60;
        $(this)
            .parent()
            .parent()
            .parent()
            .find(".in_total")
            .val(Math.floor(final));
        console.log(final);
    });

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: toast => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });

    $(document).on("submit", ".myForm", function(e) {
        e.preventDefault();

        const form = $(this);
        // if (form) {
        //     formValidate(form);
        // }
        var form_data = new FormData();
        const id_form = $(this).attr("id");
        var url = $(this).attr("action");
        if (!url) {
            var url = URL + PATH;
        }

        var fields = $(this).serializeArray();

        $("form#" + id_form + " input:file").each(function() {
            console.log($(this));
            if ($(this).attr("multiple")) {
                files = new Array();
                fs = $(this).prop("files");
                for ($x = 0; $x <= fs.length; $x++) {
                    form_data.append($(this).attr("name"), fs[$x]);
                }
            } else {
                files = $(this).prop("files")[0];
                form_data.append($(this).attr("name"), files);
            }
        });

        $(fields).each(function(index, data) {
            form_data.append(data.name, data.value);
        });

        // NProgress.start();
        form.find('button[type="submit"]').addClass("loadingi");

        var action = $(this).attr("method");
        console.log(form_data);
        axios({
            method: action,
            url: url,
            urlheaders: "",
            data: form_data
        })
            .then(res => {
                // console.log(res.data);
                if (res.data.status == true) {
                    // myA.showSnackBar(res.data.message);
                    Toast.fire({
                        icon: "success",
                        title: res.data.message
                    });
                }

                if (res.status == 201) {
                    Toast.fire({
                        icon: "success",
                        title: res.data.message
                    });

                    setTimeout(function() {
                        window.location = res.data.redirect;
                    }, 1000);
                }

                if (res.data.status == false) {
                    Toast.fire({
                        icon: "error",
                        title: res.data.message
                    });
                }

                if (res.data.status == "redirect") {
                    window.location = res.data.message;
                }
                form.find('button[type="submit"]').removeClass("loadingi");
                // NProgress.done();
            })
            .catch(function(e) {
                console.log(e);
                console.log(e.response);
                if (e.response != "undefined") {
                    if (e.response.status && e.response.status == 500) {
                        if (e.response.data.message) {
                            Toast.fire({
                                icon: "error",
                                title: e.response.data.message
                            });
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: e.response.statusText
                            });
                        }
                    }

                    if (e.response.status == 422) {
                        Toast.fire({
                            icon: "error",
                            title: e.response.data.message
                        });
                    }
                }

                form.find('button[type="submit"]').removeClass("loadingi");
                // NProgress.done();
            });
    });
});