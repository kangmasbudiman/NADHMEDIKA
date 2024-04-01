@extends('frontend.main')
@section('isifrontend')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Blog Detail</h2>
                <ol>
                    <li><a href="{{ asset('/') }}">Home</a></li>
                    <li><a href="{{ asset('/frontblog') }}">Blog</a></li>
                    <li>Detail Blog</li>
                </ol>
               
            </div>

        </div>
    </section>
    <br>
    <br>
    <main id="main">

  
        <section id="blog" class="blog">
            @foreach ($blog as $item)
            <div class="container" data-aos="fade-up">
      
              <div class="row">
      
                <div class="col-lg-8 entries">
      
                  <article class="entry entry-single">
      
                    <div class="entry-img">
                      <img src="{{ asset('storage/' . $item->thumbanil) }}" alt="" width="100%" height="50%" class="img-fluid">
                    </div>
      
                    <h2 class="entry-title">
                      <a href="{{asset('blog')}}">{{$item->judul}}</a>
                    </h2>
      
                    <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$item->penulis}}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="">{{$item->created_at}}</time></a></li>
                        
                      </ul>
                    </div>
      
                    <div class="entry-content">
                      <p>
                        {!!html_entity_decode($item->deskripsi)!!}
                      </p>
      
                      
      
                     
      
                    </div>
      
                    <div class="entry-footer">
                      <i class="bi bi-folder"></i>
                      <ul class="cats">
                        <li><a href="#">Business</a></li>
                      </ul>
      
                      <i class="bi bi-tags"></i>
                      <ul class="tags">
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Marketing</a></li>
                      </ul>
                    </div>
      
                  </article><!-- End blog entry -->
      
                  <div class="blog-author d-flex align-items-center">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <div>
                      <h4>{{$item->penulis}}</h4>
                      <div class="social-links">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="biu bi-instagram"></i></a>
                      </div>
                        <p>
                            {!!html_entity_decode($item->us)!!}
                      </p>
                    </div>
                  </div><!-- End blog author bio -->
      
             
                </div><!-- End blog entries list -->
      
                <div class="col-lg-4">
      
                  <div class="sidebar">
      
                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form">
                      <form action="">
                        <input type="text">
                        <button type="submit"><i class="bi bi-search"></i></button>
                      </form>
                    </div><!-- End sidebar search formn-->
      
                    <h3 class="sidebar-title">Categories</h3>
                    <div class="sidebar-item categories">
                      <ul>
                        @foreach ($kategoriblog as $kt)
                        <li> <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                            <a href="#">{{ $kt->nama }} <span>

                                    <?php
                                    $data = DB::table('blog')
                                        ->where('idkategori', $kt->id)
                                        ->get()
                                        ->count();
                                    echo "($data)";
                                    
                                    ?>
                                </span></a>
                        </li>
                    @endforeach
                      </ul>
                    </div><!-- End sidebar categories-->
      
                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                   

                        @foreach($blogrecent as $item)
                        <div class="post-item clearfix">
                              <img src="{{ asset('storage/' . $item->thumbanil) }}" alt="" width="50" height="60">
                              <h4><a href="{{ asset('frontblogdetail/' . $item->id) }}">{{$item->judul}}</a></h4>
                              <time datetime="">{{$item->created_at}}</time>
                          </div>

                          @endforeach
      
                    </div><!-- End sidebar recent posts-->
      
                  </div><!-- End sidebar -->
      
                </div><!-- End blog sidebar -->
      
              </div>
      
            </div>
            @endforeach
          </section><!-- End Blog Single Section -->
     
      


    
    
    
      
      
        </main><!-- End #main -->
@endsection
