$(document).ready(function() {
    var token = $('meta[name="csrf_token"]').attr('content')

    $('#save').click(function() {
        if ($('#title').val() === '') {
            notification('Warning!', 'Please enter the title of article');
        } else if ($('#image').val() === '') {
            notification('Warning!', 'Please select the image of article');
        } else if ($('#content').val() === '') {
            notification('Warning!', 'Please enter the content of article');
        } else {
            var url = gSiteURL + 'admin/article';
            var method = 'POST';
            var formData = new FormData();
            formData.append('_token', token);
            formData.append('title', $('#title').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('content', $('#content').val());

            if ($('#action').val() !== 'create') {
                url += '/' + $('#selected-article').val();
                method = 'PUT';
            }

            $.ajax({
                url: url,
                method: method,
                processData: false,
                contentType: false,
                data: formData,
                success: function(res) {
                    if (res.status === 'OK') {
                        window.location.reload();
                    }
                }
            });
        }
    });

    $('table .delete').on('click', function() {
        var articleId = $(this).closest('tr').attr('tid');
        $.ajax({
            url: gSiteURL + 'admin/article/' + articleId,
            method: 'DELETE',
            data: {
                _token: token,
            },
            success: function(res) {
                if (res.status === 'OK') {
                    window.location.reload();
                }
            }
        });
    });

    $('table .update').on('click', function() {
        $('#save').text('Update');
        var article = {
            id: $(this).closest('tr').attr('tid'),
            title: $(this).closest('tr').children().eq(1).text(),
            image: $(this).closest('tr').children().eq(2).text(),
            content: $(this).closest('tr').children().eq(3).text(),
        }

        $('#action').val('update');
        $('#selected-article').val(article.id);

        $('#article-modal #title').val(article.title);
        // $('#article-modal #image').val(article.image);
        $('#article-modal #content').val(article.content);
        $('#article-modal').modal('show');
    });

    function notification(title, content) {
        clearTimeout(during);

        $('.alert strong').text(title);
        $('.alert .alert-content').text(content);
        $('.alert').removeClass('d-none');

        var during = setTimeout(function() {
            $('.alert strong').text('');
            $('.alert .alert-content').text('');
            $('.alert').addClass('d-none');
        }, 3000);
    }

    $("#article-modal").on('hidden.bs.modal', function() {
        $('#title').val('');
        $('#image').val('');
        $('#content').val('');
        $('#action').val('create');
        $('#selected-article').val('0');
        $('#save').text('Save');
    });
});