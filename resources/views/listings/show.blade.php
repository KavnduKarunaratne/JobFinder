<x-layout>

@include('partials._search')


<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ?  asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

                        <x-listing-tags :tagsCsv="$listing->tags" />

                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$listing->description}}
            @auth
                @if(auth()->user()->role == 1)
                                <a
                                    href="/{{$listing->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Apply for job</a
                                >

                                <a
                                    href="{{$listing->webiste}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                                                @php
                                                    $hasBookmark = false;
                                                @endphp
                                                {{-- Check if the listing has a bookmark for the current user --}}
                                                @foreach($bookmarks as $bookmark)
                                                    @if($bookmark->listing_id === $listing->id && $bookmark->user_id === auth()->user()->id)
                                                        @php
                                                            $hasBookmark = true;
                                                        @endphp
                                                        {{-- If a bookmark exists, break the loop --}}
                                                        @break
                                                    @endif
                                                @endforeach

                                                {{-- Display the form to create a bookmark if no bookmark exists --}}
                                                @if(!$hasBookmark)
                                                            <form action="/bookmark" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="listing_id" value="{{$listing->id}}">
                                                                <button type="submit" class="block bg-laravel text-white mt-6 py-2 px-3 mx-auto rounded-xl hover:opacity-80"><i class="fa-solid fa-bookmark"></i> Bookmark</button>
                                                            </form>
                                                @endif

                                    @else
                                        <a
                                            href="{{$listing->webiste}}"
                                            target="_blank"
                                            class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                        ><i class="fa-solid fa-globe"></i> Visit
                                            Website</a
                                        >
                                    @endif
                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-layout>

