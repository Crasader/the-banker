
            <!-- end: page -->
        </section>
    </div>


<!-- Start Chat-List -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav" id="accordion1">
        <li class="sidebar-brand">
            <i class="fa fa-commenting-o grey-text"></i>
            <span class="brand-title">CHAT SPACE</span>
            <a href="#menu-toggle" class="minimize small-btn control-btn"><i class="fa fa-minus-square-o"></i></a>
        </li>

        <?php
            $online_user = App\Classes\ChatClass::online_member_list();

        ?>

        <div> <a class="groupclass" data-toggle="collapse" href="#onlinemember"><span class="showlist fa fa-minus-square-o morecontent"></span> Online Member <span class="pull-right">{{count($online_user)}}</span></a>

            <div id="onlinemember" class="collapse in">

                @if(!empty($online_user))
                @if(count($online_user))
                @foreach($online_user as $oluser)
                <li class="online">
                <span class="profile-thumb">
                    <img src="../profiles/{{$oluser['profile_pic']}}" alt="" width="32" height="32">
                </span>
                    <a href="#" class="chat-user" user-id="{{$oluser['id']}}" user-name="{{$oluser['alias']}}" user-class="{{$oluser['user_class_name']}}" user-pic="../profiles/{{$oluser['profile_pic']}}">
                        <span class="name">{{$oluser['alias']}}</span><br/>
                        <span class="rank">{{$oluser['user_class_name']}}</span>
                    <span class="status">
                        <i class="fa fa-circle fs-12"></i>
                    </span>
                    </a>
                </li>
                @endforeach
                @endif
                @endif

            </div>

        </div>


        <div> <a class="groupclass" data-toggle="collapse" href="#offlinemember"><span class="showlist fa fa-plus-square-o morecontent"></span> Offline Member <span class="pull-right">12</span></a>

            <div id="offlinemember" class="collapse">
                <li>None</li>
            </div>

        </div>


        <div> <a class="groupclass" data-toggle="collapse" href="#unregmember"><span class="showlist fa fa-plus-square-o morecontent"></span> Unregistered Member <span class="pull-right">12</span></a>

            <div id="unregmember" class="collapse">
                <li>None</li>
            </div>

        </div>


    </ul>
</div>
<!-- End Chat-List -->
<!-- Start Chat-Space -->

<div id="chat-wrapper">
    <div class="chat-header">
        <span class="profile-thumb">
            <img class="chaimg" src="assets/images/staff01.jpg" alt="" width="32" height="32">
        </span>
        <a href="#">
            <span class="name"></span><br>
            <span class="rank"></span>
        </a>
        <a href="#menu-toggle" class="small-btn control-btn close"><i class="fa fa-times fs-18"></i></a>
    </div>
    <div id="chat-content">
        <div class="fixedContent">

        </div>
        <div class="chatbox">
            <span class="typing" style="display:none;"></span>
            <textarea class="userinput" style="height: 40px;" user-id="">Type here...</textarea>
        </div>
    </div>
</div>

<!-- End Chat-Space -->
<div class="online-status bg-dark">
    <i class="fa fa-user fs-16 green-text"></i>
    <span class="white-text fs-12">{{count($online_user)}}</span> <span class="white-text fs-11 user-online ">Users is Online</span>
    <a href="#menu-toggle" class="maximize"><i class="fa fa-plus-square pull-right fs-12 blue-text"></i></a>
</div>

</section>

<script src="{{asset('assets/javascripts/theme.js')}}"></script>
<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('#polyglotLanguageSwitcher').polyglotLanguageSwitcher({
            effect: 'fade',
            testMode: true,
            onChange: function(evt){
                $(location).attr('href','{{URL::route('set-locale')}}'+'?lang='+evt.selectedItem)
            }
        });
    });

</script>

@if(Session::has('message'))
<script>
$(document).ready(function () {
	new PNotify({
			title: 'Success!',
			text: '{{ Session::get('message') }}',
			type: 'success'
		});
});
</script>
@endif

<script>


$('.groupclass').click(function(){
    $('span.showlist',this).toggleClass("fa-minus-square-o fa-plus-square-o");
})

$(".maximize").click(function(e) {
    e.preventDefault();
    $("#wrapper, .online-status").toggleClass("toggled");
});

$(".minimize").click(function(e) {
    e.preventDefault();
    $("#wrapper, .online-status").toggleClass("toggled");
    $("#chat-wrapper").removeClass("toggled");
});



$(".online a.chat-user").click(function(e) {
    var open_user_box = $(this).attr('user-id');
    var user_name = $(this).attr('user-name');
    var user_class = $(this).attr('user-class');
    var user_pic = $(this).attr('user-pic');

    $('.name','#chat-wrapper').html(user_name);
    $('.rank','#chat-wrapper').html(user_class);
    $('.chaimg','#chat-wrapper').attr('src', user_pic);
    $('.userinput','#chat-content').attr('user-id', open_user_box);

    $('.typing','#chat-content').hide();

    $('.fixedContent')
    .html('loading...')
    .load("{{URL::route('user-chat-history')}}", {_token: "<?php echo csrf_token(); ?>", user_id: open_user_box}, function(responseText){
				scrollbottom();
			});

    e.preventDefault();

    $("#chat-wrapper").addClass("toggled");


});



$("a.close").click(function(e) {
    e.preventDefault();
    $("#chat-wrapper").removeClass("toggled");
});

$(".fixedContent").scrollTo($(".fixedContent")[0].scrollHeight);

$(function() {
    var page = $('.page').attr('id');
    $("ul.menu-items li."+page).addClass("active");
    $(".icon-thumbnail."+page).addClass("bg-complete");
});

</script>
<script type="text/javascript">

    $(window).load(function(){
        var toggle = false;
        var user="";
        var searchBoxText= "Type here...";
        var fixIntv;
        var fixedBoxsize = $('#fixed').outerHeight()+'px';
        var Parent = $("#fixed"); // cache parent div
        var Header = $(".fixedHeader"); // cache header div
        var Chatbox = $(".userinput"); // cache header div
        Parent.css('height', '40px');

        Header.click(function(){
            toggle = (!toggle) ? true : false;
            if(toggle)
            {
                Parent.animate({'height' : fixedBoxsize}, 300);
            }
            else
            {
                Parent.animate({'height' : '40px'}, 300);
            }

        });

        Chatbox.focus(function(){
            $(this).val(($(this).val()===searchBoxText)? '' : $(this).val());
        }).blur(function(){
            $(this).val(($(this).val()==='')? searchBoxText : $(this).val());
        }).keyup(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var user_id = $(this).attr('user-id')
            if(code===13){
                $('.fixedContent').append("<div class='userwrap'><span class='messages from-me'>"+$(this).val()+"</span></div>");
                conn.send('{{Auth::user()->id}}' + ";" + user_id + ";" + '2' +";" + $(this).val());
                event.preventDefault();
                //SAVE TO DB
                saveMessageDB('{{Auth::user()->id}}',user_id,$(this).val());
                scrollbottom();
                $(this).val('');

            }
            else
            {
                conn.send('{{Auth::user()->id}}' + ";" + user_id + ";" + '1' + ";" + "is typing a message.");
            }

        });
    });

</script>

<script>
    var conn;
    var userName = "{{Auth::user()->alias}}";
    var userId = "{{Auth::user()->id}}";
    var token = "{{csrf_token()}}";
    var port = "9010";
    var uri = "localhost";


    // set logged users table, active column = 1
    function setUserOnline(userid, id) {
        $.ajax({
              method: "POST",
              url: "{{URL::route('user-is-online')}}",
              data: { _token: "<?php echo csrf_token(); ?>" }
            });
    }



    function scrollbottom()
    {
        var wtf = $('.fixedContent');
        var height = wtf[0].scrollHeight;
        wtf.scrollTop(height);
    }

    function updateChatid(id)
    {
        $.ajax({
              method: "POST",
              url: "{{URL::route('update-chat-id')}}",
              data: { _token: "<?php echo csrf_token(); ?>", chatid: id }
            });
    }

    function saveMessageDB(fromid, toid, themsg)
    {

        $.ajax({
              method: "POST",
              url: "{{URL::route('save-chat')}}",
              data: { _token: "<?php echo csrf_token(); ?>", c_fromid: fromid, c_toid: toid, c_themsg: themsg }
            });
    }


    // set read messages in database
    function setReadMsg() {

    }

    // add messages to chat box when user typed in
    function addMessageToChatBox(fromid, toid, type, message) {

        var active_id = $('.userinput','#chat-content').attr('user-id');

        if(fromid == active_id && toid == "{{Auth::user()->id}}" && type == '1')
        {
            $('.typing','#chat-content').show().delay(5000).fadeOut();
        }

        if(fromid == active_id && toid == "{{Auth::user()->id}}" && type == '2')
        {
            $('.typing','#chat-content').hide();
            $('.fixedContent').append("<div class='userwrap'><span class='messages to-me'>"+message+"</span></div>");
            scrollbottom();

        }

        if(type == '2' && toid == "{{Auth::user()->id}}" && fromid != active_id)
        {
            var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 45, "firstpos2": 35};

            $.ajax({
              method: "POST",
              url: "{{URL::route('user-info')}}",
              data: { _token: "<?php echo csrf_token(); ?>", user_id: fromid },
              success: function(data) {


                        var obj = $.parseJSON(data);

                        username = obj.username;
                        picture = obj.picture;



                      new PNotify({
                        title: username,
                        text: message,
                        addclass: 'notification-dark stack-bottomright notifybox',
                        icon: 'img_icon'+username,
                        stack: stack_bottomright
                        });


                        $('.img_icon'+username).css('background-image','url("../profiles/'+picture+'")')
                        .css('background-size','cover');

                        $('.notifybox').click(function(){

                            $("#wrapper, .online-status").toggleClass("toggled");
                            $("#chat-wrapper").removeClass("toggled");
                        })
                    }
            });


        }

    }



    // remove users offline after they have been disconnected
    function removeUsersOffline(id) {

    }

    // refresh the list on the right side panel (to set scrolling if the list is too long)
    function refreshUsersOnline() {
        $("#onlineUsers").scrollTop($("#onlineUsers")[0].scrollHeight);
    }

    // set the chat tab for each users that are online (after getUsersOnline function has been initiated)
    function createChatTab(id, uname, prof_pic, status) {
        var elemToCreate = "<div id=\"chat-wrapper" + id + "\">";
        elemToCreate += "    <div class=\"chat-header\">";
        elemToCreate += "        <span class=\"profile-thumb\">";
        elemToCreate += "            <img src=\"" + prof_pic + "\" alt=\"\" width=\"32\" height=\"32\">";
        elemToCreate += "        </span>";
        elemToCreate += "        <a href=\"#\" class=\"chat-user2\">";
        elemToCreate += "            <span class=\"name\">" + uname + "</span><br/>";
        elemToCreate += "            <span class=\"label\">MODERATOR</span>";
        elemToCreate += "        </a>";
        elemToCreate += "        <a onclick=\"toggleCloseChatTab(" + id + ")\" href=\"#menu-toggle\" class=\"small-btn control-btn close\"><i class=\"fa fa-times fs-18\"></i></a>";
        elemToCreate += "    </div>";
        elemToCreate += "    <div id=\"chat-content" + id + "\">";
        elemToCreate += "        <div id=\"fixedContent-" + id + "\" class=\"fixedContent\"></div>";
        elemToCreate += "        <div class=\"chatbox\">";
        elemToCreate += "            <span id=\"typeStat-" + id + "\" class=\"typing\"> </span>";
        elemToCreate += "            <textarea id=\"chatInput-" + id + "\" onkeyup=\"keypress(event, " + id + ")\" class=\"userinput\" style=\"height: 30px; \" placeholder=\"Type here...\"></textarea>";
        elemToCreate += "        </div>";
        elemToCreate += "    </div>";
        elemToCreate += "</div>";

        $("#chatarea_cont").append(elemToCreate);
    }


    // ================== do not change below unless needed ============================ //
    $(document).ready(function () {
        conn = new WebSocket('ws://' + uri + ':' + port);

        conn.onerror = function (event) {}

        conn.onclose = function (event) {
            var reason;

            if (event.code == 1000)
                reason = "Normal closure, meaning that the purpose for which the connection was established has been fulfilled.";
            else if (event.code == 1001)
                reason = "An endpoint is \"going away\", such as a server going down or a browser having navigated away from a page.";
            else if (event.code == 1002)
                reason = "An endpoint is terminating the connection due to a protocol error";
            else if (event.code == 1003)
                reason = "An endpoint is terminating the connection because it has received a type of data it cannot accept (e.g., an endpoint that understands only text data MAY send this if it receives a binary message).";
            else if (event.code == 1004)
                reason = "Reserved. The specific meaning might be defined in the future.";
            else if (event.code == 1005)
                reason = "No status code was actually present.";
            else if (event.code == 1006)
                reason = "Abnormal error, e.g., without sending or receiving a Close control frame";
            else if (event.code == 1007)
                reason = "An endpoint is terminating the connection because it has received data within a message that was not consistent with the type of the message (e.g., non-UTF-8 [http://tools.ietf.org/html/rfc3629] data within a text message).";
            else if (event.code == 1008)
                reason = "An endpoint is terminating the connection because it has received a message that \"violates its policy\". This reason is given either if there is no other sutible reason, or if there is a need to hide specific details about the policy.";
            else if (event.code == 1009)
                reason = "An endpoint is terminating the connection because it has received a message that is too big for it to process.";
            else if (event.code == 1010) // Note that this status code is not used by the server, because it can fail the WebSocket handshake instead.
                reason = "An endpoint (client) is terminating the connection because it has expected the server to negotiate one or more extension, but the server didn't return them in the response message of the WebSocket handshake. <br /> Specifically, the extensions that are needed are: " + event.reason;
            else if (event.code == 1011)
                reason = "A server is terminating the connection because it encountered an unexpected condition that prevented it from fulfilling the request.";
            else if (event.code == 1015)
                reason = "The connection was closed due to a failure to perform a TLS handshake (e.g., the server certificate can't be verified).";
            else
                reason = "Unknown reason";
        };

        conn.onopen = function (e) {
            setUserOnline(userId);
            //addMessageToChatBox(userId, 0, "Connection established!");

            conn.send(userId + ";" + "0;" + userName + " is online");
        };

        conn.onmessage = function (e) {
            if (e.data.indexOf("user_connected") > -1) {
                var r_conn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];
                updateChatid(r_conn_chatid);

            } else if (e.data.indexOf("user_disconnected") > -1) {
                var r_disconn_chatid = e.data.split(";")[0];
                var r_userid = e.data.split(";")[2];

                removeUsersOffline(r_disconn_chatid);
            } else {
                var fromid = e.data.split(";")[0];
                var toid = e.data.split(";")[1];
                var type = e.data.split(";")[2];
                var themsg = e.data.split(";")[3];

                addMessageToChatBox(fromid, toid, type, themsg);



            }
        };

    });
    // ================== EOF do not change below unless needed ============================ //

</script>
</body>
</html>