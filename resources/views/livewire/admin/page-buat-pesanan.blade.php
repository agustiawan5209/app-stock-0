<div>
    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            <div class="flex flex-col justify-center">
                <div class="relative">
                    <img class="hidden sm:block w-full"
                        src="https://i.ibb.co/HxXSY0j/jason-wang-Nx-Awry-Abt-Iw-unsplash-1-1.png" alt="sofa" />
                    <img class="sm:hidden w-full" src="https://i.ibb.co/B6qwqPT/jason-wang-Nx-Awry-Abt-Iw-unsplash-1.png"
                        alt="sofa" />
                    <div
                        class="absolute sm:bottom-8 bottom-4 pr-10 sm:pr-0 left-4 sm:left-8 flex justify-start items-start">
                        <p class="text-3xl sm:text-4xl font-semibold leading-9 text-white">Range Comfort Sofas</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 grid lg:grid-cols-2 gap-x-8 gap-y-8 items-center">
                @foreach ($bahanbaku as $item)
                    <div
                        class="group group-hover:bg-opacity-60 transition duration-500 relative bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 sm:p-28 py-36 px-10 flex justify-center items-center">
                        <img class="group-hover:opacity-60 transition duration-500"
                            src="{{ asset('upload/' . $item->gambar) }}" alt="sofa-2" />
                        <div
                            class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-start items-start flex-col space-y-2">
                            <div>
                                <p
                                    class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">
                                    {{ $item->bahan_baku }}</p>
                            </div>
                            <div>
                                <p
                                    class="group-hover:opacity-60 transition duration-500 text-xl font-semibold leading-5 text-gray-800 dark:text-white">
                                    Rp. {{ number_format($item->harga, 0, 2) }}</p>
                            </div>
                        </div>
                        <div
                            class="group-hover:opacity-60 transition duration-500 absolute bottom-8 right-8 flex justify-start items-start flex-row space-x-2">
                            Jumlah Stock : {{ $item->jumlah_stock }}
                        </div>
                        <div
                            class="flex flex-col bottom-8 left-8 space-y-4 absolute opacity-0 group-hover:opacity-100 transition duration-500">
                            <button>
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg1.svg"
                                    alt="add">

                            </button>
                            <button>
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg2.svg"
                                    alt="view">

                            </button>
                            <button>
                                <img class=""
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/product-grid-2-svg3.svg"
                                    alt="like">

                            </button>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
        {{-- Detail Produk --}}

    </div>
    <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
            <img class="w-full" alt="image of a girl posing"
                src="https://i.ibb.co/QMdWfzX/component-image-one.png" />
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
            <div class="border-b border-gray-200 pb-6">
                <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">Balenciaga Fall Collection</p>
                <h1
                    class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">
                    Balenciaga Signature Sweatshirt</h1>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Colours</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300">Smoke Blue with red accents</p>
                    <div class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer">
                    </div>
                    <img class="dark:hidden"
                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg" alt="next">
                    <img class="hidden dark:block"
                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg"
                        alt="next">
                </div>
            </div>
            <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Size</p>
                <div class="flex items-center justify-center">
                    <p class="text-sm leading-none text-gray-600 dark:text-gray-300 mr-3">38.2</p>

                    <img class="dark:hidden"
                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2.svg" alt="next">
                    <img class="hidden dark:block"
                        src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg2dark.svg"
                        alt="next">
                </div>
            </div>
            <button
                class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                <img class="mr-3 dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1.svg"
                    alt="location">
                <img class="mr-3 hidden dark:block" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/svg1dark.svg"
                    alt="location">
                Check availability in store
            </button>
            <div>
                <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7">
                    It is a long established fact that a reader will be distracted by thereadable content of a page
                    when looking at its layout. The point of usingLorem Ipsum is that it has a more-or-less normal
                    distribution of letters.</p>
                <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Product Code: 8BN321AF2IF0NYA
                </p>
                <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Length: 13.2 inches</p>
                <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Height: 10 inches</p>
                <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Depth: 5.1 inches</p>
                <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4">Composition: 100%
                    calf leather, inside: 100% lamb leather</p>
            </div>
            <div>
                <div class="border-t border-b py-4 mt-7 border-gray-200">
                    <div data-menu class="flex justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Shipping and returns</p>
                        <button
                            class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                            role="button" aria-label="show or hide">
                            <img class="transform dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg"
                                alt="dropdown">
                            <img class="transform hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg"
                                alt="dropdown">
                        </button>
                    </div>
                    <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                        id="sect">You will be responsible for paying for your own shipping costs for returning
                        your item. Shipping costs are nonrefundable</div>
                </div>
            </div>
            <div>
                <div class="border-b py-4 border-gray-200">
                    <div data-menu class="flex justify-between items-center cursor-pointer">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Contact us</p>
                        <button
                            class="cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 rounded"
                            role="button" aria-label="show or hide">
                            <img class="transform dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4.svg"
                                alt="dropdown">
                            <img class="transform hidden dark:block"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail3-svg4dark.svg"
                                alt="dropdown">
                        </button>
                    </div>
                    <div class="hidden pt-4 text-base leading-normal pr-12 mt-4 text-gray-600 dark:text-gray-300"
                        id="sect">If you have any questions on how to return your item to us, contact us.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
