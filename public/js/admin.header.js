$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content')

    $('#save').click(function() {
        if ($('#name').val() === '') {
            notification('Warning!', 'Please enter the name of header');
        } else if ($('#link').val() === '') {
            notification('Warning!', 'Please select the link of header');
        } else {
            var url = gSiteURL + 'admin/header';
            var method = 'POST';
            if ($('#action').val() !== 'create') {
                url += '/' + $('#selected-header').val();
                method = 'PUT';
            }
            $.ajax({
                url: url,
                method: method,
                data: {
                    _token: token,
                    name: $('#name').val(),
                    link: $('#link').val()
                },
                success: function(res) {
                    if (res.status === 'OK') {
                        window.location.reload();
                    }
                }
            });
        }
    });

    $('table .delete').on('click', function() {
        var headerId = $(this).closest('tr').attr('tid');
        $.ajax({
            url: gSiteURL + 'admin/header/' + headerId,
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
        var header = {
            id: $(this).closest('tr').attr('tid'),
            name: $(this).closest('tr').children().eq(1).text(),
            link: $(this).closest('tr').children().eq(2).text(),
        }

        $('#action').val('update');
        $('#selected-header').val(header.id);

        $('#header-modal #name').val(header.name);
        $('#header-modal #link').val(header.link);
        $('#header-modal').modal('show');
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

    $("#header-modal").on('hidden.bs.modal', function() {
        $('#title').val('');
        $('#image').val('');
        $('#content').val('');
        $('#action').val('create');
        $('#selected-header').val('0');
        $('#save').text('Save');
    });
});