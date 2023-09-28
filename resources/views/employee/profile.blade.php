<x-layout>
    <table class="w-full table-auto rounded-sm">
        <tbody>
        @unless($bookmarks->isEmpty())
            @foreach($bookmarks as $bookmark)
                @auth
                    @if($bookmark->user_id == auth()->user()->id)
                        @foreach($listings as $listing)
                            @if($bookmark->user_id == auth()->user()->id && $listing->id == $bookmark->listing_id)
                            <tr class="border-gray-300">
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{$listing->id}}">
                                        {{$listing->title}}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action="/bookmark/{{$bookmark->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Remove Bookmark</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @endif
                @endauth
            @endforeach
        @else
            <tr class="border-grey-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">
                        No Jobs Bookmarked
                    </p>
                </td>
            </tr>
        @endunless
        </tbody>
    </table>
</x-layout>
