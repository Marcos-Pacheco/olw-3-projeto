<x-app-layout>
    <div class="bg-tertiary-900">
        <div class="fixed left-0 top-0 hidden lg:block h-full w-1/2 bg-tertiary-900"></div>
        <div class="fixed right-0 top-0 hidden lg:block h-full w-1/2 bg-tertiary-800"></div>

        <div class="relative mx-auto grid max-w-7x1 grid-cols-1 lg:grid-cols-2 gap-x-16 lg:px-8 lg:pt-16">
            <section aria-labelledby="summary-heading" class="bg-tertiary-800 py-12 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pb-24 lg:pt-0">
                <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                    <dl>
                        <dt class="text-lg font-medium text-primary-200">Resumo</dt>
                    </dl>
                    <x-checkout.product-list>
                        <x-checkout.product-item
                            :descriptions="[ 'White', '15L' ]"
                            name="teste"
                            price="150"
                            quantity="10"
                            image="https://secure-static.vans.com.br/medias/sys_master/vans/vans/h29/h52/h00/h00/11254394191902/5000200040001U-01-BASEIMAGE-Hires.jpg"
                        />
                    </x-checkout.product-list>
                    <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm font-medium">
                        <x-checkout.summary-item title="Subtotal" value="500,00" />
                        <x-checkout.summary-item title="Frete" value="500,00" />
                        <x-checkout.summary-item title="Total" value="1000,00" :is-last="true" />
                    </dl>
                </div>
            </section>

            <section
                aria-labelledby="payment-and-shipping-heading"
                class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg"
            >
                <form>
                    <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                        <div>
                            <x-section-title title="Dados de Contato"/>
                            <div class="mt-6">
                                <x-input-label for="email-address" value="Email Address"/>
                                <div class="mt-1">
                                    <x-text-input
                                        type="email"
                                        name="email"
                                        id="email-address"
                                        autocomplete="email"
                                        placeholder="Digite seu email"
                                    />
                                </div>
                            </div>
                            <div class="mt-10">
                                <x-section-title title="Detalhes do Pagamento"/>
                                <div class="mt-6 grid grid-cols-3 gap-x-4 gap-y-6 sm:grid-cols-4">
                                    <div class="col-span-3 sm:col-span-4">
                                        <x-input-label for="card-number" value="Número do Cartão"/>
                                        <div class="mt-1">
                                            <x-text-input
                                                type="text"
                                                id="card-number"
                                                name="card-number"
                                                placeholder="Número do Cartão"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-span-2 sm:col-span-3">
                                        <x-input-label for="expiration-date" value="Data de Expiração"/>
                                        <div class="mt-1">
                                            <x-text-input
                                                type="text"
                                                id="expiration-date"
                                                name="expiration-date"
                                                placeholder="MM/AA"
                                            />
                                        </div>
                                    </div>
                                    <div>
                                        <x-input-label for="cvc" value="cvc"/>
                                        <div class="mt-1">
                                            <x-text-input
                                                type="text"
                                                id="cvc"
                                                name="cvc"
                                                placeholder="CVC"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</x-app-layout>
