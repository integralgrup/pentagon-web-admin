@include('partials.header')
<penta-yazilim class="block group-[&.contact]/body:pt-[112px] group-[&.contact]/body:md:pt-[80px] peer-[&.mobile-menu-active]:[&_.mobile-menu-overlay]:opacity-100 peer-[&.mobile-menu-active]:[&_.mobile-menu-overlay]:pointer-events-auto">
    <div class="mobile-menu-overlay pointer-events-none min-md:hidden opacity-0 transition-all duration-700 delay-100 absolute left-0 top-[112px] sm:top-[80px] z-[50] bg-black/50 backdrop-blur-[5px] h-full w-full"></div>

<!-- header-space: HEADER KADAR BOŞLUK BIRAKMAKTADIR. -->

    @yield('content')


</penta-yazilim>
@include('partials.footer')