$(document).ready(function(){var t=[];$("#frm-register").length&&($("#cpf").inputmask({mask:"999.999.999-99"}),$("#cep").inputmask({mask:"99999-999"}),$(".ph").inputmask({mask:"(99) 9999[9]-9999",clearMaskOnLostFocus:!0}),$("#btnSaveRegister").on("click",function(){$("#frm-register").validate({highlight:function(e){$(e).addClass("is-invalid")},unhighlight:function(e){$(e).removeClass("is-invalid")},errorClass:"is-invalid",rules:{name:{required:!0,minlength:2},email:{required:!0,email:!0},cpf:{required:!0},password:{required:!0,minlength:6},password_confirmation:{required:!0,minlength:6},cep:{required:!0},address:{required:!0},number:{required:!0,number:!0},district:{required:!0}},messages:{name:"",email:"",cpf:"",password:"",password_confirmation:"",cep:"",address:"",number:"",district:""},errorPlacement:function(e,r){},submitHandler:function(e){var r=$("#frm-register").serialize(),n=$("#frm-register").attr("action");return $("#password").val()==$("#password-confirm").val()?($(".ph").each(function(e){var r=$(this).attr("id");t.push($("#"+r).val())}),$.ajax({type:"POST",url:n,data:r+"&phones="+JSON.stringify(t),dataType:"json",contentType:"application/x-www-form-urlencoded",success:function(e){console.log(e),1==e.ret?swal({title:"Atenção!",text:e.msg,type:"success",confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ok"},function(){}):swal("Atenção",e.msg,"error")}})):swal("Atenção","A senha não confere com a confirmação.","error"),!1}})}),$(document).on("click",".add-phone",function(){var e=$(".ph-id").length,r=e+1;$("#row-"+e).clone().appendTo("#box").attr("id","row-"+r);var n=$("#row-"+r);return n.find(".ph").attr("id","phone_"+r).attr("name","phone_"+r).val("").data("number",r).inputmask({mask:"(99) 9999[9]-9999",clearMaskOnLostFocus:!0}),n.find(".lbph").attr("for","phone_"+r).text("Telefone "+r),n.find(".rm-ph").val(r),!1}),$(document).on("click",".rm-ph",function(){var e=$(this).val();return 1<$(".ph-id").length&&$("#row-"+e).remove(),!1}),$("#cep").on("focusout",function(){var e=$(this).val();e=e.replace("-",""),$.ajax({type:"GET",url:"https://viacep.com.br/ws/"+e+"/json/",dataType:"json",contentType:"application/x-www-form-urlencoded",success:function(e){$("#address").val(e.logradouro),$("#district").val(e.bairro),$("#city").val(e.localidade),$("#uf option[value="+e.uf+"]").attr("selected","selected"),$("#number").focus()}})}))});