<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    @endpush

    <x-slot name="header"></x-slot>

    <div class="proflie">
      <section class="profile-content">
        <div class="author-name">
          <div class="profile-picture-parent">
            <div class="profile-picture"></div>
            <div class="relic-wrapper">
              <a class="relic">Relic太郎</a>
            </div>
          </div>
        </div>
      </section>
      <div class="tabs-wrapper">
        <div class="tabs">
          <div class="tab-group">
            <div class="tab-1">
              <div class="state-layer">
                <div class="tab-contents">
                  <div class="icon-badge">
                    <img
                      class="icon"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile1.svg') }}"
                    />
                    <div class="badges">
                      <div class="spacer"></div>
                    </div>
                  </div>
                  <div class="indicator">
                    <div class="shape"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-2">
              <div class="state-layer1">
                <div class="tab-contents1">
                  <div class="icon-badge1">
                    <img
                      class="icon1"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile2.svg') }}"
                    />
                    <div class="badges1">
                      <div class="spacer1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-3">
              <div class="state-layer2">
                <div class="tab-contents2">
                  <div class="icon-badge2">
                    <img
                      class="icon2"
                      loading="lazy"
                      alt=""
                      src="{{ asset('images/profile3.svg') }}"
                    />
                    <div class="badges2">
                      <div class="spacer2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-4">
              <div class="state-layer3">
                <div class="tab-contents3">
                  <div class="icon-badge3">
                    <img
                      class="icon3"
                      alt=""
                      src="{{ asset('images/profile4.svg') }}"
                    />
                    <div class="badges3">
                      <div class="spacer3"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-5">
              <div class="state-layer4">
                <div class="tab-contents4">
                  <input class="icon-badge4" type="checkbox" />
                </div>
              </div>
            </div>
          </div>
          <div class="divider">
            <div class="divider1"></div>
          </div>
        </div>
      </div>
      <section class="author-profile">
        <div class="author-profile-child" id="rectangle"></div>
        <div class="author-profile-item"></div>
        <div class="author-profile-inner"></div>
      </section>
      <section class="rectangle-parent">
        <div class="frame-child"></div>
        <div class="frame-item"></div>
        <div class="frame-inner"></div>
      </section>
      <section class="rectangle-group">
        <div class="rectangle-div"></div>
        <div class="frame-child1"></div>
        <div class="frame-child2"></div>
        <div class="frame-child3"></div>
        <div class="frame-child4"></div>
        <div class="frame-child5"></div>
      </section>
    </div>

    @push('scripts')
        <script>
        var text = document.getElementById("text");
        if (text) {
            text.addEventListener("click", function (e) {
            // Please sync "top" to the project
            });
        }
        
        var text1 = document.getElementById("text1");
        if (text1) {
            text1.addEventListener("click", function (e) {
            // Please sync "top" to the project
            });
        }
        
        var rectangle = document.getElementById("rectangle");
        if (rectangle) {
            rectangle.addEventListener("click", function (e) {
            // Please sync "detail" to the project
            });
        }
        </script>
    @endpush
</x-app-layout>
