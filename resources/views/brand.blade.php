@extends('layouts.main')

@section('content')
   <?php $pageTitle = $brand->title; 
        $breadcrumbImage = "corporate-breadcrumb.jpg";
        $breadcrumbVideo = "breadcrumb-video.mp4";
        $pageLink = "page-corporate.php";
        $imageOrVideo = "image";
    ?> 

<main class="main-field header-space">
    @include('partials.breadcrumb')
    <section class="content mt-[130px] xl:mt-[100px] mb:mt-[70px] sm:mt-[50px]">
        <section class="sector-detail relative mb-[150px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px]">
            <img src="../assets/image/static/vectorel-sector.svg" alt="Vektör" width="670" height="588" class="pointer-events-none absolute top-1/2 -translate-y-1/2 right-0 ">
            <div class="container max-w-[1650px]">
                <div class="flex flex-wrap items-center">
                    <div class="w-2/5 md:w-full md:!pr-0">
                        <div class="image-wrapper reveal w-full h-[650px] md:h-[580px] sm:h-[320px] relative">
                            <img src="../assets/image/general/mega-menu-image.jpg" alt="Sektör Detay" width="1045" height="539" class="w-full h-full object-cover relative z-2">
                            <div class="bg-primary-main absolute -top-[38px] sm:-top-[20px] -right-[38px] sm:-right-[20px] w-[421px] sm:w-[320px] aspect-square"></div>
                        </div>
                    </div>
                    <div class="w-3/5 md:w-full pl-[178px] 2xl:pl-[89px] xl:pl-[50px] md:p-0 md:mt-[30px] [@media(min-width:1760px)]:translate-x-[-20px]">
                        <div class="flex flex-col text-editor reveal">
                            <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[5px]">Bizi Tanıyın</span>
                            <h1 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[80px] 2xl:mb-[50px] md:mb-[30px] xs:mb-[20px]">
                                <?=$brand->title_1?>
                            </h1>
                            <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph mb-[60px] xl:mb-[40px] md:mb-[30px]">
                                <?= $brand->description; ?>
                            </p>
                            <a href="<?=$brand->url?>" target="_blank" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full" id="website-button">
                                <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 relative sm:w-full before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2">Websitesine Git</span>
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2">Websitesine Git</span>
                                </div>
                                <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-[9px] group-hover:min-md:opacity-100"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 translate-x-[-9px]"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
                                    <!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all w-0 whitespace-nowrap"></i>-->
                                    <!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all "></i>-->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <section class="career-slider-area overflow-hidden md:bg-secondary-main mb-[180px] xl:mb-[120px] lg:mb-[90px] md:mb-[60px] relative">
            <div class="max-w-[1920px] mx-auto relative overflow-hidden">
                <div class="container max-w-[1800px]">
                    <div class="bg-primary-main absolute -z-[1] -bottom-[90px] xl:-bottom-[60px] lg:-bottom-[20px] -right-0 max-w-[440px] [@media(max-width:1780px)_and_(min-width:1441px)]:max-w-[400px] xl:max-w-[360px] w-full h-[426px] md:hidden"></div>
                    <div class="wrapper min-sm:overflow-hidden bg-secondary-main md:bg-transparent p-[50px] pl-[105px] xl:pl-[80px] lg:pl-[30px] lg:p-[30px] sm:p-[20px_0] relative">
                        <img src="../assets/image/static/vectorel-2.svg" alt="Vektör" width="610" height="535" class="reveal max-w-[610px] xl:max-w-[500px] sm:max-w-full sm:w-full h-auto absolute z-2 pointer-events-none left-1/2 top-1/2 sm:top-[30px] -translate-x-1/2 min-sm:-translate-y-1/2">
                        <div class="sector-slider reveal overflow-hidden relative z-4">
                            <div class="swiper-wrapper">
                                <?php foreach ($slider1 as $key => $item) { ?>
                                    <div class="swiper-slide overflow-hidden" data-slide-name="<?= $item->title ?>" data-slide-id="<?= $key + 1 ?>">
                                        <div class="item w-full grid grid-cols-2 sm:grid-cols-1 items-end gap-[200px] 2xl:gap-[160px] xl:gap-[100px] lg:gap-[60px] md:gap-[30px]">
                                            <div class="left mb-[90px] 2xl:mb-[60px] xl:mb-[45px] lg:mb-[30px] md:mb-0">
                                                <span class="block mb-[50px] md:mb-[30px] text-[16px] leading-[32px] font-light text-white opacity-65 tracking-[7.2px]"><?= $item->title_1 ?></span>
                                                <div class="flex flex-col gap-[30px] sm:gap-[20px] text-editor">
                                                    <h3 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white [&_span]:font-bold"><?= $item->title ?></h3>
                                                    <p class="text-[17px] md:text-[16px] sm:text-[15px] leading-[32px] sm:leading-[28px] font-light text-white mb-[20px] sm:mb-[5px]"><?= $item->description ?></p>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="image-wrapper w-full h-[500px]  xl:h-[450px] sm:h-[320px]  xsm:mt-[40px]">
                                                    <img src="<?= env('HTTP_DOMAIN').'/'.getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()).'/'. $item->image ?>" alt="<?= $item->title ?>" width="745" height="535" class="w-full h-full object-cover" data-swiper-parallax="50%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-navigation flex items-end gap-[112px] pt-[40px] xsm:pt-[20px] xs:pt-0 pb-[20px] md:pb-[40px] lg:gap-[50px] pl-[95px] 2xl:pl-[45px] xl:pl-0 pr-[85px] xl:pr-0 relative z-5 xsm:absolute xsm:bottom-[370px] xs:bottom-[360px] xsm:w-[calc(100%-60px)] xsm:p-0">
                        <div class="reveal sector-pagination flex items-center gap-[30px] xl:gap-[20px] xsm:gap-[15px] xs:gap-[10px] [&_.swiper-pagination-bullet]:!max-w-[234px] xsm:hidden"></div>
                        <div class="reveal nav-buttons pb-[5px] flex items-center gap-[30px] sm:hidden">
                            <div class="sector-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                                <span class="text-[16px] leading-[32px] text-white md:hidden"><?=getStaticText(2)?></span>
                            </div>

                            <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                            <div class="sector-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.sector-disabled]:opacity-65 relative [&.sector-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                <span class="text-[16px] leading-[32px] text-white md:hidden"><?=getStaticText(3)?></span>
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

        <section class="products overflow-hidden relative pb-[200px] 2xl:pb-[150px] xl:pb-[120px] lg:pb-[90px] md:pb-[60px] pt-[150px] 2xl:pt-[120px] xl:pt-[90px] lg:pt-[60px] after:absolute after:z-2 after:pointer-events-none after:right-0 after:bottom-[250px] 2xl:after:bottom-[200px] xl:after:bottom-[160px] md:after:bottom-[100px] xs:after:hidden after:w-[192px] after:h-[450px] after:bg-[linear-gradient(270deg,_#FBFAF6_0%,_rgba(251,250,246,0.00)_100%)]">
            <div class="container max-w-[1650px]">
                <div class="flex flex-wrap items-center">
                    <div class="w-3/5 md:w-full pr-[120px] 2xl:pr-[90px] xl:pr-[60px] md:p-0 relative z-10 md:my-[30px]" id="product-slide-area">
                        <div class="image-wrapper w-full h-[800px] 2xl:h-[700px] md:h-[580px] sm:h-[320px] relative">
                            <div class="w-full reveal h-full bg-[#FBFAF6] p-[50px] sm:pt-[20px] sm:pb-[80px] relative z-2 shadow-[0px_4px_100px_0px_rgba(0,0,0,0.10)]">
                                <div class="product-image-slider overflow-hidden">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($slider2 as $item) { ?>
                                            <div class="swiper-slide" data-link="<?= $item->url ?>">
                                                <div class="item w-full h-full">
                                                    <img src="<?= env('HTTP_DOMAIN').'/'.getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()).'/'. $item->image ?>" alt="Ürün" width="814" height="696" class="w-full h-full object-contain">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="reveal bg-primary-main absolute -bottom-[60px] sm:-bottom-[50px] -left-[60px] sm:-left-[50px] w-[421px] sm:w-[320px] aspect-square"></div>
                            <div class="reveal nav-buttons w-full flex items-center gap-[30px] pt-[12px] pl-[135px] 2xl:pl-[100px] xl:pl-[70px] sm:pl-[30px] relative z-2">
                                <div class="product-prev cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.product-disabled]:opacity-65 relative [&.product-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                    <i class="icon-angle-left text-[12px] leading-none text-white"></i>
                                    <span class="text-[16px] leading-[32px] text-white"><?=getStaticText(2)?></span>
                                </div>

                                <div class="separator w-[1px] h-[22px] bg-white/20"></div>

                                <div class="product-next cursor-pointer flex items-center gap-[9px] transition-all duration-300 [&.product-disabled]:opacity-65 relative [&.product-disabled]:after:hidden after:absolute after:bottom-0 after:right-0 after:w-0 after:h-[1px] after:bg-white after:transition-all after:duration-300 hover:after:right-auto hover:after:left-0 hover:after:w-full">
                                    <span class="text-[16px] leading-[32px] text-white"><?=getStaticText(3)?></span>
                                    <i class="icon-angle-right text-[12px] leading-none text-white "></i>
                                </div>
                            </div>

                            <a href="#" target="_blank" class="reveal flex items-center justify-center absolute right-[30px] bottom-[30px] w-max overflow-hidden main-button group" id="link-button">
                                <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-300 group-hover:min-md:duration-600 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2">Ürünü İncele</span>
                                    <span class="text-[16px] leading-none font-medium text-primary-main transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2">Ürünü İncele</span>
                                </div>
                                <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-300 group-hover:min-md:duration-600 translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-[9px] group-hover:min-md:opacity-100"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-[18px] w-auto transition-all duration-600 group-hover:min-md:duration-300 group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 translate-x-[-9px]"><path d="M304 24c0 13.3 10.7 24 24 24H430.1L207 271c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l223-223V184c0 13.3 10.7 24 24 24s24-10.7 24-24V24c0-13.3-10.7-24-24-24H328c-13.3 0-24 10.7-24 24zM72 32C32.2 32 0 64.2 0 104V440c0 39.8 32.2 72 72 72H408c39.8 0 72-32.2 72-72V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V440c0 13.3-10.7 24-24 24H72c-13.3 0-24-10.7-24-24V104c0-13.3 10.7-24 24-24H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H72z" fill="white"/></svg>
<!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all w-0 whitespace-nowrap"></i>-->
<!--                                    <i class="icon-globe text-[18px] leading-none text-white transition-all "></i>-->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="w-2/5 md:w-full md:p-0 md:mt-[50px]">
                        <div class="flex flex-col reveal">
                            <div class="product-top-slider overflow-hidden">
                                <div class="swiper-wrapper">
                                    <?php foreach ($slider2 as $item) { ?>
                                        <div class="swiper-slide" data-link="<?= $item->url ?>">
                                            <div class="text-editor w-full">
                                                <span class="text-[16px] leading-[32px] font-light text-paragraph opacity-65 tracking-[7.2px] block mb-[30px] lg:mb-[15px]">En İyi Kalite</span>
                                                <h2 class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-secondary-main mb-[30px]">
                                                    <?=$brand->title?> <span class="font-bold">Ürünlerimiz</span>
                                                </h2>
                                                <p class="text-[18px] lg:text-[16px] leading-[32px] font-light text-paragraph">
                                                    <?= $item->description ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="product-slider pt-[80px] pb-[60px] sm:py-[50px] relative xs:hidden" id="product-slider">
                                <div class="swiper-wrapper [&_.swiper-slide-next_+_.swiper-slide]:min-xs:opacity-100">
                                    <?php foreach ($slider2 as $item) { ?>
                                        <div class="swiper-slide group opacity-0 md:opacity-100 [&.swiper-slide-prev]:min-xs:!opacity-0 [&.swiper-slide-active]:min-xs:opacity-100 [&.swiper-slide-next]:min-xs:opacity-100 [&.swiper-slide-visible]:min-xs:opacity-100 transition-all duration-300" data-link="<?= $item->url ?>">
                                            <div class="item w-full flex flex-col border border-solid border-black/16 bg-[#FBFAF6] transition-all duration-500 group-[&.swiper-slide-active]:border-primary-main group-[&.swiper-slide-active]:shadow-[0px_25px_50px_0px_rgba(0,0,0,0.20)]">
                                                <div class="image-wrapper p-[25px] rounded-[10px] w-full h-[250px] overflow-hidden mb-[20px] transition-all duration-500 opacity-65 group-[&.swiper-slide-active]:opacity-100">
                                                    <img src="<?= env('HTTP_DOMAIN').'/'.getFolder(['uploads_folder','brand_images_folder'], app()->getLocale()).'/'. $item->image ?>" alt="<?= $item->alt ?>" class="w-full h-full object-contain" width="225" height="142" data-image="<?= $item->image ?>">
                                                </div>
                                                <div class="flex flex-col gap-[20px] px-[40px] lg:px-[20px] pb-[45px] lg:pb-[25px]">
                                                    <span class="text-[16px] leading-none font-light tracking-[1.6px] text-paragraph/65 transition-all duration-500"><?= $item->category ?></span>
                                                    <h3 class="text-[22px] md:text-[20px] leading-none font-medium tracking-[-0.22px] text-paragraph group-[&.swiper-slide-active]:text-secondary-main transition-all duration-300"><?= $item->title ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="right-linear xs:hidden pointer-events-none absolute right-0 min-2xl:translate-x-[calc(calc(100vw-1650px)/2+30px)] min-xl:translate-x-[calc(calc(100vw-1440px)/2+30px)] min-lg:translate-x-[calc(calc(100vw-1280px)/2+30px)] min-md:translate-x-[calc(calc(100vw-1024px)/2+30px)] md:right-[-30px] top-0 w-[200px] h-full z-2 [background:linear-gradient(270deg,_#FBFAF6_0%,_rgba(251,250,246,0.00)_100%)]"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php //include 'layout/gallery-section.php'; ?>

        <section class="contact mt-[200px] 2xl:mt-[150px] xl:mt-[120px] lg:mt-[90px] md:mt-[60px] mb-[120px] 2xl:mb-[90px] xl:mb-[60px] md:mb-[50px]">
            <?php //include 'layout/contact-form.php'; ?>
        </section>
    </section>

</main>

@endsection