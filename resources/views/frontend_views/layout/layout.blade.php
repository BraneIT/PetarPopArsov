<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/frontend_css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-manji.png') }}">
     <title>@yield('title')</title>
    <link rel="preload" href="{{ asset('assets/images/logo-manji.webp') }}" as="image">
</head>
<body>

    <div class="menu">
        <a href="/" class="home-button">  
            <div class="logo">
                
                <div class="logo-container">
                
                    <img src="{{ asset('assets/images/logo-manji150.webp') }}" alt="logo">
                </div>
                <div class="logo-label">
                    <p>ОСНОВНО УЧИЛИШТЕ</p>
                    <h1 class="logo-label-name">ПЕТАР ПОП АРСОВ</h1>
                    <p>ОПШТИНА КАРПОШ</p>
                </div>
            </div>
        </a> 
         <button class="hamburger-menu-btn">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
        <div class="menu-items">
            
            <a href="/">ДОМА </a>
            <div class="dropdown">
            <button class="dropbtn" id="dropdownButton">ЗА НАС <i class="fa-solid fa-angle-down" id="dropdownIcon"></i></button> 
            <div class="dropdown-content">
                <a href="/licna_karta">ЛИЧНА КАРТА</a>
                <a href="/razvoj_i_istorijat">РАЗВОЈ И ИСТОРИЈАТ</a>
                <a href="/organizacija">ОРГАНИЗАЦИЈА</a>
                <a href="/za_nasiot_patron">ЗА НАШИОТ ПАТРОН</a>
                <a href="/vizija_i_misija">ВИЗИЈА И МИСИЈА</a>
                <div class="dropdown">
                    <button class="dropbtn">ПРИЕМНИ ДЕНОВИ <i class="fa-solid fa-angle-right"></i></button>
                    <div class="dropdown-content">
                        <a href="/prijemni_denovi_na_ucilisteto">ПРИЕМНИ ДЕН НА УЧИЛИШТЕТО</a>
                        <a href="/prijemni_denovi_na_nastavnicite">ПРИЕМНИ ДЕН НА НАСТАВНИЦИТЕ</a>
                    </div>
                </div>
                
            </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">ДОКУМЕНТИ <i class="fa-solid fa-angle-down"></i></button>
                    <div class="dropdown-content">
                                 <a href="/statut">СТАТУТ</a>
                        <a href="/godisna_programa">ГОДИШНА ПРОГРАМА ЗА РАБОТА НА УЧИЛИШТЕТО И ГОДИШНИ И ПОЛУГОДИШНИ ИЗВЈЕШТАИ</a>
                        <a href="/razvojna_programa">РАЗВОЈНА ПРОГРАМА ЗА РАБОТА НА УЧИЛИШТЕТО</a>
                        <a href="/izvestaj_od_samoevaluacija">ИЗВЈЕШТАИ ОД САМОЕВАЛУАЦИЈА</a>
                        <a href="/integralna_inspekcija">ИНТЕГРАЛНА ИНСПЕКЦИЈА</a>
                        <a href="/skica">ПЛАН/СКИЦА НА УЧИЛИШТЕТО</a>
                        <a href="/pravilnici_i_propisi">ПРАВИЛНИЦИ И ПРОПИСИ</a>
                        <a href="/finansiski_dokumenti">ФИНАНСИСКИ ДОКУМЕНТИ</a>
                    </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">УЧЕНИЦИ <i class="fa-solid fa-angle-down"></i></button>
                <div class="dropdown-content">
                    <div class="dropdown">
                        <button class="dropbtn">ОДДЕЛЕНИЈА <i class="fa-solid fa-angle-right"></i></button>
                        <div class="dropdown-content">
                            <a href="/rakovoditeli_na_paralelki">РАКОВОДИТЕЛИ НА ПАРАЛЕЛКИ</a>
                        </div>
                    </div>
                    <a href="/under_construction">УЧЕНИЧКИ КЛУБОВИ</a>
                    <a href="/ucenicka_tela">УЧЕНИЧКА ТЕЛА</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">НАСТАВА <i class="fa-solid fa-angle-down"></i></button>
                <div class="dropdown-content">
                    <a href="/under_construction">НАСТАВНИ ПРОГРАМИ ПО ГЕНЕРАЦИИ И ПРЕДМЕТИ И ЗАКОНИ</a>
                    <a href="/planiranja_za_ocenuvanje">ПЛАНИРАЊА ЗА ОЦЕНУВАЊЕ</a>
                    <a href="/slobodni_izborni_predmeti">СЛОБОДНИ ИЗБОПРНИ ПРЕДМЕТИ</a>
                    <div class="dropdown">
                        <button class="dropbtn">ДОДАТНА НАСТАВА <i class="fa-solid fa-angle-right"></i></button>
                        <div class="dropdown-content">
                            <a href="/under_construction">ДОДАТНА ОДДЕЉЕНСКА НАСТАВА</a>
                            <a href="/under_construction">ДОДАТНА ПРЕДМЕТНА НАСТАВА</a>
                            <a href="/under_construction">ДОПУНСКА ОДДЕЉЕНСКА НАСТАВА</a>
                            <a href="/under_construction">ДОПУНСКА ПРЕДМЕТНА НАСТАВА</a>
                        </div>
                    </div>
                    <a href="/under_construction">ВОННАСТАВНИ АКТИВНОСТИ</a>
                    <a href="/under_construction">БИБЛИОТЕКА</a>
                </div>

            </div>
            <div class="dropdown">
                <button class="dropbtn">РАСПОРЕДИ <i class="fa-solid fa-angle-down"></i></button>
                <div class="dropdown-content">
                    <div class="dropdown">
                        <button class="dropbtn">РАСПОРЕД НА НАСТАВАТА <i class="fa-solid fa-angle-right"></i></button>
                        <div class="dropdown-content">
                            <a href="/raspored_na_oddelenska_nastava">РАСПОРЕД НА ОДДЕЛЕНСКА НАСТАВА</a>
                            <a href="/raspored_na_predmetna_nastava">РАСПОРЕД НА ПРЕДМЕТНА НАСТАВА</a>
                        </div>
                    </div>
                    <a href="/raspored_na_smeni">РАСПОРЕД НА СМЕНИ</a>
                    <a href="/raspored_na_zvonenje">РАСПОРЕД НА SВОНЕЊЕ</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">ВРАБОТЕНИ <i class="fa-solid fa-angle-down"></i></button>
                <div class="dropdown-content">
                    <a href="/under_construction">ДИРЕКТОР</a>
                    <a href="/under_construction">АДМИНИСТРАТИВЕН КАДАР</a>
                    <a href="/under_construction">СТРУЧНА СЛУЖБА</a>
                    <div class="dropdown">
                        <button class="dropbtn">НАСТАВЕН КАДАР <i class="fa-solid fa-angle-right"></i></button>
                        <div class="dropdown-content">
                            <a href="/under_construction">ОДДЕЛЕНСКА НАСТАВА</a>
                            <a href="/under_construction">ПРЕДМЕТНА НАСТАВА</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">СТРУЧНИ ОРГАНИ <i class="fa-solid fa-angle-right"></i></button>
                        <div class="dropdown-content">
                            <a href="/under_construction">ОДДЕЛЕНСКИ СОВЕТ</a>
                            <a href="/under_construction">СТРУЧНИ АКТИВИ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">ЕРАЗМУС + <i class="fa-solid fa-angle-down"></i></button>
                <div class="dropdown-content erasmus">
                    @if(sizeof($erasmus) !==0)
                    @foreach($erasmus as $item)
                        <a href="/erasmus/{{$item->slug}}">{{ $item->name }}</a>
                        <!-- Adjust the href attribute as needed -->
                    @endforeach
                    @else
                        <a> Моментално нема објавени документи</a>
                    @endif
                </div>
            </div>
            <a href="/novosti">НОВОСТИ</a>
            <div class="dropdown">
                <button class="dropbtn">УЧЕСТВО НА НАТПРЕВАРИ И ОСВОЕНИ НАГРАДИ <i class="fa-solid fa-angle-down"></i></button>
                    <div class="dropdown-content  erasmus">
                        @if (sizeof($competitions) !== 0)
                            
                        
                        @foreach ($competitions as $year)
                            <a href="ucestvo_na_natprevari_i_ostali_nagradi/{{ $year}}">УЧЕСТВО НА НАТПРЕВАРИ И ОСТАЛИ НАГРАДИ {{ $year }} / {{ $year+1 }}</a>
                        @endforeach
                        @else
                            <a>Моментално нема објавени документи</a>
                        @endif
                    </div>
            </div>
            <a href="/megjuetnicka_integracija_vo_obrazovanieto">МЕЃУЕТНИЧКА ИНТЕГРАЦИЈА ВО ОБРАЗОВАНИЕТО</a>
            
            <div class="dropdown">
                <button class="dropbtn">ПРОЈЕКТИ <i class="fa-solid fa-angle-down"></i></button>
                    <div class="dropdown-content">
                        @foreach ($projects as $year)
                            <a href="/projekti/{{$year}}">ПРОЈЕКТИ {{$year}}</a>
                        @endforeach
                    </div>
                
            </div>
            {{-- <a href="/under_construction">ПРОЕКТИ <i class="fa-solid fa-angle-down"></i></a> --}}
            <div class="dropdown">
                <button class="dropbtn">АКТИВНОСТИ <i class="fa-solid fa-angle-down"></i></button>
                    <div class="dropdown-content">
                        @foreach ($activities as $year)
                            <a href="/aktivnosti/{{$year}}">АКТИВНОСТИ {{$year}}</a>
                        @endforeach
                    </div>
                
            </div>
            
            <a href="/etvining">ЕТВИНИНГ</a>
            <a href="/javni_nabavki">ЈАВНИ НАБАВКИ </a>
            <div class="dropdown">
                <button class="dropbtn">ПРВАЧИЊА</button>
                <div class="dropdown-content">
                    @foreach ($prvacinjaUniqueYears as  $item)
                        <a href="/prvacinja/{{$item}}">{{$item}}</a>
                    @endforeach
                </div>
            </div>
            {{-- <a href="/prvacinja">ПРВАЧИЊА </a> --}}
            <a href="/gallery">ГАЛЕРИЈА</a>
            <a href="/kontakt">КОНТАКТ</a>
            <a href="/informacii_od_javen_karakter">ИНФОРМАЦИИ ОД ЈАВЕН КАРАКТЕР</a>
        </div>
    </div>
    <div class="content">
        @if(Request::path() !== '/' && Request::path() !== '/under_construction')
        <div class="pages-intro">
            <div class="pages-intro-container">
                @yield('page_header')
            </div>
        </div>  
        @endif
        
        @yield('content')
    </div>
    <div class="footer">
        <div class="location-warpper">
            <div class="location-container">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2964.7146953236943!2d21.387743300000004!3d42.00639820000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354147111727d33%3A0xb985a47630bbc8af!2sPetar%20Pop%20Arsov%20Elementary%20School!5e0!3m2!1ssr!2smk!4v1708513104578!5m2!1ssr!2smk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="location-info">
                    <p>Адреса на училиште</p>
                    <h2>ТРИФУН БУЗЕВ бб</h2>
                    <p>Карпош IV - Скопје </p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © 2024 OOU "Petar Pop Arsov"</p>
        </div>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" /> --}}

  

</body>
</html>