<?php
    $footerInfo = App\Models\FooterInfo::where('lang', app()->getLocale())->first();
?>
<footer class="footer-field bg-secondary-main pt-[60px] sm:pt-[45px] xs:pt-[5px] w-full relative overflow-hidden">
    <div class="scroll-top absolute flex flex-col items-center right-[35px] bottom-[145px] z-10 cursor-pointer transition-all duration-300 hover:scale-x-95 hover:scale-y-110" id="scroll-top">
        <i class="icon-arrow-up-long text-[27px] text-white"></i>
        <p class="text-[12px] leading-normal tracking-[1.2px] font-medium text-white uppercase"><?=getStaticText(12)?></p>
    </div>
    <div class="flex md:hidden items-end absolute left-0 bottom-0 w-full h-full z-3 pointer-events-none">
        <div class="w-1/3 md:w-full bg-secondary-main"></div>
        <div class="w-2/3 md:w-full bg-primary-main h-[calc(100%-60px)]"></div>
    </div>
    <img src="{{ asset('assets') }}/image/static/vectorel-4.svg" alt="Vektör" width="531" height="571" class="max-w-[531px] h-auto absolute left-0 top-[50px] z-2 ">
    <div class="container max-w-[1650px] relative z-4">
        <div class="wrapper w-full pb-[120px]">
            <div class="flex flex-wrap">
                <div class="w-1/3 md:w-full pr-[199px] 2xl:pr-[150px] xl:pr-[100px] lg:pr-[70px] md:pr-0">
                    <div class="flex flex-col mt-[18px]">
                        <div class="logo w-full xs:flex xs:justify-center mb-[60px] lg:mb-[40px] xs:mb-[30px]">
                            <img src="{{ asset('assets') }}/image/trademark/logo-white.png" alt="Logo" width="285" height="113" class=" w-[285px] xs:w-[calc((285px)-285px*0.15)] h-auto">

                        </div>

                        <div class="social mb-[50px] lg:mb-[30px]">
                            <ul class="flex flex-wrap gap-[30px] px-[15px] xs:justify-center xs:px-0">
                                <?php
                                    $social = [
                                        [
                                            'link' => $footerInfo['facebook_url'] ?? '',
                                            'icon' => 'facebook-square',
                                        ],
                                        [
                                            'link' => $footerInfo['youtube_url'] ?? '',
                                            'icon' => 'youtube-square',
                                        ],
                                        [
                                            'link' => $footerInfo['linkedin_url'] ?? '',
                                            'icon' => 'linkedin-square',
                                        ],
                                        [
                                            'link' => $footerInfo['x_url'] ?? '',
                                            'icon' => 'twitter-square',
                                        ],
                                        [
                                            'link' => $footerInfo['instagram_url'] ?? '',
                                            'icon' => 'instagram-square',
                                        ],
                                    ];
                                    foreach ($social as $item):
                                ?>
                                    <li class="">
                                        <a href="<?= $item['link'] ?>" target="_blank" class="group block transition-all duration-300 hover:scale-110 [&_svg_g,_svg_path]:transition-all [&_svg_g,_svg_path]:duration-300 [&_svg_path]:hover:fill-primary-400 [&_svg_g]:hover:opacity-100">
                                            <i class="icon-<?= $item['icon'] ?> text-[21px] h-[21px] inline-block leading-none text-white/20 transition-all duration-300 group-hover:text-primary-400"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="office flex flex-col gap-[6px] mb-[24px] ">

                            <span class="text-[16px] leading-normal font-bold text-white tracking-[-0.16px]"><?=getStaticText(27)?></span>
                            <p class="text-[16px] leading-[24px] font-light text-white tracking-[-0.16px] mb-[6px]"><?=$footerInfo->address?></p>
                            <a href="<?= $footerInfo->map_url ?>" target="_blank" class="group flex items-center gap-[20px] w-max relative hover:text-white after:absolute after:bottom-0 after:right-0 after:bg-white after:w-0 after:h-[1px] after:hover:right-auto after:hover:left-0 after:hover:w-full after:transition-all after:duration-300">
                                <span class="text-[14px] leading-normal font-light text-white uppercase transition-all duration-300 group-hover:text-white"><?=getStaticText(28)?></span>
                                <i class="icon-map text-[17px] leading-none text-white transition-all duration-300 group-hover:text-white"></i>
                            </a>
                        </div>
                        <div class="phones flex flex-col gap-[25px] ">
                            <div class="flex flex-col gap-[6px]">
                                <span class="text-[16px] leading-normal font-bold text-white tracking-[-0.16px]"><?=getStaticText(29)?></span>
                                <a href="tel:+902126781313" class="text-[16px] leading-[24px] font-light text-white tracking-[-0.16px] mb-[6px] relative w-max after:absolute after:bottom-0 after:right-0 after:bg-white after:w-0 after:h-[1px] after:hover:right-auto after:hover:left-0 after:hover:w-full after:transition-all after:duration-300"><?=$footerInfo->phone?></a>
                            </div>
                            <div class="flex flex-col gap-[6px]">
                                <span class="text-[16px] leading-normal font-bold text-white tracking-[-0.16px]"><?=getStaticText(30)?></span>
                                <a href="mailto:info@pentagon.com.tr" class="text-[16px] leading-[24px] font-light text-white tracking-[-0.16px] mb-[6px] relative w-max after:absolute after:bottom-0 after:right-0 after:bg-white after:w-0 after:h-[1px] after:hover:right-auto after:hover:left-0 after:hover:w-full after:transition-all after:duration-300"><?=$footerInfo->email?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $footerPages = App\Models\Menu::where(['lang' => app()->getLocale(), 'parent_menu_id' => 0, 'page_type' => 'page'])->get();?>
                <?php $footerAbout = App\Models\Menu::where(['lang' => app()->getLocale(),  'page_type' => 'about'])->get();?>
                <?php $footerSectors = App\Models\Menu::where(['lang' => app()->getLocale(), 'parent_menu_id' => 2, 'page_type' => 'sector'])->get();?>
                <?php $footerBrands = App\Models\Menu::where(['lang' => app()->getLocale(), 'parent_menu_id' => 3, 'page_type' => 'brand'])->get();?>
                <?php $footerCareers = App\Models\Menu::where(['lang' => app()->getLocale(), 'page_type' => 'career'])->get();?>

                <div class="w-2/3 md:w-full sm:hidden md:relative md:after:w-[calc(100vw+60px)] md:after:h-[calc(100%+90px)] md:after:absolute md:after:left-[-30px] md:after:bottom-[-120px] md:after:bg-primary-main md:after:z-[-1]">
                    <div class="menu w-full grid xsm:flex xsm:flex-wrap grid-cols-3 gap-[120px] 2xl:gap-[90px] xl:gap-[70px] lg:gap-[50px] md:gap-[30px] xsm:gap-0 mt-[70px] pl-[122px] 2xl:pl-[100px] xl:pl-[70px] lg:pl-[40px] md:pl-0">
                        <?php $menu = [
                                [
                                    'menu' => [
                                        'title' => getStaticText(21),
                                        'items' => $footerAbout
                                    ],
                                ],

                                [
                                    'menu' => [
                                        'title' => getStaticText(22),
                                        'items' => $footerSectors
                                    ],
                                ],

                                [
                                    'menu' => [
                                        'title' => getStaticText(23),
                                        'items' => $footerCareers
                                    ],
                                ],

                                [
                                    'menu' => [
                                        'title' => getStaticText(24),
                                        'items' => $footerPages
                                    ],
                                ],

                                [
                                    'menu' => [
                                        'title' => getStaticText(25),
                                        'items' => $footerBrands
                                    ],
                                ],
                            ];
                        ?>
                        <div class="flex flex-col xsm:w-1/2 xsm:pr-[15px] gap-[50px] md:gap-[30px] relative after:absolute after:-right-8 after:2xl:-right-2 after:xl:-right-1 after:xsm:right-6 after:top-0 after:w-[1px] after:h-full after:bg-white/10">
                            <div class="item">
                                <p class=" text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-[#6D6243] font-bold mb-[8px]"><?php foreach ($menu[0] as $item): echo $item['title']; endforeach; ?></p>
                                <ul>
                                    <?php foreach ($menu[0]['menu']['items'] as $item) : ?>
                                        <li class=""><a href="<?= env('HTTP_DOMAIN') .'/'. $item['seo_url']; ?>" class="text-[18px] lg:text-[16px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.18px] text-white transition-all duration-300 hover:text-[#6D6243] [-webkit-text-stroke:1.5px_rgba(255,255,255,0)] hover:[-webkit-text-stroke:1.5px_rgba(109,98,67,1)] hover:tracking-[-0.05px]"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="item">
                                <p class=" text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-[#6D6243] font-bold mb-[8px]"><?php foreach ($menu[1] as $item): echo $item['title']; endforeach; ?></p>
                                <ul>
                                    <?php foreach ($menu[1]['menu']['items'] as $item) : ?>
                                        <li class=""><a href="<?= env('HTTP_DOMAIN') .'/'. getUrl('sector_url') .'/'. $item['seo_url']; ?>" class="text-[18px] lg:text-[16px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.18px] text-white transition-all duration-300 hover:text-[#6D6243] [-webkit-text-stroke:1.5px_rgba(255,255,255,0)] hover:[-webkit-text-stroke:1.5px_rgba(109,98,67,1)] hover:tracking-[-0.05px]"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col xsm:w-1/2 xsm:pl-[15px] gap-[50px] md:gap-[30px] relative after:absolute after:-right-8 after:2xl:-right-2 after:xl:-right-1 after:top-0 after:w-[1px] after:h-full after:bg-white/10 xsm:after:hidden">
                            <div class="item">
                                <p class=" text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-[#6D6243] font-bold mb-[8px]"><?php foreach ($menu[2] as $item): echo $item['title']; endforeach; ?></p>
                                <ul>
                                    <?php foreach ($menu[2]['menu']['items'] as $item) : ?>
                                        <li class=""><a href="<?= env('HTTP_DOMAIN') .'/'.  $item['seo_url']; ?>" class="text-[18px] lg:text-[16px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.18px] text-white transition-all duration-300 hover:text-[#6D6243] [-webkit-text-stroke:1.5px_rgba(255,255,255,0)] hover:[-webkit-text-stroke:1.5px_rgba(109,98,67,1)] hover:tracking-[-0.05px]"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="item">
                                <p class=" text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-[#6D6243] font-bold mb-[8px]"><?php foreach ($menu[3] as $item): echo $item['title']; endforeach; ?></p>
                                <ul>
                                    <?php foreach ($menu[3]['menu']['items'] as $item) : ?>
                                        <li class=""><a href="<?= env('HTTP_DOMAIN') .'/'. $item['seo_url']; ?>" class="text-[18px] lg:text-[16px] leading-[45px] lg:leading-[40px] font-light tracking-[-0.18px] text-white transition-all duration-300 hover:text-[#6D6243] [-webkit-text-stroke:1.5px_rgba(255,255,255,0)] hover:[-webkit-text-stroke:1.5px_rgba(109,98,67,1)] hover:tracking-[-0.05px]"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-col xsm:w-full xsm:mt-[30px] gap-[50px] md:gap-[30px] ">
                            <div class="item">
                                <p class=" text-[26px] xl:text-[22px] md:text-[20px] leading-[32px] text-[#6D6243] font-bold mb-[8px]"><?php foreach ($menu[4] as $item): echo $item['title']; endforeach; ?></p>
                                <ul>
                                    <?php foreach ($menu[4]['menu']['items'] as $item) : ?>
                                        <li class=""><a href="<?= env('HTTP_DOMAIN') .'/'. getUrl('brand_url') .'/'. $item['seo_url']; ?>" class="lg:text-[18px] md:text-[16px] leading-[45px] md:leading-[40px] font-light tracking-[-0.18px] text-white transition-all duration-300 hover:text-[#6D6243] [-webkit-text-stroke:1.5px_rgba(255,255,255,0)] hover:[-webkit-text-stroke:1.5px_rgba(109,98,67,1)] hover:tracking-[-0.05px]"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blur-area absolute left-0 bottom-0 w-full z-5 py-[10px] bg-white/30 backdrop-blur-[50px]">
        <div class="container max-w-[1650px]">
            <div class="flex items-center justify-between sm:justify-center gap-[24px] xs:flex-col">
                <p class="text-[15px] leading-[22px] tracking-[-0.15px] text-white font-light">© <?= Date('Y') ?> <?=getStaticText(26)?></p>
                <img src="{{ asset('assets') }}/image/trademark/logo-white.png" alt="Logo" width="285" height="113" class="w-[100px] h-auto sm:hidden">
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container max-w-[1440px]">
            <div class="wrapper">
                
            </div>
        </div>
    </div>
</footer>

        <!-- POPUP -->
        <!-- POPUP GDPR -->
<section id="popup-gdpr" class="popup hidden !rounded-[20px] !m-0 !p-[30px] !max-w-[1024px] w-full [&_.f-button]:!top-[20px] [&_.f-button]:!right-[10px] [&_.f-button]:!opacity-100 [&_.f-button]:!text-black">
    <div class="inner w-full">
        <div class="text-editor !max-w-full">
            <!-- Stylelar tasarımı yansıtmak adına eklenmiştir. / Backendde silinerek panel editörü üzerinden eklenmeli. -->
            <h4><strong>KİŞİSEL VERİLERİN KORUNMASI</strong></h4>
            <h5><strong>İNTERNET SİTESİ ÇEREZ POLİTİKASI</strong></h5>

            <p>Kişisel verileriniz; veri sorumlusu olarak Firma Adı (“ŞİRKET” veya Firma Adı” olarak adlandırılacaktır.) tarafından işletilen (www.alanadi.com) internet sitesini ziyaret edenlerin gizliliğini korumak Kurumumuzun önde gelen ilkelerindendir. Bu Çerez Kullanımı Politikası (“Politika”), tüm web sitesi ziyaretçilerimize ve kullanıcılarımıza hangi tür çerezlerin hangi koşullarda kullanıldığını açıklamaktadır.</p>
            <p>Çerezler, bilgisayarınız ya da mobil cihazınız üzerinden ziyaret ettiğiniz internet siteleri tarafından cihazınıza veya ağ sunucusuna depolanan küçük metin dosyalarıdır.</p>
            <p>Genellikle ziyaret ettiğiniz internet sitesini kullanmanız sırasında size kişiselleştirilmiş bir deneyim sunmak, sunulan hizmetleri geliştirmek ve deneyiminizi iyileştirmek için kullanılır ve bir internet sitesinde gezinirken kullanım kolaylığına katkıda bulunabilir. Çerez kullanılmasını tercih etmezseniz tarayıcınızın ayarlarından Çerezleri silebilir ya da engelleyebilirsiniz. Ancak bunun internet sitemizi kullanımınızı etkileyebileceğini hatırlatmak isteriz. Tarayıcınızdan Çerez ayarlarınızı değiştirmediğiniz sürece bu sitede çerez kullanımını kabul ettiğinizi varsayacağız.</p>

            <h6><strong>1. ÇEREZLERDE HANGİ TÜR VERİLER İŞLENİR?</strong></h6>
            <p>İnternet sitelerinde yer alan çerezlerde, türüne bağlı olarak, siteyi ziyaret ettiğiniz cihazdaki tarama ve kullanım tercihlerinize ilişkin veriler toplanmaktadır. Bu veriler, eriştiğiniz sayfalar, incelediğiniz hizmet ve ürünler, tercih ettiğiniz dil seçeneği ve diğer tercihlerinize dair bilgileri kapsamaktadır.</p>

            <h6><strong>2. ÇEREZ NEDİR ve KULLANIM AMAÇLARI NELERDİR?</strong></h6>
            <p>Çerezler, ziyaret ettiğiniz internet siteleri tarafından tarayıcılar aracılığıyla cihazınıza veya ağ sunucusuna depolanan küçük metin dosyalarıdır. Sitede tercih ettiğiniz dil ve diğer ayarları içeren bu küçük metin dosyaları, siteye bir sonraki ziyaretinizde tercihlerinizin hatırlanmasına ve sitedeki deneyiminizi iyileştirmek için hizmetlerimizde geliştirmeler yapmamıza yardımcı olur. Böylece bir sonraki ziyaretinizde daha iyi ve kişiselleştirilmiş bir kullanım deneyimi yaşayabilirsiniz.</p>
            <p>İnternet Sitemizde çerez kullanılmasının başlıca amaçları aşağıda sıralanmaktadır:</p>
            <ul>
                <li>İnternet sitesinin işlevselliğini ve performansını arttırmak yoluyla sizlere sunulan hizmetleri geliştirmek,</li>
                <li>İnternet Sitesini iyileştirmek ve İnternet Sitesi üzerinden yeni özellikler sunmak ve sunulan özellikleri sizlerin tercihlerine göre kişiselleştirmek;</li>
                <li>İnternet Sitesinin, sizin ve Kurum’un hukuki ve ticari güvenliğinin teminini sağlamak, Site üzerinden sahte işlemlerin gerçekleştirilmesini önlemek;</li>
                <li>5651 sayılı Internet Ortamında Yapılan Yayınların Düzenlenmesi ve Bu Yayınlar Yoluyla İşlenen Suçlarla Mücadele Edilmesi Hakkında Kanun ve Internet Ortamında Yapılan Yayınların Düzenlenmesine Dair Usul ve Esaslar Hakkında Yönetmelik’ten kaynaklananlar başta olmak üzere, kanuni ve sözleşmesel yükümlülüklerini yerine getirmek.</li>
            </ul>

            <h5><strong>3.İNTERNET SİTEMİZDE KULLANILAN ÇEREZ TÜRLERİ</strong></h5>

            <h6><strong>3.1. Oturum Çerezleri</strong></h6>
            <p>Oturum çerezlerini ziyaretinizi süresince internet sitesinin düzgün bir şekilde çalışmasının teminini sağlamaktadır. Sitelerimizin ve sizin, ziyaretinizde güvenliğini, sürekliliğini sağlamak gibi amaçlarla kullanılırlar. Oturum çerezleri geçici çerezlerdir, siz tarayıcınızı kapatıp sitemize tekrar geldiğinizde silinir, kalıcı değillerdir.</p>

            <h6><strong>3.2. Kalıcı Çerezler</strong></h6>
            <p>Bu tür çerezler tercihlerinizi hatırlamak için kullanılır ve tarayıcılar vasıtasıyla cihazınızda depolanır Kalıcı çerezler, sitemizi ziyaret ettiğiniz tarayıcınızı kapattıktan veya bilgisayarınızı yeniden başlattıktan sonra bile saklı kalır. Tarayıcınızın ayarlarından silinene kadar bu çerezler tarayıcınızın alt klasörlerinde tutulurlar.</p>
            <p>Kalıcı çerezlerin bazı türleri; İnternet Sitesini kullanım amacınız gibi hususlar göz önünde bulundurarak sizlere özel öneriler sunulması için kullanılabilmektedir.</p>
            <p>Kalıcı çerezler sayesinde İnternet Sitemizi aynı cihazla tekrardan ziyaret etmeniz durumunda, cihazınızda İnternet Sitemiz tarafından oluşturulmuş bir çerez olup olmadığı kontrol edilir ve var ise, sizin siteyi daha önce ziyaret ettiğiniz anlaşılır ve size iletilecek içerik bu doğrultuda belirlenir ve böylelikle sizlere daha iyi bir hizmet sunulur.</p>

            <h6><strong>3.3. Zorunlu/Teknik Çerezler</strong></h6>
            <p>Ziyaret ettiğiniz internet sitesinin düzgün şekilde çalışabilmesi için zorunlu çerezlerdir. Bu tür çerezlerin amacı, sitenin çalışmasını sağlamak yoluyla gerekli hizmet sunmaktır. Örneğin, internet sitesinin güvenli bölümlerine erişmeye, özelliklerini kullanabilmeye, üzerinde gezinti yapabilmeye olanak verir.</p>

            <h6><strong>3.4. Analitik Çerezler</strong></h6>
            <p>İnternet sitesinin kullanım şekli, ziyaret sıklığı ve sayısı, hakkında bilgi toplayan ve ziyaretçilerin siteye nasıl geçtiğini gösterirler. Bu tür çerezlerin kullanım amacı, sitenin işleyiş biçimini iyileştirerek performans arttırmak ve genel eğilim yönünü belirlemektir. Ziyaretçi kimliklerinin tespitini sağlayabilecek verileri içermezler. Örneğin, gösterilen hata mesajı sayısı veya en çok ziyaret edilen sayfaları gösterirler.</p>

            <h6><strong>3.5. İşlevsel/Fonksiyonel Çerezler</strong></h6>
            <p>Ziyaretçinin site içerisinde yaptığı seçimleri kaydederek bir sonraki ziyarette hatırlar. Bu tür çerezlerin amacı ziyaretçilere kullanım kolaylığı sağlamaktır. Örneğin, site kullanıcısının ziyaret ettiği her bir sayfada kullanıcı şifresini tekrar girmesini önler.</p>

            <h6><strong>3.6. Hedefleme/Reklam Çerezleri</strong></h6>
            <p>Ziyaretçilere sunulan reklamların etkinliğinin ölçülmesi ve reklamların kaç kere görüntülendiğinin hesaplanmasını sağlarlar. Bu tür çerezlerin amacı, ziyaretçilerin ilgi alanlarına özelleştirilmiş reklamların sunulmasıdır.</p>
            <p>Aynı şekilde, ziyaretçilerin gezinmelerine özel olarak ilgi alanlarının tespit edilmesini ve uygun içeriklerin sunulmasını sağlarlar. Örneğin, ziyaretçiye gösterilen reklamın kısa süre içinde tekrar gösterilmesini engeller.</p>

            <h5><strong>4. ÇEREZ TERCİHLERİ NASIL YÖNETİLİR?</strong></h5>
            <p>Çerezlerin kullanımına ilişkin tercihlerinizi değiştirmek ya da çerezleri engellemek veya silmek için tarayıcınızın ayarlarını değiştirmeniz yeterlidir.</p>
            <p>Birçok tarayıcı çerezleri kontrol edebilmeniz için size çerezleri kabul etme veya reddetme, yalnızca belirli türdeki çerezleri kabul etme ya da bir internet sitesinin cihazınıza çerez depolamayı talep ettiğinde tarayıcı tarafından uyarılma seçeneği sunar.</p>
            <p>Aynı zamanda, daha önce tarayıcınıza kaydedilmiş çerezlerin silinmesi de mümkündür.</p>
            <p>Çerezleri devre dışı bırakır veya reddederseniz, bazı tercihleri manuel olarak ayarlamanız gerekebilir, hesabınızı tanıyamayacağımız ve ilişkilendiremeyeceğimiz için internet sitesindeki bazı özellikler ve hizmetler düzgün çalışmayabilir. Tarayıcınızın ayarlarını aşağıdaki tablodan ilgili link’e tıklayarak değiştirebilirsiniz.</p>

            <h5><strong>5. İNTERNET SİTESİ GİZLİLİK POLİTİKASI’NIN YÜRÜRLÜĞÜ</strong></h5>
            <p>İnternet Sitesi Gizlilik Politikası ..../..../.... .tarihlidir. Politika’nın tümünün veya belirli maddelerinin yenilenmesi durumunda Politika’nın yürürlük tarihi güncellenecektir. Gizlilik Politikası Kurum’un internet sitesinde (www.alanadi.com) yayımlanır ve kişisel veri sahiplerinin talebi üzerine ilgili kişilerin erişimine sunulur.</p>
            <p><strong>Firma Adı</strong><br><strong>Adres:</strong> Mahalle Adı Sokak Adı. No: 1/A, 34444 İlçe Adı/İl Adı<br><strong>Telefon:</strong> +90 216 555 55 55<br><strong>E – Posta:</strong> mail@alanadi.com<br><strong>Web Adresi:</strong> www.alanadi.com</p>
        </div>
    </div>
</section>

<!-- POPUP OFFER FORM -->
<section id="popup-offer-form" class="hidden w-full h-full !p-0 bg-[#f6f6f6]/15 backdrop-blur-[5px]">
    <div class="inner w-full h-full flex justify-end">
        <div class="right px-[45px] py-[30px] bg-secondary-main lg:w-1/2 w-2/5 md:w-full relative">
            <div class="close-button w-[66px] h-[66px] p-[10px] absolute left-[-33px] top-1/2 -translate-y-1/2 cursor-pointer md:top-[60px] md:left-auto md:right-[30px]" data-fancybox-close="">
                <div class="w-full h-full bg-primary-main grid place-items-center">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 1L1 15" stroke="white" stroke-width="1.25"/>
                        <path d="M1 1L15 15" stroke="white" stroke-width="1.25"/>
                    </svg>
                </div>
            </div>
            <div class="image-wrapper w-full h-[250px] mb-[20px] md:hidden">
                <img src="{{ asset('assets') }}/image/general/offer-image.jpg" alt="Teklif" width="675" height="342" class="w-full h-full object-cover">
            </div>
            <div class="form px-[30px] xl:px-0">
                <p class="text-[46px] xl:text-[32px] lg:text-[24px] leading-[60px] xl:leading-[50px] lg:leading-[40px] md:leading-[36px] tracking-[-0.46px] font-light text-white mb-[20px]">
                    Teklif <span class="font-bold">Formu</span>
                </p>
                <form action="#" method="post" id="career-form" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-x-[30px] sm:gap-y-[30px] xs:gap-y-[12px]">
                        <div class="form-group  sm:col-span-2">
                            <div class="w-full relative flex flex-col group/item">
                                <input type="text" name="name" id="name" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 peer text-[18px] font-light text-white pb-[16px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                <label for="name" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 pointer-events-none translate-y-[40px] peer-focus:!translate-y-[10px]">Penta</label>
                                <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="form-group  sm:col-span-2">
                            <div class="w-full relative flex flex-col group/item">
                                <input type="text" name="surname" id="surname" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 peer text-[18px] font-light text-white pb-[16px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                <label for="surname" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 pointer-events-none translate-y-[40px] peer-focus:!translate-y-[10px]">Soyadınız</label>
                                <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="form-group  sm:col-span-2">
                            <div class="w-full relative flex flex-col group/item">
                                <input type="email" name="email" id="email" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 peer text-[18px] font-light text-white pb-[16px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                <label for="email" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 pointer-events-none translate-y-[40px] peer-focus:!translate-y-[10px]">E-Posta</label>
                                <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="form-group sm:col-span-2">
                            <div class="w-full relative flex flex-col group/item">
                                <input type="text" name="phone" id="phone" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 peer text-[18px] font-light text-white pb-[16px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main">
                                <label for="phone" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 pointer-events-none translate-y-[40px] peer-focus:!translate-y-[10px]">Telefon</label>
                                <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="form-group  col-span-2">
                            <div class="w-full relative flex flex-col group/item">
                                <textarea name="message" id="message" required minlength="5" class="order-2 w-full border-[0] !border-b border-solid border-b-white/16 group-hover/item:border-b-white placeholder-white/35 peer text-[18px] font-light text-white pb-[71px] transition-all duration-300 [&_~_div]:focus:w-full [&_~_div]:focus:right-auto [&_~_div]:focus:left-0 [&_~_label]:focus:text-primary-main"></textarea>
                                <label for="message" class="order-1 mb-[5px] block text-[16px] font-semibold text-white/65 transition-all duration-300 pointer-events-none translate-y-[40px] peer-focus:!translate-y-[10px]">Mesaj</label>
                                <div class="order-3 after absolute z-2 right-0 bottom-0 w-0 h-[1px] bg-primary-main transition-all duration-500"></div>
                            </div>
                        </div>

                        <div class="form-el group/form relative flex items-center gap-[20px] md:col-span-2 xs:py-[12px] my-[15px]"> <!-- error için bu div'e class="error" eklenecek -->
                            <input type="checkbox" id="app-form-checkbox" class="peer cursor-pointer absolute left-0 top-0 w-full h-full opacity-0 z-10">
                            <div class="box relative shrink-0 w-[21px] aspect-square duration-300 before:absolute before:duration-450 peer-checked:before:!opacity-100 peer-checked:before:!scale-100 before:scale-0 before:opacity-0 before:left-[50%] before:top-[50%] before:translate-x-[-50%] before:translate-y-[-50%] before:w-[40%] before:h-[40%] before:bg-white border border-solid border-white/25 peer-hover:bg-primary-400/10 peer-hover:border-primary-400/50 peer-checked:!border-white group-[&.error]/form:border-red-500"></div>
                            <label for="app-form-checkbox" class=" leading-normal duration-300 text-[15px] text-white font-light tracking-[-0.15px]">
                                <a href="#popup-gdpr" class="inline-block relative z-20 text-white font-bold duration-300 decoration decoration-white underline" data-fancybox="">Aydınlatma Metni</a>'ni okudum ve kabul ediyorum.
                            </label>
                        </div>

                        <div class="form-group flex justify-end md:col-span-2 md:justify-start my-[15px]">
                            <button type="submit" class="flex items-center justify-center relative w-max overflow-hidden main-button group sm:w-full">
                                <div class="left px-[30px] py-[20px] flex items-center justify-center z-2 bg-transparent border border-solid border-primary-main transition-all duration-300 sm:w-full relative before:absolute before:left-0 before:top-0 before:w-0 before:h-full before:translate-x-[-100px] group-hover:before:min-md:w-full group-hover:before:min-md:translate-x-0 before:bg-primary-main before:transition-all before:duration-500">
                                    <span class="text-[16px] leading-none font-medium text-white transition-all duration-700 group-hover:min-md:text-white translate-x-[-100px] opacity-0 group-hover:min-md:translate-x-0 group-hover:min-md:opacity-100 w-0 whitespace-nowrap relative z-2">Başvur</span>
                                    <span class="text-[16px] leading-none font-medium text-white transition-all duration-700 group-hover:min-md:text-white group-hover:min-md:translate-x-[100px] group-hover:min-md:opacity-0 relative z-2">Başvur</span>
                                </div>
                                <div class="right flex items-center justify-center z-2 bg-[#9D8D5D] py-[22px] px-[24px] border border-solid border-[#9D8D5D] w-[56px] h-[58px] overflow-hidden">
                                    <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-700 translate-x-[-100px] opacity-0 group-hover:translate-x-0 group-hover:opacity-100 w-0 whitespace-nowrap"></i>
                                    <i class="icon-angle-right text-[12px] leading-none text-white transition-all duration-700 group-hover:translate-x-[100px] group-hover:opacity-0"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
        <!-- BG OVERLAY -->
        <div class="bg-overlay-general fixed left-0 top-0 z-[90] opacity-0 invisible duration-500 [&.active]:opacity-100 [&.active]:visible [&.black]:bg-black/30 w-full h-full group"></div>
        <!-- COOKIE -->
        <div class="cookie-box fixed top-auto bottom-[20px] right-[20px] left-[20px] mr-0 ml-auto w-fit max-w-[550px] md:max-w-full z-[200] duration-450 xs:w-full xs:left-0 xs:bottom-0 xs:right-0 bg-cookie p-[30px] rounded-[20px] xs:rounded-none translate-y-[150%] [&.accepted]:opacity-0 [&.accepted]:invisible [&.accepted]:translate-y-[250%] sm:sm:max-h-[calc(100dvh-40px)] sm:scrollbar sm:scrollbar-w-[5px] sm:scrollbar-track-rounded-[5px] sm:scrollbar-thumb-rounded-[5px] sm:scrollbar-thumb-primary-500 sm:scrollbar-track-primary-500/10 sm:overflow-x-hidden sm:overflow-y-auto">
            <div class="close close-cookie absolute right-[20px] top-[20px] cursor-pointer group/close">
                <div class="icon icon-cross icon-close group-hover/close:text-primary-500 group-hover/close:rotate-90 text-white text-[14px] h-[14px] block leading-none duration-350"></div>
            </div>
            <div class="text-field text-white">
                <div class="title font-medium text-[18px] mb-[15px]">Çerez Ayarları</div>
                <div class="expo text-[14px] sm:text-[12px] text-white/50">Bu web sitesinde, cihaz bilgilerini ve kişisel verileri işlemek için çerezleri ve benzer işlevleri kullanıyoruz. İşleme, içeriğin, harici hizmetlerin ve üçüncü şahısların unsurlarının, istatistiksel analiz/ölçümün, kişiselleştirilmiş reklamcılığın ve sosyal medyanın entegrasyonunun entegrasyonuna hizmet eder. İşleve bağlı olarak, veriler üçüncü taraflara aktarılır ve onlar tarafından işlenir. Bu onay isteğe bağlıdır, web sitemizin kullanımı için gerekli değildir ve sol alttaki simge kullanılarak herhangi bir zamanda iptal edilebilir.</div>
            </div>
            <div class="split my-[20px] sm:my-[10px] bg-white/5 w-full h-[1px]"></div>
            <div class="action-field flex items-center justify-between gap-[20px] sm:flex-col">
                <button class="accept-cookie close-cookie button group/button w-full flex justify-center items-center gap-[20px] bg-primary-500 px-[20px] hover:bg-primary-600 h-[45px] md:h-[50px] duration-350">
                    <div class="text text-[13px] text-white font-medium relative z-2 whitespace-nowrap duration-350">Çerezleri Kabul Et</div>
                </button>
                <button class="button group/button w-full flex justify-center items-center gap-[20px] bg-transparent px-[20px] h-[45px] md:h-[50px] duration-350 border border-solid border-primary-500">
                    <div class="text text-[13px] text-white/50 duration-350 font-medium relative z-2 whitespace-nowrap group-hover/button:text-white">Reddet</div>
                </button>
            </div>
            <div class="link-field mt-[30px]">
                <a href="page.php" class="text-white/50 duration-350 hover:text-white underline text-[13px] font-medium">Kişisel Verilerin Korunması</a>
                <span class="mx-[10px] text-black/50">|</span>
                <a href="page.php" class="text-white/50 duration-350 hover:text-white underline text-[13px] font-medium">Gizlilik</a>
            </div>
        </div>

    <!-- Önbellek tutmasın diye ekledim '?id<?= rand(); ?>' yazısını silersin -->
    <script src="{{ asset('assets/js/script.js?id=' . rand()) }}"></script>

</body>

</html>