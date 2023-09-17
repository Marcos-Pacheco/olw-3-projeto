<div class="bg-tertiary-900" x-data="checkout()">
    <div class="fixed left-0 top-0 hidden lg:block h-full w-1/2 bg-tertiary-900"></div>
    <div class="fixed right-0 top-0 hidden lg:block h-full w-1/2 bg-tertiary-800"></div>

    <div class="relative mx-auto grid max-w-7x1 grid-cols-1 lg:grid-cols-2 gap-x-16 lg:px-8 lg:pt-16">
        <section aria-labelledby="summary-heading" class="bg-tertiary-800 py-12 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pb-24 lg:pt-0">
            <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                <dl>
                    <dt class="text-lg font-medium text-primary-200">Resumo</dt>
                </dl>
                <x-checkout.product-list>
                    @foreach ($cart['skus'] as $sku)
                        <x-checkout.product-item
                            :features="collect($sku['features'])->map(fn($feature) => $feature['name'] . ': ' . $feature['pivot']['value'] )"
                            :name="$sku['name']"
                            :price="$sku['price']"
                            :quantity="$sku['pivot']['quantity']"
                            image="https://secure-static.vans.com.br/medias/sys_master/vans/vans/h29/h52/h00/h00/11254394191902/5000200040001U-01-BASEIMAGE-Hires.jpg"
                        />
                    @endforeach
                </x-checkout.product-list>
                <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm font-medium">
                    <x-checkout.summary-item title="Subtotal" :value="$cart['total']" />
                    <x-checkout.summary-item title="Frete" value="500,00" />
                    <x-checkout.summary-item title="Total" :value="$cart['total']" :is-last="true" />
                </dl>
            </div>
        </section>

        <section aria-labelledby="payment-and-shipping-heading" class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg">
            <div>
                <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                    
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol class="text-xs inline-flex items-center space-x-1 md:space-x-3">
                            <li @class(['font-bold' => $step === CheckoutStepsEnum::INFORMATION->value])>
                                <span class="text-white font-bold">{{ CheckoutStepsEnum::INFORMATION->getName() }}</span>
                            </li>
                            <li @class(['inline-flex items-center', 'font-bold' => $step === CheckoutStepsEnum::SHIPPING->value])>
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="text-white font-bold">{{ CheckoutStepsEnum::SHIPPING->getName() }}</span>
                            </li>
                            <li @class(['inline-flex items-center', 'font-bold' => $step === CheckoutStepsEnum::PAYMENT->value])>

                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="text-white font-bold">{{ CheckoutStepsEnum::PAYMENT->getName() }}</span>
                            </li>
                        </ol>
                    </nav>

                </div>

                @if ($step === CheckoutStepsEnum::INFORMATION->value)
                    <x-checkout.information-form />
                @elseif ($step === CheckoutStepsEnum::SHIPPING->value)
                    <x-checkout.shipping-form :user="$user" :address="$address" />
                @elseif ($step === CheckoutStepsEnum::PAYMENT->value)
                    <x-checkout.payment-form :user="$user" :address="$address" />
                @endif
            </div>
        </section>
    </div>
</div>
