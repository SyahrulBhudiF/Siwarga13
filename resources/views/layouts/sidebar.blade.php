<div class="flex justify-between items-center p-3 bg-white rounded-xl">
    <div class="flex flex-col py-1 px-3">
        <p class="text-xs text-Primary/10 font-medium">Siwarga13</p>
        <p class="text-base text-Neutral/100 font-semibold">{{Auth::user()->name}}</p>
    </div>
    <div class="relative inline-block text-left">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none"
             class="buttonAnimation cursor-pointer" id="dropdownButton" onclick="toggleDropdown1()">
            <path
                d="M5.625 10.5C5.625 10.6658 5.55915 10.8247 5.44194 10.9419C5.32473 11.0592 5.16576 11.125 5 11.125C4.83424 11.125 4.67527 11.0592 4.55806 10.9419C4.44085 10.8247 4.375 10.6658 4.375 10.5C4.375 10.3342 4.44085 10.1753 4.55806 10.0581C4.67527 9.94085 4.83424 9.875 5 9.875C5.16576 9.875 5.32473 9.94085 5.44194 10.0581C5.55915 10.1753 5.625 10.3342 5.625 10.5ZM10.625 10.5C10.625 10.6658 10.5592 10.8247 10.4419 10.9419C10.3247 11.0592 10.1658 11.125 10 11.125C9.83424 11.125 9.67527 11.0592 9.55806 10.9419C9.44085 10.8247 9.375 10.6658 9.375 10.5C9.375 10.3342 9.44085 10.1753 9.55806 10.0581C9.67527 9.94085 9.83424 9.875 10 9.875C10.1658 9.875 10.3247 9.94085 10.4419 10.0581C10.5592 10.1753 10.625 10.3342 10.625 10.5ZM15.625 10.5C15.625 10.6658 15.5592 10.8247 15.4419 10.9419C15.3247 11.0592 15.1658 11.125 15 11.125C14.8342 11.125 14.6753 11.0592 14.5581 10.9419C14.4408 10.8247 14.375 10.6658 14.375 10.5C14.375 10.3342 14.4408 10.1753 14.5581 10.0581C14.6753 9.94085 14.8342 9.875 15 9.875C15.1658 9.875 15.3247 9.94085 15.4419 10.0581C15.5592 10.1753 15.625 10.3342 15.625 10.5Z"
                stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path
                d="M5.625 10.5C5.625 10.6658 5.55915 10.8247 5.44194 10.9419C5.32473 11.0592 5.16576 11.125 5 11.125C4.83424 11.125 4.67527 11.0592 4.55806 10.9419C4.44085 10.8247 4.375 10.6658 4.375 10.5C4.375 10.3342 4.44085 10.1753 4.55806 10.0581C4.67527 9.94085 4.83424 9.875 5 9.875C5.16576 9.875 5.32473 9.94085 5.44194 10.0581C5.55915 10.1753 5.625 10.3342 5.625 10.5ZM10.625 10.5C10.625 10.6658 10.5592 10.8247 10.4419 10.9419C10.3247 11.0592 10.1658 11.125 10 11.125C9.83424 11.125 9.67527 11.0592 9.55806 10.9419C9.44085 10.8247 9.375 10.6658 9.375 10.5C9.375 10.3342 9.44085 10.1753 9.55806 10.0581C9.67527 9.94085 9.83424 9.875 10 9.875C10.1658 9.875 10.3247 9.94085 10.4419 10.0581C10.5592 10.1753 10.625 10.3342 10.625 10.5ZM15.625 10.5C15.625 10.6658 15.5592 10.8247 15.4419 10.9419C15.3247 11.0592 15.1658 11.125 15 11.125C14.8342 11.125 14.6753 11.0592 14.5581 10.9419C14.4408 10.8247 14.375 10.6658 14.375 10.5C14.375 10.3342 14.4408 10.1753 14.5581 10.0581C14.6753 9.94085 14.8342 9.875 15 9.875C15.1658 9.875 15.3247 9.94085 15.4419 10.0581C15.5592 10.1753 15.625 10.3342 15.625 10.5Z"
                stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div id="dropdownMenu"
             class="origin-top-right absolute right-0 mt-2 w-[10vh] py-1 px-2 shadow rounded-xl text-xs bg-white border border-Neutral/30 gap-4 hidden">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <a href="{{ route('logout') }}"
                   class="block cursor-pointer hover:bg-Neutral/20 hover:text-Primary/10 py-1 px-2 rounded-md transition ease-in-out duration-2000"
                   role="menuitem"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-col h-full justify-between p-5">
    <div class="flex flex-col gap-6">
        {{--Start Content Sidebar--}}
        <div class="flex flex-col gap-3">
            <p class="text-xs font-normal text-Neutral/80">Pendataan Warga</p>
            @if (Auth::user()->role == 'RW')
                <a class="{{$data['active']== 'beranda'? 'activeSidebar' : 'defaultSidebar'}}" href="">
                    <img src="{{asset("svg/side.svg")}}"
                         class="absolute left-0 {{$data['active']== 'beranda'? 'block' : 'hidden'}}" alt="side">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M14.825 18.9581H5.17499C2.89166 18.9581 1.04166 17.0998 1.04166 14.8165V8.64148C1.04166 7.50815 1.74166 6.08315 2.64166 5.38315L7.13332 1.88315C8.48332 0.833149 10.6417 0.783149 12.0417 1.76648L17.1917 5.37482C18.1833 6.06648 18.9583 7.54982 18.9583 8.75815V14.8248C18.9583 17.0998 17.1083 18.9581 14.825 18.9581ZM7.89999 2.86648L3.40832 6.36648C2.81666 6.83315 2.29166 7.89148 2.29166 8.64148V14.8165C2.29166 16.4081 3.58332 17.7081 5.17499 17.7081H14.825C16.4167 17.7081 17.7083 16.4165 17.7083 14.8248V8.75815C17.7083 7.95815 17.1333 6.84982 16.475 6.39982L11.325 2.79148C10.375 2.12482 8.80832 2.15815 7.89999 2.86648Z"
                            class="{{$data['active']== 'beranda'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                        <path
                            d="M10 15.625C9.65833 15.625 9.375 15.3417 9.375 15V12.5C9.375 12.1583 9.65833 11.875 10 11.875C10.3417 11.875 10.625 12.1583 10.625 12.5V15C10.625 15.3417 10.3417 15.625 10 15.625Z"
                            class="{{$data['active']== 'beranda'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                    </svg>
                    <p class="{{$data['active']== 'beranda'? 'activeFontSidebar' : 'defaultFontSidebar'}}">Beranda</p>
                </a>
            @endif
            <a class="{{$data['active']== 'warga'? 'activeSidebar' : 'defaultSidebar'}}" href="/warga">
                <img src="{{asset("svg/side.svg")}}"
                     class="absolute left-0 {{$data['active']== 'warga'? 'block' : 'hidden'}}" alt="side">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M7.63302 9.68317C7.60802 9.68317 7.59135 9.68317 7.56635 9.68317C7.52468 9.67484 7.46635 9.67484 7.41635 9.68317C4.99968 9.60817 3.17468 7.70817 3.17468 5.3665C3.17468 2.98317 5.11635 1.0415 7.49968 1.0415C9.88302 1.0415 11.8247 2.98317 11.8247 5.3665C11.8163 7.70817 9.98302 9.60817 7.65802 9.68317C7.64968 9.68317 7.64135 9.68317 7.63302 9.68317ZM7.49968 2.2915C5.80802 2.2915 4.42468 3.67484 4.42468 5.3665C4.42468 7.03317 5.72468 8.37484 7.38302 8.43317C7.43302 8.42484 7.54135 8.42484 7.64968 8.43317C9.28302 8.35817 10.5663 7.0165 10.5747 5.3665C10.5747 3.67484 9.19135 2.2915 7.49968 2.2915Z"
                        class="{{$data['active']== 'warga'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    <path
                        d="M13.783 9.79183C13.758 9.79183 13.733 9.79183 13.708 9.7835C13.3663 9.81683 13.0163 9.57516 12.983 9.2335C12.9497 8.89183 13.158 8.5835 13.4997 8.54183C13.5997 8.5335 13.708 8.5335 13.7997 8.5335C15.0163 8.46683 15.9663 7.46683 15.9663 6.24183C15.9663 4.97516 14.9413 3.95016 13.6747 3.95016C13.333 3.9585 13.0497 3.67516 13.0497 3.3335C13.0497 2.99183 13.333 2.7085 13.6747 2.7085C15.6247 2.7085 17.2163 4.30016 17.2163 6.25016C17.2163 8.16683 15.7163 9.71683 13.808 9.79183C13.7997 9.79183 13.7913 9.79183 13.783 9.79183Z"
                        class="{{$data['active']== 'warga'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    <path
                        d="M7.64134 18.7918C6.00801 18.7918 4.36634 18.3752 3.12467 17.5418C1.96634 16.7752 1.33301 15.7252 1.33301 14.5835C1.33301 13.4418 1.96634 12.3835 3.12467 11.6085C5.62467 9.95016 9.67467 9.95016 12.158 11.6085C13.308 12.3752 13.9497 13.4252 13.9497 14.5668C13.9497 15.7085 13.3163 16.7668 12.158 17.5418C10.908 18.3752 9.27467 18.7918 7.64134 18.7918ZM3.81634 12.6585C3.01634 13.1918 2.58301 13.8752 2.58301 14.5918C2.58301 15.3002 3.02467 15.9835 3.81634 16.5085C5.89134 17.9002 9.39134 17.9002 11.4663 16.5085C12.2663 15.9752 12.6997 15.2918 12.6997 14.5752C12.6997 13.8668 12.258 13.1835 11.4663 12.6585C9.39134 11.2752 5.89134 11.2752 3.81634 12.6585Z"
                        class="{{$data['active']== 'warga'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    <path
                        d="M15.283 17.2917C14.9913 17.2917 14.733 17.0917 14.6747 16.7917C14.608 16.45 14.8247 16.125 15.158 16.05C15.683 15.9417 16.1663 15.7333 16.5413 15.4417C17.0163 15.0833 17.2747 14.6333 17.2747 14.1583C17.2747 13.6833 17.0163 13.2333 16.5497 12.8833C16.183 12.6 15.7247 12.4 15.183 12.275C14.8497 12.2 14.633 11.8667 14.708 11.525C14.783 11.1917 15.1163 10.975 15.458 11.05C16.1747 11.2083 16.7997 11.4917 17.308 11.8833C18.083 12.4667 18.5247 13.2917 18.5247 14.1583C18.5247 15.025 18.0747 15.85 17.2997 16.4417C16.783 16.8417 16.133 17.1333 15.4163 17.275C15.3663 17.2917 15.3247 17.2917 15.283 17.2917Z"
                        class="{{$data['active']== 'warga'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                </svg>
                <p class="{{$data['active']== 'warga'? 'activeFontSidebar' : 'defaultFontSidebar'}}">Kelola Data
                    Warga</p>
            </a>
            @if (Auth::user()->role == 'RW')
                <a class="{{$data['active']== 'bansos'? 'activeSidebar' : 'defaultSidebar'}}" href="/bansos">
                    <img src="{{asset("svg/side.svg")}}"
                         class="absolute left-0 {{$data['active']== 'bansos'? 'block' : 'hidden'}}" alt="side">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                            d="M12.5 18.9582H7.49999C2.97499 18.9582 1.04166 17.0248 1.04166 12.4998V7.49984C1.04166 2.97484 2.97499 1.0415 7.49999 1.0415H12.5C17.025 1.0415 18.9583 2.97484 18.9583 7.49984V12.4998C18.9583 17.0248 17.025 18.9582 12.5 18.9582ZM7.49999 2.2915C3.65832 2.2915 2.29166 3.65817 2.29166 7.49984V12.4998C2.29166 16.3415 3.65832 17.7082 7.49999 17.7082H12.5C16.3417 17.7082 17.7083 16.3415 17.7083 12.4998V7.49984C17.7083 3.65817 16.3417 2.2915 12.5 2.2915H7.49999Z"
                            class="{{$data['active']== 'bansos'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                        <path
                            d="M10.0001 10.8999C9.89177 10.8999 9.78344 10.8749 9.68344 10.8166L5.26678 8.26658C4.96678 8.09158 4.86676 7.70825 5.04176 7.41658C5.21676 7.11658 5.60011 7.01658 5.89178 7.19158L9.99177 9.56658L14.0668 7.20825C14.3668 7.03325 14.7501 7.14158 14.9168 7.43325C15.0834 7.72491 14.9834 8.11658 14.6918 8.28325L10.3084 10.8166C10.2168 10.8666 10.1084 10.8999 10.0001 10.8999Z"
                            class="{{$data['active']== 'bansos'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                        <path
                            d="M10 15.4332C9.65833 15.4332 9.375 15.1499 9.375 14.8082V10.2749C9.375 9.93324 9.65833 9.6499 10 9.6499C10.3417 9.6499 10.625 9.93324 10.625 10.2749V14.8082C10.625 15.1499 10.3417 15.4332 10 15.4332Z"
                            class="{{$data['active']== 'bansos'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                        <path
                            d="M10.0002 15.6252C9.51687 15.6252 9.04188 15.5168 8.65855 15.3085L5.99187 13.8252C5.19187 13.3835 4.5752 12.3252 4.5752 11.4085V8.5835C4.5752 7.67516 5.20021 6.61683 5.99187 6.16683L8.65855 4.6835C9.42522 4.2585 10.5752 4.2585 11.3419 4.6835L14.0085 6.16683C14.8085 6.60849 15.4252 7.66683 15.4252 8.5835V11.4085C15.4252 12.3168 14.8002 13.3752 14.0085 13.8252L11.3419 15.3085C10.9585 15.5252 10.4835 15.6252 10.0002 15.6252ZM10.0002 5.62516C9.7252 5.62516 9.45853 5.67516 9.26687 5.7835L6.60021 7.26683C6.19188 7.49183 5.8252 8.12516 5.8252 8.5835V11.4085C5.8252 11.8752 6.19188 12.5002 6.60021 12.7252L9.26687 14.2085C9.6502 14.4252 10.3502 14.4252 10.7335 14.2085L13.4002 12.7252C13.8085 12.5002 14.1752 11.8668 14.1752 11.4085V8.5835C14.1752 8.11683 13.8085 7.49183 13.4002 7.26683L10.7335 5.7835C10.5419 5.67516 10.2752 5.62516 10.0002 5.62516Z"
                            class="{{$data['active']== 'bansos'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                        />
                    </svg>
                    <p class="{{$data['active']== 'bansos'? 'activeFontSidebar' : 'defaultFontSidebar'}}">Bansos</p>
                </a>
            @endif
        </div>
        <div class="flex flex-col gap-3">
            <p class="text-xs font-normal text-Neutral/80">Manajemen Konten Website</p>
            <a class="{{$data['active']== 'pengumuman'? 'activeSidebar' : 'defaultSidebar'}}" href="">
                <img src="{{asset("svg/side.svg")}}"
                     class="absolute left-0 {{$data['active']== 'pengumuman'? 'block' : 'hidden'}}" alt="side">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M4.29166 18.9582C3.94999 18.9582 3.66666 18.6748 3.66666 18.3332V1.6665C3.66666 1.32484 3.94999 1.0415 4.29166 1.0415C4.63332 1.0415 4.91666 1.32484 4.91666 1.6665V18.3332C4.91666 18.6748 4.63332 18.9582 4.29166 18.9582Z"
                        class="{{$data['active']== 'pengumuman'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M13.625 13.9585H4.29166C3.94999 13.9585 3.66666 13.6752 3.66666 13.3335C3.66666 12.9918 3.94999 12.7085 4.29166 12.7085H13.625C14.5333 12.7085 14.9583 12.4668 15.0417 12.2585C15.125 12.0502 15 11.5835 14.35 10.9418L13.35 9.94183C12.9417 9.5835 12.6917 9.04183 12.6667 8.44183C12.6417 7.8085 12.8917 7.1835 13.35 6.72516L14.35 5.72516C14.9667 5.1085 15.1583 4.6085 15.0667 4.39183C14.975 4.17516 14.5 3.9585 13.625 3.9585H4.29166C3.94166 3.9585 3.66666 3.67516 3.66666 3.3335C3.66666 2.99183 3.94999 2.7085 4.29166 2.7085H13.625C15.45 2.7085 16.0333 3.46683 16.225 3.91683C16.4083 4.36683 16.5333 5.31683 15.2333 6.61683L14.2333 7.61683C14.025 7.82516 13.9083 8.11683 13.9167 8.4085C13.925 8.6585 14.025 8.8835 14.2 9.04183L15.2333 10.0668C16.5083 11.3418 16.3833 12.2918 16.2 12.7502C16.0083 13.1918 15.4167 13.9585 13.625 13.9585Z"
                        class="{{$data['active']== 'pengumuman'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                </svg>
                <p class="{{$data['active']== 'pengumuman'? 'activeFontSidebar' : 'defaultFontSidebar'}}">Pengumuman</p>
            </a>
            <a class="{{$data['active']== 'umkm'? 'activeSidebar' : 'defaultSidebar'}}" href="">
                <img src="{{asset("svg/side.svg")}}"
                     class="absolute left-0 {{$data['active']== 'umkm'? 'block' : 'hidden'}}" alt="side">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M12.25 18.9584H7.75C3.63333 18.9584 1.88333 17.2001 1.88333 13.0918V9.3501C1.88333 9.00843 2.16666 8.7251 2.50833 8.7251C2.85 8.7251 3.13333 9.00843 3.13333 9.3501V13.0918C3.13333 16.5001 4.34166 17.7084 7.75 17.7084H12.2417C15.65 17.7084 16.8583 16.5001 16.8583 13.0918V9.3501C16.8583 9.00843 17.1417 8.7251 17.4833 8.7251C17.825 8.7251 18.1083 9.00843 18.1083 9.3501V13.0918C18.1167 17.2001 16.3583 18.9584 12.25 18.9584Z"
                        class="{{$data['active']== 'umkm'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M10 10.6248C9.08334 10.6248 8.25001 10.2665 7.65834 9.60817C7.06668 8.94984 6.79168 8.0915 6.88334 7.17484L7.44168 1.60817C7.47501 1.2915 7.74168 1.0415 8.06668 1.0415H11.9583C12.2833 1.0415 12.55 1.28317 12.5833 1.60817L13.1417 7.17484C13.2333 8.0915 12.9583 8.94984 12.3667 9.60817C11.75 10.2665 10.9167 10.6248 10 10.6248ZM8.62501 2.2915L8.12501 7.29984C8.06668 7.85817 8.23334 8.38317 8.58334 8.7665C9.29168 9.54984 10.7083 9.54984 11.4167 8.7665C11.7667 8.37484 11.9333 7.84984 11.875 7.29984L11.375 2.2915H8.62501Z"
                        class="{{$data['active']== 'umkm'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M15.2583 10.6248C13.5667 10.6248 12.0583 9.25817 11.8833 7.57484L11.3 1.73317C11.2833 1.55817 11.3417 1.38317 11.4583 1.24984C11.575 1.1165 11.7417 1.0415 11.925 1.0415H14.4667C16.9167 1.0415 18.0583 2.0665 18.4 4.58317L18.6333 6.89984C18.7333 7.88317 18.4333 8.8165 17.7917 9.52484C17.15 10.2332 16.25 10.6248 15.2583 10.6248ZM12.6167 2.2915L13.1333 7.44984C13.2417 8.4915 14.2083 9.37484 15.2583 9.37484C15.8917 9.37484 16.4583 9.13317 16.8667 8.6915C17.2667 8.24984 17.45 7.65817 17.3917 7.02484L17.1583 4.73317C16.9 2.84984 16.2917 2.2915 14.4667 2.2915H12.6167Z"
                        class="{{$data['active']== 'umkm'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M4.69999 10.6248C3.70832 10.6248 2.80832 10.2332 2.16665 9.52484C1.52499 8.8165 1.22499 7.88317 1.32499 6.89984L1.54999 4.60817C1.89999 2.0665 3.04165 1.0415 5.49165 1.0415H8.03332C8.20832 1.0415 8.37499 1.1165 8.49999 1.24984C8.62499 1.38317 8.67499 1.55817 8.65832 1.73317L8.07499 7.57484C7.89999 9.25817 6.39165 10.6248 4.69999 10.6248ZM5.49165 2.2915C3.66665 2.2915 3.05832 2.8415 2.79165 4.74984L2.56665 7.02484C2.49999 7.65817 2.69165 8.24984 3.09165 8.6915C3.49165 9.13317 4.05832 9.37484 4.69999 9.37484C5.74999 9.37484 6.72499 8.4915 6.82499 7.44984L7.34165 2.2915H5.49165Z"
                        class="{{$data['active']== 'umkm'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M12.0833 18.9582H7.91666C7.57499 18.9582 7.29166 18.6748 7.29166 18.3332V16.2498C7.29166 14.4998 8.24999 13.5415 9.99999 13.5415C11.75 13.5415 12.7083 14.4998 12.7083 16.2498V18.3332C12.7083 18.6748 12.425 18.9582 12.0833 18.9582ZM8.54166 17.7082H11.4583V16.2498C11.4583 15.1998 11.05 14.7915 9.99999 14.7915C8.94999 14.7915 8.54166 15.1998 8.54166 16.2498V17.7082Z"
                        class="{{$data['active']== 'umkm'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                </svg>
                <p class="{{$data['active']== 'umkm'? 'activeFontSidebar' : 'defaultFontSidebar'}}">UMKM</p>
            </a>
            <a class="{{$data['active']== 'kegiatan'? 'activeSidebar' : 'defaultSidebar'}}" href="">
                <img src="{{asset("svg/side.svg")}}"
                     class="absolute left-0 {{$data['active']== 'kegiatan'? 'block' : 'hidden'}}" alt="side">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path
                        d="M17.1833 10.8916C16.8667 10.8916 16.6 10.65 16.5583 10.3333C16.3583 8.44996 15.3417 6.74163 13.775 5.6583C13.4917 5.4583 13.425 5.07496 13.6167 4.79163C13.8167 4.5083 14.2083 4.44163 14.4833 4.6333C16.35 5.92496 17.55 7.9583 17.7917 10.2C17.825 10.5416 17.5833 10.85 17.2333 10.8916C17.225 10.8916 17.2 10.8916 17.1833 10.8916Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M2.90835 10.9332C2.88335 10.9332 2.86668 10.9332 2.84168 10.9332C2.50001 10.8916 2.25001 10.5832 2.28335 10.2416C2.50835 7.99989 3.70001 5.97489 5.54168 4.66656C5.82501 4.46656 6.21668 4.53322 6.41668 4.81656C6.61668 5.09989 6.55001 5.49156 6.26668 5.69156C4.71668 6.78322 3.71668 8.49156 3.52501 10.3749C3.50001 10.6916 3.22501 10.9332 2.90835 10.9332Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M10.05 18.8415C8.81666 18.8415 7.64166 18.5581 6.54166 18.0081C6.23332 17.8498 6.10832 17.4748 6.26666 17.1665C6.42499 16.8581 6.79999 16.7331 7.10832 16.8915C8.90832 17.7998 11.075 17.8165 12.8917 16.9415C13.2 16.7915 13.575 16.9248 13.725 17.2331C13.875 17.5415 13.7417 17.9165 13.4333 18.0665C12.3667 18.5831 11.2333 18.8415 10.05 18.8415Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M10.05 7.03324C8.425 7.03324 7.10834 5.71657 7.10834 4.09157C7.10834 2.46657 8.425 1.1499 10.05 1.1499C11.675 1.1499 12.9917 2.46657 12.9917 4.09157C12.9917 5.71657 11.6667 7.03324 10.05 7.03324ZM10.05 2.40824C9.11667 2.40824 8.35834 3.16657 8.35834 4.0999C8.35834 5.03324 9.11667 5.79157 10.05 5.79157C10.9833 5.79157 11.7417 5.03324 11.7417 4.0999C11.7417 3.16657 10.975 2.40824 10.05 2.40824Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M4.02501 17.2251C2.40001 17.2251 1.08334 15.9085 1.08334 14.2835C1.08334 12.6668 2.40001 11.3418 4.02501 11.3418C5.65001 11.3418 6.96668 12.6585 6.96668 14.2835C6.96668 15.9001 5.65001 17.2251 4.02501 17.2251ZM4.02501 12.5918C3.09168 12.5918 2.33334 13.3501 2.33334 14.2835C2.33334 15.2168 3.09168 15.9751 4.02501 15.9751C4.95834 15.9751 5.71668 15.2168 5.71668 14.2835C5.71668 13.3501 4.95834 12.5918 4.02501 12.5918Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                    <path
                        d="M15.975 17.2251C14.35 17.2251 13.0333 15.9085 13.0333 14.2835C13.0333 12.6668 14.35 11.3418 15.975 11.3418C17.6 11.3418 18.9167 12.6585 18.9167 14.2835C18.9083 15.9001 17.5917 17.2251 15.975 17.2251ZM15.975 12.5918C15.0417 12.5918 14.2833 13.3501 14.2833 14.2835C14.2833 15.2168 15.0417 15.9751 15.975 15.9751C16.9083 15.9751 17.6667 15.2168 17.6667 14.2835C17.6583 13.3501 16.9083 12.5918 15.975 12.5918Z"
                        class="{{$data['active']== 'kegiatan'? 'fill-[#025864]' : 'fill-[#7F7F7F]'}}"/>
                    />
                </svg>
                <p class="{{$data['active']== 'kegiatan'? 'activeFontSidebar' : 'defaultFontSidebar'}}">Kegiatan</p>
            </a>
        </div>
    </div>
    <a class="defaultSidebar" href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path
                d="M14.5417 18.9582C13.6 18.9582 12.6083 18.7332 11.5833 18.2998C10.5833 17.8748 9.57499 17.2915 8.59166 16.5832C7.61666 15.8665 6.67499 15.0665 5.78332 14.1915C4.89999 13.2998 4.09999 12.3582 3.39166 11.3915C2.67499 10.3915 2.09999 9.3915 1.69166 8.42484C1.25832 7.3915 1.04166 6.3915 1.04166 5.44984C1.04166 4.79984 1.15832 4.18317 1.38332 3.60817C1.61666 3.0165 1.99166 2.4665 2.49999 1.9915C3.14166 1.35817 3.87499 1.0415 4.65832 1.0415C4.98332 1.0415 5.31666 1.1165 5.59999 1.24984C5.92499 1.39984 6.19999 1.62484 6.39999 1.92484L8.33332 4.64984C8.50832 4.8915 8.64166 5.12484 8.73332 5.35817C8.84166 5.60817 8.89999 5.85817 8.89999 6.09984C8.89999 6.4165 8.80832 6.72484 8.63332 7.0165C8.50832 7.2415 8.31666 7.48317 8.07499 7.72484L7.50832 8.3165C7.51666 8.3415 7.52499 8.35817 7.53332 8.37484C7.63332 8.54984 7.83332 8.84984 8.21666 9.29984C8.62499 9.7665 9.00832 10.1915 9.39166 10.5832C9.88332 11.0665 10.2917 11.4498 10.675 11.7665C11.15 12.1665 11.4583 12.3665 11.6417 12.4582L11.625 12.4998L12.2333 11.8998C12.4917 11.6415 12.7417 11.4498 12.9833 11.3248C13.4417 11.0415 14.025 10.9915 14.6083 11.2332C14.825 11.3248 15.0583 11.4498 15.3083 11.6248L18.075 13.5915C18.3833 13.7998 18.6083 14.0665 18.7417 14.3832C18.8667 14.6998 18.925 14.9915 18.925 15.2832C18.925 15.6832 18.8333 16.0832 18.6583 16.4582C18.4833 16.8332 18.2667 17.1582 17.9917 17.4582C17.5167 17.9832 17 18.3582 16.4 18.5998C15.825 18.8332 15.2 18.9582 14.5417 18.9582ZM4.65832 2.2915C4.19999 2.2915 3.77499 2.4915 3.36666 2.8915C2.98332 3.24984 2.71666 3.6415 2.54999 4.0665C2.37499 4.49984 2.29166 4.95817 2.29166 5.44984C2.29166 6.22484 2.47499 7.0665 2.84166 7.93317C3.21666 8.8165 3.74166 9.73317 4.40832 10.6498C5.07499 11.5665 5.83332 12.4582 6.66666 13.2998C7.49999 14.1248 8.39999 14.8915 9.32499 15.5665C10.225 16.2248 11.15 16.7582 12.0667 17.1415C13.4917 17.7498 14.825 17.8915 15.925 17.4332C16.35 17.2582 16.725 16.9915 17.0667 16.6082C17.2583 16.3998 17.4083 16.1748 17.5333 15.9082C17.6333 15.6998 17.6833 15.4832 17.6833 15.2665C17.6833 15.1332 17.6583 14.9998 17.5917 14.8498C17.5667 14.7998 17.5167 14.7082 17.3583 14.5998L14.5917 12.6332C14.425 12.5165 14.275 12.4332 14.1333 12.3748C13.95 12.2998 13.875 12.2248 13.5917 12.3998C13.425 12.4832 13.275 12.6082 13.1083 12.7748L12.475 13.3998C12.15 13.7165 11.65 13.7915 11.2667 13.6498L11.0417 13.5498C10.7 13.3665 10.3 13.0832 9.85832 12.7082C9.45832 12.3665 9.02499 11.9665 8.49999 11.4498C8.09166 11.0332 7.68332 10.5915 7.25832 10.0998C6.86666 9.6415 6.58332 9.24984 6.40832 8.92484L6.30832 8.67484C6.25832 8.48317 6.24166 8.37484 6.24166 8.25817C6.24166 7.95817 6.34999 7.6915 6.55832 7.48317L7.18332 6.83317C7.34999 6.6665 7.47499 6.50817 7.55832 6.3665C7.62499 6.25817 7.64999 6.1665 7.64999 6.08317C7.64999 6.0165 7.62499 5.9165 7.58332 5.8165C7.52499 5.68317 7.43332 5.53317 7.31666 5.37484L5.38332 2.6415C5.29999 2.52484 5.19999 2.4415 5.07499 2.38317C4.94166 2.32484 4.79999 2.2915 4.65832 2.2915ZM11.625 12.5082L11.4917 13.0748L11.7167 12.4915C11.675 12.4832 11.6417 12.4915 11.625 12.5082Z"
                fill="#7F7F7F"/>
            <path
                d="M15.4167 8.12516C15.075 8.12516 14.7917 7.84183 14.7917 7.50016C14.7917 7.20016 14.4917 6.57516 13.9917 6.04183C13.5 5.51683 12.9583 5.2085 12.5 5.2085C12.1583 5.2085 11.875 4.92516 11.875 4.5835C11.875 4.24183 12.1583 3.9585 12.5 3.9585C13.3083 3.9585 14.1583 4.39183 14.9 5.1835C15.5917 5.92516 16.0417 6.8335 16.0417 7.50016C16.0417 7.84183 15.7583 8.12516 15.4167 8.12516Z"
                fill="#7F7F7F"/>
            <path
                d="M18.3333 8.12484C17.9917 8.12484 17.7083 7.8415 17.7083 7.49984C17.7083 4.62484 15.375 2.2915 12.5 2.2915C12.1583 2.2915 11.875 2.00817 11.875 1.6665C11.875 1.32484 12.1583 1.0415 12.5 1.0415C16.0583 1.0415 18.9583 3.9415 18.9583 7.49984C18.9583 7.8415 18.675 8.12484 18.3333 8.12484Z"
                fill="#7F7F7F"/>
        </svg>
        <p class="defaultFontSidebar">Kontak Operator</p>
    </a>
</div>
