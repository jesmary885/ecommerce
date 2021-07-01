@props(['category'])

<div class="grid grid-cols-4 p-4">
    <div>
        {{--<p class="text-lg font-bold text-center text-TrueGray-400">Subcategorías</p>--}}
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    {{--<a href="" class="text-blue-400 flex font-semibold hover:text-TrueGray-500 px-4 py-2 hover:bg-blue-200">--}}
                    <a href="" class="text-TrueGray-400 flex font-semibold hover:text-blue-500 px-4 py-2 hover:bg-TrueGray-100">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
     <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
    </div>
</div>