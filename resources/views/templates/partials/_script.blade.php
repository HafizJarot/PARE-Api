<!-- Bootstrap v4.1.3.stable -->
<script src="{{asset('assets/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/jquery/dist/jquery-3.3.1.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/popper/dist/popper.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/chart-js/chart.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/jquery-knob/js/jquery.knob.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/weather-icons/WeatherIcon.js')}}"></script>

<script src="{{asset('assets/assets/vendor_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
    WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
    WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
    WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );
</script>
<!-- This is data table -->
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>

<!-- start - This is for export functionality only -->
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
<!-- end - This is for export functionality only -->
{{--<script src="{{asset('assets/assets/js/pages/data-table.js') }}"></script>--}}


<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>


</body>

@auth('admin')
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>
        const url = '{{config("app.url")}}';
        const notify = document.querySelector('#notify');

        async function notification() {
            // console.log(notify.textContent)
            const notifyData = await getNotify();
            notify.innerText = notifyData.length

            const pusher = new Pusher('9b837aec4ecbe335f0c7', {
                cluster: 'ap1',
                encrypted : true,
            });

            const channel = pusher.subscribe('admin-notification');
            channel.bind('App\\Events\\UserRegisterEvent',async function(data) {
                const newNotifyData = await getNotify();
                notify.innerText = newNotifyData.length
                swal({
                    title: "Pemilik baru telah hadir",
                    allowOutsideClick: false
                },function() {
                    window.location = url+'notif';
                });
            });
        }

        function  getNotify() {
            return fetch(url+'notify').then(res => res.json()).then(res => res);
        }

        notification()

    </script>

@endauth