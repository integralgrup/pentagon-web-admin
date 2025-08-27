@extends('layouts.main')

@section('content')
<main class="main-field home-page">
    <section class="homepage-carousel-field mb-[140px] xl:mb-[110px] lg:mb-[80px]">
        <div class="main-slider h-full overflow-hidden">
            <div class="swiper-wrapper">
                <?php
                    foreach ($sliders as $key => $item) { ?>
                        <div class="swiper-slide isolate overflow-hidden" data-slide-name="<?= $item->slide_title ?>">
                            <div class="item relative w-full h-full">
                                <div class="image-wrapper w-full h-full pointer-events-none relative" data-swiper-parallax="50%">
                                    <div class="slider-image z-2 w-full h-full">
                                        <img src="<?= env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder','images_folder'], app()->getLocale()) .'/'. $item->image ?>" alt="<?=$item->alt?>" width="1920" height="968" class="w-full h-full object-cover">
                                    </div>
                                    <img src="{{ asset('assets') }}/image/static/slider-overlay.png" alt="Slider Overlay" width="1920" height="968" class="absolute left-0 top-0 w-full h-full object-cover z-3 sm:hidden">
                                    <div class="overlay min-sm:hidden absolute left-0 top-0 w-full h-full z-3 bg-white/80"></div>
                                    <div class="overlays hidden">
                                        <div class="overlay-1 absolute left-0 bottom-0 w-full h-[48px] z-3 [background:linear-gradient(180deg,_#FBFAF6_0.38%,_rgba(251,250,246,0.15)_29.8%,_rgba(251,250,246,0.00)_62.07%)]"></div>
                                        <div class="overlay-2 absolute left-0 top-0 w-full h-full z-4 [background:linear-gradient(156deg,_#FFF_1.74%,_rgba(255,255,255,0.00)_29.3%)]"></div>
                                        <div class="overlay-3 absolute left-0 top-0 w-full h-full z-5 [background:radial-gradient(115.89%_108.39%_at_49.35%_-28.77%,_#FCFBF7_0.38%,_rgba(252,251,247,0.00)_35%)]"></div>
                                        <div class="overlay-4 absolute left-0 top-0 w-full h-full z-6 [background:linear-gradient(188deg,_#FBFAF6_11.42%,_rgba(251,250,246,0.81)_31.08%,_rgba(251,250,246,0.68)_37.96%,_rgba(251,250,246,0.00)_65.46%)]"></div>
                                        <div class="overlay-5 absolute left-0 top-0 w-full h-full z-7 opacity-30 [background:linear-gradient(180deg,_rgba(255,255,255,0.00)_0%,_#D9D9D9_100%)]"></div>
                                    </div>
                                </div>
                                <div class="content absolute w-full h-full left-0 top-0 <?= $key == 0 ? 'reveal' : ''; ?>">
                                    <div class="container max-w-[1650px] h-full">
                                        <div class="wrapper h-full flex items-center">
                                            <div class="w-1/3 min-md:translate-y-[-50px] md:w-1/2 sm:w-full">
                                                <div class="flex flex-col text-editor">
                                                    <p class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[24px] sm:mb-[20px]"><?=$item->title?>
                                                        <span class="font-bold"><?=$item->title_1?></span></p>
                                                    <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[30px]"><?=$item->title_2?></p>
                                                    <a href="#" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full">
                                                        <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                                            <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2"><?= getStaticText(5) ?></span>
                                                            <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2"><?=$item->button_title?></span>
                                                        </div>
                                                        <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                                            <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                                            <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
            <div class="absolute left-0 bottom-[30px] z-2 w-full">
                <div class="container max-w-[1650px]">
                    <div class="reveal category-pagination flex items-center sm:justify-center gap-[30px] xl:gap-[20px] xs:gap-[10px]"></div>
                </div>
                <div class="reveal scroll-area absolute left-[calc(50%-25px)] md:left-[30px] sm:left-[calc(50%-25px)] bottom-0 md:bottom-[60px] xs:bottom-[30px] flex flex-col items-center gap-[9px] xs:hidden cursor-pointer scrollable-selector" data-scrollable-section="#about-us">
                    <p class="text-[10px] leading-none tracking-[2.5px] font-medium text-paragraph"><?=getStaticText(11)?></p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 15 24" fill="none">
                        <path d="M7.29937 1.22803H7.30024C10.9918 1.22803 13.9844 4.22062 13.9844 7.91217V15.8157C13.9844 19.5072 10.9918 22.4998 7.30024 22.4998H7.29937C3.60783 22.4998 0.615234 19.5072 0.615234 15.8157V7.91217C0.615234 4.22062 3.60783 1.22803 7.29937 1.22803Z" stroke="#333333"/>
                        <path d="M7.30002 1.16064H7.29916C3.57051 1.16064 0.547852 4.18331 0.547852 7.91195V15.8155C0.547852 19.5441 3.57051 22.5668 7.29916 22.5668H7.30002C11.0287 22.5668 14.0513 19.5441 14.0513 15.8155V7.91195C14.0513 4.18331 11.0287 1.16064 7.30002 1.16064Z" stroke="#333333"/>
                        <path d="M8.01757 5.75756C8.01757 5.36075 7.69588 5.03906 7.29907 5.03906C6.90225 5.03906 6.58057 5.36075 6.58057 5.75756V8.63156C6.58057 9.02838 6.90225 9.35007 7.29907 9.35007C7.69588 9.35007 8.01757 9.02838 8.01757 8.63156V5.75756Z" fill="#333333"  class="scroll-pointer animate-scrollPointer"/>
                    </svg>
                </div>
            </div>

        </div>
    </section>

    <section class="about-us relative mb-[150px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px]" id="about-us">
        <img src="{{ asset('assets')}}/image/static/vectorel.svg" alt="Vektör" width="387" height="588" class="pointer-events-none absolute top-1/2 -translate-y-1/2 right-0 ">
        <div class="container max-w-[1650px]">
            <div class="flex flex-wrap items-center">
                <div class="w-3/5 md:w-full translate-x-[-30px] [@media(max-width:1670px)]:pr-[50px] md:!pr-0">
                    <div class="image-wrapper reveal w-full h-[677px] md:h-[580px] sm:h-[320px] relative">
                        <img src="<?= env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder','images_folder'], app()->getLocale()) .'/'.$about->image ?>" alt="Hakkımızda" width="911" height="677" class="w-full h-full object-cover relative z-2">
                        <div class="bg-primary-main absolute -top-[38px] sm:-top-[20px] -right-[38px] sm:-right-[20px] w-[421px] sm:w-[320px] aspect-square"></div>
                    </div>
                </div>
                <div class="w-2/5 md:w-full md:p-0 md:mt-[30px] [@media(min-width:1760px)]:translate-x-[-20px]">
                    <div class="flex flex-col text-editor reveal">
                        <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[5px]"><?= getStaticText(1) ?></span>
                        <h1 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[80px] 2xl:mb-[50px] md:mb-[30px] xs:mb-[20px]">
                            <?=$about->title?>
                        </h1>
                        <p class="text-[22px] lg:text-[18px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.22px] text-paragraph mb-[30px] xs:mb-[20px]"><?=$about->title_1?></p>
                        <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[30px]">
                            <?=$about->description?>
                        </p>
                        <a href="#" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full">
                            <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2"><?= getStaticText(5) ?></span>
                                <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2"><?= getStaticText(5) ?></span>
                            </div>
                            <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sector-slider-area overflow-hidden md:bg-secondary-main mb-[150px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] relative">
        <div class="max-w-[1920px] w-full mx-auto relative overflow-hidden">
            <div class="container max-w-[1800px]">
                <div class="bg-primary-main absolute -z-[1] -bottom-[90px] xl:-bottom-[60px] lg:-bottom-[20px] -right-0 max-w-[440px] [@media(max-width:1780px)_and_(min-width:1441px)]:max-w-[400px] xl:max-w-[360px] w-full h-[426px] md:hidden"></div>
                <div class="wrapper min-sm:overflow-hidden bg-secondary-main md:bg-transparent p-[50px] pl-[105px] xl:pl-[80px] lg:pl-[30px] lg:p-[30px] sm:p-[20px_0] relative">
                    <img src="{{ asset('assets')}}/image/static/vectorel-2.svg" alt="Vektör" width="846" height="742" class="reveal min-sm:max-w-[846px] w-full h-auto absolute z-2 pointer-events-none left-1/2 top-1/2 sm:top-[30px] -translate-x-1/2 min-sm:-translate-y-1/2">
                    <div class="sector-slider reveal overflow-hidden relative z-4">
                        <div class="swiper-wrapper">
                            <?php foreach ($sectors as $key => $item) { ?>
                                <div class="swiper-slide overflow-hidden" data-slide-name="<?= $item->title ?>" data-slide-id="<?= $key ?>">
                                    <div class="item w-full grid grid-cols-2 sm:grid-cols-1 items-center gap-[200px] 2xl:gap-[160px] xl:gap-[100px] lg:gap-[60px] md:gap-[30px]">
                                        <div class="left">
                                            <span class="block mb-[50px] md:mb-[30px] text-[16px] leading-[32px] font-light text-white opacity-65 tracking-[7.2px]"><?= getStaticText(4) ?></span>
                                            <div class="flex flex-col gap-[30px] sm:gap-[20px] text-editor">
                                                <h2 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white [&_span]:font-bold"><?= $item->title ?></h2>
                                                <p class="text-[17px] md:text-[16px] sm:text-[15px] leading-[32px] sm:leading-[28px] font-light text-white mb-[20px] sm:mb-[5px]"><?= $item['description'] ?></p>
                                                <a href="<?= $item->seo_url ?>" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full">
                                                    <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                                        <span class="text-[16px] leading-none font-medium text-white transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2"><?= getStaticText(5) ?></span>
                                                        <span class="text-[16px] leading-none font-medium text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2"><?= getStaticText(5) ?></span>
                                                    </div>
                                                    <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                                        <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap"></i>
                                                        <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="image-wrapper w-full h-[500px]  xl:h-[450px] sm:h-[320px] xsm:mt-[40px]">
                                                <img src="<?= env('HTTP_DOMAIN') .'/'. getFolder(['uploads_folder','sector_images_folder'], app()->getLocale()) .'/'. $item->image ?>" alt="<?= $item->title ?>" width="745" height="802" class="w-full h-full object-cover" data-swiper-parallax="50%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="pagination-navigation flex items-end gap-[112px] pt-[40px] xsm:pt-[20px] xs:pt-0 pb-[20px] md:pb-[40px] lg:gap-[50px] pl-[95px] 2xl:pl-[45px] xl:pl-0 pr-[85px] xl:pr-0 relative z-5 xsm:absolute xsm:bottom-[370px] xs:bottom-[360px] xsm:w-[calc(100%-60px)] xsm:p-0">
                    <div class="sector-pagination reveal flex items-center gap-[30px] xl:gap-[20px] xsm:gap-[15px] xs:gap-[10px] xsm:hidden"></div>
                    <div class="nav-buttons reveal pb-[5px] flex items-center gap-[30px] sm:hidden">
                        <div class="sector-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                            <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                            <span class="text-[16px] leading-[32px] text-white md:hidden"><?= getStaticText(2) ?></span>
                        </div>

                        <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                        <div class="sector-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                            <span class="text-[16px] leading-[32px] text-white md:hidden"><?= getStaticText(3) ?></span>
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

    <section class="brands relative mb-[200px] 2xl:mb-[150px] xl:mb-[120px]">
        <div class="container max-w-[1650px]">
            <div class="flex flex-wrap items-center">
                <div class="w-3/5 md:w-full pr-[77px] md:mt-[15px] md:p-0 md:order-2">
                    <div class="image-wrapper reveal w-full sm:h-auto relative flex flex-col sm:flex-col-reverse" id="brand-logo-image-area">
                        <img src="{{ asset('assets') }}/image/general/brand-image.jpg" alt="Markamız" width="814" height="696" class=" w-full h-[700px] md:h-[580px] sm:h-[320px] object-cover relative z-2 transition-all duration-450 [&.changed]:opacity-0 [&.changed]:translate-y-[5px]" id="brand-image">
                        <div class="bg-primary-main absolute min-sm:-bottom-[10px] sm:-top-[20px] -left-[60px] sm:-left-[50px] w-[421px] sm:w-[320px] aspect-square"></div>
                        <div class="reveal nav-buttons w-full flex items-center gap-[30px] pt-[12px] sm:pt-0 sm:pb-[12px] pl-[135px] 2xl:pl-[100px] xl:pl-[70px] sm:pl-[30px] relative z-2">
                            <div class="brand-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.brand-disabled]:opacity-65 relative [&.brand-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                                <span class="text-[16px] leading-[32px] text-white"><?= getStaticText(2) ?></span>
                            </div>

                            <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                            <div class="brand-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.brand-disabled]:opacity-65 relative [&.brand-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <span class="text-[16px] leading-[32px] text-white"><?= getStaticText(3) ?></span>
                                <i class="icon-angle-right text-[12px] leading-none text-white "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-2/5 md:w-full md:p-0  md:order-1" id="logo-area">
                    <div class="flex flex-col reveal">
                        
                        <div class="brand-slider-top reveal overflow-hidden order-1">
                            <div class="swiper-wrapper">
                                <?php foreach ($brands as $item) { ?>
                                    <div class="swiper-slide">
                                        <div class="img hidden" data-image="<?= env('HTTP_DOMAIN').'/'. getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()) . '/' . $item->image ?>"></div>
                                        <div class="text-editor">
                                            <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[15px]"><?= getStaticText(6) ?></span>
                                            <h2 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main">
                                                <?=$item->title?>
                                            </h2>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="brand-slider my-[40px] md:my-[20px] reveal overflow-hidden order-2 md:order-3 relative before:xs:hidden after:xs:hidden before:absolute before:left-0 before:top-0 before:w-[125px] before:h-full before:z-2 before:[background:linear-gradient(90deg,_#FBFAF6_16.53%,_rgba(247,_249,_249,_0.00)_100%)] after:absolute after:right-0 after:top-0 after:w-[125px] after:h-full after:z-2 after:[background:linear-gradient(270deg,_#FBFAF6_16.53%,_rgba(247,_249,_249,_0.00)_100%)]">
                            <div class="swiper-wrapper">
                                <?php foreach ($brands as $item) { ?>
                                    <div class="swiper-slide group">
                                        <div class="img hidden" data-image="<?= env('HTTP_DOMAIN').'/'. getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()) . '/' . $item->bg_image ?>"></div>
                                        <div class="logo grayscale flex items-center justify-center h-[80px] opacity-50 transition-all duration-300 scale-90 group-[&.swiper-slide-active]:grayscale-0 group-[&.swiper-slide-active]:opacity-100 group-[&.swiper-slide-active]:scale-100">
                                            <img src="<?= env('HTTP_DOMAIN').'/'. getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()) . '/' . $item->image ?>" alt="Group Logo" width="176" height="40" class="group-[&.swiper-slide-active]:w-full group-[&.swiper-slide-active]:h-full w-5/6 h-5/6 object-contain transition-all duration-450 group-[&.swiper-slide-active]:xs:w-3/4 group-[&.swiper-slide-active]:xs:h-3/4">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="brand-slider-bottom overflow-hidden order-3 md:order-2 reveal">
                            <div class="swiper-wrapper">
                                <?php foreach ($brands as $item) { ?>
                                    <div class="swiper-slide">
                                        <div class="img hidden" data-image="<?= $item['image'] ?>"></div>
                                        <div class="text-editor order-3 md:order-2 md:mt-[20px]">
                                            <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[20px]">
                                                <?=$item->description?>
                                            </p>
                                        </div>
                                        <a href="<?= $item['website'] ?>" target="_blank" class="order-4 flex items-center justify-center relative w-max overflow-hidden main-button group/button sm:w-full" id="website-button">
                                            <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover/button:before:min-md:w-full group-hover/button:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                                <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover/button:min-md:duration-600 group-hover/button:min-md:text-white translate-x-[-100px] opacity-0 group-hover/button:min-md:translate-x-0 group-hover/button:min-md:opacity-100 w-0 whitespace-nowrap relative z-2"><?= getStaticText(7) ?></span>
                                                <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover/button:min-md:duration-300 group-hover/button:min-md:text-white group-hover/button:min-md:translate-x-[100px] group-hover/button:min-md:opacity-0 relative z-2"><?= getStaticText(7) ?></span>
                                            </div>
                                            <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-300 group-hover/button:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover/button:min-md:translate-x-[9px] group-hover/button:min-md:opacity-100"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-600 group-hover/button:min-md:duration-300 group-hover/button:min-md:translate-x-[100px] group-hover/button:min-md:opacity-0 translate-x-[-9px]"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
                                                <!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all w-0 whitespace-nowrap"></i>-->
                                                <!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all "></i>-->
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog [background:_linear-gradient(180deg,_#F4F3EE_0%,_rgba(244,_243,_238,_0.00)_55.23%)] py-[130px] 2xl:py-[100px] xl:py-[80px] lg:py-[60px]">
        <div class="container max-w-[1650px]">
            <div class="wrapper w-full">
                <div class="reveal flex items-end justify-between gap-[24px] mb-[120px] 2xl:mb-[90px] xl:mb-[70px] lg:mb-[50px] md:mb-[30px]">
                    <h4 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main">
                        <?= getStaticText(8) ?>
                    </h4>

                    <a href="page-blog.php" class="text-[16px] leading-normal font-medium text-paragraph/65 tracking-[-0.16px] transition-all duration-300 px-[66px] py-[22px] border border-solid border-paragraph/16 hover:bg-secondary-main hover:border-secondary-main hover:text-white xsm:w-full xsm:text-center sm:py-[15px] md:hidden">
                        <?= getStaticText(9) ?>
                    </a>

                    <div class="nav-buttons hidden md:flex items-center justify-end gap-[30px]">
                        <div class="mobile-blog-prev project-nav-button cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.mobile-blog-disabled]:opacity-65 relative">
                            <i class="icon-angle-left text-[12px] leading-none text-primary-main"></i>
                            <span class="text-[16px] leading-[32px] text-primary-main sm:hidden"><?= getStaticText(2) ?></span>
                        </div>

                        <div class="separator w-[1px] h-[22px] bg-primary-main/20"></div>

                        <div class="mobile-blog-next project-nav-button cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.mobile-blog-disabled]:opacity-65 relative">
                            <span class="text-[16px] leading-[32px] text-primary-main sm:hidden"><?= getStaticText(3) ?></span>
                            <i class="icon-angle-right text-[12px] leading-none text-primary-main "></i>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-3/5 md:hidden md:mb-[30px]">
                        <div id="test" class="items flex flex-col">
                            <?php foreach ($blogs as $key => $item) { ?>
                                <a href="<?= $item->seo_url ?>" class="reveal blog-item item group transition-all duration-500 [&_>_div]:last:!border-0 py-[25px] md:py-[15px]" data-item-image="<?= env('HTTP_DOMAIN').'/'. getFolder(['uploads_folder','blog_images_folder'], app()->getLocale()) . '/' . $item->image ?>" data-blog-id="<?= $key + 1 ?>">
                                    <div class="flex gap-[50px] xl:gap-[30px] pb-[30px] border-0 !border-b border-solid border-black/10 transition-all duration-500">
                                        <span class="text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-paragraph group-hover:text-primary-main transition-all duration-450 [-webkit-text-stroke:2px_rgba(182,163,107,0)] group-hover:[-webkit-text-stroke:2px_rgba(182,163,107,1)]"><?= "0" . ($key + 1) ?></span>
                                        <div class="flex flex-col gap-[10px] min-md:transition-transform min-md:duration-450 group-hover:min-md:translate-y-[-20px]">
                                            <p class="text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] font-light text-paragraph transition-all duration-450 group-hover:text-secondary-main [-webkit-text-stroke:2px_rgba(8,51,85,0)] group-hover:[-webkit-text-stroke:2px_rgba(8,51,85,1)] line-clamp-1"><?= $item->title ?></p>
                                            <div class="description opacity-0 translate-y-[-5px] group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                                                <p class="description text-[18px] md:text-[16px] leading-[32px] font-light text-paragraph line-clamp-1 "><?= mb_substr($item->description, 0, 100) ?>...</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="hidden md:block w-full">
                        <div class="home-mobile-blog w-full">
                            <div class="home-mobile-blog-slider overflow-hidden">
                                <div class="swiper-wrapper">
                                    <?php foreach ($blogs as $key => $item): ?>
                                        <div class="swiper-slide">
                                            <div class="item w-full flex flex-col gap-[20px]">
                                                <div class="image-wrapper w-full h-[320px]">
                                                    <img src="<?= env('HTTP_DOMAIN').'/'. getFolder(['uploads_folder','blog_images_folder'], app()->getLocale()) . '/' . $item->image ?>" alt="Blog Resim" width="657" height="406" class="w-full h-full object-cover relative z-2">
                                                </div>
                                                <div class="blog-item item group flex">
                                                    <div class="flex flex-col gap-[10px]">
                                                        <a href="<?= $item->seo_url ?>" class="text-[20px] leading-[32px] text-paragraph transition-all duration-300 line-clamp-3"><?= $item->title ?></a>
                                                        <p class="description text-[16px] leading-[32px] font-light text-paragraph line-clamp-4"><?= mb_substr($item->description, 0, 100) ?>...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-2/5 md:hidden flex items-center justify-center relative reveal">
                        <div class="image-wrapper w-full h-[406px] xl:h-[370px] lg:h-[350px] sm:h-[300px] min-md:absolute min-md:left-0 min-md:top-1/2 min-md:-translate-y-1/2 transition-all duration-500 [&.changed]:opacity-0 [&.changed]:translate-y-[5px]" id="blog-image">
                            <img src="{{ asset('assets') }}/image/general/home-blog.jpg" alt="Blog Resim" width="657" height="406" class="w-full h-full object-cover relative z-2" id="item-image">
                            <div class="bg-primary-main absolute -bottom-[15px] -right-[15px] w-[269px] aspect-square"></div>
                        </div>
                    </div>
                </div>
                <a href="page-blog.php" class="text-[16px] leading-normal font-medium text-paragraph/65 tracking-[-0.16px] transition-all duration-300 px-[66px] py-[22px] border border-solid border-paragraph/16 sm:w-full sm:text-center sm:py-[15px] min-sm:hidden md:block sm:mt-[35px]">
                    <?= getStaticText(9) ?>
                </a>
            </div>
        </div>
    </section>
</main
@endsection