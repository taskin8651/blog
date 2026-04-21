
@extends('custom.master')
@section('content')



  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Back Button-->
      <div class="back-button">
        <a href="/">
          <i class="ti ti-chevron-left"></i>
        </a>
      </div>

      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Blog Details</h6>
      </div>

      <!-- Search Form-->
      <div class="search-form">
        <a href="#">
          <i class="ti ti-search"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Center Modal-->
 <div class="modal fade post-share-modal" id="postShareModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <h5 class="mb-2 ps-2">Share this post</h5>

                @php
                    $url = route('post.show', $post->slug);
                    $title = urlencode($post->title);
                @endphp

                <div class="social-share-btn d-flex align-items-center flex-wrap">

                    {{-- Facebook --}}
                    <a class="btn-facebook"
                       href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                       target="_blank">
                        <i class="ti ti-brand-facebook"></i>
                    </a>

                    {{-- Twitter (X) --}}
                    <a class="btn-twitter"
                       href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}"
                       target="_blank">
                        <i class="ti ti-brand-x"></i>
                    </a>

                    {{-- WhatsApp --}}
                    <a class="btn-whatsapp"
                       href="https://api.whatsapp.com/send?text={{ $title }}%20{{ $url }}"
                       target="_blank">
                        <i class="ti ti-brand-whatsapp"></i>
                    </a>

                    {{-- LinkedIn --}}
                    <a class="btn-linkedin"
                       href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"
                       target="_blank">
                        <i class="ti ti-brand-linkedin"></i>
                    </a>

                    {{-- Telegram --}}
                    <a class="btn-tumblr"
                       href="https://t.me/share/url?url={{ $url }}&text={{ $title }}"
                       target="_blank">
                        <i class="ti ti-send"></i>
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
  <div class="page-content-wrapper">
    <!-- Scroll Indicator-->
    <div id="scrollIndicator"></div>

    <!-- Single Blog Thumbnail-->
    <div class="single-blog-thumbnail">
      <img class="w-100 blog-hero-img" src="{{ $post->image_url }}" alt="">
      <form action="{{ route('bookmark.store', $post->id) }}" method="POST" style="display:inline;">
    @csrf

    <button type="submit" class="post-bookmark border-0 bg-transparent p-0">
        <i class="ti {{ $post->isBookmarked() ? 'ti-bookmark-filled text-danger' : 'ti-bookmark' }}"></i>
    </button>

</form>
    </div>

    <!-- Single Blog Info-->
    <div class="single-blog-info">
      <div class="container">
        <div class="d-flex align-items-center">
          <!-- Post Like Wrap-->
          <div class="post-like-wrap">
            <!-- Favourite Post-->
           <form action="{{ route('like.toggle', $post->id) }}" method="POST">
    @csrf

    <button class="post-love border-0 bg-transparent">

        <i class="ti {{ $post->isLiked() ? 'ti-heart-filled text-danger' : 'ti-heart text-dark' }} fs-3"></i>

    </button>
</form>

<span class="d-block">
    {{ $post->likes()->count() }} Likes
</span>
            <div class="line"></div>
            <!-- Share Post-->
            <a class="post-share" href="#" data-bs-toggle="modal" data-bs-target="#postShareModal">
    <i class="ti ti-share"></i>
</a>
            <!-- <span class="d-block">1,028</span> -->
          </div>
          <!-- Post Content Wrap-->
          <div class="post-content-wrap">
            <a class="post-catagory d-inline-block mb-2" href="{ route('category.show', $post->category->slug) }}">
                        {{ $post->category->name }}</a>
            <h5 class="mb-2">{{ $post->title }}</h5>
            <div class="post-meta">
              <a class="post-date" href="#"><i class="ti ti-calendar"></i> {{ $post->created_at->format('d M Y') }}</a>
              <a class="post-views" href="#"><i class="ti ti-eye"></i>  {{ $post->views_count ?? 0 }} Views</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Description-->
    <div class="blog-description">
      <div class="container">
       {!! $post->description !!}
      </div>
    </div>

    <!-- Post Author-->
    <div class="profile-content-wrapper">
      <!-- Settings Option-->
      <div class="profile-settings-option">
        <a href="#" data-toggle="tooltip" data-placement="left" title="Follow">
          <i class="ti ti-plus"></i>
        </a>
      </div>

   <div class="container">
    <div class="user-meta-data d-flex align-items-center">
        
        <!-- Profile Image -->
        <div class="user-thumbnail">
            <img src="{{ $user['profile_pic_url'] ?? asset('img/bg-img/profile.jpg') }}" alt="profile">
        </div>

        <!-- User Content -->
        <div class="user-content">
            <h6>{{ '@' . ($user['username'] ?? 'onroad____') }}</h6>
            <p>{{ $user['biography'] ?? 'Instagram Creator' }}</p>

            <div class="user-meta-data d-flex align-items-center justify-content-between">
                
                <p class="mx-1">
                    <span class="counter">{{ $user['media_count'] ?? 2,130 }}</span>
                    <span>Posts</span>
                </p>

                <p class="mx-1">
                    <span class="counter">{{ $user['follower_count'] ?? 240K }}</span>
                    <span>Followers</span>
                </p>

                <p class="mx-1">
                    <span class="counter">{{ $user['following_count'] ?? 214 }}</span>
                    <span>Following</span>
                </p>

            </div>
        </div>
    </div>
</div>
    </div>

    <!-- Related Post-->
  <div class="related-post-wrapper">
    <div class="container">
        <h6 class="mb-3 newsten-title">Related Posts</h6>
    </div>

    <div class="container">

        @forelse($relatedPosts as $related)
        <div class="single-trending-post d-flex mb-3">

            <div class="post-thumbnail">
                <img src="{{ $related->image_url }}" alt="">
            </div>

            <div class="post-content">

                {{-- Title --}}
                <a class="post-title"
                   href="{{ route('post.show', $related->slug) }}">
                    {{ $related->title }}
                </a>

                {{-- Meta --}}
                <div class="post-meta d-flex align-items-center">

                    {{-- Category --}}
                    <a href="{{ route('category.show', $related->category->slug) }}">
                        {{ $related->category->name }}
                    </a>

                    {{-- Date --}}
                    <a href="#">
                        {{ $related->created_at->format('d M Y') }}
                    </a>

                </div>

            </div>

        </div>
        @empty
            <p>No related posts found</p>
        @endforelse

    </div>
</div>

    <div class="container">
      <div class="border-top"></div>
    </div>

    <!-- Blog Comments-->
    {{-- COMMENTS SECTION --}}
<div class="live-video-comments">
    <div class="container">

        {{-- HEADER --}}
        <div class="d-flex align-items-center justify-content-between mb-3">

            <h6 class="newsten-title video-comments-title mb-0">
                {{ $post->comments->count() }} Comments
            </h6>

        </div>

        {{-- COMMENT FORM --}}
        @auth
        <div class="comment-form">
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                <textarea id="comment-text"
                          name="comment"
                          class="form-control"
                          rows="3"
                          placeholder="Write a comment..."
                          required></textarea>

                <button id="comment-btn"
                        class="mt-2 btn btn-primary d-none"
                        type="submit">
                    Comment
                </button>
            </form>
        </div>
        @endauth

        {{-- GUEST MESSAGE --}}
        @guest
        <div class="alert alert-warning mt-2">
            Please <a href="{{ route('login') }}">login</a> to comment
        </div>
        @endguest

        {{-- COMMENTS LIST --}}
        <ul class="comments-list mt-3">

           @forelse($post->comments->where('is_approved', true) as $comment)
<li class="single-comment-wrap">

    <div class="d-flex mb-3">

        <div class="comment-author">
            <img src="{{ asset('assets/img/default-user.png') }}" alt="user">
        </div>

        <div class="comment-meta ms-2">

            <div class="mb-1">
                <h6 class="comments-author-name mb-0">
                    {{ $comment->user->name ?? 'User' }}
                </h6>

                <small class="text-muted">
                    {{ $comment->created_at->diffForHumans() }}
                </small>
            </div>

            <p class="comment-text mb-0">
                {{ $comment->comment }}
            </p>

        </div>

    </div>

</li>
@empty
    <p>No comments yet</p>
@endforelse

        </ul>

    </div>
</div>

{{-- AUTO BUTTON SHOW --}}
<script>
document.getElementById('comment-text')?.addEventListener('input', function () {
    document.getElementById('comment-btn').classList.remove('d-none');
});
</script>
  </div>

  @endsection