@extends('layouts.main')

@section('content')

<?php $pageTitle = 'İletişim'; $pageLink = "page-contact.php"; ?>

<main class="main-field contact-page">
    <section class="content">
        <div class="map-area w-full aspect-[16/6] sm:aspect-[5/4] relative">
            <div class="absolute pointer-events-none left-0 top-0 w-full h-full z-3 [background:radial-gradient(73.45%_54.34%_at_50%_54.34%,_rgba(251,250,246,0.00)_0%,_#FCFBF7_100%)] md:opacity-50"></div>
            <div class="absolute pointer-events-none left-0 top-0 w-full h-full z-4 bg-white mix-blend-darken"></div>
            <div id="map" class="reveal w-full h-full [&_.gm-style_iframe_+_div]:!border-0 [&_gmp-advanced-marker]:z-100"></div>
            <div class="absolute left-0 top-0 w-full h-full z-5 pointer-events-none" id="contact-breadcrumb">
                <div class="container h-full max-w-[1650px] flex justify-center pt-[100px] xl:pt-[60px] sm:pt-[10px] xs:pb-[20px]">
                    <div class="flex flex-col xs:justify-end text-center gap-[10px] [&_a]:text-[18px] [&_a]:leading-[32px] [&_a]:font-light [&_a]:text-secondary-main [&_a]:lg:text-[16px] [&_a]:pointer-events-auto [&_li]:flex [&_li]:items-center before:[&_li_+_li]:block before:[&_li_+_li]:content-['/'] before:[&_li_+_li]:px-[5px] before:[&_li_+_li]:text-secondary-main before:[&_li_+_li]:font-light before:[&_li_+_li]:text-[18px] before:[&_li_+_li]:lg:text-[16px] before:[&_li_+_li]:leading-[32px]">
                        <h1 class="reveal text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-bold text-secondary-main"><?= $pageTitle ?></h1>
                        <ul class="flex items-center justify-center">
                            <li class="reveal">
                                <a href="index.php">Ana Sayfa</a>
                            </li>
                            <li class="reveal">
                                <a href="<?= $pageLink ?>"><?= $pageTitle ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content locations-tab-area mt-[-160px] md:mt-0 relative z-3 overflow-hidden">
                <div class="ml-0 min-h-[290px] md:min-h-max bg-secondary-main pr-[170px] 2xl:pr-[140px] xl:pr-[100px] lg:pr-[75px] md:px-[15px] secondary-bg md:hidden"></div>

                <div class="location-info-container flex justify-end mt-[-152px] md:mt-0">
                    <div class="location-contents w-full mr-0 min-h-[180px] md:min-h-max bg-primary-main py-[80px] md:py-[40px] primary-bg md:hidden"></div>
                </div>

                <div class="absolute left-0 top-0 z-4 w-full h-full md:static overflow-hidden">
                    <div class="location-tabs container max-w-[1650px] flex flex-col gap-[130px] md:gap-0 md:relative min-md:before:hidden before:md:w-[calc(100%+60px)] before:md:absolute before:md:left-[-30px] before:md:top-0 before:md:h-full before:bg-secondary-main">
                        <div class="tabs flex items-center min-md:justify-center md:whitespace-nowrap md:overflow-x-scroll md:[scroll-snap-type:x_mandatory] md:pb-[40px] md:pt-[60px] mt-[40px] md:my-0 md:px-[15px] sm:px-0">
                            <?php $locations = ['Head Office','London, UK','Doha, Qatar','Moscow, RUSSIA','New York, USA'];
                            foreach ($locations as $key => $item): ?>
                                <div class="tab reveal md:snap-start cursor-pointer relative flex flex-col items-center justify-center group px-[50px] xl:px-[25px] last:pr-0 first:pl-0 last:!border-0 border-0 !border-r border-solid border-white/10 <?= $key == 0 ? 'active' : ''; ?>" data-tab-id="<?= $key ?>" data-id="<?= $key ?>">
                                    <p class="text-[26px] lg:text-[22px] md:text-[20px] leading-none font-medium tracking-[-0.26px] group-[&.active]:tracking-[-0.13px] text-white/50 transition-all duration-300 [-webkit-text-stroke:1px_rgba(182,163,107,0)] group-[&.active]:[-webkit-text-stroke:1px_rgba(182,163,107,1)] group-[&.active]:text-primary-main"><?= $item ?></p>
                                    <i class="icon-triangle-down leading-none text-primary-main transition-all duration-300 opacity-0 group-[&.active]:opacity-100 absolute bottom-[-35px]"></i>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="wrapper group/hand absolute right-[30px] top-[15px] z-20 ">
                            <div class="slider-hand group-hover/hand:opacity-0 duration-450 w-[25px] h-[25px] animate-run hidden md:block">
                              <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                  <g fill="rgb(255,255,255)">
                                    <g>
                                      <path d="m161.875 434.037c27.773 48.089 79.523 77.963 135.056 77.963 85.996 0 155.96-69.963 155.96-155.959v-122.11c0-21.904-17.82-39.724-39.724-39.724-8.722 0-16.796 2.825-23.355 7.609-4.461-17.056-20.003-29.678-38.438-29.678-9.223 0-17.723 3.16-24.472 8.454-5.57-15.218-20.197-26.109-37.321-26.109-8.159 0-15.753 2.474-22.069 6.709v-77.33c0-21.904-17.82-39.724-39.724-39.724s-39.724 17.82-39.724 39.724v210.602c0 2.708-1.586 5.195-4.042 6.337-3.309 1.539-7.176.316-9.001-2.842l-26.488-45.878c-7.663-13.272-20.035-22.767-34.839-26.734-14.806-3.967-30.267-1.931-43.539 5.732-5.105 2.947-8.758 7.707-10.284 13.402-1.525 5.695-.741 11.643 2.207 16.748zm-84.95-184.987c.176-.659.678-1.885 2.056-2.68 6.121-3.534 12.913-5.339 19.797-5.339 3.449 0 6.923.454 10.345 1.371 10.249 2.746 18.814 9.319 24.12 18.508l26.488 45.878c6.43 11.138 20.076 15.445 31.737 10.024 8.657-4.027 14.251-12.798 14.251-22.346v-210.604c0-12.169 9.9-22.069 22.069-22.069s22.069 9.9 22.069 22.069v163.31c0 4.875 3.952 8.828 8.828 8.828s8.828-3.952 8.828-8.828v-52.965c0-12.169 9.9-22.069 22.069-22.069s22.069 9.9 22.069 22.069v52.965c0 4.875 3.952 8.828 8.828 8.828 4.875 0 8.828-3.952 8.828-8.828v-35.31c0-12.169 9.9-22.069 22.069-22.069s22.069 9.9 22.069 22.069v39.724c0 4.875 3.952 8.828 8.828 8.828 4.875 0 8.828-3.952 8.828-8.828v-17.655c0-12.169 9.9-22.069 22.069-22.069s22.069 9.9 22.069 22.069v122.11c0 76.261-62.043 138.304-138.305 138.304-49.246 0-95.138-26.492-119.766-69.138l-99.803-172.808c-.795-1.377-.617-2.69-.44-3.349z"></path>
                                      <path d="m167.556 129.479c4.202-2.473 5.602-7.884 3.129-12.086-5.957-10.118-9.105-21.713-9.105-33.531 0-36.507 29.7-66.207 66.207-66.207s66.207 29.7 66.207 66.207c0 11.862-3.171 23.497-9.172 33.645-2.482 4.197-1.091 9.611 3.105 12.092 1.41.834 2.958 1.23 4.485 1.23 3.019 0 5.96-1.549 7.607-4.336 7.608-12.867 11.63-27.609 11.63-42.631 0-46.242-37.621-83.862-83.862-83.862s-83.862 37.62-83.862 83.862c0 14.965 3.992 29.657 11.546 42.488 2.472 4.2 7.881 5.604 12.085 3.129z"></path>
                                    </g>
                                    <path d="m338.132 92.69h66.965l-26.862 26.862c-3.447 3.447-3.447 9.036 0 12.484 1.724 1.724 3.983 2.586 6.242 2.586s4.518-.862 6.242-2.586l41.931-41.931c3.447-3.447 3.447-9.036 0-12.484l-41.931-41.931c-3.448-3.447-9.036-3.447-12.485 0-3.447 3.447-3.447 9.036 0 12.484l26.862 26.862h-66.965c-4.875 0-8.828 3.952-8.828 8.828.001 4.873 3.953 8.826 8.829 8.826z"></path>
                                  </g>
                                </svg>
                              </span>
                            </div>
                        </div>

                        <div class="flex items-center relative md:relative before:md:w-[calc(100%+60px)] before:md:absolute before:md:left-[-30px] before:md:top-0 before:md:h-full before:bg-primary-main reveal">
                            <?php $locationsInfo = [
                                [
                                    'phone' => '+90 (212) 678 13 13',
                                    'email' => 'info@pentagon.com.tr',
                                    'address' => 'IOSB Bedrettin Dalan Bulvarı Metro 34 Plaza No:23/100 Basaksehir – Istanbul / TURKEY',
                                    'maps' => 'https://maps.google.com'
                                ],

                                [
                                    'phone' => '0850 302 6950',
                                    'email' => 'info@pentayazilim.com',
                                    'address' => 'Orta Mahalle, Kanuni Sk. No:1 Kat 3, 34880 Kartal/İstanbul',
                                    'maps' => 'https://maps.google.com'
                                ],

                                [
                                    'phone' => '+90 (212) 678 13 13',
                                    'email' => 'info@pentagon.com.tr',
                                    'address' => 'IOSB Bedrettin Dalan Bulvarı Metro 34 Plaza No:23/100 Basaksehir – Istanbul / TURKEY',
                                    'maps' => 'https://maps.google.com'
                                ],

                                [
                                    'phone' => '0850 302 6950',
                                    'email' => 'info@pentayazilim.com',
                                    'address' => 'Orta Mahalle, Kanuni Sk. No:1 Kat 3, 34880 Kartal/İstanbul',
                                    'maps' => 'https://maps.google.com'
                                ],

                                [
                                    'phone' => '+90 (212) 678 13 13',
                                    'email' => 'info@pentagon.com.tr',
                                    'address' => 'IOSB Bedrettin Dalan Bulvarı Metro 34 Plaza No:23/100 Basaksehir – Istanbul / TURKEY',
                                    'maps' => 'https://maps.google.com'
                                ],
                            ];
                            foreach ($locationsInfo as $key => $item): ?>

                                <div class="content w-full overflow-hidden absolute left-0 top-0 group flex md:grid md:grid-cols-2 xs:flex xs:flex-col items-center justify-center gap-[80px] 2xl:gap-[60px] xl:gap-[45px] md:gap-[30px] md:py-[40px] transition-all duration-700 opacity-0 [&.active]:relative [&.active]:opacity-100 [&.active]:translate-y-0 [&.active]:visible <?= $key == 0 ? 'active' : ''; ?>" id="<?= $key ?>">
                                    <div class="item flex items-center justify-center md:justify-end xsm:justify-start gap-[30px] xl:gap-[20px] whitespace-nowrap transition-all duration-700 opacity-0 group-[&.active]:opacity-100">
                                        <i class="icon-phone text-[29px] lg:text-[24px] md:text-[20px] leading-none text-white transition-all duration-300"></i>
                                        <a href="tel:<?= $item['phone'] ?>" class="text-[21px] lg:text-[18px] md:text-[16px] leading-normal font-light tracking-[-0.21px] text-white/85 transition-all duration-300 hover:text-white"><?= $item['phone'] ?></a>
                                    </div>
                                    <div class="item flex items-center justify-start md:justify-start gap-[30px] xl:gap-[20px] whitespace-nowrap transition-all duration-700 opacity-0 group-[&.active]:opacity-100">
                                        <i class="icon-at text-[29px] lg:text-[24px] md:text-[20px] leading-none text-white transition-all duration-300"></i>
                                        <a href="mailto:<?= $item['email'] ?>" class="text-[21px] lg:text-[18px] md:text-[16px] leading-normal font-light tracking-[-0.21px] text-white/85 transition-all duration-300 hover:text-white"><?= $item['email'] ?></a>
                                    </div>
                                    <div class="item flex items-center md:justify-center xsm:justify-start gap-[30px] xl:gap-[20px] min-md:max-w-[510px] md:col-span-2 md:text-center transition-all duration-700 opacity-0 group-[&.active]:opacity-100">
                                        <i class="icon-direct text-[29px] lg:text-[24px] md:text-[20px] leading-none text-white transition-all duration-300"></i>
                                        <a href="<?= $item['maps'] ?>" class="text-[21px] lg:text-[18px] md:text-[16px] leading-normal font-light tracking-[-0.21px] text-white/85 transition-all duration-300 hover:text-white line-clamp-3"><?= $item['address'] ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="contact my-[130px] xl:my-[100px] mb:my-[70px] sm:my-[50px]">
            <?php //include 'layout/contact-form.php'; ?>
        </section>
    </section>

</main>

<script>
    // Location List
    window.locations = [
        /* Buraya tab miktarı kadar lokasyon girebilirsiniz ve konum, zoom, url ve marker özelliklerini değiştirebilirsiniz. */
        {
            latLng: { lat: 41.06938256380666, lng: 28.827924637822406 },
            zoom: 15,
            marker: `<a href="https://maps.google.com" target="_blank" class="relative group flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[45px] w-auto animate-bounce"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#B6A36B"/></svg>
                    </a>`
        },
        {
            latLng: { lat: 40.90972609407845, lng: 29.203708883725817 },
            zoom: 15,
            marker: `<a href="https://pentayazilim.com" target="_blank" class="relative group flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[45px] w-auto animate-bounce"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#B6A36B"/></svg>
                    </a>`
        },

        {
            latLng: { lat: 40.90972609407845, lng: 29.203708883725817 },
            zoom: 15,
            marker: `<a href="https://maps.google.com" target="_blank" class="relative group flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[45px] w-auto animate-bounce"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#B6A36B"/></svg>
                    </a>`
        },

        {
            latLng: { lat: 40.90972609407845, lng: 29.203708883725817 },
            zoom: 15,
            marker: `<a href="https://pentayazilim.com" target="_blank" class="relative group flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[45px] w-auto animate-bounce"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#B6A36B"/></svg>
                    </a>`
        },

        {
            latLng: { lat: 41.06938256380666, lng: 28.827924637822406 },
            zoom: 15,
            marker: `<a href="https://maps.google.com" target="_blank" class="relative group flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-[45px] w-auto animate-bounce"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" fill="#B6A36B"/></svg>
<!--                        <i class="icon-marker text-[45px] leading-none text-primary-main animate-bounce"></i>-->
                    </a>`
        },
    ];

    // Generate Map Function
    function generateMap(i) {
        window.latLng = locations[i].latLng
        window.mapZoom = locations[i].zoom;

        window.mapMarker = document.createElement('div');
        mapMarker.className = 'map-marker block !pointer-events-auto relative z-30';
        mapMarker.innerHTML = locations[i].marker;
    }
    generateMap(0)

    // Map Change
    let mapButtons = document.querySelectorAll('.contact-page .location-tabs .tab');
    mapButtons.forEach(button => {
        button.addEventListener('click', () => {
            let i = button.getAttribute('data-id');
            if (i == null) return;
            generateMap(i)
            initMap()
        })
    })

    if (document.getElementsByTagName("main")[0].classList.contains("contact-page")) {
        document.querySelector("header").classList.add("contact");
        document.querySelector("body").classList.add("contact");
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxycU6lO2UWtUA4BZDIfXrSVyYVqQ0wRM&callback=initMap&libraries=marker&v=beta" defer=""></script>

@endsection