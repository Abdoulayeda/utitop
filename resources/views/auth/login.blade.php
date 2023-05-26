
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Login</title>
</head>
<body>

  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        {{-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Flowbite    
        </a> --}}
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Se connecter
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="post">
                  @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="votre mail" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                  {{--   <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    --}}
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p> 
                </form>
            </div>
        </div>
    </div>
  </section>

  {{--  <div class="bg-blue-800 h-screen flex flex-col justify-center items-center">
    <div class="flex flex-col w-1/2 items-center bg-slate-800 shadow-2lg p-12 rounded-xl">
        <div class="py-4">
            <p class="text-white text-4xl">Authentification</p>
        </div>
        <div class="object-cover  rounded-full border-2 bg-white border-slate-800 w-[120px] h-[120px] pt-10 pl-2 pr-2">
            <img src="../../images/logo.png" class="object-cover" alt="">
        </div>
        <form class="w-1/2" action="{{ route('login') }}" method="post" >
            @csrf
          <div class="mb-6">
            <label for="email" class="block text-white text-xl font-bold mb-2">
              Adresse email
            </label>
            <input 
                id="email" name="email" type="email" 
                class="h-14 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                placeholder="adresse email">
          </div>
          <div class="mb-6">
            <label for="password" class="block text-xl text-white font-bold mb-2">
              Mot de passe
            </label>
            <input id="password" name="password" type="password" 
                class="h-14 appearance-none border-2 border-gray-200 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                placeholder="Votre mot de passe">
          </div>
          <div class="flex justify-center">
            <input class="shadow bg-[#F38D4E] hover:bg-[#4848AC] focus:shadow-outline focus:outline-none text-white text-2xl font-bold py-3 px-8 rounded-lg" type="submit" value="Se connecter">
          </div>

          <div class="pt-6">
            @if (Route::has('password.request'))
                <a class="underline  text-red-700 text-lg hover:text-red-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    J'ai oublier mon mot de passe
                </a>
            @endif
          </div>
        </form>
      </div>
   </div>
       --}}
</body>
</html>






