
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    @stack('before-js')
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('js/sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('js/custom.min.js')}}"></script>
    <!--morris JavaScript -->
   <script src="{{asset('js/raphael-min.js')}}"></script>
   <!-- EASY PIE CHART JS -->
   <script src="{{asset('js/jquery.easypiechart.min.js')}}"></script>
   <script src="{{asset('js/easy-pie-chart.init.js')}}"></script>
   <!-- Vector map JavaScript -->
   <script src="{{asset('js/jquery-jvectormap-2.0.2.min.js')}}"></script>
   <script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>

   <!-- Vue,Moment js by Majeed-->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  new Vue({
    el:'#app-clock',
    data:{
        currentTime:null,
    },
    methods:{
        updateCurrentTime(){
            this.currentTime=moment().format('LTS')
        }
    },
    created(){
        this.currentTime=moment().format('LTS');
        setInterval(()=>this.updateCurrentTime(),1*1000);
    }
})
</script>
    @stack('end_js')
