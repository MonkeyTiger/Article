$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr('content')

    $('#save').click(function () {
        if ($('#name').val() === '') {
            notification('Warning!', 'Please enter the name of footer');
        } else if ($('#link').val() === '') {
            notification('Warning!', 'Please select the link of footer');
        } else {
            var url = gSiteURL + 'admin/footer';
            var method = 'POST';
            if ($('#action').val() !== 'create') {
                url += '/' + $('#selected-footer').val();
                method = 'PUT';
            }
            $.ajax({
                url: url,
                method: method,
                data: {
                    _token: token,
                    name: $('#name').val(),
                    category: $('#category').val(),
                    link: $('#link').val()
                },
                success: function (res) {
                    if (res.status === 'OK') {
                        window.location.reload();
                    }
                }
            });
        }
    });

    $('table .delete').on('click', function () {
        var footerId = $(this).closest('tr').attr('tid');
        $.ajax({
            url: gSiteURL + 'admin/footer/' + footerId,
            method: 'DELETE',
            data: {
                _token: token,
            },
            success: function (res) {
                if (res.status === 'OK') {
                    window.location.reload();
                }
            }
        });
    });

    $('table .update').on('click', function () {
        $('#save').text('Update');
        var footer = {
            id: $(this).closest('tr').attr('tid'),
            name: $(this).closest('tr').children().eq(1).text(),
            category: $(this).closest('tr').children().eq(2).text(),
            link: $(this).closest('tr').children().eq(3).text(),
        }

        $('#action').val('update');
        $('#selected-footer').val(footer.id);

        $('#footer-modal #name').val(footer.name);
        $('#footer-modal #category').val(footer.category);
        $('#footer-modal #link').val(footer.link);
        $('#footer-modal').modal('show');
    });

    function notification(title, content) {
        clearTimeout(during);

        $('.alert strong').text(title);
        $('.alert .alert-content').text(content);
        $('.alert').removeClass('d-none');

        var during = setTimeout(function () {
            $('.alert strong').text('');
            $('.alert .alert-content').text('');
            $('.alert').addClass('d-none');
        }, 3000);
    }

    $("#footer-modal").on('hidden.bs.modal', function () {
        $('#name').val('');
        $('#link').val('');
        $('#action').val('create');
        $('#selected-footer').val('0');
        $('#save').text('Save');
    });
});