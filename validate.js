$("#formulario").validate({
    rules:{
        nome: {
            required: true,
            rangelength: [10, 70]
        },
        email: {
            required: true,
            email : true
        },
        tel: {
            required: true,
            digits : true
        },
        msg: {
            required: true,
            minWords: 5
        }
    },
    messages:{
        nome:{
            accept: "Insira nome e sobrenome corretos!"
        },
        email:{
            accept: "Insira um email válido!"
        },
        tel:{
            accept: "Insira um número de telefone válido!"
        },
        msg:{
            accept: "Insira sua mensagem!"
        }
    }
})