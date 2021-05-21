<footer class="bg-gray-300 p-4 px-16 text-white block sm:flex sm:items-center sm:justify-center absolute w-full">
    <div class="w-full xs:text-center sm:w-1/2 text-black">
        <img src="{{asset('images/brand_logo.svg')}}" width="60px" class="xs:inline" />
        <p>pet<span class="text-yellow-500">rescue</span> - Copyright 2020</p>
        <p>Made with ❤ by <span>pet<span class="text-yellow-500">rescue's</span> team!</span>
    </div>
    <div class="w-full pt-5 sm:w-1/2 sm:pt-0 text-black">
        <p class="mb-1">¿Necesita contactar con nosotros?</p>
        <form method="POST">
            @csrf
            <div class="mb-5">
                <span class="z-10 leading-snug font-normal absolute text-center text-black absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                </span>
                <input type="text" placeholder="Indica tu nombre..." class="px-3 py-3 placeholder-gray-500 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:border-blue-800 w-full pl-10" required/>
            </div>
            <div class="mb-5">
                <span class="z-10 leading-snug font-normal absolute text-center text-black absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <input type="text" placeholder="Indica tu correo..." class="px-3 py-3 placeholder-gray-500 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:border-blue-800 w-full pl-10" required/>
            </div>
            <div class="mb-5">
                <textarea placeholder="Indica tu duda..." class="px-3 py-3 placeholder-gray-500 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:border-blue-800 w-full resize-y max-h-20" required></textarea>
            </div>
            <div class="mb-5">
                <input type="submit" value="Enviar" class="bg-gray-800 text-white font-bold text-sm px-6 py-3 shadow font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 text-white rounded-md cursor-pointer w-full" />
            </div>
        </form>
    </div>
</footer>
