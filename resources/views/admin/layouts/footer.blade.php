<div class="progress-wrap d-flex align-items-center justify-content-center cursor-pointer h-40px w-40px position-fixed" id="progress-scroll">
    <svg class="progress-circle w-100 h-100 position-absolute" viewBox="0 0 100 100">
        <circle cx="50" cy="50" r="45" class="progress" />
    </svg>
    <i class="ri-arrow-up-line fs-16 z-1 position-relative text-primary"></i>
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-2">
            <script>document.write(new Date().getFullYear())</script> © Paşa Analiz.
            <div class="text-sm-end d-none d-sm-block">
                Design & Develop by MythDev
            </div>
        </div>
    </div>
</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('admin/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/scroll-top.init.js') }}"></script>
<script src="{{ asset('admin/assets/libs/gridjs/gridjs.umd.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard/e-commerce.init.js') }}"></script>
<script type="module" src="{{ asset('admin/assets/js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
