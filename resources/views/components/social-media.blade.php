<ul class="social-media">

@foreach(\App\Models\Social::orderBy('_lft', 'ASC')->get() as $social)
<li><a href="{{ $social->content }}" target="_blank"><i class="fa-solid {{ $social->socialmedia->icon }}"></i></a></li>
@endforeach

</ul>
