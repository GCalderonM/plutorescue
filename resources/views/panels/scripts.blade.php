@routes
{{--Messages--}}
<script src="{{ asset('messages.js') }}"></script>
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
