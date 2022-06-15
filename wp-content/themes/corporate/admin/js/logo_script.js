jQuery(document).ready(function($) {
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Logo',
            multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                var logo_url = uploaded_image.toJSON().url;
                console.log(logo_url);
                $('#logo_url').val(logo_url);
                $('#hekipia_logo').html('<img src="' + logo_url + '" width="120" />');
            });
    });
});
