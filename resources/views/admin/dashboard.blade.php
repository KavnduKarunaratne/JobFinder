<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#008082",
                        hover: "#004d4f",
                    },
                },
            },
        };
    </script>
    <title>JOBFINDER</title>
</head>

<body>
<div class="flex">
    <div class="fixed w-64 h-screen bg-white border-r">
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
            <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
                <div class="flex items-center justify-center h-14 border-b">
                    <a href="/"
                    ><img class="w-24" src="{{asset('images/logo.jpg')}}" alt="" class="logo"/>
                    </a>
                </div>
                <div class="overflow-y-auto overflow-x-hidden flex-grow">
                    <ul class="flex flex-col py-4 space-y-1">
                <span class="font-bold uppercase text-center">
                    Welcome {{auth()->user()->name}}
                </span>
                        <li class="px-5">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                            </div>
                        </li>
                        <li>
                            <a href="/admin" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-laravel pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/analytics" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-laravel pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Analytics</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/register" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-laravel pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Register</span>
                            </a>
                        </li>



                        <li class="px-5">
                            <div class="flex flex-row items-center h-8">
                                <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                            </div>
                        </li>

                        <li>
                            <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-laravel pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </span>
                                <span class="ml-2 text-sm tracking-wide truncate">
                            <form class="inline" method="POST" action="/logout">
                                @csrf
                                <button type="submit">
                                    <i class="fa-solid fa-door-closed"></i> Logout
                                </button>
                            </form>
                        </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <main class="ml-64 p-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <h1 class="ml-2 text-xl font-bold text-laravel mb-4">Admin Accounts</h1>
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Edit</th>
                                <th scope="col" class="px-6 py-4">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    @if($user->role == 2)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <a
                                                    href="/admin/users/{{ $user->id }}/edit"
                                                    class="text-blue-400 px-6 py-2 rounded-xl"
                                                >
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    Edit
                                                </a>
                                            </td>

                                            <td class="whitespace-nowrap px-6 py-4">
                                                @if(auth()->user()->id == $user->id)
                                                    <p>Logged In</p>
                                                @else
                                                    <form method="POST" action="/admin/delete/{{ $user->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                                                    </form>
                                                @endif
                                            </td>


                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>

                        <h1 class="ml-2 text-xl font-bold text-laravel my-4">Business Accounts</h1>

                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Edit</th>
                                <th scope="col" class="px-6 py-4">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->role == 0)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a
                                                href="/admin/users/{{ $user->id }}/edit"
                                                class="text-blue-400 px-6 py-2 rounded-xl"
                                            >
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if(auth()->user()->id == $user->id)
                                                <p>Logged In</p>
                                            @else
                                                <form method="POST" action="/admin/delete/{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                                                </form>
                                            @endif
                                        </td>


                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>

                        <h1 class="ml-2 text-xl font-bold text-laravel my-4">Employer Accounts</h1>

                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Edit</th>
                                <th scope="col" class="px-6 py-4">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->role == 1)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a
                                                href="/admin/users/{{ $user->id }}/edit"
                                                class="text-blue-400 px-6 py-2 rounded-xl"
                                            >
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Edit
                                            </a>
                                        </td>

                                        <td class="whitespace-nowrap px-6 py-4">
                                            @if(auth()->user()->id == $user->id)
                                                <p>Logged In</p>
                                            @else
                                                <form method="POST" action="/admin/delete/{{ $user->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                                                </form>
                                            @endif
                                        </td>


                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<x-flash-message />

</body>
</html>

