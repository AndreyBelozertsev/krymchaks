@unless ($breadcrumbs->isEmpty())
<section class="section-bredcrumbs">
    <div class="my-12">
        <nav class="container rounded-xl bg-gray-100 mx-auto">
            <ol class="py-4 flex flex-wrap  text-sm text-gray-800">
                @foreach ($breadcrumbs as $breadcrumb)

                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <a href="{{ $breadcrumb->url }}" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                                {{ $breadcrumb->title }}
                            </a>
                        </li>
                    @else
                        <li>
                            {{ $breadcrumb->title }}
                        </li>
                    @endif

                    @unless($loop->last)
                        <li class="text-gray-500 px-2">
                            /
                        </li>
                    @endif

                @endforeach
            </ol>
        </nav>
    </div>
</section>
@endunless
