<div>
    <section class="content">
        <section class="content_left">
            <!-- Recent Release--->
            <div class="main_body">
                <div id="load_recent_release">
                    <input type="hidden" id="type" name="type" value="1" />
                    <div class="anime_name recent_release">
                        <i class="icongec-recent_release i_pos"></i>
                        <h2>
                            <a href="javascript:void(0)" class="dub active" rel="1">Recent Uploads</a>
                            <span style="
                                        padding: 0 10px;
                                        color: #010101;
                                    ">|</span>
                        </h2>
                    </div>
                    <div class="last_episodes loaddub">
                        <ul class="items">
                            @if(count($this->allVideos()) > 0)
                                @foreach($this->allVideos() as $item)
                                    <li>
                                        <div class="img">
                                            <a href="{{ route('video', $item->id) }}"
                                                title="{{ $item->title }}">
                                                <img src="{{ asset('storage').'/'.$item->screenshot }}"
                                                    alt="{{ $item->title }}" />
                                                <div class="type ic-SUB"></div>
                                            </a>
                                        </div>
                                        <p class="name">
                                            <a href="{{ route('video', $item->id) }}"
                                                title="{{ $item->title }}">{{ $item->title }}</a>
                                        </p>
                                        <p class="episode">
                                            {{ $this->user($item->user_id)->fname.' '.$this->user($item->user_id)->lname }}
                                        </p>
                                    </li>
                                @endforeach
                            @else
                                <h2 style="justify-content: center; text-align: center; margin-bottom: 20px; self-align: center">
                                    NO Data Found
                                </h2>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- / Recently Added Series--->
        </section>
        <section class="content_right">
            <!-- <div class="headnav_center">
                <div class="anime_name adsverting">
                    <i class="icongec-adsverting i_pos"></i>
                    <h2>ADVERTISEMENTS</h2>
                </div>
                <div class="headnav_items">
                    <div id="bg_311326291"></div>
                    <script data-cfasync="false" type="text/javascript"
                        src="https://platform.bidgear.com/ads.php?domainid=3113&amp;sizeid=2&amp;zoneid=6291"></script>
                    <div class="clr"></div>
                </div>
            </div> -->
            <div class="main_body">
                <div class="main_body_black">
                    <div class="anime_name anime_info">
                        <i class="icongec-anime_info i_pos"></i>
                        <div class="topview">
                            <div class="tab">
                                <div class="tab_icon one1 {{ ($categorySelected == 'prelim') ? 'active' : '' }}" wire:click="changeCategory('prelim')">
                                    Prelim
                                </div>
                                <div class="tab_icon one2 {{ ($categorySelected == 'mid') ? 'active' : '' }}" wire:click="changeCategory('mid')">
                                    MID
                                </div>
                                <div class="tab_icon one3 {{ ($categorySelected == 'final')? 'active' : '' }}" wire:click="changeCategory('final')">
                                    FINAL
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topview" id="load-anclytic">
                        <div class="clr"></div>
                        <div class="movies_show">
                            <div id="laoding" style="display: none;">
                                <div class="loaders"></div>
                            </div>
                            <div id="load_topivews" class="views1" style="display: block;">
                                <ul>
                                    @if(count($categories) > 0)
                                        @foreach($categories as $item)
                                            <li>
                                                <a href="{{ route('video', $item->id) }}" title="{{ $item->title }}">
                                                    <p class="title"><span class="number">{{ $loop->iteration }}. </span>{{ $item->title }}</p>
                                                    <p class="reaslead">{{ $this->user($item->user_id)->fname.' '.$this->user($item->user_id)->lname }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <h4>
                                            NO Data Found
                                        </h4>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="clr"></div>

            <div class="clr"></div>
            
            <style type="text/css">
                #scrollbar2 .viewport {
                    height: 600px !important;
                }
            </style>
        </section>
    </section>
</div>
