<div>
    {{--Tarjeta con nombre de categoria--}}
   <div class="bg-white rounded shadow-lg mb-8">
      <div class="px-8 py-2 flex justify-between items-center">
          <h1 class="text-blue-500 font-bold uppercase">{{$category->name}}</h1>

          <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-blue-500">
              <i class="fas fa-border-all p-3 cursor-pointer"></i>
              <i class="fas fa-th-list p-3 cursor-pointer"></i>
          </div>
      </div>
   </div>

   {{--Seccion donde se muestran las subcategorias y los productos--}}
   <div class="grid grid-cols-5 gap-6">
       {{--Subcategorias--}}
        <aside>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-2 text-lg font-semibold text-gray-500">
                        <a class="cursor-pointer hover:text-blue-500" href="">{{$subcategory->name}}</a>
                    </li>
                @endforeach
            </ul>
            <h1 class="font-semibold text-center mt-4 mb-2">Marcas</h1>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="my-2 text-lg font-semibold text-gray-500">
                        <a class="cursor-pointer hover:text-blue-500" href="">{{$brand->name}}</a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-6">
                Eliminar filtros
            </x-jet-button>
        </aside>
        {{--Productos--}}
        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-6">
                @foreach ($products as $product)
                <li class="bg-white rounded-lg shadow">
                    <article>
                        <figure>
                            <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">  
                        </figure>
                        <div>
                            <h1 class="text-lg font-semibold">
                                <a href="">
                                    {{Str::limit($product->name, 40)}}
                                </a>
                            </h1>
                            <p class="font-semibold text-blue-500">US$ {{$product->price}}</p>
                        </div>
                    </article>
                </li>
                @endforeach
            </ul>
            {{--Paginación--}}
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
   </div>
</div>
