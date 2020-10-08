$(document).ready(function(){
  
    $("#addUserForm").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true,

            },
            phone: {
                required: true,
                digits: true,

            },
            username: {
                required: true,
                minlength: 5

            },
            password: {
                required: true,
                minlength: 6
            },
            user_type_id: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Enter Your First Name"
            },
            last_name: {
                required: "Enter Your Last Name"
            },
            email: {
                required: "Please Enter Your Email Address"
            },
            phone: {
                required: "Please Enter Contact Number",
                digits: "Only digits are allowed",

            },
            username: {
                required: "Please Enter Your Username",
                minlength: "Username Should be Min 5 Characters"
            },
            password: {
                required: "Please Enter Your Password",
                minlength: "Password Should be Min 6 Characters"
            },
            user_type_id: {
                required: "Please select user role"
            }
        }
    });

    $("#editUserForm").validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true,

            },
            phone: {
                required: true,
                digits: true,

            },
            password: {
                required: true,
                minlength: 6
            },
            user_type_id: {
                required: true
            }
        },
        messages: {
            first_name: {
                required: "Enter Your First Name"
            },
            last_name: {
                required: "Enter Your Last Name"
            },
            email: {
                required: "Please Enter Your Email Address"
            },
            phone: {
                required: "Please Enter Contact Number",
                digits: "Only digits are allowed",

            },
            username: {
                required: "Please Enter Your Username",
                minlength: "Username Should be Min 5 Characters"
            },
            password: {
                required: "Please Enter Your Password",
                minlength: "Password Should be Min 6 Characters"
            },
            user_type_id: {
                required: "Please select user role"
            }
        }
    });

    $("#addBrandForm, #editBrandForm").validate({
        rules: {
            brand_name: {
                required: true
            }
        },
        messages: {
            brand_name: {
                required: "Please Enter Brand Name"
            }
        }
    });

    $("#addColorForm, #editColorForm").validate({
        rules: {
            color_code: {
                required: true
            }
        },
        messages: {
            color_code: {
                required: "Please Select color code"
            }
        }
    });

    $("#addTypeForm, #editTypeForm").validate({
        rules: {
            type: {
                required: true
            }
        },
        messages: {
            type: {
                required: "Please Enter Type"
            }
        }
    });

    $("#changePasswordForm").validate({
        rules: {
            old_password: {
                required: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            old_password: {
                required: "Please enter your old password."
            },
            password: {
                required: "Please enter your new password",
                minlength: "Password length should be atleast 6 character."
            },
            confirm_password: {
                required: "Please confirm your password",
                equalTo: "Please enter confirm password same as password."
            }
        }
    });

      /*setTimeout(function(){ 
        $(document).find('.alert').hide(); 
      }, 5000);*/

    /************Buy/Intake************/
    $('form#addBuyIntake').on('submit', function(event) {
        
        //Add validation rule for dynamically generated name fields
        $(':input').each(function() {
            var thisElem = $(this);
            if($(this).attr("data-ftype") == 'control_number') {

                $(this).rules("add", {
                     required: true,
                     remote: {
                                url: "ajax-verify-sku",
                                type: "post",
                                data: {
                                  sku: function() {
                                    return  thisElem.val();
                                  }
                                }
                            },
                    messages: { 
                            required: "This field is required",
                            remote: "This Sku already exist"
                        }

                });

            }

            if($(this).attr("name") == 'invoice') {

                $(this).rules("add", {
                     required: true,
                     remote: {
                                url: "ajax-verify-invoice",
                                type: "post",
                                data: {
                                  invoice: function() {
                                    return  thisElem.val();
                                  }
                                }
                            },
                    messages: { 
                            required: "This field is required",
                            remote: "This invoice id already exist"
                        }

                });

            }

            $(this).rules("add", {
                required: true,
                messages: {
                    required: "This field is required",
                }
            });
        });
    });


    $.validator.addMethod("price_bi", function(value, element) {
        return this.optional(element) || /^\d{0,10}(\.\d{0,2})?$/i.test(value);
    });

    var tt = $("#addBuyIntake").validate({
                                rules: {
                                    total_amount: {
                                      required: true,
                                      number: true,
                                     // price_bi: true
                                    }
                                },
                                messages:{
                                  total_amount: {
                                      required: "Please enter price.",
                                      //price_bi: "missing format price."
                                    }
                                }
    });

    /*$('form#editBuyIntake').on('submit', function(event) {
        //Add validation rule for dynamically generated name fields
        $(':input').each(function() {
            $(this).rules("add", {
                required: true,
                messages: {
                    required: "This field is required",
                }
            });
        });
    });*/

    //$("#editBuyIntake").validate();
    
     $("#editBuyIntake").validate({
        rules: {
            invoice: {
                required: true
            },
            invoice_note: {
                required: true
            },
            buyer: {
                required: true
            },
            city_from_where_purchased: {
              required: true
            }
          }
        });

    $(document).on('click', '.delete-sku', function() {
        $(this).parent().closest(".control-box").remove();
    });

    /************-Buy/Intake************/

});


$(document).ready(function() {
    $("#ModifyColumns").click(function(event) {
        event.preventDefault();
        var urlLoc = $(this).attr('href');
        $.ajaxSetup({
            cache: false
        });
        $.getJSON(urlLoc, function(data) {
            $('#setPopForm').attr('action', urlLoc);
            var template = $("#setPopTemplate").html();
            $("#setPopForm").html(_.template(template, {
                LeadColumnsData: data
            }));

            /*Show pre checked all check box if no one is selected already*/
            var isPreSelected = 0;
            $.each(data, function(index, ColumnName) {
                if (ColumnName['LeadColumn']['status'] == '1') {
                    isPreSelected = 1;
                }
            });

            if (isPreSelected == 0) {
                $(".modifyColumn").attr('checked', 'checked');
            }

            $('#setPopModal').modal('show');
        }).fail(function() {
            alert("Something went wrong! Refresh page and try again.");
        });
    });

    /************Processing Items data save****************/
    $("#processing_items_tr td").on("blur", function() {

        var buyintakeid = $(this).parent("tr").data("buyintakeid");
        var buyintakecontrolid = $(this).parent("tr").data("buyintakecontrolid");
        var field = $(this).data("name");
        var field_value = $(this).html().replace(/<[^>]*>/, "").replace('</i>', "");
        var table_value = $(this).data("table_name");


        $.ajax({
            url: "processing-item-edit",
            type: "POST",
            dataType: 'json',
            data: {
                buyintakeid: buyintakeid,
                buyintakecontrolid: buyintakecontrolid,
                field: field,
                field_value: field_value,
                table_value: table_value
            },
            success: function(data, textStatus, jqXHR) {
                //data - response from server
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $("#processing_items_tr select").on("change", function() {
        
        var buyintakeid = $(this).parent("td").parent("tr").data("buyintakeid");
        var buyintakecontrolid = $(this).parent("td").parent("tr").data("buyintakecontrolid");
        var field = $(this).data("name");
        var field_value = $(this).val();
        var table_value = $(this).data("table_name");

        if(field == 'item_status') {
            if(field_value == 11) {
                $(this).parent("td").parent("tr").find(".orderInfo table").css({"display":"none"});

                var orderid = $(this).parent("td").parent("tr").find(".orderInfo").data('orderid');
                var field_name = $(this).parent("td").parent("tr").find(".orderInfo").data('name');
                
                $.ajax({
                    url: "/orders/order-item-edit",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id: orderid,
                        field_name: field_name,
                        field_value: field_value,
                    },
                    success: function(data, textStatus, jqXHR) {
                        //data - response from server
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                    }
                });

            }
        }

        $.ajax({
            url: "processing-item-edit",
            type: "POST",
            dataType: 'json',
            data: {
                buyintakeid: buyintakeid,
                buyintakecontrolid: buyintakecontrolid,
                field: field,
                field_value: field_value,
                table_value: table_value
            },
            success: function(data, textStatus, jqXHR) {
                //data - response from server
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $("#order_tr select").on("change", function() {
        var id = $(this).parent("td").parent("tr").data("id");
        var field_name = $(this).data("name");
        var field_value = $(this).val();
        $.ajax({
            url: "/orders/order-item-edit",
            type: "POST",
            dataType: 'json',
            data: {
                id: id,
                field_name: field_name,
                field_value: field_value,
            },
            success: function(data, textStatus, jqXHR) {
                //data - response from server
            },
            error: function(jqXHR, textStatus, errorThrown) {

            }
        });
    });
});


$(document).on("change keyup blur", "#discount", function() {
    var subTotal = $('#sub-total').val();
    var shipping = $('#shipping').val();
    var tax = $('#tax').val();
    //Sub total + shipping + Tax - Discount
    var totalP = parseFloat(subTotal) + parseFloat(shipping) + parseFloat(tax) - parseFloat($(this).val());
    if (isNaN(totalP)) {
        $('#total').val(0.00);
    } else {
        $('#total').val(totalP.toFixed(2));
    }
});

$(document).on("change keyup blur", "#sub-total", function() {
    var discount = $('#discount').val();
    var shipping = $('#shipping').val();
    var tax = $('#tax').val();
    //Sub total + shipping + Tax - Discount
    var totalP = parseFloat($(this).val()) + parseFloat(shipping) + parseFloat(tax) - parseFloat(discount);
    if (isNaN(totalP)) {
        $('#total').val(0.00);
    } else {
        $('#total').val(totalP.toFixed(2));
    }
});

$(document).on("change keyup blur", "#shipping", function() {
    var discount = $('#discount').val();
    var subTotal = $('#sub-total').val();
    var tax = $('#tax').val();
    //Sub total + shipping + Tax - Discount
    var totalP = parseFloat(subTotal) + parseFloat($(this).val()) + parseFloat(tax) - parseFloat(discount);
    if (isNaN(totalP)) {
        $('#total').val(0.00);
    } else {
        $('#total').val(totalP.toFixed(2));
    }
});

$(document).on("change keyup blur", "#tax", function() {
    var discount = $('#discount').val();
    var subTotal = $('#sub-total').val();
    var shipping = $('#shipping').val();
    //Sub total + shipping + Tax - Discount
    var totalP = parseFloat(subTotal) + parseFloat(shipping) + parseFloat($(this).val()) - parseFloat(discount);
    if (isNaN(totalP)) {
        $('#total').val(0.00);
    } else {
        $('#total').val(totalP.toFixed(2));
    }
});

$(document).ready(function() {
    $('.datepicker').datepicker({
        startDate: '-3d'
    }).on('changeDate', function(e) {
        console.log(e.format());
        console.log($(this).html(e.format()));
    });

});

function numberToWords(number) {
    var digit = ['Zero', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth'];
    var elevenSeries = ['Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth'];
    var countingByTens = ['Twentieth', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];

    number = number.toString();
    number = number.replace(/[\, ]/g, '');
    if (number != parseFloat(number)) return 'not a number';
    var x = number.indexOf('.');
    if (x == -1) x = number.length;
    if (x > 15) return 'too big';
    var n = number.split('');
    var str = '';
    var sk = 0;
    for (var i = 0; i < x; i++) {
        if ((x - i) % 3 == 2) {
            if (n[i] == '1') {
                str += elevenSeries[Number(n[i + 1])] + ' ';
                i++;
                sk = 1;
            } else if (n[i] != 0) {
                str += countingByTens[n[i] - 2] + ' ';
                sk = 1;
            }
        } else if (n[i] != 0) {
            str += digit[n[i]] + ' ';
            if ((x - i) % 3 == 0) str += 'hundred ';
            sk = 1;
        }
        if ((x - i) % 3 == 1) {
            if (sk) str += shortScale[(x - i - 1) / 3] + ' ';
            sk = 0;
        }
    }
    if (x != number.length) {
        var y = number.length;
        str += 'point ';
        for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' ';
    }
    str = str.replace(/\number+/g, ' ');
    return str.trim() + "";
}

$(document).ready(function() {
    $(".additional_items_btn").on("click", function() {
        if ($(this).data('value') == 1) {
            var moreControl = $(".control-box:first").clone();
            moreControl.find(".control_number label").html(numberToWords($(".control-box").length + 1) + " Control Number(SKU)");

            moreControl.find(".control_number input").attr("id", "control-"+numberToWords($(".control-box").length + 1)+"-control-number");
            
            moreControl.find(".control_number input").attr("name", "control[" + numberToWords($(".control-box").length + 1) + "][control_number]").val("");

            moreControl.find(".description_of_Item_purchased textarea").attr("name", "control[" + numberToWords($(".control-box").length + 1) + "][description_of_Item_purchased]").val("");

            moreControl.find(".brand_id select").attr("name", "control[" + numberToWords($(".control-box").length + 1) + "][brand_id]").val("");
            moreControl.find(".type_id select").attr("name", "control[" + numberToWords($(".control-box").length + 1) + "][type_id]").val("");
            moreControl.find(".delete-sku-block").css({
                "display": "block"
            });
            var seperator = $(".seperator:first").clone();
            $(".additional_items_box").before(moreControl);
            //$(".additional_items_box").before(seperator);
        }
    });

    /*$(".processing_items_tr td").focusout(function(){
        var element = $(this);        
        if (!element.text().replace(" ", "").length) {
            element.empty();
        }
    });*/

    $('.double-scroll').doubleScroll();
    $('#sample2').doubleScroll({
        resetOnWindowResize: true
    });

});