<div>
    <section class="content">
        <section class="content_left">
            <div class="main_body">
                <div class="anime_name anime_video">
                    <i class="icongec-anime_video i_pos"></i>
                    <div class="title_name">
                        <h2>{{ $data->title }}</h2>
                    </div>
                </div>
                <div class="anime_video_body">
                    <h1>{{ $data->title }}</h1>
                    <div class="anime_video_body_cate">
                        <span>Date Upload:</span> <a href="#"
                            title="{{ $data->title }}">{{ \Carbon\Carbon::parse($data->created_at)->format("F j, Y, g:i a") }}</a>
                        <div class="anime-info">
                            <span>Uploader:</span>
                            <a href="{{ route('user', $data->user_id) }}" title="{{ $data->title }}">{{ $this->user($data->user_id)->fname.' '.$this->user($data->user_id)->lname}}</a>
                        </div>
                    <div class="clr"></div>
                    <div class="anime_video_body_watch">
                        <div id="load_anime">
                            <!------------------ vidstream.io server type = 1  display --------------->
                            <div class="anime_video_body_watch_items load">
                                <div class="play-video">
                                    <iframe
                                        src="{{ $data->embed_url }}"
                                        allowfullscreen="true" frameborder="0" marginwidth="0" marginheight="0"
                                        scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clr"></div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
            <div class="clr"></div>
        </section>
        <section class="content_right">
            <div class="clr"></div>
            <div class="main_body">
                <div class="main_body_black">
                    <div class="anime_name ongoing">
                        <i class="icongec-ongoing i_pos"></i>
                        <h2>USER RELATED VIDEOS</h2>
                    </div>
                    <div class="recent">
                        <!-- begon -->
                        <div id="scrollbar2">
                            <div class="scrollbar">
                                <div class="track">
                                    <div class="thumb">
                                        <div class="end"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="viewport">
                                <div class="overview">
                                    <nav class="menu_recent">
                                        <ul>
                                            @if(count($this->userVIdeos($data->user_id)) > 0)
                                                @foreach($this->userVideos($data->user_id) as $item)
                                                    <li>
                                                        <a href="{{ route('video', $item->id) }}"
                                                            title="{{ $item->title }}">
                                                            <div class="thumbnail-recent"
                                                                style="background: url({{ asset('storage').'/'.$item->screenshot }});">
                                                            </div>
                                                            VIDEO TITLE
                                                        </a>
                                                        <a href="{{ route('video', $item->id) }}"
                                                            title="{{ $item->title }}">
                                                            <p class="time_2">{{ \Carbon\Carbon::parse($item->created_at)->format("F j, Y, g:i a") }}</p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else
                                            <h3 style="margin-left: 10px;">
                                                NO Data Found
                                            </h3>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- tao thanh cuon 1-->
                    </div>
                </div>
            </div>
            <div class="clr"></div>
            <div id="load_ads_2">
                <div id="media.net sticky ad" style="display: inline-block">
                </div>
            </div>
            <style type="text/css">
                #load_ads_2 {
                    width: 300px;
                }

                #load_ads_2.sticky {
                    position: fixed;
                    top: 0;
                }

                #scrollbar2 .viewport {
                    height: 500px !important;
                }
            </style>
        </section>
    </section>
</div>
