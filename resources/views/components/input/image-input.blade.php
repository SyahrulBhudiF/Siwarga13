<div class="flex flex-col gap-2 w-full">
    <span class="text-Neutral/100 xl:text-base lg:text-xs font-medium">{{$slot}}</span>
    <div class="grid grid-cols-3 max-lg:grid-cols-2 gap-2">
        {{--Input 1--}}
        @php($value = json_decode(html_entity_decode($value)))
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file1" name="file1" accept="image/*" value="{{($value[0]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file1Old" value="{{($value[0]->path ?? '')}}">
            <div class="relative group {{($value[0]->path ?? '')? : 'hidden'}}">
                <img src="{{($value[0]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file1')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file1" id="labelFile1"
                   class="{{($value[0]->path ??'')? 'hidden' : 'flex'}} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>
        {{--Input 2--}}
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file2" name="file2" accept="image/*" value="{{($value[1]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file2Old" value="{{($value[1]->path ?? '')}}">
            <div class="relative group {{($value[1]->path ?? '')? : 'hidden'}}">
                <img src="{{($value[1]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file2')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file2" id="labelFile2"
                   class="{{($value[1]->path ??'')? 'hidden' : 'flex'}} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>
        {{--Input 3--}}
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file3" name="file3" accept="image/*" value="{{($value[2]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file3Old" value="{{($value[2]->path ?? '')}}">
            <div class="relative group {{($value[2]->path ?? '')? : 'hidden'}}">
                <img src="{{($value[2]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file3')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file3" id="labelFile3"
                   class="{{($value[2]->path ?? '')? 'hidden' : 'flex'}} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>
        {{--Input 4--}}
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file4" name="file4" accept="image/*" value="{{($value[3]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file4Old" value="{{($value[3]->path ?? '')}}">
            <div class="relative group {{($value[3]->path ?? '') ? : 'hidden'}}">
                <img src="{{($value[3]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file4')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file4" id="labelFile4"
                   class="{{($value[3]->path ?? '' ) ? 'hidden' : 'flex'}} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>
        {{--Input 5--}}
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file5" name="file5" accept="image/*" value="{{($value[4]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file5Old" value="{{($value[4]->path ?? '')}}">
            <div class="relative group {{($value[4]->path ?? '' ) ? : 'hidden'}}">
                <img src="{{($value[4]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file5')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file5" id="labelFile5"
                   class="{{($value[4]->path ?? '' ) ? 'hidden' : 'flex'}} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>
        {{--Input 6--}}
        <div
            class="flex items-center h-full justify-center xl:text-base lg:text-xs border border-Neutral/30 rounded-[1.25rem] focus:border-Primary/10 focus:text-Primary/10">
            <input type="file"
                   class="hidden"
                   id="file6" name="file6" accept="image/*" value="{{($value[5]->path ?? '')}}"
                   onchange="handleImage(this)">
            <input type="hidden" name="file6Old" value="{{($value[5]->path ?? '')}}">
            <div class="relative group {{($value[5]->path ?? '' ) ? : 'hidden'}}">
                <img src="{{($value[5]->path ?? '')}}" alt="img"
                     class="z-10 transition ease-in-out duration-300 group-hover:brightness-75 rounded-[1.5rem] object-cover p-4">
                <div onclick="removeImage('file6')"
                     class="absolute flex-col group-hover:flex hidden transition ease-in-out duration-300 cursor-pointer font-medium items-center top-[50%] left-[50%] transform -translate-x-[50%] -translate-y-[50%] z-20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"
                         fill="none">
                        <path
                            d="M21.5702 5.23C19.9602 5.07 18.3502 4.95 16.7302 4.86V4.85L16.5102 3.55C16.3602 2.63 16.1402 1.25 13.8002 1.25H11.1802C8.85016 1.25 8.63016 2.57 8.47016 3.54L8.26016 4.82C7.33016 4.88 6.40016 4.94 5.47016 5.03L3.43016 5.23C3.01016 5.27 2.71016 5.64 2.75016 6.05C2.79016 6.46 3.15016 6.76 3.57016 6.72L5.61016 6.52C10.8502 6 16.1302 6.2 21.4302 6.73C21.4602 6.73 21.4802 6.73 21.5102 6.73C21.8902 6.73 22.2202 6.44 22.2602 6.05C22.2902 5.64 21.9902 5.27 21.5702 5.23Z"
                            fill="white"/>
                        <path
                            d="M19.7302 8.14C19.4902 7.89 19.1602 7.75 18.8202 7.75H6.18024C5.84024 7.75 5.50024 7.89 5.27024 8.14C5.04024 8.39 4.91024 8.73 4.93024 9.08L5.55024 19.34C5.66024 20.86 5.80024 22.76 9.29024 22.76H15.7102C19.2002 22.76 19.3402 20.87 19.4502 19.34L20.0702 9.09C20.0902 8.73 19.9602 8.39 19.7302 8.14ZM14.1602 17.75H10.8302C10.4202 17.75 10.0802 17.41 10.0802 17C10.0802 16.59 10.4202 16.25 10.8302 16.25H14.1602C14.5702 16.25 14.9102 16.59 14.9102 17C14.9102 17.41 14.5702 17.75 14.1602 17.75ZM15.0002 13.75H10.0002C9.59024 13.75 9.25024 13.41 9.25024 13C9.25024 12.59 9.59024 12.25 10.0002 12.25H15.0002C15.4102 12.25 15.7502 12.59 15.7502 13C15.7502 13.41 15.4102 13.75 15.0002 13.75Z"
                            fill="white"/>
                    </svg>
                    Hapus
                </div>
            </div>
            <label for="file6" id="labelFile6"
                   class="{{($value[5]->path ?? '' ) ? 'hidden' : 'flex' }} text-nowrap my-16 justify-center cursor-pointer buttonAnimation items-center gap-2 py-3 px-4 text-xs text-Primary/10 rounded-[6.25rem] bg-[#F5F7F9]">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                     fill="none">
                    <path
                        d="M2 11V12.5C2 12.8978 2.15804 13.2794 2.43934 13.5607C2.72064 13.842 3.10218 14 3.5 14H12.5C12.8978 14 13.2794 13.842 13.5607 13.5607C13.842 13.2794 14 12.8978 14 12.5V11M5 5L8 2M8 2L11 5M8 2V11"
                        stroke="#025864" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Upload file
            </label>
        </div>


    </div>
    <span class="text-Neutral/80 text-sm font-medium">Maksimal perfile 2 mb dan maks upload dalam 1 sesi 8 mb</span>
    <span class="text-red-500 text-xs font-medium" id="warningText"></span>
</div>

<script>
    function handleImage(input) {
        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                const imgDiv = input.parentElement.querySelector('.relative');
                const img = imgDiv.querySelector('img');
                const label = input.parentElement.querySelector('label');

                img.src = e.target.result;
                imgDiv.classList.remove('hidden');
                label.classList.add('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(inputId) {
        const input = document.getElementById(inputId);
        const parentDiv = input.parentElement;
        const imgDiv = parentDiv.querySelector('.relative');
        const label = parentDiv.querySelector('label');
        const hiddenInput = parentDiv.querySelector(`input[name="${inputId}Old"]`);
        console.log(hiddenInput, inputId);

        input.value = '';
        hiddenInput.value = '';

        imgDiv.classList.add('hidden');

        label.classList.remove('hidden');
        label.classList.add('flex');
    }
</script>
