@extends(('layouts.app'))
@section('title', 'Paşa Analiz')
@section('content')
    <section style="background-image: linear-gradient(rgb(255 255 255 / 100%), rgb(255 255 255 / 24%)), url('{{ asset('assets/images/home-bc.jpg') }}');" class="banner_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 mx-auto"  data-aos="fade-right" data-aos-duration="1500">
                    <div class="banner_text">
                        <h1>ŞANSA DEĞİL <span class="primary"> GERÇEK ANALİZE</span> GÜVEN</h1>
                        <p style="color: #666666; font-family: 'Figtree', sans-serif; ">Detaylı istatistikler, yüksek isabet oranlı maç sonu tahminleriyle kuponlarını stratejik olarak hazırla. Sahadaki her gelişme anında cebinde.
                        </p>
                    </div>
                    <ul class="app_btn">
                        <li>
                            <a href="#">
                                <img class="blue_img" src="{{ asset('assets/images/appstore_white.png') }}" alt="image" >
                                <img class="white_img" src="{{ asset('assets/images/appstore_white.png') }}" alt="image" >
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="blue_img" src="{{ asset('assets/images/googleplay_white.png') }}" alt="image" >
                                <img class="white_img" src="{{ asset('assets/images/googleplay_white.png') }}" alt="image" >
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row hero_images">
                <div class="col-md-12 d-flex justify-content-center position-relative">
                    <div class="center-box"> <img class="moving_animation" src="{{ asset('assets/images/mobile-app-1.png') }}" alt="image"> </div>

                </div>
            </div>
        </div>
    </section>
    <section class="row_am best_features why-us-bc">
        <div class="bf_inner_sec">
            <div class="container">
                <div class="section_title top_content" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                    <span class="title_badge mb-1">NEDEN PAŞA ANALİZ?</span>
                    <h2>KAZANMA<span class="primary"> STRATEJİNİ </span> DESTEKLEYEN ANALİZLER</h2>
                    <p>Paşa Analiz sadece sıradan bir tahmin uygulaması değil, kupon başarını maksimize etmek için tasarlanmış kapsamlı bir istatistik platformudur. İhtiyacın olan tüm veriler tek bir yerde.</p>
                </div>
                <div class="row bf_boxes">
                    <div class="col-lg-4 col-md-12 card-top">
                        <div class="feature-card">
                            <svg class="card-svg-bg" id="cardSvg" xmlns="http://www.w3.org/2000/svg">
                                <path id="cardPath" class="card-shape" />
                            </svg>
                            <div class="card-content">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        VERİYE DAYALI DETAYLI TAHMİNLER
                                    </h2>
                                    <div class="icon-badge">
                                        <i style="color: #9de725;" class="fi fi-rr-analyse-alt"></i>
                                    </div>
                                </div>
                                <p class="card-desc">
                                    Takımların güncel durumları, geçmiş karşılaşmaları süzülerek hazırlanan, isabet oranı yüksek, matematiksel analizler doğrudan elinizin altında.
                                </p>
                            </div>
                            <div class="step-badge">1</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 card-top">
                        <div class="feature-card" id="responsiveCard">
                            <svg class="card-svg-bg" id="cardSvg" xmlns="http://www.w3.org/2000/svg">
                                <path id="cardPath" class="card-shape" />
                            </svg>
                            <div class="card-content">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        AYRICALIKLI VIP MAÇLAR
                                    </h2>
                                    <div class="icon-badge">
                                        <i style="color: #9de725;" class="fi fi-rr-football-player"></i>
                                    </div>
                                </div>
                                <p class="card-desc">
                                    Kazanma oranını bir üst seviyeye taşımak isteyenler için uzman analistler tarafından özenle seçilmiş ve filtrelenmiş maç analizleri ile VIP kupon tahminleriyle fark yaratın.
                                </p>
                            </div>
                            <div class="step-badge">2</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 card-top">
                        <div class="feature-card" id="responsiveCard">
                            <svg class="card-svg-bg" id="cardSvg" xmlns="http://www.w3.org/2000/svg">
                                <path id="cardPath" class="card-shape" />
                            </svg>
                            <div class="card-content">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        KUPONU ŞANSA BIRAKMA
                                    </h2>
                                    <div class="icon-badge">
                                        <i style="color: #9de725;" class="fi fi-rr-trophy-star"></i>
                                    </div>
                                </div>
                                <p class="card-desc">
                                    Maç öncesi detaylı istatistikler ve uzman analizleriyle kuponunu şansa bırakma. Paşa Analiz, karmaşık verileri sadeleştirerek sana en pürüzsüz ve hızlı deneyimi sunar.
                                </p>
                            </div>
                            <div class="step-badge">3</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tag_animation_section">
                    <div style="animation: 1s cubic-bezier(0.15, 0.8, 0.35, 1.5) 0s 1 normal forwards running fall, 0.6s ease-out 1s 1 normal forwards running bounce;" class="tags-container">
                        <div class="tag">MAÇ ANALİZİ</div>
                        <div class="tag">UZMAN TAHMİNİ</div>
                        <div class="tag">GOL BİLDİRİMİ</div>
                        <div class="tag">YÜKSEK ORAN</div>
                        <div class="tag">GÜNLÜK KUPON</div>
                        <div class="tag">STRATEJİK KUPONLAR</div>
                        <div class="tag">7/24 DESTEK</div>
                        <div class="tag">KULLANIMI KOLAY ARAYÜZ</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row_am task_app_section">
        <div class="container">
            <div class="section_title top_content" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="300">
                <span class="title_badge mb-1">KOLAY KULLANIM</span>
                <h2>3 Adımda <span class="primary"> KAZANMAYA BAŞLA </span> </h2>
                <p class="mt-4">Paşa Analiz’in uzman analizcileri ve yapay zeka süzgeciyle sadece dakikalar içinde kuponunuzu belirleyin.</p>
            </div>
        </div>
        <div class="task_block">
            <div class="row">
                <div class="task_block_inner">
                    <div class="col-md-6">
                        <div class="task_text">
                            <div class="section_title"  >
                                <span class="title_badge">1. ADIM</span>
                                <h3>UYGULAMAYI İNDİR VE KAYIT OL</h3>
                                <p class="info-text">
                                    App Store veya Play Store üzerinden Paşa Analiz’i saniyeler içinde ücretsiz olarak indirin. Karmaşık formlar olmadan hızlıca kayıt olun ve anında maçlara erişin.
                                </p>
                                <ul class="feature_list">
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>iOS ve Android ile %100 Uyumlu</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Kredi Kartsız ve Ücretsiz Başlangıç</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Anında Canlı Bildirim İzni</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="task_img" >
                            <div class="frame_img">
                                <img src="{{ asset('assets/images/screen-1.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="task_block tb_2">
            <div class="row">
                <div class="task_block_inner">
                    <div class="col-md-6">
                        <div class="task_text">
                            <div class="section_title" >
                                <span class="title_badge">2. ADIM</span>
                                <h3>ANALİZLERİ VE TAHMİNLERİ İNCELE</h3>
                                <p class="info-text">
                                    Günün öne çıkan maçlarını, takımların form durumlarını ve uzman kadromuzun hazırladığı veriye dayalı analizleri keşfedin. Matematiksel modellere dayalı yüksek isabet oranlı maçlarla kuponunuzu şekillendirin.
                                </p>
                                <ul class="feature_list">
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Detaylı İstatistik ve Takım Formları</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Günlük Güncellenen Banko ve Sürpriz Tahminler</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Karmaşadan Uzak, Kolay Kullanımlı Arayüz</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="task_img" >
                            <div class="frame_img">
                                <img src="{{ asset('assets/images/screen-2.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="task_block">
            <div class="row">
                <div class="task_block_inner">
                    <div class="col-md-6">
                        <div class="task_text">
                            <div class="section_title" >
                                <span class="title_badge">3. ADIM</span>
                                <h3>VIP ÜYELİK İLE KAZANMA POTANSİYELİNİ KATLA</h3>
                                <p class="info-text">Ayrıcalıklı maçlara ve yalnızca VIP üyelere özel filtrelenmiş tahminlere erişin. Şansı bir kenara bırakıp analiz gücüyle kazanma olasılığınızı en üst seviyeye çıkarın.
                                </p>
                                <ul class="feature_list">
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Sadece VIP Üyelere Özel Yüksek Oranlı Maçlar</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Anında Aktifleşen Kolay Üyelik Modeli</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span><i style="color: #042c23;" class="icofont-check-circled primary-gradient"></i></span>
                                        </div>
                                        <div class="text">
                                            <p>Sürekli Yenilenen Özel Maç Bülteni</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="task_img">
                            <div class="frame_img">
                                <img src="{{ asset('assets/images/screen-3.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
