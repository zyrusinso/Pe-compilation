$(document).ready(function(){$('.form-login form').submit(function(){var obj = $("button[type='submit']", this);var text = obj.html();obj.addClass('disabled');obj.prop("disabled",!0);setTimeout(function(){obj.removeClass('disabled');obj.prop("disabled",!1)},3000);return true});if(document.getElementById('load-anclytic')){loadTopViews('.tab_icon.one1', 1)};slideMenu=$('nav.menu_top');$('a.menu_mobile').click(function(){if(slideMenu.is(':hidden')){$('#off_light').css({"display":"block"});$(slideMenu).css({"display":"block"});$('html').css({"height":"100%","width":"100%","overflow-x":"hidden"});$('body').css({"height":"100%","overflow-y":"hidden","width":"100%","overflow-x":"hidden"})}else{$('#off_light').css({"display":"none"});$(slideMenu).css({"display":"none"});$('html').css({"height":"","width":"","overflow-x":""});$('body').css({"height":"","overflow-y":"","width":"","overflow-x":""})}});$('#off_light').click(function(){$('#off_light').css({"display":"none"});$(slideMenu).css({"display":"none"});$('html').css({"height":"","width":"","overflow-x":""});$('body').css({"height":"","overflow-y":"","width":"","overflow-x":""})});$('.search-iph').click(function(e){e.preventDefault();$(this).hide();$("img.logo").removeClass('show');$("img.logo").addClass('hide');$(".hide_search").removeClass('hide');$(".hide_search").addClass('show');$('#search-form').show()});$('.hide_search').click(function(e){e.preventDefault();$(this).removeClass('show');$(this).addClass('hide');$('.search-iph').show();$('#search-form').hide();$("img.logo").removeClass('hide');$("img.logo").addClass('show')});$(".croll img").click(function(){$("html,body").animate({scrollTop:0},"slow");return!1});$(".croll i").click(function(){$("html,body").animate({scrollTop:0},"slow");return!1});$('.mask').click(function(){$('.modal-close').fadeOut();$('.mask').fadeOut()});$('.login-popup button').click(function (e) {var email = $.trim($('input[type=email]').val());var pass = $.trim($('input[type=password]').val());if (email == '') {e.preventDefault();$('input[type=email]').addClass('error');$('input[type=email]').keypress(function(){$('input[type=email]').removeClass('error');});$('input[type=email]').focus();}else if(!validateEmail(email)){e.preventDefault();$('input[type=email]').addClass('error');$('input[type=email]').keypress(function(){$('input[type=email]').removeClass('error');});$('input[type=email]').focus();}else if (pass == '') {e.preventDefault();$('input[type=password]').addClass('error');$('input[type=password]').keypress(function(){$('input[type=password]').removeClass('error');});$('input[type=password]').focus();}});$('.specialButton').click(function(e){e.preventDefault();$('#disqus_thread').toggle();if($('#disqus_thread').is(':hidden')){$('#specialButton .txt').text('Show')}else{$('#specialButton .txt').text('Hide')}});$('.menu_top li:not(.user)').each(function(){var href=$(this).find('a').attr('href');var current_url=window.location.protocol+'//'+window.location.hostname+window.location.pathname;if(current_url===href){$('.menu_top li').removeClass('active');$(this).addClass('active')}});$('.anime_muti_link li a').click(function(e){e.preventDefault();var id=(this).rel;var link=$(this).attr('data-video');if($(this).hasClass("active")){return!1}else{$(".anime_video_body_watch_items.load iframe").attr('src',link);$('html,body').animate({scrollTop:$(".download-anime").offset().top},1000);setTimeout(function(){$(".anime_video_body_watch_items.bk").html('')},1000)}
$('.anime_muti_link li a').removeClass('active');$(this).addClass('active')});$('.main_body_black.ongoing').hide();$('.content_episode.recent_dub').hide();$('.content_episode.most').hide();$('.nav_down_up').hide();$('.account').click(function(e){e.preventDefault()});$('.user .account').click(function(e){$('.nav_down_up').toggle()});$('.nav-tabs.ads a').click(function(e){e.preventDefault();$('.nav-tabs.ads a').removeClass('active');$(this).addClass('active');var str=$(this).attr('data-tab');$('.main_body_black').hide();$('.main_body_black.'+str).show()});$('.nav-tabs.intro a').click(function(e){e.preventDefault();$('.nav-tabs.intro a').removeClass('active');$(this).addClass('active');var str=$(this).attr('data-tab');if(str=='recent_sub'){$('.datagrild_nav').show()}else{$('.datagrild_nav').hide()}
$('.content_episode').hide();$('.content_episode.'+str).show()});$('.datagrild_nav a').click(function(e){e.preventDefault();$('.datagrild_nav a').removeClass('active');$(this).addClass('active');var str=$(this).attr('data-tab');$(".content_episode.datagrild").removeClass('ver');$(".content_episode.datagrild").removeClass('hor');$(".content_episode.datagrild").addClass(str)});$('.add_ads_items_close').click(function(){$('.add_ads').hide()});$('.add_ads_items_close2').click(function(){$('.add_ads2').hide()});$('.add_ads_items_close3').click(function(){$('.add_ads3').hide()});$('select.chapter_select').change(function(){var id=$(this).val();window.location.href=id});$('.anime_video_body_watch_items .ads_iframe').on("click",function(){var position=$(this).attr('position');var html_video=$('#load_iframe_video.'+position);var id=$(this).attr('link-watch');$(this).hide();html_video.show();html_video.html('<iframe src="'+id+'" allowfullscreen="true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>')});$('#episode_page a').click(function(e){e.preventDefault();var ep_start=$(this).attr('ep_start');var ep_end=$(this).attr('ep_end');var id=$("input#movie_id").val();$('#episode_page a').removeClass('active');$(this).addClass('active');if(ep_end=='')ep_end=ep_start;var default_ep=$("input#default_ep").val();var alias=$("input#alias_anime").val();loadListEpisode(this,ep_start,ep_end,id,default_ep,alias)});$('#chat_group_name').click(function(){$('#chat_group_body').slideToggle(100)});if(jQuery(document).width()>1000){$("#left-side-ads").css("left",($(document).width()-$("#wrapper").width())/2-170);$("#right-side-ads").css("right",($(document).width()-$("#wrapper").width())/2-170)}else{$("#left-side-ads").hide();$("#right-side-ads").hide()}
$("nav.menu_top ul li a").on("mouseover",function(){if(!$(this).parent().hasClass('active')){$(this).parent().stop(!0,!0).addClass('seleted')}});$("nav.menu_top ul li a").on("mouseout",function(){if(!$(this).parent().hasClass('active')){$(this).parent().stop(!0,!0).removeClass('seleted')}});});$(document).on("click",".pagination.recent a",function(e){disabled(this);e.preventDefault();var type=$('#type').val();var str=(this).href;str=str.split("=");var page=str[1];LoadFilm(page,type)});$(document).on("click",".pagination.popular a",function(e){disabled(this);e.preventDefault();var str=(this).href;str=str.split("=");var page=str[1];LoadFilmOngoing(page)});$(document).on("click","a.dub",function(e){disabled(this);e.preventDefault();var type=this.rel;if(!$(this).hasClass("active")){LoadFilm(1,type)}});
function loadTopViews(obj,id){if(id>1){$("#laoding").show()}if($.trim($("#load_topivews.views"+id).html()).length>0){$("#laoding").hide()}$(".tab_icon").removeClass("active");$(".movies_show #load_topivews").hide();$(".tab_icon.one"+id).addClass('active');$("#load_topivews.views"+id).show();if(id>0){$("#load_topivews.views"+id).is(":empty")&&$.ajax({url:api_anclytic+'?id='+id+'&link_web='+base_url,type:'GET',async:false,crossDomain:!0,success:function(data){if(data!='0'){$("#load_topivews.views"+id).html(data);$("#laoding").hide()}}})}}
function parallax(){if($(window).scrollTop()==$(document).height()-$(window).height()){$("#scroll-top").css("bottom","132px")}else{$("#scroll-top").css("bottom","10px")}}
function addLayer(){setTimeout(function(){$(".layer_menu").show()},1000)}
function closeMenuNav(){$('nav#menu_mobile').hide()}
function freload(){location.reload(!0)}
function loadDing(str){document.getElementById(str).innerHTML="<img src='"+base_url+"/img/load/ajax-loader_1.gif' />"}
function disabledHome(obj){$(obj).addClass('disabled');$(obj).prop("disabled",!0);setTimeout(function(){$(obj).removeClass('disabled');$(obj).prop("disabled",!1)},1000)}
function LoadFilm(page,id){$('#load_recent_release').stop(!0,!0).load(base_url_cdn_api+'ajax/page-recent-release.html?page='+page+'&type='+id)}
function LoadFilmOngoing(page){$('#load_popular_ongoing').stop(!0,!0).load(base_url_cdn_api+'ajax/page-recent-release-ongoing.html?page='+page)}
function disabled(obj){$(obj).addClass('disabled');$(obj).prop("disabled",!0);setTimeout(function(){$(obj).removeClass('disabled');$(obj).prop("disabled",!1)},1000)}
function ajaxBookmark(id,url,callback){$.ajax({dataType:'json',type:'post',async:!1,data:{id:id,_csrf:$("meta[name=csrf-token]").attr('content')},url:url,success:function(response){callback(response)}})}
function ajaxBookmarkApi(id,url,token,callback){$.ajax({dataType:'json',type:'get',async:!1,data:{id:id,token:token,_csrf:$("meta[name=csrf-token]").attr('content')},url:url,success:function(response){callback(response)}})}
function loadListEpisode(obj,ep_start,ep_end,id,default_ep,alias){$('#load_ep').html('<div class="loader"></div>');disabledHome(obj);$.ajax({url:base_url_cdn_api+'ajax/load-list-episode?ep_start='+ep_start+'&ep_end='+ep_end+'&id='+id+'&default_ep='+default_ep+'&alias='+alias,type:'GET',dataType:'html',async:false,crossDomain:!0,success:function(data){$("#load_ep").html(data)}})}
function ajaxBookmarkWatchApi(id,id_ep,ep,url,token,callback){$.ajax({dataType:'json',type:'get',async:!1,data:{id:id,id_ep:id_ep,ep:ep,token:token,_csrf:$("meta[name=csrf-token]").attr('content')},url:url,success:function(response){callback(response)}})}
function addDisabled(obj){$(obj).addClass('disabled');$(obj).prop("disabled",!0)}
function removeDisabled(obj){$(obj).removeClass('disabled');$(obj).prop("disabled", false)}
function validateEmail($email){var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;return emailReg.test($email)}
function closePoup(){$('.modal-close').fadeOut();$('.mask').fadeOut();$('.modal-close').hide();$('.mask').hide()}
function AjaxCallback(url, callback, type = 'GET', data_type = 'html'){$.ajax({url:url,type:type,dataType:data_type,success:function(response){callback(response)}})}