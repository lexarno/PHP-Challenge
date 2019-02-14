$(document).ready(function () {
    if ($("#frm-register").length) {

        console.log('entramos')

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
                    var params = $("#frm-register").serialize();
                    var url = $("#frm-register").attr('action');
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: params,
                        dataType: 'json',
                        contentType: 'application/x-www-form-urlencoded',
                        success: function (response) {
                            if (response.ret == 1) {
                                swal({
                                    title: "Atenção!",
                                    text: response.msg,
                                    type: "success",
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: "Ok",
                                }, function () {
                                    console.log(response.url);
                                    window.location = response.url;
                                });
                            } else {
                                swal("Atenção", response.msg, "error");
                            }
                        }
                    });
                }
            });
        });

        $(document).on("click", ".add-phone", function () {
            var id = $('.ph-id').length;

            if (id < 3) {
                var div = $('#row-' + id);
                var count = id + 1;
                div.clone(true, true)
                        .appendTo('#box')
                        .attr('id', 'row-' + count);
                var element = $('#row-' + count);
                element.find(".ph").attr('id', 'phone_' + count).attr('name', 'phone_' + count).data('number', count);
                element.find(".lbph").attr('for', 'phone_' + count).text('Telefone ' + count);
                //element.find(".rm-dep-lev").val(count);
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
