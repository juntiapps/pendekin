<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" /> 
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{-- {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }} --}}
            {{ __('Terima kasih sudah mendaftar! Sebelum memulai, Bisakan Anda verifikasi alamat email anda melalui link yang baru saja kali kirimkan melalui email? Jika belum menerima emailnya, Kami akan kirim sendiri') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{-- {{ __('A new verification link has been sent to the email address you provided during registration.') }} --}}
                {{ __('Link verifikasi email telah dikirim ke alamat email Anda yang diisi saat registrasi') }}

            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Keluar') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
