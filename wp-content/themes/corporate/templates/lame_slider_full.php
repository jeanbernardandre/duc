<div class="flexible-search-v2">
    <div class="flexible-search-v2-hero">
        {% if data.type is same as ('video') and fn('wp_is_mobile') == false %}
        <div class="flexible-search-v2-video" style="background-image: url({{ data.video_image.sizes.large }})">
            <video
                src="{{ data.video }}"
                class="video-lame {{ data.v_start ? 'autostart' }}"
                width="100%"
                height="auto"
                data-name="video-0"
                controlsList="nodownload"
                muted
                loop
            >
                {% set extension = data.video|slice(-3, 3) %}
                <source src="{{ data.video }}" type="video/{{ extension == 'mp4' ? extension : 'webm' }}">
                {{ __('Votre navigateur ne prend pas en charge les vidéos HTML5.', 'huttopia') }}
            </video>
        </div>
        {% else %}
        <div class="flexible-search-v2-slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    {% for slide in data.slider %}
                    <div class="swiper-slide">
                        <img class="llazy" data-src="{{ slide.image.url }}" alt="Huttopia">
                        <div class="swiper-slide-title -{{ slide.text_color }}">{{ slide.text }}</div>
                    </div>
                    {% endfor %}
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        {% endif %}
    </div>
</div>