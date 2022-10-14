<div>
    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
    <main class="lg:min-h-full lg:overflow-hidden lg:flex lg:flex-row-reverse">
        <div class="px-4 py-6 sm:px-6 lg:hidden">
            <div class="max-w-lg mx-auto flex">
                <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt=""
                        class="h-8 w-auto">
                </a>
            </div>
        </div>
        <!-- Mobile order summary -->
        <section aria-labelledby="order-heading" class="bg-gray-50 px-4 py-6 sm:px-6 lg:hidden">
            <div class="max-w-lg mx-auto">
                <div class="flex items-center justify-between">
                    <h2 id="order-heading" class="text-lg font-medium text-gray-900">Your Order</h2>
                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500"
                        aria-controls="disclosure-1" aria-expanded="false">
                        <!-- Only display for open option. -->
                        <span>Hide full summary</span>
                        <!-- Don't display for open option. -->
                        <span>Show full summary</span>
                    </button>
                </div>

                <div id="disclosure-1">
                    <ul role="list" class="divide-y divide-gray-200 border-b border-gray-200">
                        <li class="flex py-6 space-x-6">
                            <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-04-product-01.jpg"
                                alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps."
                                class="flex-none w-40 h-40 object-center object-cover bg-gray-200 rounded-md">
                            <div class="flex flex-col justify-between space-y-4">
                                <div class="text-sm font-medium space-y-1">
                                    <h3 class="text-gray-900">Micro Backpack</h3>
                                    <p class="text-gray-900">$70.00</p>
                                    <p class="text-gray-500">Moss</p>
                                    <p class="text-gray-500">5L</p>
                                </div>
                                <div class="flex space-x-4">
                                    <button type="button"
                                        class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                                    <div class="flex border-l border-gray-300 pl-4">
                                        <button type="button"
                                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- More products... -->
                    </ul>

                    <form class="mt-10">
                        <label for="discount-code-mobile" class="block text-sm font-medium text-gray-700">Discount
                            code</label>
                        <div class="flex space-x-4 mt-1">
                            <input type="text" id="discount-code-mobile" name="discount-code-mobile"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <button type="submit"
                                class="bg-gray-200 text-sm font-medium text-gray-600 rounded-md px-4 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Apply</button>
                        </div>
                    </form>

                    <dl class="text-sm font-medium text-gray-500 mt-10 space-y-6">
                        <div class="flex justify-between">
                            <dt>Subtotal</dt>
                            <dd class="text-gray-900">$210.00</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="flex">
                                Discount
                                <span
                                    class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">CHEAPSKATE</span>
                            </dt>
                            <dd class="text-gray-900">-$24.00</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Taxes</dt>
                            <dd class="text-gray-900">$23.68</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Shipping</dt>
                            <dd class="text-gray-900">$22.00</dd>
                        </div>
                    </dl>
                </div>

                <p
                    class="flex items-center justify-between text-sm font-medium text-gray-900 border-t border-gray-200 pt-6 mt-6">
                    <span class="text-base">Total</span>
                    <span class="text-base">$341.68</span>
                </p>
            </div>
        </section>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading" class="hidden bg-gray-50 w-full max-w-md flex-col lg:flex">
            <h2 id="summary-heading" class="sr-only">Order summary</h2>

            <ul role="list" class="flex-auto overflow-y-auto divide-y divide-gray-200 px-6">
                <li class="flex py-6 space-x-6">
                    <img src="https://tailwindui.com/img/ecommerce-images/checkout-page-04-product-01.jpg"
                        alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps."
                        class="flex-none w-40 h-40 object-center object-cover bg-gray-200 rounded-md">

                </li>

                <!-- More products... -->
            </ul>

            <div class="sticky bottom-0 flex-none bg-gray-50 border-t border-gray-200 p-6">
                <form>
                    <label for="discount-code" class="block text-sm font-medium text-gray-700">Discount code</label>
                    <div class="flex space-x-4 mt-1">
                        <input type="text" id="discount-code" name="discount-code"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="submit"
                            class="bg-gray-200 text-sm font-medium text-gray-600 rounded-md px-4 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Apply</button>
                    </div>
                </form>

                <dl class="text-sm font-medium text-gray-500 mt-10 space-y-6">
                    <div class="flex justify-between">
                        <dt>Subtotal</dt>
                        <dd class="text-gray-900">$210.00</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="flex">
                            Discount
                            <span
                                class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">CHEAPSKATE</span>
                        </dt>
                        <dd class="text-gray-900">-$24.00</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Taxes</dt>
                        <dd class="text-gray-900">$23.68</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt>Shipping</dt>
                        <dd class="text-gray-900">$22.00</dd>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                        <dt class="text-base">Total</dt>
                        <dd class="text-base">$341.68</dd>
                    </div>
                </dl>
            </div>
        </section>

        <!-- Checkout form -->
        <section aria-labelledby="payment-heading"
            class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
            <div class="max-w-lg mx-auto">


                <div class="relative mt-8">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-4 bg-white text-sm font-medium text-gray-500"> or </span>
                    </div>
                </div>

                <form class="mt-6">


                    <button type="submit"
                        class="btn btn-primary w-full">Pay
                        $341.68</button>

                    <p class="flex justify-center text-sm font-medium text-gray-500 mt-6">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="w-5 h-5 text-gray-400 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Payment details stored in plain text
                    </p>
                </form>
            </div>
        </section>
    </main>

</div>
