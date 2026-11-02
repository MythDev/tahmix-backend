<footer>
    <div class="top_footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer_logo_section">
                        <div class="logo"> <img src="{{ asset('assets/images/logo.png') }}" alt="image" ></div>
                        <ul class="social_media">
                            <li><a href="https://themeforest.net/user/kalanidhithemes/portfolio" aria-label="facebook page" ><i class="icofont-facebook"></i></a></li>
                            <li><a href="https://www.behance.net/kalanidhithemes" aria-label="twitter page"><i class="icofont-twitter"></i></a></li>
                            <li><a href="https://themeforest.net/user/kalanidhithemes/portfolio" aria-label="instagram page"><i class="icofont-instagram"></i></a></li>
                            <li><a href="https://themeforest.net/user/kalanidhithemes/portfolio" aria-label="pinterest page"><i class="icofont-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer_data_section">
                    <div class="col-lg-8 col-md-12">
                        <a href="tel:1235678901" class="footer_cta_text">Call : +80 123 4567890  </a> <br>
                        <a href="mailto:example@email.com" class="footer_cta_text"> Email : example@email.com  </a>
                        <div class="abt_side">
                            <ul class="app_btn">
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('assets/images/appstore_black.png') }}" alt="image" >
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('assets/images/googleplay_black.png') }}" alt="image" >
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h5>Subscribe us</h5>
                        <div class="news_letter">
                            <p>Subscribe our newsleter to receive latest updates regularly from us!</p>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <button class="btn" aria-label="subscribe"><i class="icofont-paper-plane"></i></button>
                                </div>
                                <p class="note">By clicking send link you agree to receive message.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text_list_section row_am no_padding" >
            <div class="container">
            </div>
            <div class="slider_block">
                <div class="owl-carousel owl-theme" id="text_list_flow">
                    <div class="item">
                        <div class="text_block">
                            <span>appiq.com </span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span>appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span>appiq.com </span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span> appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span> appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span> appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span>appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text_block">
                            <span>appiq.com</span>
                            <span class="mark_star">•</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© Copyrights 2024. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="developer_text">Design & developed by <a href="https://themeforest.net/user/kalanidhithemes/portfolio" target="blank">Kalanidhi Themes</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="go_top" id="Gotop">
    <span><i class="icofont-arrow-up"></i></span>
</div>
<div class="modal fade youtube-video" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button id="close-video" type="button" class="button btn btn-default text-right" data-dismiss="modal">
                <i class="icofont-close-line-circled"></i>
            </button>
            <div class="modal-body">
                <div id="video-container" class="video-container">
                    <iframe id="youtubevideo" src="#" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/typed.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#scrollButton').click(function () {
            $('html, body').animate({ scrollTop: $(window).scrollTop() + 600 }, 800);
        });
    });
</script>
<script>
    // Tek bir kartın çerçevesini çizen fonksiyon
    function drawCardBorder(card) {
        const svg = card.querySelector('.card-svg-bg');
        const path = card.querySelector('.card-shape');
        if (!svg || !path) return;

        const w = card.offsetWidth;
        const h = card.offsetHeight;
        if (w === 0 || h === 0) return;

        const r = 24;   // Dış köşe yarıçapı
        const nw = 78;  // Sağ alttaki oyuk genişliği
        const nh = 68;  // Sağ alttaki oyuk yüksekliği
        const cr = 16;  // Oyuğun kavis yarıçapı

        const d = `
        M ${r} 2
        H ${w - r}
        A ${r} ${r} 0 0 1 ${w - 2} ${r}
        V ${h - nh - cr}
        A ${cr} ${cr} 0 0 1 ${w - cr - 2} ${h - nh}
        H ${w - nw + cr}
        A ${cr} ${cr} 0 0 0 ${w - nw} ${h - nh + cr}
        V ${h - cr - 2}
        A ${cr} ${cr} 0 0 1 ${w - nw - cr} ${h - 2}
        H ${r}
        A ${r} ${r} 0 0 1 2 ${h - r}
        V ${r}
        A ${r} ${r} 0 0 1 ${r} 2
        Z
      `;

        svg.setAttribute('viewBox', `0 0 ${w} ${h}`);
        path.setAttribute('d', d);
    }

    // Sayfadaki TÜM kartları dinleyen ve bağımsız güncelleyen gözlemci
    const resizeObserver = new ResizeObserver((entries) => {
        entries.forEach(entry => drawCardBorder(entry.target));
    });

    // Sayfadaki her .feature-card için döngü kurar
    document.querySelectorAll('.feature-card').forEach((card) => {
        resizeObserver.observe(card);
    });
</script>
@stack('scripts')
</body>
</html>
