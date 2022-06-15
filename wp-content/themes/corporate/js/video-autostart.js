const intersectionObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.target instanceof HTMLVideoElement) {
            if (entry.isIntersecting) {
                entry.target.play();
            } else {
                entry.target.pause();
            }
        }
    });
}, {threshold: .3});

document.querySelectorAll('video.autostart').forEach(element => intersectionObserver.observe(element));
document.querySelectorAll('video-lame.autostart').forEach(element => intersectionObserver.observe(element));