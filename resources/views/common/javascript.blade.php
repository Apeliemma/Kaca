<div class="bootstrap-iso">
    <div class="modal fade" role="dialog" id="status_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Action Status<a data-dismiss="modal" class="pull-right btn-danger btn">&times;</a>
                    </div>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" style="left:40%">
                        <button class="btn btn-danger pull-right" data-dismiss="modal">&times;</button>
                        <h4>Are you sure?</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal ajax-post" id="delete_form" action="" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="delete_id">
                        <input type="hidden" name="delete_model">
                        <div class="form-group">
                            <label class="control-label col-md-5">&nbsp;</label>
                            <div class="col-md-5">
                                <button data-dismiss="modal" class="btn btn-danger">NO</button>
                                <button type="submit" class="btn btn-success">YES</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" role="dialog" id="run_action_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" style="left:40%">
                        <button class="btn btn-danger btn-sm btn-raised pull-right" data-dismiss="modal">&times;
                        </button>
                        <h4>Are you sure?</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal ajax-post" id="run_action_form" action="" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="action_element_id">
                        <div class="form-group">
                            <label class="control-label col-md-5">&nbsp;</label>
                            <div class="col-md-5">
                                <button data-dismiss="modal" class="btn btn-danger btn-raised">NO</button>
                                <button type="submit" class="btn btn-success btn-raised">YES</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .autocomplete-suggestions {
        background-color: beige;
    }

    .centered {
        margin-left: auto;
        margin-top: auto;
        margin-bottom: auto;
        margin-right: auto;

        display: -webkit-box; /* OLD - iOS 6-, Safari 3.1-6, BB7 */
        display: -ms-flexbox; /* TWEENER - IE 10 */
        display: -webkit-flex; /* NEW - Safari 6.1+. iOS 7.1+, BB10 */
        display: flex; /* NEW, Spec - Firefox, Chrome, Opera */
    }

    .centered-container {
        display: -webkit-box; /* OLD - iOS 6-, Safari 3.1-6, BB7 */
        display: -ms-flexbox; /* TWEENER - IE 10 */
        display: -webkit-flex; /* NEW - Safari 6.1+. iOS 7.1+, BB10 */
        display: flex; /* NEW, Spec - Firefox, Chrome, Opera */

        justify-content: center;
        align-items: center;
    }


    .titlecolumn th {
        background: #6b64646b;
        white-space: nowrap;
        text-align: right;
        font-weight: bold;
        /*width: 5%;*/
    }
</style>

<script type="text/javascript">
    var current_url = window.location.href;
    (function (window, undefined) {
        if (typeof History != undefined) {
            History.Adapter.bind(window, 'statechange', function () { // Note: We are using statechange instead of popstate
                var State = History.getState(); // Note: We are using History.getState() instead of event.state
                if (State.url != current_url) {
                    ajaxLoad(State.url);
                }
            });
        }


    })(window);
    var form = null;
    jQuery(document).on('click', '.is-invalid', function () {
        $(this).removeClass("is-invalid");
        $(this).closest(".invalid-feedback").remove();
    });
    jQuery(document).on('change', '.is-invalid', function () {
        $(this).removeClass("is-invalid");
        $(this).closest(".invalid-feedback").remove();
    });
    jQuery(document).on('click', '.form-group', function () {
        $(this).find('.help-block').remove();
        $(this).closest(".form-group").removeClass('is-invalid');
    });
    jQuery(document).on('click', '.form-control', function () {
        $(this).find('.help-block').remove();
        $(this).closest(".form-group").removeClass('is-invalid');
    });
    jQuery(document).on('click', '.clear-form', function () {
        resetForm('model_form_id');
    });
    jQuery(document).on('click', '.load-page', function () {
        // closeSidebar();
        $(".system-container").html('<img style="height:120px !important;" class="centered" src="{{ url("img/Ripple.gif") }}"/>');
        $(".modal-backdrop").remove();
        $('.page-header-title').empty();
        $('.breadcrumb').empty();
        jQuery(".active").removeClass("active");
        jQuery(".loading-img").show();
        jQuery(".sb-site-container").trigger('click');
        jQuery(".profile-info").slideUp();
        var url = $(this).attr('href');
        $(this).closest('a').addClass("active");
        var status = 0;
        var material_active = $('input[name="material_page_loaded"]').val();
        if (!material_active) {
            window.location.href = url;
        }
        $.get(url, null)
            .done(function (response) {

                jQuery(".loading-img").hide();
                current_url = url;
                if (response.redirect) {
                    if (material_active == 1) {
                        setTimeout(function () {
                            ajaxLoad(response.redirect);
                        }, 1300);
                    } else {
                        window.location.href = response.redirect;
                    }

                }
                $(".system-container").html(response);
                var title = $(".system-title").html();
                History.pushState({state: 1}, title, url);
                prepareAjaxUpload();
                return false;
            })
            .fail(function (response) {
                window.location.href = url;
            });
        return false;

    });

    function gotoBottom(id) {
        var element = document.getElementById(id);
        if (element) {
            element.scrollTop = element.scrollHeight - element.clientHeight;
        }
    }

    function date_time(id) {
        @if(@Auth::user()->timezone)
            date = new Date('{{  \Carbon\Carbon::now(request()->user()->timezone)->toDateTimeString() }}');
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat');
        h = date.getHours();
        if (h < 10) {
            h = "0" + h;
        }
        m = date.getMinutes();
        if (m < 10) {
            m = "0" + m;
        }
        s = date.getSeconds();
        if (s < 10) {
            s = "0" + s;
        }
        result = '' + days[day] + ' ' + months[month] + ' ' + d + ' ' + year + ' ' + h + ':' + m + ':' + s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("' + id + '");', '1000');
        return true;
        @endif
    }
    jQuery(document).on('submit', '.ajax-post', function () {
        var form = $(this);
        var btn = form.find(".submit-btn");
        btn.prepend('<img class="processing-submit-image" style="height: 50px;margin:-10px !important;" src="{{ url("img/Ripple.gif") }}">');
        btn.attr('disabled', true);
        this.form = form;
        $(".fg-line").removeClass('has-error');
        var url = $(this).attr('action');
        var data = $(this).serialize();
        var material_active = $('input[name="material_page_loaded"]').val();
        $.post(url, data).done(function (response, status) {
            var btn = form.find(".submit-btn");
            @if(env('APP_ENV')=="local")
            btn.find('img').remove();
            btn.attr('disabled', false);
            @endif
            endLoading(response);
            removeError();
            if (response.call_back) {
                window[response.call_back](response);
                return false;
            }
            if (response.redirect) {
                if (form.hasClass('form-loading')) {
                    form.prepend('<div class="alert alert-success alert_status">Success! Loading ...</div>')
                } else {
                    form.prepend('<div class="alert alert-success alert_status">Form submitted! Redirecting ...</div>')
                }
                if (material_active == 1) {
                    setTimeout(function () {
                        var s_class = undefined;
                        var params = getQueryParams(response.redirect);
                        if (params.ta_optimized) {
                            s_class = 'bootstrap_table';
                        } else if (params.t_optimized) {
                            s_class = 'ajax_tab_content';
                        }
                        ajaxLoad(response.redirect, s_class);
                    }, 1300);
                } else {
                    window.location.href = response.redirect;
                }

            } else if (response.force_redirect) {

                setTimeout(function () {
                    window.location.href = response.force_redirect;
                    return false;
                }, 1300);
            } else {
                try {
                    return runAfterSubmit(response);
                } catch (err) {
                    //ignore
                }
            }

        }).fail(function (xhr, status, error) {
            errorSubmittingForm(form, xhr, status, error)
        });
        return false;
    });
    function errorSubmittingForm(form, xhr, status, error) {
        var btn = form.find(".submit-btn");
        btn.find('em').remove();
        btn.find('img').remove();
        btn.attr('disabled', false);
        var url = form.attr('action');
        if (xhr.status == 422) {
            form.find('.alert_status').remove();
            form.find('.validation_errors').remove();
            var response = JSON.parse(xhr.responseText).errors;
            for (field in response) {
                form.find("input[name='" + field + "']").addClass('is-invalid');
                form.find("input[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                form.find("input[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                form.find("select[name='" + field + "']").addClass('is-invalid');
                form.find("select[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                form.find("select[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                form.find("textarea[name='" + field + "']").addClass('is-invalid');
                form.find("textarea[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                form.find("textarea[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');
            }
            var error_div = '<div class="alert alert-danger mb-1 validation_errors w-100"><ul>';
            $.each(response, function (index, value) {
                error_div += '<li>' + value[0] + '</li>';
            });
            error_div += '</ul></div>'
            form.find('.all_validation_errors').html(error_div)
            jQuery(".invalid-feedback").css('display', 'block');
        } else if (xhr.status == 406) {
            var response = JSON.parse(xhr.responseText)
            if (response.error_display.type == 'append') {
                form.find('#error_submitting_form').remove();
                form.find('.alert_status').remove();
                form.find('.errors_div').html('<div id="error_submitting_form" class="alert alert-warning">' + response.error_display.message + '</div>');
            } else if (response.error_display.type == 'prepend') {
                form.find('#form-exception').remove();
                form.find('.alert_status').remove();
                form.prepend('<div id="form-exception" class="alert alert-warning"><strong>' + xhr.status + '</strong> ' + error + '<br/>' + JSON.parse(xhr.responseText) + '</div>');
            } else {
                form.find('#form-exception').remove();
                form.find('.alert_status').remove();
                form.prepend('<div id="form-exception" class="alert alert-warning"><strong>' + xhr.status + '</strong> ' + error + '<br/>' + JSON.parse(xhr.responseText) + '</div>');
            }
        } else if (xhr.status == 413) {
            form.find('#form-exception').remove();
            form.find('.alert_status').remove();
            form.prepend('<div id="form-exception" class="alert alert-warning"><strong>' + xhr.status + '</strong> ' + error + '<br/>' + 'The files you are trying to upload is too large, please reduce the size or upload  latter' + '</div>');
        } else {
            form.find('#form-exception').remove();
            form.find('.alert_status').remove();
            form.prepend('<div id="form-exception" class="alert alert-danger mb-1 danger-message w-100"><strong>' + xhr.status + '</strong> ' + error + '<br/>(' + url + ')</div>');
        }
    }


    function getQueryParams(qs) {
        qs = qs.split('+').join(' ');

        var params = {},
            tokens,
            re = /[?&]?([^=]+)=([^&]*)/g;

        while (tokens = re.exec(qs)) {
            params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
        }

        return params;
    }

    function ajaxLoad(url, s_class, active_tab) {
        if (s_class) {
            $("." + s_class).removeClass('centered-container');
            $("." + s_class).addClass('centered-container');
            $("." + s_class).html('<img style="height:120px !important;" class="centered" src="{{ url("img/Ripple.gif") }}"/>');
        }
        jQuery(".loading-img").show();
        var material_active = $('input[name="material_page_loaded"]').val();
        if (!material_active) {
            window.location.href = url;
        }
        if (active_tab) {
            setActiveTab(active_tab);
        }
        $.get(url, null, function (response) {
//                return false;

            jQuery(".loading-img").hide();
            if (s_class) {
                $("." + s_class).html(response);
                $("." + s_class).removeClass('centered-container');
            } else {
                $(".system-container").html(response);
            }
            current_url = url;
            if (response.redirect) {
                if (material_active == 1) {
                    setTimeout(function () {
                        ajaxLoad(response.redirect);
                    }, 1300);
                } else {
                    window.location.href = response.redirect;
                }

            }
            var title = $(".system-title").html();
            // url = url.replace('optimized', 'tab_optmized');
            if (active_tab) {
                History.pushState({state: 1}, title, url);
                return false;
            }
            if (!s_class) {
                History.pushState({state: 1}, title, url);
            } else {
                $("." + s_class).removeClass('centered-container');
                return false;
            }
        });
        prepareAjaxUpload();
        autoFillAllSelects();
        return false;
    }

    function closeSidebar() {

        $("body").removeClass("sidebar-toggled"), $(".ma-backdrop").remove(), $(".sidebar, .ma-trigger").removeClass("toggled");

    }

    function setActiveTab(tab) {
        // alert(tab);
        jQuery(".auto-tab").removeClass('active');
        jQuery("." + tab).addClass('active');
    }

    function softError(element, reponse) {

    }

    function removeError() {
        setTimeout(function () {
            $("#form-exception").fadeOut();
            $("#form-success").fadeOut();
            $(".alert_status").fadeOut();
        }, 1200);

    }

    function resetField(field, placeholder) {
        setTimeout(function () {
            $("input[name='" + field + "']").attr('placeholder', placeholder);
            // $("input[name='"+field+"']").closest('fg-line').removeClass('has-error');
        }, 1300);
    }

    function hardError(element, response) {

    }

    function validationErrors(form, errors) {
        for (field in errors) {
            alert(errors[field]);
        }
    }

    function showLoading() {
        $(".alert_status").remove();
        $('.ajax-post').not(".persistent-modal .modal-body").prepend('<div id="" class="alert alert-success alert_status"><img style="" class="loading_img" src="{{ URL::to("img/ajax-loader.gif") }}"></div>');
    }

    function endLoading(data) {
        $(".alert_status").html('Success!');
        setTimeout(function () {


            if (data.id) {

            } else {
                $(".modal").not(".persistent-modal").modal('hide');
            }
            $(".alert_status").slideUp();
//            $("#principal_file_modal").modal('show');
        }, 800);
    }


    function autofillForm(data) {
        for (key in data) {
            var in_type = $('input[name="' + key + '"]').attr('type');
            if (in_type != 'file') {
                $('input[name="' + key + '"]').val(data[key]);
                $('input[name="' + key + '"]').click();
                $('textarea[name="' + key + '"]').val(data[key]);
                $('textarea[name="' + key + '"]').click();
                $('select[name="' + key + '"]').val(data[key]);
                $('select[name="' + key + '"]').click();
            }
        }
        jQuery("input[name='id']").val(data['id']);
    }

    jQuery(document).on('click', '.delete-btn', function () {
        var url = $(this).attr('href');
        deleteItem(url, null);
        return false;
    });

    function deleteItem(url, id, method = "DELETE") {
        if (id)
            url = url + '/' + id
        swal({
            title: "Are you sure?",
            text: "A deleted Item can never be recovered!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: method,
                    data: {
                        '_token': `{{csrf_token()}}`
                    },
                    success: function (response) {
                        if (response.redirect) {
                            setTimeout(function () {
                                ajaxLoad(response.redirect);
                                swal.close();
                            }, 1300);

                        } else {
                            runAfterSubmit(response, url);
                        }
                    },
                    error: function (xhr, status, response) {
                        swal("Error!", xhr.responseJSON.message, "error");
                    }
                });
            } else {
                swal("Cancelled", "Your Item is safe :)", "error");
            }
        });

    }

    function runSilentAction(url) {
        $("#run_action_form").attr('action', url);
        var url = $("#run_action_form").attr('action');
        var data = $("#run_action_form").serialize();
        $.post(url, data)
            .done(function (response) {
                if (response.redirect) {
                    setTimeout(function () {
                        ajaxLoad(response.redirect);
                    }, 0);

                } else if (response == 0) {
                    //do nothing
                } else {
                    try {
                        return runAfterSubmit(response);
                    } catch (err) {
                        //ignore
                    }
                }
            })
            .fail(function (xhr, status, response) {
                alert(response);
            });
    }
    function runPlainRequest(url, id = null, message = null) {

        if (id != undefined && id != 0) {
            url = url + '/' + id;
        }
        swal({
            title: "Are you sure?",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#32c787",
            confirmButtonText: "Yes, Proceed!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_token': `{{csrf_token()}}`
                    },
                    success: function (response) {
                        if (response.redirect) {
                            setTimeout(function () {
                                swal.close();
                            }, 1000)
                            setTimeout(function () {
                                ajaxLoad(response.redirect);
                            }, 1600);
                        } else {
                            swal("Success!", response, "success");
                        }
                    },
                    error: function (xhr, status, response_obj) {
                        if (xhr.status == 406) {
                            var response = JSON.parse(xhr.responseText)
                            if (response.error_display.type == 'append') {
                                swal.close();
                                var content = $('#content')
                                content.find('#error_submitting_form').remove();
                                content.find('.alert_status').remove();
                                content.find('.errors_div').html('<div id="error_submitting_form" class="alert alert-warning">' + response.error_display.message + '</div>');

                            }
                        } else if (response_obj == 'Not Acceptable') {
                            swal('Error!', xhr.responseText, 'error');
                        } else {
                            swal("Error!", response_obj, "error");
                        }
                    }
                });

            } else {
                swal("Cancelled", "Action Cancelled!", "error");
            }
        });
    }


    function runCustomPlainRequest(url, buttonID) {

        let title = $('#'+buttonID).data('title')? $('#'+buttonID).data('title') : 'Are you Sure?';
        $("#run_action_form").attr('action', url);

        swal({
            title: title,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#32c787",
            confirmButtonText: "Yes, Proceed!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm:true,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                var url = $("#run_action_form").attr('action');
                var data = $("#run_action_form").serialize();
                $.post(url, data)
                    .done(function (response) {
                        // console.log('response from server is')
                        // console.log(response);

                        if (response.status) {
                            // swal("Success!", "Action Completed Successfully", "success");
                            setTimeout(function () {
                                swal.close();
                            }, 1000)
                            setTimeout(function () {

                                ajaxLoad(response.redirect);
                            }, 1600);
                            swal("Success!", "Action Completed Successfully", "success");

                            // ajaxLoad(response.redirect);
                        } else {
                            swal("Success!", "Action Completed Successfully", "success");
//                            runAfterSubmit(response);
                        }
                    })
                    .fail(function (xhr, status, response) {
                        if (response == 'Not Acceptable') {
                            swal('Error!', xhr.responseText, 'error');
                        } else {
                            swal("Error!", response, "error");
                        }

                    });

            } else {
                swal("Cancelled", "Action Cancelled by user", "error");
            }
        });
    }


    function reloadCsrf() {
    }

    function getEditItem(url, id, modal) {
        var url = url + '/' + id;
        $.get(url, null, function (response) {
            autofillForm(response);
            $("#" + modal).modal('show');
        });
    }

    function resetForm(id) {
        $("." + id).find("input[type=text],textarea,select").val("");
        $("input[name='id']").val('');
    }

    function autoFillSelectMultiple(id, url, function_call) {
        $("#"+id).html('<option value="">Please Select</option>');
        console.log('response is');
        $.get(url, null, function (response) {
            new Choices("#"+id, {removeItemButton: !0, choices: response}, );

            if (function_call) {
                window[function_call]();
            }

        });
    }
    function titleCase(inputString) {
        return inputString
            .toLowerCase() // Convert the whole string to lowercase
            .split(' ')    // Split the string into an array of words
            .map(word => word.charAt(0).toUpperCase() + word.slice(1)) // Convert first letter to uppercase for each word
            .join(' ');    // Join the words back into a single string
    }

    function autoFillSelect(name, url, function_call) {
        // Remove "_id"
        let displayName = name.replace('_id', '');
        // Replace any other _ with ' '
        displayName = displayName.replace('_', ' ');
        // Convert to titlecase
        displayName = titleCase(displayName);
        $("select[name='" + name + "']").removeClass("is-invalid");
        $("select[name='" + name + "']").html('<option value="">Please Select '+displayName+'</option>');


        $.get(url, null, function (response) {
            for (let i = 0; i < response.length; i++) {
                if (response[i].name) {
                    $("select[name='" + name + "']").append('<option value="' + response[i].id + '">' + titleCase(response[i].name) + '</option>');
                }
                if (response[i].label) {
                    $("select[name='" + name + "']").append('<option value="' + response[i].id + '">' + titleCase(response[i].label) + '</option>');
                }
                if (response[i].period) {
                    $("select[name='" + name + "' ]").append('<option rate="' + response[i].rate + '" value="' + response[i].id + '">' + response[i].period + ' days at ' + response[i].rate + ' % rate </option>');
                }
            }
            if (function_call) {
                window[function_call]();
            }
            jQuery('select[name="' + name + ']').attr('class', 'form-group select2');

        });
        $('.select2').css({'width': '100%!important'});

    }


    /**
     *
     * @param field_class
     * @param data_url
     * @param searchPlaceholder
     * @param allowClear
     * @param drop_down
     * @param function_call
     */
    function listSelect2Data(field_class, data_url, searchPlaceholder = "Please select", allowClear = true, drop_down = null, function_call = null) {
        $("." + field_class).select2({
            searchInputPlaceholder: searchPlaceholder,
            placeholder: searchPlaceholder,
            allowClear: allowClear,
            dropdownParent: drop_down ? $("#" + drop_down) : null,
            ajax: {
                url: data_url,
                dataType: 'json',
                delay: 250,
                type: "GET",
                quietMillis: 50,
                data: function (term) {
                    if (!term.term) {
                        return {
                            term: 'data_default'
                        };
                    }
                    return {
                        term: term
                    };
                },
                statusCode: {
                    401: function () {
                        console.log('failed authentication')
                    }
                },
                processResults: function (data) {
                    if (data.id === '') {
                        return 'No results found';
                    }
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        function_call ? window[function_call]() : '';
    }


    // $(function (){
    $('.select2').select2({
        placeholder: 'Select an option'
    });
    // })


    function setSelectData(name, data, first_null) {
        if (first_null) {
            $("select[name='" + name + "']").html('<option value=""></option>');
        }

        for (var i = 0; i < data.length; i++) {
            if (data[i].name) {
                $("select[name='" + name + "']").append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
            }

        }
        setTimeout(function () {
            $(".chosen-select").chosen({disable_search_threshold: 10});
            $(".chosen-select").trigger("chosen:updated");
            $(".chosen-container").width('100%');
        }, 20)

    }

    function prepareEdit(element, modal) {
        let data = $(element).data('model');
        autofillForm(data);
        $("#" + modal).modal('show');
    }

    function prepareOverlayModalEdit(element, modal) {
        let data = $(element).data('model');
        autofillForm(data);
    }

    function setAutoComplete(name, url) {
        let formatted = [];
        $.get(url, null, function (response) {
            for (var i = 0; i < response.length; i++) {
                var single = {value: response[i].name, data: response[i].name};
                formatted.push(single);
            }
            $("input[name='" + name + "']").autocomplete({
                lookup: formatted
            });
        });
    }


    $(document).ready(function () {
        prepareAjaxUpload();
    });


    function krajeeFileUpload(inputId,browseLabel,uploadUrl){
        let self = this;
        $("#"+inputId).fileinput({
            theme: 'fas',
            uploadUrl: uploadUrl,
            showCaption: false,
            showRemove:false,
            overwriteInitial: false,
            initialPreviewAsData: true,
            browseLabel: browseLabel,
            dropZoneEnabled: false,
            showUpload: false, // hide upload button
            previewFileIcon:'<i class="fas fa-file"></i>',
            maxFileCount: 10,
        });
    }

    /**
     *
     * @param divId
     * @param url
     * @param inputName
     * @param deleteFileURL
     * @param maxFiles
     * @param maxFileSize
     * @param reloadPage
     */
    function loadDropzoneWithButton(divId, url, inputName, deleteFileURL = null, maxFiles = 1, maxFileSize = 8, reloadPage = false) {

        const element = document.getElementById(divId);
        if (typeof (element) != 'undefined' && element != null) {
            const dropzoneDiv = "#" + divId;
            const dropzone = document.querySelector(dropzoneDiv);
            const previewNode = dropzone.querySelector(".dropzone-item");
            previewNode.id = "";
            const previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);
            const myDropzone = new Dropzone(dropzoneDiv, {
                url: url,
                parallelUploads: 1,
                paramName: inputName,
                maxFiles: maxFiles,
                maxFilesize: maxFileSize,
                previewTemplate: previewTemplate,
                previewsContainer: dropzoneDiv + " .dropzone-items",
                clickable: dropzoneDiv + " .dropzone-select",
                init: function () {
                    initFunctions(this, deleteFileURL, dropzone)
                    if (reloadPage) {
                        this.on("queuecomplete", function (files, response) {
                            if (this.files[0].status == Dropzone.SUCCESS) {
                                const pageURL = window.location.href
                                toastr.success('Document Uploaded successfully.Refreshing page. Please wait...', {timeOut: 1000});
                                setTimeout(() => {
                                    ajaxLoad(pageURL)
                                }, 1500)
                            } else {
                                $('.errors_div').html('<div id="error_submitting_form" class="alert alert-warning">' + 'Some file(s) failed to upload please check file type and size' + '</div>');
                            }
                        });
                    }
                },
            });
        }
    }

    /**
     *
     * @param divId
     * @param url
     * @param inputName
     * @param previewId
     * @param deleteFileURL
     * @param maxFiles
     * @param maxFileSize
     * @param reloadPage
     * @param autoProcessQueue
     */
    function loadDropzoneWithUploader(divId, url, inputName, previewId, deleteFileURL = null, maxFiles = 1, maxFileSize = 8, reloadPage = false, autoProcessQueue = true) {
        const element = document.getElementById(divId);
        if (typeof (element) != 'undefined' && element != null) {
            const dropzoneDiv = "#" + divId;
            const dropzone = document.querySelector(dropzoneDiv);
            const previewDiv = "#" + previewId;
            const preview = document.querySelector(previewDiv);
            const previewNode = preview.querySelector(".dropzone-item");
            previewNode.id = "";
            const previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);
            const supportingDocs = new Dropzone(dropzoneDiv, {
                url: url,
                parallelUploads: 1,
                paramName: inputName,
                maxFiles: maxFiles,
                maxFilesize: maxFileSize,
                previewTemplate: previewTemplate,
                previewsContainer: previewDiv + " .dropzone-items",
                autoProcessQueue : autoProcessQueue,
                init: function () {
                    initFunctions(this, deleteFileURL, dropzone, preview)
                    if (reloadPage) {
                        this.on("queuecomplete", function (files, response) {
                            if (this.files[0].status == Dropzone.SUCCESS) {
                                const pageURL = window.location.href
                                toastr.success('Document Uploaded successfully.Refreshing page. Please wait...', {timeOut: 1000});
                                setTimeout(() => {
                                    ajaxLoad(pageURL)
                                }, 1500)
                            } else {
                                $('.errors_div').html('<div id="error_submitting_form" class="alert alert-warning">' + 'Some file(s) failed to upload please check file type and size' + '</div>');
                            }
                        });
                    }
                },
            });
        }
    }
    /**
     *
     * @param dropzone
     * @param deleteFileURL
     * @param dropZoneDiv
     * @param previewDiv
     */
    function initFunctions(dropzone, deleteFileURL = null, dropZoneDiv = null, previewDiv = null) {
        dropzone.on("addedfile", function (file) {
            let dropzoneItems = dropZoneDiv.querySelectorAll('.dropzone-item');
            if (previewDiv)
                dropzoneItems = previewDiv.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
            const removeButton = Dropzone.createElement('<span class="dropzone-delete"><i class="icon text-danger icon-bin"></i></span>');
            const _this = this;
            removeButton.addEventListener("click", function (e) {
                var loader = Dropzone.createElement('<span><i  class="fa fa-spinner fa-spin font-30 mx-5 loader-gif" style="font-size: 15px"></i><span>');
                file.previewElement.appendChild(loader);
                e.preventDefault();
                e.stopPropagation();
                if (file.previewElement.id) {
                    deleteUploadedFile(file.previewElement.id, _this, file, deleteFileURL);
                } else {
                    _this.removeFile(file);
                }

            });
            file.previewElement.appendChild(removeButton);
        })
        dropzone.on("sending", function (file, xhr, formData) {
            formData.append("_token", `{{csrf_token()}}`);
        });
        dropzone.on("success", function (file, response) {
            file.previewElement.id = response.id
            file.previewElement.querySelectorAll('.dropzone-success')[0].textContent = "Successfully Uploaded";
        });
        dropzone.on("error", function (file, response) {
            if (response.message)
                file.previewElement.querySelectorAll('.dropzone-error')[0].textContent = response.message;
            if (response.text)
                file.previewElement.querySelectorAll('.dropzone-error')[0].textContent = response.text;
        });
        dropzone.on("sending", function (file) {
            let progressBars = dropZoneDiv.querySelectorAll('.progress-bar');
            if (previewDiv)
                progressBars = previewDiv.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        })
        dropzone.on("totaluploadprogress", function (progress) {
            // const progressBars = dropZoneDiv.querySelectorAll('.progress-bar');
            let progressBars = dropZoneDiv.querySelectorAll('.progress-bar');
            if (previewDiv)
                progressBars = previewDiv.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        })
        dropzone.on("complete", function (file) {
            // const progressBars = dropZoneDiv.querySelectorAll('.dz-complete');
            let progressBars = dropZoneDiv.querySelectorAll('.dz-complete');
            if (previewDiv)
                progressBars = previewDiv.querySelectorAll('.dz-complete');
            setTimeout(function () {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        })
    }

    /**
     *
     * @param id
     * @param dropzone
     * @param file
     * @param deleteFileURL
     */
    function deleteUploadedFile(id, dropzone, file, deleteFileURL) {
        var form_data = new FormData();
        form_data.append('_token', `{{csrf_token()}}`)
        var url = deleteFileURL + '/' + id
        console.log(url)
        $.ajax({
            type: 'post',
            url: url,
            processData: false,
            contentType: false,
            data: form_data,
            beforeSend: function () {
                let classSelector = "#" + id + " .dropzone-delete"
                $(classSelector).html('Removing... ')
            },
            success: (response) => {
                setTimeout(() => {
                    dropzone.removeFile(file);
                }, 1300)
            },
            error: function (xhr, status, error) {
                console.log(xhr, status, error)
                return false;
            }
        });
    }


    function prepareAjaxUpload() {
        $('input[name="date_added"]').datetimepicker({
            timepicker: false
        });
        // $('input[name="date_to"]').datetimepicker();
        // $('input[name="date_to"]').datetimepicker();
        var form_url = $(".file-form").attr('action');
        var options = {
            target: '#output1',   // target element(s) to be updated with server response
            beforeSubmit: showRequest,  // pre-submit callback
            success: fileUploadFinish,  // post-submit callback
            dataType: 'json',
            error: endWithError

        };
        autoFillAllSelects();
        $('.file-form').ajaxForm(options);
    }

    // pre-submit callback
    function showRequest(formData, jqForm, options) {
        var btn = jqForm.find(".submit-btn");
        btn.prepend('<img class="processing-submit-image" style="height: 50px;margin:-10px !important;" src="{{ url("img/Ripple.gif") }}">');
        btn.attr('disabled', true);
        $(".alert_status").remove();
        $('.file-form').prepend('<div id="" class="alert alert-success alert_status"><img style="" class="loading_img" src="{{ URL::to("img/ajax-loader.gif") }}"></div>');
    }

    function fileUploadFinish(response, status, xhr, jqForm) {
        var btn = jqForm.find(".submit-btn");
        btn.find('img').remove();
        btn.attr('disabled', false);
        if (response.call_back) {
            endLoading();
            window[response.call_back](response);
            return false;
        }
        if (response.id || response.image) {
            $(".alert_status").remove();
            endLoading();
            runAfterSubmit(response);
        } else if (response.redirect) {
            endLoading(response);
            setTimeout(function () {
                ajaxLoad(response.redirect);
            }, 1300);

        } else {
            endWithMinorErrors(response);
        }
    }

    function endWithError(xhr, tetet, error, jqForm) {
        var btn = jqForm.find(".submit-btn");
        btn.find('img').remove();
        btn.attr('disabled', false);
        var error = xhr.statusText;
        response = xhr.responseText;
        response = JSON.parse(response).errors;
        if (xhr.status == 422) {
            $('.alert_status').remove();
            for (field in response) {
                $("input[name='" + field + "']").addClass('is-invalid');
                $("input[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                $("input[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                $("select[name='" + field + "']").addClass('is-invalid');
                $("select[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                $("select[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                $("textarea[name='" + field + "']").addClass('is-invalid');
                $("textarea[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                $("textarea[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

            }
        } else {
            $(".alert_status").remove();
            $('.file-form').prepend('<div id="" class="alert alert-danger alert_status"><strong>' + xhr.status + '</strong> ' + error + '</div>');
            removeError();
        }
    }

    jQuery(document).ready(function () {
        $("input[name='start_time']").attr('data-mask', '00:00:00');
        $("input[name='start_time']").addClass('input-mask');
        setInterval(function () {
        }, 30000);

    });

    function autoFillAllSelects() {
        var url = '{{ url(@Auth::user()->role.'/'.'autofill/data') }}';
        var data = [];
        $(".auto-fetch-select").each(function () {
            data.push($(this).attr('name') + ':' + $(this).data("model"));
        });
        if (data.length > 0) {
            $.get(url, {models: data}, function (response) {
                for (key in response) {
                    setSelectData(key, response[key]);
                }
            });
        }
    }

    function deleteModel(id, model) {
        let url = '{{ url(@Auth::user()->role.'/'.'delete/model') }}';
        return deleteItem(url, id, model);

    }

    function loadGeneralTemplate(fn, data, id) {
        var url = '{{ url("general/templates") }}/' + fn;
        $.get(url, data, function (response) {
            $("#" + id).html(response);
        });
    }

    $(document).ready(function () {
        var url = window.location.href;
        prepareAjaxUpload();

        // ajaxLoad(url);
    });

    function validateRemote(form_class, url) {
        var data = $("." + form_class).serialize();
        $.post(url, data).done(function (response, status) {
            return true;
        })
            .fail(function (xhr, status, error) {
                if (xhr.status == 422) {
                    var response = JSON.parse(xhr.responseText).errors;
                    for (field in response) {
                        $("input[name='" + field + "']").addClass('is-invalid');
                        $("input[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        $("input[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                        $("select[name='" + field + "']").addClass('is-invalid');
                        $("select[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        $("select[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                        $("textarea[name='" + field + "']").addClass('is-invalid');
                        $("textarea[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        $("textarea[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');
                    }
                }
            });
        return false;
    }

    function getTabCounts(url, data) {
        $.get(url, data, function (response) {
            for (key in response) {
                // $(".tab_" + key).append('&nbsp;<span class="badge badge-info">' + response[key] + '</span>')
                $(".tab_badge_" + key).html('&nbsp;&nbsp;<sup class="him-counts">' + response[key] + '</sup>')
            }
        });
    }

    //array is the set of menu-label passed as slug you want to display count
    function setMenuCount(url, array) {
        $.get(url, function (response) {
            for (arr in array) {
                var element = array[arr];
                if (parseFloat(response[element]) > 0) {
                    $('.menu_item_' + element).empty().append('<span style="height: 25px; width: 25px; text-align: center; padding: 3px; background-color: dimgrey; color: white" class="rounded-circle btn btn-sm">' + response[element] + '</span>');
                }

            }
        });
    }


    $(document).ready(function () {
        toastr.options = {
            "positionClass": "toast-top-right",
        }
        @if($notice = request()->session()->get('notice'))
        @if($notice['type'] == 'warning')
        toastr.warning('{{ $notice['message'] }}');
        @elseif($notice['type'] == 'info')
        toastr.info('{{ $notice['message'] }}');
        @elseif($notice['type'] == 'error')
        toastr.error('{{ $notice['message'] }}');
        @elseif($notice['type'] == 'success')
        toastr.success('{{ $notice['message'] }}');
        @endif
        @endif
    });
    function loadDropZone(input_id, upload_url, showPreview=true, dropZoneEnabled=true,hideThumbnailContent=false, showDrag=true) {
        $('#'+input_id).fileinput({
            theme: 'fas',
            initialCaption: 'No file selected',
            allowedFileExtensions: ['jpg','jpeg', 'png', 'gif', 'pdf', 'xls', 'csv', 'doc', 'docx', 'xlsx'],
            uploadUrl: upload_url,
            autoReplace: true,
            uploadAsync: false,
            showCancel: false,
            showRemove: false,
            showClose: false,
            showUpload: false,
            showDrag: false,
            maxFileCount: 5,
            browseOnZoneClick: true,
            showPreview: showPreview,
            dropZoneEnabled:dropZoneEnabled,
            hideThumbnailContent: hideThumbnailContent,
            initialPreviewAsData: true,
            overwriteInitial: false,
            previewFileIcon: '<i class="fas fa-file"></i>',
            allowedPreviewTypes: ['image', 'pdf', 'text'],
            previewFileIconSettings: {
                'docx': '<i class="fas fa-file-word text-primary"></i>',
                'xlsx': '<i class="fas fa-file-excel text-success"></i>',
                'pptx': '<i class="fas fa-file-powerpoint text-danger"></i>',
                'jpg': '<i class="fas fa-file-image text-warning"></i>',
                'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                'zip': '<i class="fas fa-file-archive text-muted"></i>',
            },
            fileActionSettings: {
                showDrag:false,
            },
        }).on("filebatchselected", function (event, files) {
            $('#' + input_id).fileinput("upload");
        });

    }
    function loadSummerNote(field_id, height=150, placeholder="Please type..."){
        $('#'+field_id).summernote({
            placeholder: placeholder,
            spellCheck: true,
            tabsize: 2,
            height: height,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }

</script>

<script>
    $(document).ready(function () {
        $('body').tooltip({
            selector: '[data-bs-toggle="tooltip"]'
        });
        $(".tooltip").hide();
        @if($notice = request()->session()->get('sweet_alert'))
        swal('{{ $notice['title'] }}', '{{ $notice['message'] }}', '{{ $notice['type']}}');
        @endif
    });
</script>
<style type="text/css">
    .delete {
        color: red;
    }
</style>
<style>
    .him-counts {
        /*position: absolute;*/
        display: inline-block;
        vertical-align: baseline;
        font-style: normal;
        background: #03A9F4;
        padding: 1px 5px;
        border-radius: 2px;
        right: 4px;
        top: -11px;
        color: #FFF;
        font-size: 10px;
        line-height: 15px;
    }
</style>
