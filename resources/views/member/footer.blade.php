
            <!-- end: page -->
        </section>
    </div>

@if(Auth::user()->id <= '3281')
<!-- Start Chat-List -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav" id="accordion1">
        <li class="sidebar-brand">
            <img class="brand-logo" src="{{asset('assets/images/round_logo.png')}}" width="30"/>
            <span class="brand-title">MESSENGER</span>
            <a href="#menu-toggle" class="minimize small-btn control-btn"><i class="fa fa-minus-square-o"></i></a>
        </li>
        <div>
            <a class="groupclass" data-toggle="collapse" href="#onlinemember"><span class="showlist fa fa-minus-square-o morecontent"></span> Online <span class="extrastats">Member</span> <span class="pull-right onlinecount">0</span></a>
            <div id="onlinemember" class="collapse in"></div>
        </div>
    </ul>
</div>
<!-- End Chat-List -->

<!-- Start Chat-Space -->
<div id="chat-wrapper">
    <div class="chat-header">
        <span class="profile-thumb">
            <img class="chaimg" src="assets/images/no_img.jpg" alt="" width="32" height="32">
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
            <span class="typing" style="display:none;">...is typing a message.</span>
            <textarea class="userinput" style="height: 40px;" user-id="">Type here...</textarea>
        </div>
    </div>
</div>
<!-- End Chat-Space -->

<!-- <div class="online-status bg-dark" style="display:none;"> -->

<div class="online-status bg-dark">
    <i class="fa fa-user fs-16 green-text"></i>
    <span class="white-text fs-12 onlinecount">0</span> <span class="white-text fs-11 user-online ">Users is Online</span>
    <a href="#menu-toggle" class="maximize"><i class="fa fa-plus-square pull-right fs-12 blue-text"></i></a>
</div>
@endif
</section>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71230212-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="{{asset('assets/javascripts/theme.js')}}"></script>
<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
<script src="{{asset('assets/javascripts/footer.js')}}"></script>
<!--
<script src="{{asset('assets/javascripts/brchat.js')}}"></script>

<script type="text/javascript">
@if(Session::has('message'))
$(document).ready(function () {
	new PNotify({
			title: 'Success!',
			text: '{{ Session::get('message') }}',
			type: 'success'
		});
});

@endif

/* Nie kalau nak keluarkan notification setiap page
$(document).ready(function () {
    new PNotify({
        title: 'Network Issue!',
        text: 'We are experiencing technical difficulties with blockchain API.',
        icon: 'fa fa-info',
        type: 'warning'
    });
});
*/
</script>
-->
</body>
</html>