 <!-- Footer Area -->
 <footer class="footer-area">
     <div class="container">
         <div class="row">
             <div class="col-md-4">
                 <div class="f-about">
                     <img src="{{asset('images/TopNews-logo-1.png')}}" alt="" />
                     <p>
                         Lorem ipsum dolor sit amet, consectet adipisicing elit. Saepe
                         porro neque a nam nulla quos atque.
                     </p>
                     <ul class="list-unstyled f-contact">
                         <li>
                             <i class="fa fa-map-marker"></i>795 South Park Avenue, CA
                             94107
                         </li>
                         <li><i class="fa fa-envelope"></i>enquery@domain.com</li>
                         <li><i class="fa fa-phone"></i>+1 908 875 7678</li>
                     </ul>
                     <ul class="list-unstyled list-inline f-social">
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-facebook"></i></a>
                         </li>
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-twitter"></i></a>
                         </li>
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-linkedin"></i></a>
                         </li>
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-google-plus"></i></a>
                         </li>
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-rss"></i></a>
                         </li>
                         <li class="list-inline-item">
                             <a href=""><i class="fab fa-youtube"></i></a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-2"></div>
             <div class="col-md-4">
                 <div class="f-post">
                     <div class="sec-title">
                         <h5>Recent Posts</h5>
                     </div>
                     @foreach($recent_posts as $post)
                     <div class="row py-2 border-bottom border-secondary">
                         <div class="col-sm-4 pr-2">
                             <img src="{{$post->image}}" alt="thumb" class="img-fluid w-100 rounded" />
                         </div>
                         <div class="col-sm-8 pl-2">
                             <p class="fs-16 font-weight-bold mb-0"><a href="{{route('news.show',[$post->category,$post->slug])}}" class="footer-title">{{$post->title}}</a></p>
                             <p class="fs-13 text-muted mb-0">
                                 <span class="mr-2">{{$post->created_at->toFormattedDateString()}} - </span><span class="text-danger fw-bold">{{$post->author}}</span>
                             </p>

                         </div>
                     </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <section class="footer-btm">
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <div class="copyright-text">
                     <p>
                         Copyright © {{ now()->format('Y') }} | Designed by
                         <a href="https://xorexs.com/" target="_blank">Xorexs Limited</a>
                     </p>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="ftb-menu text-right">
                     <ul class="list-unstyled list-inline">
                         <li class="list-inline-item"><a href="{{ url('/') }}">Home</a></li>
                         <li class="list-inline-item"><a href="{{ route('sitemap.xml') }}">Site Map</a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <div class="back-to-top text-center">
         <a data-scroll="" href="#btt"><i class="fa fa-angle-up"></i></a>
     </div>
 </section>
 <!-- End Footer Area -->