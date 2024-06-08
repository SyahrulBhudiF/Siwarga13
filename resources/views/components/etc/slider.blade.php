@props(['dt'])

<div class="w-full">
    <swiper-container id="swiper-container-hero" class="mySwiper overflow-hidden rounded-xl"
                      pagination="true"
                      init="false" pagination-clickable="true" space-between="30" effect="fade"
                      navigation="true">
        @foreach($dt as $data)
            <swiper-slide>
                <div class="image">
                    <img src="{{$data->path}}" alt="image">
                </div>
            </swiper-slide>
        @endforeach
    </swiper-container>
</div>
<script type="module">
    const swiperEl = document.querySelector('#swiper-container-hero');

    const params = {
        injectStyles: [
            `
    .swiper-pagination-horizontal{
        margin-bottom: 10px;
    }
    .swiper-pagination-bullet-active {
        color: #fff;
        background: #fff;
    }
    .swiper-pagination-bullet {
        background: rgb(229 231 235);
    }

    .swiper-button-prev {
        background-image: url('{{ asset('svg/arrow-left.svg') }}');
    }

    .swiper-button-next {
        background-image: url('{{ asset('svg/arrow-right.svg') }}');
    }

    .swiper-button-next::after,
          .swiper-button-prev::after {
            content: "";
          }

          .swiper-button-next,
          .swiper-button-prev {
            background-color: white;
            background-position: center;
            background-repeat: no-repeat;
            padding: 0px 8px;
            border-radius: 100%;
          }

          .swiper-button-next>svg,
.swiper-button-prev>svg{
    visibility: hidden;
  }
`,
        ],
    };

    Object.assign(swiperEl, params);
    swiperEl.initialize();
</script>
