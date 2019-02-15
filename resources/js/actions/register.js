$(document).ready(function () {
    if ($("#frm-register").length) {

        $('#cpf').inputmask({ mask: '999.999.999-99' });
        $('#cep').inputmask({ mask: '99999-999' });
        $('.ph').inputmask({ mask: '(99) 9999[9]-9999', clearMaskOnLostFocus: true });

        $("#btnSaveRegister").on("click", function () {
            $("#frm-register").validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorClass: "is-invalid",
                rules: {
                    name: { required: true, minlength: 2 },
                    email: { required: true, email : true },
                    cpf: { required: true },
                    password: { required: true, minlength: 6 },
                    password_confirmation: { required: true, minlength: 6 },
                    cep: { required: true },
                    address: { required: true },
                    number: { required: true, number: true },
                    district: { required: true },
                },
                messages: {
                    name: "",
                    email: "",
                    cpf: "",
                    password: "",
                    password_confirmation: "",
                    cep: "",
                    address: "",
                    number: "",
                    district: "",
                },
                errorPlacement: function (error, element) { },
                submitHandler: function (form) {
                    $("#btnSaveRegister").attr('disabled',true);
                    Swal.showLoading()
                    var params = $("#frm-register").serialize();
                    var url = $("#frm-register").attr('action');

                    if ($('#password').val() == $('#password-confirm').val()){
                        var phones = [];
                        var count = 0;
                        $('.ph').each(function (i) {
                            var phone = $(this).attr('id');
                            phones[count] = [$('#' + phone).val()];
                            count++;
                        });

                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: params + '&phones=' + JSON.stringify(phones),
                            dataType: 'json',
                            contentType: 'application/x-www-form-urlencoded',
                            success: function (response) {
                                if (response.ret == 1) {
                                    $("#btnSaveRegister").attr('disabled',false);
                                    Swal.enableLoading();
                                    window.location = response.url;
                                } else {
                                    $("#btnSaveRegister").attr('disabled',false);
                                    Swal.enableLoading()
                                    Swal.fire("Atenção", response.msg, "error");
                                }
                            }
                        });
                    }else{
                        $("#btnSaveRegister").attr('disabled',false);
                        Swal.enableLoading()
                        Swal.fire("Atenção", "A senha não confere com a confirmação.", "error");
                    }
                    return false;
                }
            });
        });

        $(document).on("click", ".add-phone", function () {
            var id = $('.ph-id').length;
            
            var div = $('#row-' + id);
            var count = id + 1;
            div.clone()
                    .appendTo('#box')
                    .attr('id', 'row-' + count);
            var element = $('#row-' + count);
            element.find(".ph").attr('id', 'phone_' + count).attr('name', 'phone_' + count).val('').data('number', count).inputmask({ mask: '(99) 9999[9]-9999', clearMaskOnLostFocus: true });
            element.find(".lbph").attr('for', 'phone_' + count).text('Telefone ' + count);
            element.find(".rm-ph").val(count);
            
            return false;
        });

        $(document).on('click', '.rm-ph', function () {
            var id = $(this).val();
            if ($('.ph-id').length > 1) {
                $('#row-' + id).remove();
            }
            return false;
        });


        $("#cep").on("focusout", function () {
            var cep = $(this).val();
            cep = cep.replace('-', '');
            $.ajax({
                type: "GET",
                url: "https://viacep.com.br/ws/" + cep + "/json/",
                dataType: "json",
                contentType: "application/x-www-form-urlencoded",
                success: function (resp) {
                    $('#address').val(resp.logradouro);
                    $('#district').val(resp.bairro);
                    $('#city').val(resp.localidade);
                    $('#uf option[value='+resp.uf+']').attr('selected','selected');
                    $('#number').focus();
                }
            });
        });
    }
});
