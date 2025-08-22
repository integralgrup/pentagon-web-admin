@extends('layouts.main')

@section('content')
    <main class="main-field header-space career-page">
    <?php
        $pageTitle = "Kariyer";
        $breadcrumbImage = "career-breadcrumb.jpg";
        $breadcrumbVideo = "breadcrumb-video.mp4";
        $pageLink = "page-career.php";
        $imageOrVideo = "image";
        
    ?>
    @include('partials.breadcrumb')
    <section class="content">
        <section class="career relative mb-[150px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] mt-[130px] xl:mt-[90px] ">
            <img src="../assets/image/static/vectorel.svg" alt="Vektör" width="387" height="588" class="pointer-events-none absolute top-1/2 -translate-y-1/2 right-0 ">
            <div class="container max-w-[1650px]">
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-full pr-[76px] xl:pr-[50px] lg:pr-[25px] md:p-0">
                        <div class="image-wrapper reveal w-full h-[650px] xl:h-[530px] sm:h-[400px] relative">
                            <img src="../assets/image/general/career-image.jpg" alt="Kariyer" width="793" height="651" class="w-full h-full object-cover relative z-2">
                            <div class="bg-primary-main absolute -top-[38px] sm:-top-[20px] -right-[38px] sm:-right-[20px] w-[421px] sm:w-[320px] aspect-square"></div>
                        </div>
                    </div>
                    <div class="w-1/2 md:w-full pl-[76px] xl:pr-[50px] lg:pr-[25px] md:p-0 md:mt-[30px]">
                        <div class="flex flex-col text-editor reveal">
                            <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[5px]">Hepimiz Aileyiz</span>
                            <h2 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[80px] 2xl:mb-[50px] xl:mb-[30px] xs:mb-[20px]">
                                Kariyer Fırsatları Pentagon Yapı'da:
                                <span class="font-bold">Geleceğinizi İnşa Edin</span>
                            </h2>
                            <p class="text-[22px] lg:text-[18px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.22px] text-paragraph mb-[30px] xs:mb-[20px]">Yenilikçi ve küresel bir oyuncu olarak Pentagon Yapı ailesine katılın.</p>
                            <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[30px]">
                                Kariyer yolculuğunuzu bizimle birleştirerek, alanında önde gelen bir ekip içinde yer alacak, yenilikçilik ve mükemmellikle dolu bir dünyaya adım atacaksınız. Biz, sadece binalar değil, aynı zamanda kariyerleri de inşa ediyoruz.
                            </p>

                            <div class="flex items-center justify-center relative w-max overflow-hidden main-button group cursor-pointer scrollable-selector sm:w-full" data-scrollable-section="#positions">
                                <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-full before:h-0 before:translate-y-[-100px] group-hover:before:min-md:h-full group-hover:before:min-md:translate-y-0 before:bg-primary-main before:transition-all before:duration-500">
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-y-[-100px] opacity-0 group-hover:min-md:translate-y-0 group-hover:opacity-100 w-0 whitespace-nowrap relative z-2">Pozisyonları İncele</span>
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-y-[100px] group-hover:min-md:opacity-0 relative z-2">Pozisyonları İncele</span>
                                </div>
                                <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                    <i class="icon-angle-down text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-y-[-100px] opacity-0 group-hover:min-md:translate-y-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                    <i class="icon-angle-down text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-y-[100px] group-hover:min-md:opacity-0"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="career-slider-area overflow-hidden md:bg-secondary-main mb-[200px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] relative">
            <div class="max-w-[1920px] mx-auto relative overflow-hidden">
                <div class="container max-w-[1800px]">
                    <div class="bg-primary-main absolute -z-[1] -bottom-[90px] xl:-bottom-[60px] lg:-bottom-[20px] -right-0 max-w-[440px] [@media(max-width:1780px)_and_(min-width:1441px)]:max-w-[400px] xl:max-w-[360px] w-full h-[426px] md:hidden"></div>
                    <div class="wrapper min-sm:overflow-hidden bg-secondary-main md:bg-transparent p-[50px] pl-[105px] xl:pl-[80px] lg:pl-[30px] lg:p-[30px] sm:p-[20px_0] relative">
                        <img src="../assets/image/static/vectorel-2.svg" alt="Vektör" width="610" height="535" class="reveal max-w-[610px] xl:max-w-[500px] sm:max-w-full sm:w-full h-auto absolute z-2 pointer-events-none left-1/2 top-1/2 sm:top-[30px] -translate-x-1/2 min-sm:-translate-y-1/2">
                        <div class="sector-slider reveal overflow-hidden relative z-4">
                            <div class="swiper-wrapper">
                                <?php $careerList = [
                                    [
                                        'name' => 'Takım Çalışması',
                                        'title' => 'Takım <span>Çalışması</span>',
                                        'description' => 'Alanında uzman ve çeşitli disiplinlerden gelen meslektaşlarınızla birlikte çalışma fırsatı, sıradan bir iş deneyiminin ötesine geçerek gerçek bir işbirliği atmosferi sunar. <br><br> İnşaat projeleri, sadece tuğlaların bir araya gelmesi değil, farklı beceri setlerinin ve vizyonların bir araya gelmesidir.',
                                        'image' => '../assets/image/general/career-slider-image.jpg',
                                    ],
                                    [
                                        'name' => 'Sosyal Sorumluluk',
                                        'title' => 'Sosyal <span>Sorumluluk</span>',
                                        'description' => 'Alanında uzman ve çeşitli disiplinlerden gelen meslektaşlarınızla birlikte çalışma fırsatı, sıradan bir iş deneyiminin ötesine geçerek gerçek bir işbirliği atmosferi sunar. <br><br> İnşaat projeleri, sadece tuğlaların bir araya gelmesi değil, farklı beceri setlerinin ve vizyonların bir araya gelmesidir.',
                                        'image' => '../assets/image/general/career-slider-image.jpg',
                                    ],
                                    [
                                        'name' => 'Mentorluk ve Destek',
                                        'title' => 'Mentorluk ve <span>Destek</span>',
                                        'description' => 'Alanında uzman ve çeşitli disiplinlerden gelen meslektaşlarınızla birlikte çalışma fırsatı, sıradan bir iş deneyiminin ötesine geçerek gerçek bir işbirliği atmosferi sunar. <br><br> İnşaat projeleri, sadece tuğlaların bir araya gelmesi değil, farklı beceri setlerinin ve vizyonların bir araya gelmesidir.',
                                        'image' => '../assets/image/general/career-slider-image.jpg',
                                    ],
                                    [
                                        'name' => 'Çalışan Refahı',
                                        'title' => 'Çalışan <span>Refahı</span>',
                                        'description' => 'Alanında uzman ve çeşitli disiplinlerden gelen meslektaşlarınızla birlikte çalışma fırsatı, sıradan bir iş deneyiminin ötesine geçerek gerçek bir işbirliği atmosferi sunar. <br><br> İnşaat projeleri, sadece tuğlaların bir araya gelmesi değil, farklı beceri setlerinin ve vizyonların bir araya gelmesidir.',
                                        'image' => '../assets/image/general/career-slider-image.jpg',
                                    ],
                                    [
                                        'name' => 'Küresel Projeler',
                                        'title' => 'Küresel <span>Projeler</span>',
                                        'description' => 'Alanında uzman ve çeşitli disiplinlerden gelen meslektaşlarınızla birlikte çalışma fırsatı, sıradan bir iş deneyiminin ötesine geçerek gerçek bir işbirliği atmosferi sunar. <br><br> İnşaat projeleri, sadece tuğlaların bir araya gelmesi değil, farklı beceri setlerinin ve vizyonların bir araya gelmesidir.',
                                        'image' => '../assets/image/general/career-slider-image.jpg',
                                    ],
                                ]; foreach ($careerList as $key => $item) { ?>
                                    <div class="swiper-slide overflow-hidden" data-slide-name="<?= $item['name'] ?>" data-slide-id="<?= $key + 1 ?>">
                                        <div class="item w-full grid grid-cols-2 sm:grid-cols-1 items-end gap-[200px] 2xl:gap-[160px] xl:gap-[100px] lg:gap-[60px] md:gap-[30px]">
                                            <div class="left mb-[90px] 2xl:mb-[60px] xl:mb-[45px] lg:mb-[30px] md:mb-0">
                                                <span class="block mb-[50px] md:mb-[30px] text-[16px] leading-[32px] font-light text-white opacity-65 tracking-[7.2px]">Pentagon’da Yaşam</span>
                                                <div class="flex flex-col gap-[30px] sm:gap-[20px] text-editor">
                                                    <h3 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white [&_span]:font-bold"><?= $item['title'] ?></h3>
                                                    <p class="text-[17px] md:text-[16px] sm:text-[15px] leading-[32px] sm:leading-[28px] font-light text-white mb-[20px] sm:mb-[5px]"><?= $item['description'] ?></p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="image-wrapper w-full h-[500px]  xl:h-[450px] sm:h-[320px]  xsm:mt-[40px]">
                                                    <img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="745" height="535" class="w-full h-full object-cover" data-swiper-parallax="50%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-navigation flex items-end gap-[112px] pt-[40px] xsm:pt-[20px] xs:pt-0 pb-[20px] md:pb-[40px] lg:gap-[50px] pl-[95px] 2xl:pl-[45px] xl:pl-0 pr-[85px] xl:pr-0 relative z-5 xsm:absolute xsm:bottom-[370px] xs:bottom-[360px] xsm:w-[calc(100%-60px)] xsm:p-0">
                        <div class="reveal sector-pagination flex items-center gap-[30px] xl:gap-[20px] xsm:gap-[15px] xs:gap-[10px] [&_.swiper-pagination-bullet]:!max-w-[192px] xsm:hidden"></div>
                        <div class="reveal nav-buttons pb-[5px] flex items-center gap-[30px] sm:hidden">
                            <div class="sector-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                                <span class="text-[16px] leading-[32px] text-white md:hidden">Önceki</span>
                            </div>

                            <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                            <div class="sector-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <span class="text-[16px] leading-[32px] text-white md:hidden">Sonraki</span>
                                <i class="icon-angle-right text-[12px] leading-none text-white "></i>
                            </div>
                        </div>
                        <div class="swiper-scrollbar hidden xsm:block bg-white/15 [&_.swiper-scrollbar-drag]:bg-white relative left-0 w-full">
                            <div class="swiper-scrollbar-drag relative flex flex-col-reverse items-center">
                                <span class="block mb-[10px] text-white text-[13px] whitespace-nowrap pointer-events-none" id="scrollbar-name"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="position-section mb-[130px] xl:mb-[100px] lg:mb-[75px] md:mb-[50px]" id="positions">
            <div class="container max-w-[1650px]">
                <h3 class="reveal text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-center w-full text-secondary-main mb-[50px] xl:mb-[30px] xs:mb-[20px]">
                    Pentagon Yapı <br>
                    <span class="font-bold">Pozisyonlar</span>
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-1 gap-[30px]">
                    <?php $positions = [
                            [
                                'title' => 'Satış Sorumlusu',
                                'description' => 'Gelişimi sürekli kılmak adına İntegral Akademi kapsamında düzenli eğitimler gerçekleştirmektedir. Hızla büyüyen bir grup şirketi olan İntegral genç adaylar için birçok kariyer fırsatını bünyesinde barındırır.',
                                'link' => 'page-career-detail.php',
                                'kariyernet' => 'https://kariyer.net'
                            ],
                            [
                                'title' => 'Satış Sorumlusu',
                                'description' => 'Gelişimi sürekli kılmak adına İntegral Akademi kapsamında düzenli eğitimler gerçekleştirmektedir. Hızla büyüyen bir grup şirketi olan İntegral genç adaylar için birçok kariyer fırsatını bünyesinde barındırır.',
                                'link' => 'page-career-detail.php',
                            ],
                            [
                                'title' => 'Satış Sorumlusu',
                                'description' => 'Gelişimi sürekli kılmak adına İntegral Akademi kapsamında düzenli eğitimler gerçekleştirmektedir. Hızla büyüyen bir grup şirketi olan İntegral genç adaylar için birçok kariyer fırsatını bünyesinde barındırır.',
                                'link' => 'page-career-detail.php',
                            ],
                            [
                                'title' => 'Satış Sorumlusu',
                                'description' => 'Gelişimi sürekli kılmak adına İntegral Akademi kapsamında düzenli eğitimler gerçekleştirmektedir. Hızla büyüyen bir grup şirketi olan İntegral genç adaylar için birçok kariyer fırsatını bünyesinde barındırır.',
                                'link' => 'page-career-detail.php',
                            ],
                        ]; foreach ($positions as $item) { ?>
                            <div class="item reveal p-[50px] lg:p-[30px] relative bg-[#F0EEE7] transition-all duration-500 hover:min-md:bg-secondary-main group/item overflow-hidden">
                                <img src="../assets/image/static/career-box-vector.svg" alt="Vektör" width="457" height="401" class="h-full w-auto absolute z-2 top-1/2 -translate-y-1/2 right-0 transition-all duration-500 group-hover/item:min-md:opacity-0">
                                <img src="../assets/image/static/career-box-vector-hover.svg" alt="Vektör" width="457" height="401" class="h-full w-auto absolute z-2 top-1/2 -translate-y-1/2 right-0 transition-all duration-500 opacity-0 group-hover/item:min-md:opacity-100">
                                <div class="content flex flex-col relative z-3">
                                    <h3 class="text-[30px] xl:text-[24px] md:text-[20px] leading-[38px] md:leading-[30px] font-medium text-paragraph/80 tracking-[-0.3px] mb-[30px] xs:mb-[20px] transition-all duration-300 group-hover/item:min-md:text-white">
                                        <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                                    </h3>
                                    <p class="text-[18px] xl:text-[16px] leading-[32px] font-light text-paragraph/80 transition-all duration-300 group-hover/item:min-md:text-white line-clamp-3"><?= $item['description'] ?></p>
                                    <div class="buttons flex sm:flex-col items-center gap-[20px] mt-[80px] xl:mt-[60px] lg:mt-[40px]">
                                        <a href="<?= $item['link'] ?>" class="flex items-center justify-center relative w-max sm:w-full overflow-hidden main-button group">
                                            <div class="left px-[66px] xs:px-[20px] group-hover:min-md:px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-paragraph/16 group-hover/item:min-md:border-white/16 group-hover:min-md:border-primary-main transition-all duration-300 group-hover:min-md:bg-primary-main sm:w-full">
                                                <span class="text-[16px] leading-none font-medium text-paragraph transition-all duration-300 tracking-[-0.16px] group-hover/item:min-md:text-white group-hover:min-md:text-white">Detaylı İncele</span>
                                            </div>
                                            <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] border border-solid border-transparent transition-all duration-300 opacity-0 w-0 group-hover:min-md:w-[56px] group-hover:min-md:px-[24px] group-hover:min-md:border-[#9D8D5D] group-hover:min-md:opacity-100 h-[58px]">
                                                <i class="icon-angle-right text-[12px] leading-none text-white"></i>
                                            </div>
                                        </a>

                                        <?php if (isset($item['kariyernet'])): ?>
                                            <a href="<?= $item['kariyernet'] ?>" target="_blank" class="flex items-center justify-center relative w-max sm:w-full overflow-hidden main-button group">
                                                <div class="left px-[66px] xs:px-[20px] group-hover:min-md:px-[30px] py-[15px] flex items-center justify-center z-2 bg-transparent border border-solid border-[#7B207F]/16 group-hover/item:min-md:border-white/16 group-hover:min-md:border-transparent transition-all duration-300 group-hover:min-md:bg-[#7B207F] sm:w-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="106" height="26" viewBox="0 0 106 26" fill="none" class="[&_path]:transition-all [&_path]:duration-300 group-hover/item:min-md:[&_path:not(.dot)]:fill-white group-hover:min-md:[&_path:not(.dot)]:fill-white">
                                                        <g clip-path="url(#clip0_1355_12784)">
                                                            <path d="M14.9125 7.89648C10.2016 7.89648 6.38135 11.7286 6.38135 16.4587C6.38135 21.1888 10.2016 25.021 14.9125 25.021C19.6234 25.021 23.4436 21.1868 23.4436 16.4587C23.4436 11.7306 19.6254 7.89648 14.9125 7.89648ZM14.9125 22.2497C11.7316 22.2497 9.14258 19.6512 9.14258 16.4587C9.14258 13.2663 11.7296 10.6678 14.9125 10.6678C18.0953 10.6678 20.6824 13.2663 20.6824 16.4587C20.6824 19.6512 18.0933 22.2497 14.9125 22.2497Z" fill="#7B207F"/>
                                                            <path d="M14.9124 18.509C14.3503 18.509 13.8633 18.3084 13.4655 17.9071C13.0676 17.5078 12.8657 17.0191 12.8657 16.4529C12.8657 15.8867 13.0676 15.4 13.4655 15.0047C13.8633 14.6093 14.3503 14.4087 14.9124 14.4087C15.4745 14.4087 15.9595 14.6093 16.3593 15.0047C16.7572 15.4 16.9591 15.8887 16.9591 16.4529C16.9591 17.0171 16.7572 17.5078 16.3593 17.9071C15.9615 18.3064 15.4745 18.509 14.9124 18.509Z" fill="#F28C00" class="dot"/>
                                                            <path d="M13.8692 6.02298C13.6831 6.02298 13.5327 5.872 13.5327 5.68526V1.31673C13.5327 1.13197 13.6851 0.979004 13.8692 0.979004H15.9575C16.1435 0.979004 16.294 1.12999 16.294 1.31673V5.68725C16.294 5.87399 16.1435 6.02497 15.9575 6.02497H13.8692V6.02298Z" fill="#7B207F"/>
                                                            <path d="M8.8081 7.94424C8.64777 8.03761 8.44191 7.98198 8.34888 7.82107L6.17156 4.03659C6.07853 3.87568 6.13395 3.66907 6.29626 3.5757L8.10542 2.52678C8.26575 2.43341 8.4716 2.48903 8.56463 2.64995L10.742 6.43442C10.835 6.59533 10.7796 6.80194 10.6192 6.89531L8.81008 7.94225L8.8081 7.94424Z" fill="#7B207F"/>
                                                            <path d="M5.38562 12.1475C5.29259 12.3084 5.08673 12.366 4.9264 12.2707L1.15568 10.0854C0.995351 9.99203 0.939928 9.78542 1.03296 9.62252L2.07807 7.80875C2.1711 7.64784 2.37498 7.59221 2.53531 7.6836L6.30603 9.86886C6.46636 9.96223 6.52178 10.1708 6.42875 10.3297L5.38562 12.1455V12.1475Z" fill="#7B207F"/>
                                                            <path d="M35.2128 20.9683C35.1198 20.9683 35.0307 20.9285 34.9654 20.859L32.0142 17.6447V20.6305C32.0142 20.8173 31.8637 20.9683 31.6777 20.9683H29.5874C29.4014 20.9683 29.2529 20.8153 29.2529 20.6305V9.04866C29.2529 8.86192 29.4014 8.71094 29.5874 8.71094H31.6777C31.8637 8.71094 32.0142 8.86192 32.0142 9.04866V14.8356L34.5042 12.0484C34.5676 11.9769 34.6586 11.9352 34.7536 11.9352H37.3783C37.5109 11.9352 37.6316 12.0127 37.6851 12.1358C37.7385 12.257 37.7168 12.4001 37.6277 12.4994L34.2449 16.2739L38.0513 20.4001C38.1423 20.4974 38.1661 20.6405 38.1126 20.7636C38.0592 20.8868 37.9385 20.9663 37.8039 20.9663H35.2109L35.2128 20.9683Z" fill="#7B207F"/>
                                                            <path d="M47.8731 20.9678C47.6871 20.9678 47.5366 20.8149 47.5366 20.6301V12.2725C47.5366 12.0877 47.6871 11.9348 47.8731 11.9348H49.6664C49.8505 11.9348 50.0009 12.0857 50.0009 12.2725V12.2943C50.0821 12.2228 50.1652 12.1593 50.2523 12.0997C50.6264 11.8493 51.0461 11.7202 51.4954 11.7202C51.816 11.7202 52.1506 11.8037 52.491 11.9685C52.6454 12.044 52.7186 12.2248 52.6612 12.3877L52.01 14.1935C51.9783 14.2849 51.9071 14.3584 51.818 14.3922C51.7784 14.4081 51.7349 14.416 51.6933 14.416C51.6419 14.416 51.5904 14.4041 51.5429 14.3803C51.2856 14.2511 51.147 14.2313 51.0876 14.2313C51.0184 14.2313 50.8046 14.2313 50.5671 14.6584C50.4344 14.8948 50.2781 15.4709 50.2781 16.8417L50.286 17.243V20.6301C50.286 20.8169 50.1355 20.9678 49.9495 20.9678H47.8751H47.8731Z" fill="#7B207F"/>
                                                            <path d="M53.6588 20.9686C53.4727 20.9686 53.3223 20.8157 53.3223 20.6309V12.2733C53.3223 12.0885 53.4747 11.9355 53.6588 11.9355H55.749C55.9331 11.9355 56.0835 12.0865 56.0835 12.2733V20.6309C56.0835 20.8176 55.9331 20.9686 55.749 20.9686H53.6588Z" fill="#7B207F"/>
                                                            <path d="M58.603 24.0235C58.4862 24.0235 58.3813 23.9659 58.32 23.8665C58.2566 23.7712 58.2487 23.65 58.2982 23.5447L59.949 19.9986L56.8394 12.4039C56.7958 12.2986 56.8077 12.1814 56.871 12.086C56.9324 11.9926 57.0373 11.937 57.1501 11.937H59.2859C59.4225 11.937 59.5472 12.0204 59.5967 12.1456L61.4632 16.6711L63.5277 12.1337C63.5831 12.0125 63.7019 11.937 63.8345 11.937H65.9762C66.091 11.937 66.1979 11.9946 66.2593 12.094C66.3206 12.1913 66.3305 12.3105 66.281 12.4158L61.0654 23.8288C61.0119 23.948 60.8912 24.0255 60.7605 24.0255H58.603V24.0235Z" fill="#7B207F"/>
                                                            <path d="M76.1129 20.9678C75.9268 20.9678 75.7764 20.8149 75.7764 20.6301V12.2725C75.7764 12.0877 75.9268 11.9348 76.1129 11.9348H77.9042C78.0903 11.9348 78.2407 12.0857 78.2407 12.2725V12.2943C78.3199 12.2228 78.403 12.1593 78.4901 12.0997C78.8662 11.8493 79.2838 11.7202 79.7312 11.7202C80.0518 11.7202 80.3863 11.8037 80.7268 11.9685C80.8832 12.044 80.9564 12.2248 80.899 12.3877L80.2478 14.1935C80.2161 14.2849 80.1449 14.3584 80.0578 14.3922C80.0162 14.4081 79.9746 14.416 79.9331 14.416C79.8816 14.416 79.8301 14.4041 79.7826 14.3803C79.5233 14.2511 79.3868 14.2313 79.3294 14.2313C79.2581 14.2313 79.0443 14.2313 78.8068 14.6584C78.6742 14.8948 78.5178 15.4689 78.5178 16.8417L78.5257 17.243V20.6301C78.5257 20.8169 78.3753 20.9678 78.1892 20.9678H76.1148H76.1129Z" fill="#7B207F"/>
                                                            <path d="M54.704 11.5299C54.2804 11.5299 53.9142 11.3789 53.6173 11.079C53.3165 10.779 53.166 10.4115 53.166 9.98633C53.166 9.56119 53.3184 9.19566 53.6173 8.89767C53.9142 8.60167 54.2804 8.45068 54.704 8.45068C55.1276 8.45068 55.4898 8.60167 55.7907 8.89767C56.0896 9.19566 56.242 9.56119 56.242 9.98633C56.242 10.4115 56.0896 10.777 55.7907 11.079C55.4918 11.3789 55.1256 11.5299 54.704 11.5299Z" fill="#7B207F"/>
                                                            <path d="M70.4499 21.1848C69.0564 21.1848 67.9024 20.7339 67.0196 19.8439C66.1368 18.9559 65.6895 17.8295 65.6895 16.4984C65.6895 15.1674 66.1348 13.9894 67.0117 13.0875C67.8925 12.1816 69.0109 11.7227 70.3331 11.7227C71.7305 11.7227 72.8885 12.1816 73.7713 13.0855C74.6521 13.9894 75.0994 15.1932 75.0994 16.6594L75.0915 17.0666C75.0876 17.2514 74.9391 17.3964 74.755 17.3964H68.4725C68.5873 17.7262 68.7733 17.9963 69.0346 18.2169C69.3968 18.5188 69.8541 18.6638 70.432 18.6638C71.1268 18.6638 71.7088 18.4274 72.2095 17.9387C72.2729 17.8752 72.358 17.8434 72.4431 17.8434C72.4926 17.8434 72.5421 17.8533 72.5876 17.8752L74.3473 18.7056C74.4383 18.7473 74.5036 18.8287 74.5294 18.9241C74.5551 19.0214 74.5373 19.1247 74.4799 19.2062C74.0108 19.8757 73.4367 20.3783 72.7756 20.7021C72.1205 21.0219 71.3386 21.1868 70.4479 21.1868L70.4499 21.1848ZM72.1541 15.5012C72.0235 15.1714 71.8453 14.8814 71.6256 14.635C71.2515 14.2198 70.8279 14.0172 70.3271 14.0172C69.7828 14.0172 69.3177 14.2456 68.9119 14.7185C68.7634 14.8873 68.617 15.1495 68.4764 15.5012H72.1541Z" fill="#7B207F"/>
                                                            <path d="M88.844 20.9684C88.658 20.9684 88.5095 20.8174 88.5095 20.6307V16.9714C88.5095 15.7714 88.4422 15.2768 88.3868 15.0722C88.3175 14.8159 88.2047 14.6311 88.0424 14.504C87.8781 14.3788 87.6782 14.3173 87.4268 14.3173C87.0883 14.3173 86.8092 14.4265 86.5677 14.651C86.3144 14.8874 86.1362 15.2271 86.0353 15.6582C85.9977 15.8191 85.9522 16.2323 85.9522 17.2753V20.6287C85.9522 20.8154 85.7997 20.9664 85.6157 20.9664H83.5274C83.3414 20.9664 83.1909 20.8154 83.1909 20.6287V12.2711C83.1909 12.0843 83.3414 11.9333 83.5274 11.9333H85.6157C85.8017 11.9333 85.9522 12.0843 85.9522 12.2711V12.4419C86.2411 12.2393 86.5143 12.0843 86.7756 11.977C87.1992 11.8062 87.6386 11.7168 88.0839 11.7168C88.9984 11.7168 89.7842 12.0446 90.4236 12.6843C90.9719 13.2405 91.247 14.055 91.247 15.104V20.6267C91.247 20.8134 91.0966 20.9644 90.9125 20.9644H88.844V20.9684Z" fill="#7B207F"/>
                                                            <path d="M101.811 20.9683C101.625 20.9683 101.475 20.8173 101.475 20.6306V9.04671C101.475 8.85997 101.625 8.70898 101.811 8.70898H103.899C104.085 8.70898 104.236 8.85997 104.236 9.04671V11.9392H105.138C105.325 11.9392 105.475 12.0902 105.475 12.2769V13.8662C105.475 14.0529 105.323 14.2039 105.138 14.2039H104.236V20.6306C104.236 20.8173 104.083 20.9683 103.899 20.9683H101.811Z" fill="#7B207F"/>
                                                            <path d="M96.4152 21.1844C95.0217 21.1844 93.8677 20.7334 92.9869 19.8434C92.1041 18.9554 91.6567 17.829 91.6567 16.5C91.6567 15.1709 92.1021 13.9909 92.9809 13.087C93.8618 12.1831 94.9781 11.7202 96.3004 11.7202C97.6998 11.7202 98.8557 12.1791 99.7405 13.087C100.621 13.9909 101.069 15.1928 101.069 16.6609L101.061 17.0662C101.057 17.2489 100.908 17.3979 100.724 17.3979H94.4437C94.5565 17.7257 94.7446 17.9979 95.0058 18.2164C95.3661 18.5184 95.8233 18.6654 96.4013 18.6654C97.0981 18.6654 97.68 18.429 98.1808 17.9403C98.2441 17.8767 98.3292 17.8449 98.4143 17.8449C98.4638 17.8449 98.5133 17.8548 98.5588 17.8767L100.319 18.7091C100.41 18.7508 100.475 18.8322 100.501 18.9276C100.526 19.0249 100.507 19.1263 100.451 19.2097C99.98 19.8792 99.408 20.3798 98.7469 20.7056C98.0917 21.0255 97.3079 21.1884 96.4171 21.1884L96.4152 21.1844ZM98.1254 15.5027C97.9927 15.1709 97.8166 14.8829 97.5969 14.6346C97.2228 14.2194 96.7992 14.0167 96.2984 14.0167C95.7521 14.0167 95.2889 14.2452 94.8811 14.718C94.7307 14.8888 94.5882 15.1511 94.4457 15.5027H98.1234H98.1254Z" fill="#7B207F"/>
                                                            <path d="M80.8573 21.1847C80.4357 21.1847 80.0695 21.0337 79.7706 20.7337C79.4717 20.4338 79.3193 20.0662 79.3193 19.6411C79.3193 19.216 79.4717 18.8485 79.7706 18.5525C80.0695 18.2565 80.4357 18.1055 80.8573 18.1055C81.2789 18.1055 81.6451 18.2565 81.944 18.5525C82.2429 18.8485 82.3953 19.216 82.3953 19.6411C82.3953 20.0662 82.2429 20.4318 81.944 20.7337C81.6431 21.0337 81.2769 21.1847 80.8553 21.1847H80.8573Z" fill="#7B207F"/>
                                                            <path d="M41.5786 21.1848C40.4127 21.1848 39.3914 20.7259 38.5422 19.822C37.701 18.9221 37.2734 17.7937 37.2734 16.4686C37.2734 15.1436 37.6871 13.9536 38.5007 13.0676C39.3241 12.1736 40.3375 11.7227 41.5152 11.7227C42.0596 11.7227 42.5762 11.8279 43.0552 12.0326C43.3145 12.1458 43.5619 12.2869 43.8014 12.4597V12.2729C43.8014 12.0882 43.9519 11.9352 44.1379 11.9352H46.2262C46.4122 11.9352 46.5627 12.0862 46.5627 12.2729V20.6306C46.5627 20.8173 46.4122 20.9683 46.2262 20.9683H44.1379C43.9519 20.9683 43.8014 20.8153 43.8014 20.6306V20.4677C43.5481 20.6485 43.2947 20.7935 43.0414 20.9008C42.5901 21.0895 42.0992 21.1848 41.5786 21.1848ZM41.9626 18.5109C42.5247 18.5109 43.0117 18.3102 43.4095 17.9089C43.8074 17.5096 44.0093 17.0209 44.0093 16.4547C44.0093 15.8886 43.8074 15.4018 43.4095 15.0065C43.0097 14.6112 42.5247 14.4105 41.9626 14.4105C41.4004 14.4105 40.9135 14.6112 40.5157 15.0065C40.1178 15.4018 39.9159 15.8905 39.9159 16.4547C39.9159 17.0189 40.1178 17.5096 40.5157 17.9089C40.9135 18.3082 41.4004 18.5109 41.9626 18.5109Z" fill="#7B207F"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1355_12784">
                                                                <rect width="104.49" height="24.0418" fill="#7B207F" transform="translate(0.987305 0.979004)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="right flex items-center justify-center z-2 bg-[#5E1761] py-[22px] border border-solid border-transparent transition-all duration-300 opacity-0 w-0 group-hover:min-md:w-[56px] group-hover:min-md:px-[24px] group-hover:min-md:border-[#5E1761] group-hover:min-md:opacity-100 h-[58px]">
                                                    <i class="icon-angle-right text-[12px] leading-none text-white"></i>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection