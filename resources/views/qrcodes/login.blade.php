<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .box__title{
            display: flex;
            justify-content: space-between;
            animation: floaty 1.8s infinite alternate;
        }

        /* Animate ghost */
        @keyframes floaty {
            0%{
                transform: translateY(-20px);
            }

            50%{
                transform: translateY(5px);
            }

            100%{
                transform: translateY(20px);
            }
        }
    </style>
</head>
<body class="bg-gray-900 h-screen flex flex-col items-center justify-center text-center">
    <section style="font-family: Montserrat" class=" bg-[#071e34] flex font-medium items-center justify-center h-screen">


        <div class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 sm:border-0 rounded-xl sm:rounded-0 border text-white">
            <div class="flex flex-col items-center justify-between w-full lg:flex-row">
                <div class="p-5 rounded-lg msg__success box__title">{{$qrcode}}</div>
                <div class="lg:mb-0 lg:max-w-lg lg:pr-5 ml-6">
                    <div class="max-w-xl mb-6">
                        <h2 class="text-left text-xl sm:mt-0 mt-6 font-semibold tracking-tight sm:text-2xl sm:leading-none max-w-lg mb-6">
                            {{config('app.name')}}
                        </h2>
                        <div class="text-left text-base md:text-lg">
                            <p>Lorem Ipsum is so cool and awesome to act and so cool to think. And very awesome to eat and talk.</p>
                            <div class="text-sky-600 mt-4">
                                <a href="#" class="bg-neutral-200 text-lg px-4 py-1.5 rounded-md">Acesse agora!</a>
                            </div>
                        </div>
                    </div>

                    <span class="block text-center text-gray-600 dark:text-gray-400">© 2023-<span id="currentYear">
                            {{ date('Y')}}</span> <a href="https://flowbite.com" target="_blank" rel="noreferrer">
                            {{config('app.name')}}</a>. All Rights Reserved. | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </span>
                </div>
            </div>
        </div>
    </section>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript" rel="script">
        const sr = ScrollReveal({
            origin: 'top',
            distance: '60px',
            duration: 2000,
            delay: 400,
        });

        sr.reveal('.msg__success', {origin: 'top'});
        sr.reveal('.msg__warning', {origin: 'right'});
        sr.reveal('.msg__alert', {origin: 'left'});
        sr.reveal('.msg__dump', {origin: 'right'});
    </script>
</body>
</html>

