@routes
{{--Messages--}}
<script src="{{ asset('messages.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
{{--App--}}
<script src="{{ asset(mix('js/app.js')) }}"></script>
{{--Scripts for alerts--}}
<script src="{{ asset('js/donetyping.js') }}"></script>
{{--Filepond--}}
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@livewireScripts
@toastr_js
@toastr_render
