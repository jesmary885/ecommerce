<x-app-layout>
    <div class="container py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex mb-2 items-center">
                    <h1 class="text-lg uppercase font-bold text-blue-500">
                        {{$category->name}}
                    </h1>
                    <a class="text-red-600 hover:text-gray-400 hover:underline ml-2 font-semibold" href="{{route('categories.show',$category)}}">Ver más</a>
                </div>
                @livewire('category-products', ['category' => $category])
            </section> 
        @endforeach
    </div>
    {{--Script de Slider de los productos por categorías--}}
    @push('script')
    <script>
        Livewire.on('glider', function(id){
            new Glider(document.querySelector('.glider-' + id), {
                slidesToShow: 2, //cant de registros que se muestran
                slidesToScroll: 1, //los saltos que se dan al darle click a los botones
                draggable: true,
                dots: '.glider-' + id + '~ .dots', //botones pequeños
                arrows: {
                    prev: '.glider-' + id + '~ .glider-prev',
                    next: '.glider-' + id + '~ .glider-next'
                },
                responsive:[
                    {
                        breakpoint: 640,
                        settings:{
                            slidesToShow: 3, 
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings:{
                            slidesToShow: 4, 
                            slidesToScroll: 3,
                        }

                    },
                    {
                        breakpoint: 1024,
                        settings:{
                            slidesToShow: 4.5, 
                            slidesToScroll: 4,
                        }

                    },
                    {
                        breakpoint: 1280,
                        settings:{
                            slidesToShow: 5.5, 
                            slidesToScroll: 5,
                        }

                    },
                ]
            });
        })
    </script>
    @endpush

</x-app-layout>
