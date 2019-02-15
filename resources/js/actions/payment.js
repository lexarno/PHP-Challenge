$(document).ready(function () {
    if ($("#frm-payment").length) {

        $('#card_number').inputmask({ mask: '9999 9999 9999 9999' });
        $('#card_expiration').inputmask({ mask: '99/99' });
        $('#card_cvv').inputmask({ mask: '999' });

        $("#btnSavePayment").on("click", function () {
            $("#frm-payment").validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorClass: "is-invalid",
                rules: {
                    card_name: { required: true, minlength: 2 },
                    card_number: { required: true },
                    card_expiration: { required: true },
                    card_cvv: { required: true, maxlength: 3 },
                    plan_id: { required: true}
                },
                messages: {
                    card_name: "",
                    card_number: "",
                    card_expiration: "",
                    card_cvv: "",
                    plan_id: ""
                },
                errorPlacement: function (error, element) { },
                submitHandler: function (form) {
                    $("#btnSavePayment").attr('disabled',true);
                    Swal.showLoading()
                    var params = $("#frm-payment").serialize();
                    var url = $("#frm-payment").attr('action');

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: params,
                        dataType: 'json',
                        contentType: 'application/x-www-form-urlencoded',
                        success: function (response) {
                            if (response.ret == 1) {
                                $("#btnSavePayment").attr('disabled',false);
                                Swal.enableLoading();
                                window.location = response.url;
                            } else {
                                $("#btnSavePayment").attr('disabled',false);
                                Swal.enableLoading()
                                Swal.fire("Atenção", response.msg, "error");
                            }
                        }
                    });
                    return false;
                }
            });
        });
    }
});
