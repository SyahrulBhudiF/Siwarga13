<div class="dropdown dropdown-end">
    <button onclick="activeFilter(this)" id="filterInput"
            class="transition ease-in-out duration-200 flex gap-2 font-normal items-center rounded-[1.25rem] text-Neutral/100 border border-Neutral/30 xl:px-[1vw] xl:text-sm lg:px-[1vw] lg:py-[0.5rem] lg:text-xs xl:py-[0.625rem]">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
             class="transition-all ease-in-out duration-200">
            <path
                d="M18.3333 15.208H12.5C12.1583 15.208 11.875 14.9247 11.875 14.583C11.875 14.2413 12.1583 13.958 12.5 13.958H18.3333C18.675 13.958 18.9583 14.2413 18.9583 14.583C18.9583 14.9247 18.675 15.208 18.3333 15.208Z"
                class="fill-[#025864]"/>
            <path
                d="M4.16675 15.208H1.66675C1.32508 15.208 1.04175 14.9247 1.04175 14.583C1.04175 14.2413 1.32508 13.958 1.66675 13.958H4.16675C4.50841 13.958 4.79175 14.2413 4.79175 14.583C4.79175 14.9247 4.50841 15.208 4.16675 15.208Z"
                class="fill-[#025864]"/>
            <path
                d="M18.3333 6.04199H15.8333C15.4916 6.04199 15.2083 5.75866 15.2083 5.41699C15.2083 5.07533 15.4916 4.79199 15.8333 4.79199H18.3333C18.6749 4.79199 18.9583 5.07533 18.9583 5.41699C18.9583 5.75866 18.6749 6.04199 18.3333 6.04199Z"
                class="fill-[#025864]"/>
            <path
                d="M7.50008 6.04199H1.66675C1.32508 6.04199 1.04175 5.75866 1.04175 5.41699C1.04175 5.07533 1.32508 4.79199 1.66675 4.79199H7.50008C7.84175 4.79199 8.12508 5.07533 8.12508 5.41699C8.12508 5.75866 7.84175 6.04199 7.50008 6.04199Z"
                class="fill-[#025864]"/>
            <path
                d="M10.8334 17.708H5.83341C4.40008 17.708 3.54175 16.8497 3.54175 15.4163V13.7497C3.54175 12.3163 4.40008 11.458 5.83341 11.458H10.8334C12.2667 11.458 13.1251 12.3163 13.1251 13.7497V15.4163C13.1251 16.8497 12.2667 17.708 10.8334 17.708ZM5.83341 12.708C5.09175 12.708 4.79175 13.008 4.79175 13.7497V15.4163C4.79175 16.158 5.09175 16.458 5.83341 16.458H10.8334C11.5751 16.458 11.8751 16.158 11.8751 15.4163V13.7497C11.8751 13.008 11.5751 12.708 10.8334 12.708H5.83341Z"
                class="fill-[#025864]"/>
            <path
                d="M14.1667 8.54199H9.16667C7.73333 8.54199 6.875 7.68366 6.875 6.25033V4.58366C6.875 3.15033 7.73333 2.29199 9.16667 2.29199H14.1667C15.6 2.29199 16.4583 3.15033 16.4583 4.58366V6.25033C16.4583 7.68366 15.6 8.54199 14.1667 8.54199ZM9.16667 3.54199C8.425 3.54199 8.125 3.84199 8.125 4.58366V6.25033C8.125 6.99199 8.425 7.29199 9.16667 7.29199H14.1667C14.9083 7.29199 15.2083 6.99199 15.2083 6.25033V4.58366C15.2083 3.84199 14.9083 3.54199 14.1667 3.54199H9.16667Z"
                class="fill-[#025864]"/>
        </svg>
        {{$slot}}
        <span id="count"
              class="hidden rounded-full bg-Primary/10 h-[1.2rem] w-[1.2rem] text-[0.6875rem] text-white transition ease-in-out duration-200"></span>
    </button>
    <form tabindex="0" action="{{ route('warga.index') }}" method="GET"
          class="dropdown-content z-[1] menu p-5 mt-2 shadow bg-white rounded-[1.25rem] lg:w-[35vw] 2xl:w-[30vw] flex flex-col gap-5 justify-center border border-Neutral/30">
        @csrf
        <input type="hidden" name="rt" value="{{ request()->get('rt') }}">
        <div class="flex justify-between items-center">
            <p class="text-Neutral/100 font-medium 2xl:text-xl lg:text-sm">Filter</p>
            <span onclick="resetInput()"
                  class="cursor-pointer font-semibold xl:text-sm lg:text-xs text-[#E14942]">Reset</span>
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-Neutral/100 text-sm font-medium">Peran Keluarga</p>
            <div class="groupInput">
                <x-input.radio-input name="peran" id="kepala"
                                     value="Kepala keluarga"
                                     checked="{{ request()->get('peran') == 'Kepala keluarga' }}">
                    Kepala Keluarga
                </x-input.radio-input>
                <x-input.radio-input name="peran" id="anggota"
                                     value="Anggota keluarga"
                                     checked="{{ request()->get('peran') == 'Anggota keluarga'}}">
                    Anggota Keluarga
                </x-input.radio-input>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-Neutral/100 text-sm font-medium">Jenis Kelamin</p>
            <div class="groupInput">
                <x-input.radio-input name="gender" id="laki"
                                     value="Laki-laki" checked="{{ request()->get('gender') == 'Laki-laki'}}">
                    Laki-laki
                </x-input.radio-input>
                <x-input.radio-input name="gender" id="perempuan"
                                     value="Perempuan" checked="{{ request()->get('gender') == 'Perempuan'}}">
                    Perempuan
                </x-input.radio-input>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-Neutral/100 text-sm font-medium">Status Warga</p>
            <div class="groupInput">
                <x-input.checkbox-input name="status" id="hidup" value="Hidup"
                                        checked="{{ request()->get('status') == 'Hidup'}}">
                    Hidup
                </x-input.checkbox-input>
                <x-input.checkbox-input name="status" id="meninggal" value="Meninggal"
                                        checked="{{ request()->get('status') == 'Meninggal'}}">
                    Meninggal
                </x-input.checkbox-input>
                <x-input.checkbox-input name="status" id="pindah" value="Pindah"
                                        checked="{{ request()->get('status') == 'Pindah'}}">
                    Pindah
                </x-input.checkbox-input>
            </div>
        </div>
        <button type="submit"
                class="transition-all ease-in-out duration-200 py-3 px-7 bg-Neutral/40 text-white rounded-[6.25rem] text-center xl:text-base lg:text-sm font-medium pointer-events-none">
            Terapkan
        </button>
    </form>
</div>
