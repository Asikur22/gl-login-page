jQuery(document).ready(function ($) {
    $('#login_page_logo_uplod').on('click', function (e) {
        e.preventDefault();
        var file_frame;

        if (file_frame) {
            file_frame.open();
            return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Login Page Logo Upload',
            button: {
                text: 'Select Logo',
            },
            library: {
                type: ['image']
            },
            multiple: false,
        });

        file_frame.on('select', function () {
            attachment = file_frame.state().get('selection').first().toJSON();
            if (attachment.sizes.medium == undefined) {
                var src = attachment.sizes.full.url;
            } else {
                var src = attachment.sizes.medium.url;
            }

            $('#login_page_logo_width').val(attachment.width + 'px');
            $('#login_page_logo_height').val(attachment.height + 'px');

            $('.show_paira_lp').attr('src', src);
            $('#login_page_logo').attr('value', attachment.url);
        });

        file_frame.open();
    });
    $('#login_page_logo').change(function (event) {
        $('.show_paira_lp').attr('src', $(this).val());
    });
});