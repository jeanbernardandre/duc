
jQuery(document).ready(function($) {
    var playercenters = $('.playercenter');
    playercenters.each(function() {
        var playercenter = $(this);
        if (playercenter.hasClass('start')) {
            var overlayIndividual = playercenter.siblings('.overlay');
            var playerIndividual = playercenter.siblings('.player');
            overlayIndividual.toggle();
            playerIndividual.toggle();
            playercenter.toggle();
            overlayIndividual.siblings('.video-lame').get(0).play();
        } else {
            $(playercenter).click(function () {
                var overlayIndividual = playercenter.siblings('.overlay');
                var playerIndividual = playercenter.siblings('.player');
                overlayIndividual.toggle();
                playerIndividual.toggle();
                playercenter.toggle();
                overlayIndividual.siblings('.video-lame').get(0).play();
            });
        }
    });
});

