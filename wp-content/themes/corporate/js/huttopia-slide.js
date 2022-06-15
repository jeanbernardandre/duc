class HuttopiaSlide extends HTMLElement {
    static get observedAttributes() {
        return ['auto'];
    }

    constructor() {
        super();

        this.controls = [...this.querySelectorAll('.previous, .next')];
        this.slides = [...this.querySelectorAll('.slides > *')];
        this.thumbnails = [...this.querySelectorAll('.thumbnails-wrapper > .thumbnails > *')];

        this.slideWidth = 105;
        this.viewportMaxSlides = 10;
        this.midViewportMaxSlides = Math.round(this.viewportMaxSlides / 2);

        if (this.querySelector('.thumbnails-wrapper') !== null) {
            this.thumbnailsWrapper = this.querySelector('.thumbnails-wrapper > .thumbnails');
        }

        this.index = Math.max(0, this.slides.findIndex(e => e.classList.contains('active')));

        if (this.hasAttribute('control')) {
            this.controls.forEach(entry => entry.addEventListener('click', e => this.clickControl(e)));
        } else {
            this.addEventListener('click', e => this.click(e));
        }

        this.addEventListener('touchstart', e => this.touchstart(e), false);
        this.addEventListener('touchend', e => this.touchend(e), false);

        this.slide(0);
    }

    touchstart(e) {
        this.position = [e.changedTouches[0].screenX, e.changedTouches[0].screenY];
    }

    touchend(e) {
        const diffX = e.changedTouches[0].screenX - this.position[0],
            diffY = e.changedTouches[0].screenY - this.position[1],
            ratioX = Math.abs(diffX / diffY),
            ratioY = Math.abs(diffY / diffX);

        if (Math.abs(ratioX > ratioY ? diffX : diffY) < 30) {
            return;
        }
        ratioX > ratioY
            ? (diffX >= 0 ? this.slide(this.index - 1): this.slide(this.index + 1))
            : this.toggleFullscreen(false);
    }

    active(force) {
        this.slides[this.index].classList.toggle('active', force);
        this.thumbnails[this.index]?.classList.toggle('active', force);
    }

    slide(index = 0) {
        this.active(false);
        this.index = (index % this.slides.length + this.slides.length) % this.slides.length;
        this.active(true);
        if (this.thumbnailsWrapper !== undefined) {
            if (this.index >= this.midViewportMaxSlides && this.slides.length > this.viewportMaxSlides) {
                let value = (this.index - this.midViewportMaxSlides) * this.slideWidth;
                this.thumbnailsWrapper.style.transform = 'translateX(-' + value + 'px)';
            }
            if (this.slides.length < this.viewportMaxSlides) {
                this.thumbnailsWrapper.classList.add('center');
            } else {
                if (this.index === 0) {
                    this.thumbnailsWrapper.style.transform = 'translateX(0px)';
                }
            }
        }
    }

    attributeChangedCallback(name, oldValue, newValue) {
        'timer' in this && clearInterval(this.timer);
        if (newValue !== null) {
            this.timer = setInterval(() => this.slide(this.index + 1), (parseFloat(newValue) || 10) * 1E3);
        }
    }

    get isFullscreen() {
        return (
            'fullscreenElement' in document ? document.fullscreenElement : document.webkitFullscreenElement
        ) !== null;
    }

    toggleFullscreen(state = true) {
        if (this.hasAttribute('allowfullscreen')) {
            if (state) {
                this.webkitRequestFullScreen ? this.webkitRequestFullScreen() : this.requestFullscreen();
            } else if (this.isFullscreen) {
                document.webkitFullscreenElement ? document.webkitExitFullscreen() : document.exitFullscreen();
            }
            this.classList.toggle('fullscreen', state);
        }
    }

    click(e) {
        if (e.target === this) {
            this.toggleFullscreen(this.isFullscreen === false);
        } else {
            this.removeAttribute('auto');
            this.slide(
                this.controls.includes(e.target)
                    ? this.index + (e.target.classList.contains('previous') ? -1 : 1)
                    : this.thumbnails?.findIndex(k => e.target === k)
            );
        }
    }

    clickControl(e) {
        this.slide(this.index + (e.target.classList.contains('next') ? 1 : -1));
    }
}

customElements.define('huttopia-slide', HuttopiaSlide);