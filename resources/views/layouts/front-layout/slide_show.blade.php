  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
              @foreach ($slideShow as $slide)
              <!-- single slide item -->
              <li>
                <div class="seq-model">
                  <img data-seq src="{{ asset('front-images/banners/'.$slide->images) }}" class="object-cover img-responsive" alt="{{ $slide->Title }}" />
                </div>
                <div class="seq-title">
                 <span data-seq>Save Up to 75% Off</span>
                  <h2 data-seq>{{ $slide->Title }}</h2>
                  <p data-seq> {!! $slide->Description !!}</p>
                  <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                </div>
              </li>
              <!-- single slide item -->
              @endforeach
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
