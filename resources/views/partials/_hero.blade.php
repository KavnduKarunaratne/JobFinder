<section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/job-logo.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    JOB<span class="text-black">FINDER</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find Your Dream Job
                </p>
                @auth
                    <div>
                        @if(auth()->user()->role == '0')
                            <a
                                href="/listings/create"
                                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Post a Job Now</a
                            >
                        @else
                            <a
                                href="/listings/create"
                                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                            >Find a Job Now</a
                            >
                        @endif
                    </div>
                @else
                    <div>
                        <a
                            href="/register"
                            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >Sign Up to Post or Find a Job</a
                        >
                    </div>
                @endauth
            </div>
        </section>
