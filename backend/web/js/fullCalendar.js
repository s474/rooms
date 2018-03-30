$('#getDefinition').on('click', function (e) {
    $.ajax({
        url: '/simon/hardwords/frontend/web/index.php?r=words/getDefinition',
        data: {word: $('#words-word').val()},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#words-definition').val(data.entry.def.dt[0]);			
        }
    });
});
