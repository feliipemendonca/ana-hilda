function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()
        reader.onload = function(e) {
            $('#imagem').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0])
    }
}
$('#input-image').change(function() {
    readURL(this)
})

window.onload = function() {
    CKEDITOR.replace('content');
    CKEDITOR.replace('about');
};

$('.money').mask('R$ 000.000.000.000.000,00', {reverse: true})
$('.js-example-basic').select2({
    closeOnSelect: true
});

$(document).ready(function() { 
    $('#states').change(function() {
        let id = $('#states option:selected').val()

        console.log(id)

        if (id == 0) {
            $('#city').attr('disabled', true)
        }
        if (id) {
            $.ajax({
                type: 'GET',
                url: '/m3/citys/' + id,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log(data)
                    $('#city').attr('disabled', false)

                    let options = '<options value="">Selecione</option>'
                    data.map((item) => {
                        options += '<option value="' + item.id + '">' + item.titulo + '</option>'
                    })

                    $('#city').html(options).show()

                },
                error: function() {
                    $('#city').attr('disabled', true)
                    Swal.fire(
                        'Erro!',
                        'Por favor recarregue a página e tente novamente',
                        'error',
                    )
                }
            })
        }
    })

    $('#city').change(function() {
        let id = $('#city option:selected').val()

        if (id == 0) {
            $('#districts').attr('disabled', true)
        }
        if (id) {
            $.ajax({
                type: 'GET',
                url: '/m3/districts/' + id,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log(data)
                    $('#districts').attr('disabled', false)

                    let options = '<options value="">Selecione</option>'
                    data.map((item) => {
                        options += '<option value="' + item.id + '">' + item.titulo + '</option>'
                    })

                    $('#districts').html(options).show()

                },
                error: function() {
                    $('#districts').attr('disabled', true)
                    Swal.fire(
                        'Erro!',
                        'Por favor recarregue a página e tente novamente',
                        'error',
                    )
                }
            })
        }
    })
})