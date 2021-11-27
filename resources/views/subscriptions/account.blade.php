<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Minha Assinatura') }}
        </h2>
    </x-slot>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    @if ($subscription)
                        <p>
                            <strong>Plano:</strong>
                            {{ $user->plan()->name }}
                        </p><br>

                        @if ($subscription->canceled() && $subscription->onGracePeriod())
                            <a href="{{ route('subscriptions.resume') }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">
                                Reativar Assinatura
                            </a>

                            Seu acesso vai até: {{ $user->access_end }}
                        @elseif (!$subscription->canceled())
                            <a href="{{ route('subscriptions.cancel') }}" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">
                                Cancelar Assinatura
                            </a>
                        @endif

                        @if ($subscription->ended())
                            Assinatura Cancelada
                        @endif
                    @else
                        [Não é assinante]
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Preço</th>
                            <th>Download</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                <td>{{ $invoice->total() }}</td>
                                <td>
                                    <a href="{{ route('subscriptions.invoice.download', $invoice->id) }}" class="btn btn-dark">
                                        Baixar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
