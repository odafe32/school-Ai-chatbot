<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'NSUK Assistant' }}</title>
        <link rel="icon" type="image/png" href="{{ url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB8AAAAgCAMAAADdXFNzAAABPlBMVEVHcEwcGhh/fHrMysrq6ekAAADHxcTo6Ofr6umioJ/j4+LX1ta2trXp6Ofl5eXc3NvV1dXc29zU09PEw8PZ2djT0tLS0dH5wwD////v7u+FwiYBkd/9xQD29vaDwhz/yACIwybsy3b7+vvZ29mBwiXR0NOzs7Th4d+MjI2ny3zIx8t1dHS1wxhrZ2VTuByko6DMnwCXlZUAhNVBQUapqKhzuSWCf36+vr9+wACfutAhldHjsQLe2cOMuFCGxAoHyQWcrjR1tQAAkOmkgha4zd7WskXkz55UVl+/uSYUCwd/vD2CvuqGlqLN2eJBxhQAugUotw8gowy60HSslyOXg1JNQSRYRQwjJCfpvSlrtmZImMXIuGObt3dGxBejnJVsqiFHoit6oydmtcRot5x1qM+Ip5vBvZlEp/NWr97S5EYu6kNmAAAAF3RSTlMAHCp75g5u/u5B0rZe2sP2kKKFksqpn13EfwwAAAJfSURBVCiRbZLnVqNAFIAnIQnEJJ7EstwBJiCEsiAl3RQ1VY+9rMe6ve/7v8AOCFHX/ebffJfLLYMQWuUyj3ARbIhJD2umUEiKaBiz+BXaMnqEw77Vqnesjm516vWuW++4vlMHNhf7JawZttHt2qZu67pua7Zt65hAPvbL7MaCy7cJ7yGVeMwnSJvVhG3IJvnZZ74mCIKiCMIzX4q8xEty6GtK2/usPPecSe18Lk2bMvXt9ujiy8hT2ov/46EUDKY3Aye4kjeFT2ej85F3oYwhHXsylCz95rp5K0/lzZpyPtpte21lrMb9ZWFPurKaB80B/y70nre76ynCVjKfFOzx8v7`+1AnkgHqhdnYaeW3l0edhg5eCQArk62bYn3IqfKBdbmnlJ89LtD1+EMz7h1VBoYd6k3nKH0/nYSL273aEiEV9KBPPT/4xufzz+9e3KKC6TWKNijCPvr7vWf5P1zW+7lRp+mEl8aiEB7x02584rf3mgWNMaBHVQzUZb7FAJ8Q/iOLRgeU4zc5MFMW7Mc4hMyogpwKTVYcNUWw5rlX3Px5R39AKaAnwOn2dABiKWXLSODo+nvWOeyehPimgAugGrCEGwGUhR2voiwn3LBNqBwhd0RoQGrCOGLXXiGxjxqVpcr1DoBg9HxqgQSabXcLfG2KjR/eSx2C7BOIFrYHqdkEto3QJzzh6WQAwfKIWk/5XgfgaBsygFG2pTABr9PmnF/NBeRZaLR2AVPIVAmD7BrxBL1hRNb/exSqAaRiGVkqjfykT02y1HKtrmJn8KxvCcKASFZb/b0PSlcxK9sXNX9N2ZmuYMFQRAAAAAElFTkSuQmCC') }}"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom scrolling styles -->
        <style>
            /* Ensure smooth scrolling */
            html {
                scroll-behavior: smooth;
            }

            /* Custom scrollbar styling */
            body::-webkit-scrollbar {
                width: 8px;
            }

            body::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            body::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 4px;
            }

            body::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen">
        @component('components.network')

        @endcomponent

        <div class="w-full bg-white min-h-screen flex flex-col items-center">
            <div class="w-full bg-white">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
