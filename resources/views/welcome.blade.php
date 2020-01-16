@extends('layouts.frontend.app')

@section('content')

<!--==========================
  About Us Section
============================-->
<section id="about" class="section-bg">
  <div class="container-fluid">
    <div class="section-header">
      <h3 class="section-title">FREE FOOTBALL PICKS FOR TODAY</h3>
      <span class="section-divider"></span>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">League</th>
                    <th scope="col">Home vs Away</th>
                    <th scope="col">Tip</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prediction as $game)
                    <tr class="bg-info">
                        <th scope="row">{{$game->league}}</th>
                        <td>
                        {{$game->home_team}} vs {{$game->away_team}}
                        </td>
                        <td>{{$game->tip}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
</section><!-- #about -->

<!--==========================
  Product Featuress Section
============================-->
<section id="features">
  <div class="container">

    <div class="row">

      <div class="col-lg-8 offset-lg-4">
        <div class="section-header wow fadeIn" data-wow-duration="1s">
          <h3 class="section-title">Our Products & Services</h3>
          <span class="section-divider"></span>
        </div>
      </div>

      <div class="col-lg-4 col-md-5 features-img">
        <img src="{{ asset('frontend/img/fixed.png')}}" alt="" class="wow fadeInLeft">
      </div>

      <div class="col-lg-8 col-md-7 ">

        <div class="row">

          <div class="col-lg-6 col-md-6 box wow fadeInRight">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Free Football Tips</a></h4>
            <p class="description">Just like victor predict, soccervista, betensured and preditz, We offers sure wins
             and sure predictions on daily basis , Our football predictions are sure win football prediction</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
            <div class="icon"><i class="ion-ios-flask-outline"></i></div>
            <h4 class="title"><a href="">Premium Football Tips</a></h4>
            <p class="description"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque quisquam explicabo voluptates quibusdam 
            hic corrupti in. Nulla, voluptatibus. Harum, debitis. Voluptate enim temporibus voluptatum quis facilis rerum ut optio consequuntur!</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
            <div class="icon"><i class="ion-social-buffer-outline"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
            fugiat nulla pariatur teleca starter sinode park ledo.</p>
          </div>
          <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum dinoun trade capsule.</p>
          </div>
        </div>

      </div>

    </div>

  </div>

</section><!-- #features -->

<!--==========================
  Product Advanced Featuress Section
============================-->
<section id="pricing" class="section-bg">
  <div class="container">

    <div class="section-header">
      <h3 class="section-title">FREE FOOTBALL PAST  PICKS</h3>
      <span class="section-divider"></span>
    </div>
    <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">League</th>
                    <th scope="col">Home vs Away</th>
                    <th scope="col">Tip</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predictions as $game)

                    <tr  @if($game->isEndded == true) class="{{$game->result == 'won' ? ' bg-success' : ' bg-danger'}}" @else class="bg-warning" @endif>
                        <th scope="row">{{$game->league}}</th>
                        <td>
                            {{$game->home_team}} vs {{$game->away_team}}
                        </td>
                        <td>{{$game->tip}}</td>
                        @if($game->isEndded == true) <td>{{$game->result == 'won' ? 'WON' : 'LOST'}}</td>
                        @else <td>{{ __('Ongoing')}}</td>
                        @endif
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
  </div>
</section><!-- #pricing -->
<!--==========================
  Call To Action Section
============================-->
<section id="call-to-action">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 text-center text-lg-left">
        <h3 class="cta-title">Get on Board with premium</h3>
        <p class="cta-text"> We Provide sure 5 odds daily for our Basic members, and sure 5 & 10 odds daily for our Advanced members with guaranteed 5 wins per week.</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a href="{{ route('admin.subscriptions.create')}}" class="cta-btn align-middle">become a VIP</a>
      </div>
    </div>
   
  </div>
</section><!-- #call-to-action -->

<section id="clients">
  <div class="container">

    <div class="row wow fadeInUp">

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-1.png')}}" alt="">
      </div>

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-2.png')}}" alt="">
      </div>

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-3.png')}}" alt="">
      </div>

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-4.png')}}" alt="">
      </div>

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-5.png')}}" alt="">
      </div>

      <div class="col-md-2">
        <img src="{{ asset('frontend/img/clients/client-6.png')}}" alt="">
      </div>

    </div>
  </div>
</section><!-- #more-features -->

<!--==========================
  Pricing Section
============================-->
<section id="pricing" class="section-bg">
  <div class="container">

    <div class="section-header">
      <h3 class="section-title">Pricing</h3>
      <span class="section-divider"></span>
      <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
    </div>

    <div class="row">

      <div class="col-lg-4 col-md-8 off-set" style="position: relative;left: 368px;">
        <div class="box wow featured fadeInUp" style="width: 116%;">
          <ul>
            <li>
                <i class="ion-android-checkmark-circle">
                </i><span class="badge badge-danger">Sunday - saturday</span> Sure 3 odds 
                    <span class="badge badge-danger">#6,000</span>
            </li>
            <li>
                <i class="ion-android-checkmark-circle">
                </i><span class="badge badge-danger">Sunday - saturday</span> Sure 5 odds 
                    <span class="badge badge-danger">#10,000</span>
            </li>
            <li>
                <i class="ion-android-checkmark-circle">
                </i><span class="badge badge-danger">Sunday - saturday</span> Sure 10 odds 
                    <span class="badge badge-danger">#15,000</span>
            </li>
          </ul>
          <a href="{{ route('admin.subscriptions.create')}}" class="get-started-btn">Get Started</a>
        </div>
      </div>

    </div>
  </div>
</section><!-- #pricing -->


<!--==========================
  Frequently Asked Questions Section
============================-->
<section id="faq">
  <div class="container">

    <div class="section-header">
      <h3 class="section-title">Frequently Asked Questions</h3>
      <span class="section-divider"></span>
      <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
    </div>

    <ul id="faq-list" class="wow fadeInUp">
      <li>
        <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
        <div id="faq1" class="collapse" data-parent="#faq-list">
          <p>
            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
          </p>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
        <div id="faq2" class="collapse" data-parent="#faq-list">
          <p>
            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
          </p>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
        <div id="faq3" class="collapse" data-parent="#faq-list">
          <p>
            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
          </p>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
        <div id="faq4" class="collapse" data-parent="#faq-list">
          <p>
            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
          </p>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
        <div id="faq5" class="collapse" data-parent="#faq-list">
          <p>
            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
          </p>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
        <div id="faq6" class="collapse" data-parent="#faq-list">
          <p>
            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
          </p>
        </div>
      </li>

    </ul>

  </div>
</section><!-- #faq -->

<!--==========================
  Contact Section
============================-->
<section id="contact">
  <div class="container">
    <div class="row wow fadeInUp">

      <div class="col-lg-4 col-md-4">
        <div class="contact-about">
          <h3>{{ config('app.name') }}</h3>
          <p class="description"> We evaluate , stategize, truncate, calculate the probabilities, weigh the odds,
             sum the odds and deliver you safe haven, we are professionals who understands risk management. </p>
            <p>we help you make money in football betting by predicting football matches correctly, it's business 
            not gamble. think positive and you'll make millions</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="info">
          <div>
            <i class="ion-ios-location-outline"></i>
            <p>A108 Adam Street<br>Lagos Nigeria</p>
          </div>

          <div>
            <i class="ion-ios-email-outline"></i>
            <p>info@example.com</p>
          </div>
        </div>
      </div>

      <div class="col-lg-5 col-md-8">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-lg-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-lg-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section><!-- #contact -->
@endsection
