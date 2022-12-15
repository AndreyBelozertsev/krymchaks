@section('content')
{{ Breadcrumbs::render('contact') }}
<section class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl flex flex-wrap lg:flex-nowrap gap-6 my-12">
    <div class="p-10 text-left">
        <h1 class="text-2xl leading-8 text-gray-700 font-bold lg:text-3xl">
            Контакты
        </h1>
        <div class="mt-4 flex flex-col gap-2">
            <div class="flex justify-start w-full">
                <div class="w-full md:w-1/2 lg:w-1/4">
                    <img src="{{ asset('images/services/logo.png') }}">
                </div>
            </div>  
        @if($organization = $contacts->organization)
            <p class="text-xl leading-8 text-gray font-medium">
                <span class="text-xl leading-8 text-gray-700 font-bold">{{ $organization }}</span>
            </p>
        @endif 
        @if($address = $contacts->address)
            <p class="leading-6 text-gray font-medium">Адрес:
                <span class="leading-6 text-gray-700 font-bold">{{ $address }}</span>
            </p>
        @endif  
        @if($work_time = $contacts->work_time)
            <p class="leading-6 text-gray font-medium">Режим работы:
                <span class="leading-6 text-gray-700 font-bold">{{ $work_time }}</span>
            </p>
        @endif        
        @if($phoneContact = $contacts->phone)
            <p class="leading-6 text-gray font-medium">Номер телефона:
                <span class="leading-6 text-gray-700 font-bold"><a href="tel:{{ $phoneContact  }}">{{ $phoneContact  }}</a></span>
            </p>
        @endif
        @if($emailContact = $contacts->email)
            <p class="leading-6 text-gray font-medium">Адрес электронной почты:
                <span class="leading-6 text-gray-700 font-bold"><a href="mailto:{{ $emailContact }}">{{  $emailContact  }}</a></span>
            </p>
        @endif
        </div>
        <h2 class="mt-4 mb-2 text-lg leading-8 text-gray-700 font-bold">
            Мы в социальных сетях:
        </h2>
        <div class="flex gap-4">
            @if( $contacts->vk )
                <a href="{{ $contacts->vk }}" class="flex items-center justify-center rounded-50 bg-gray-300 w-9 h-9">
                    <img src="{{ asset('images/services/icon/vk.svg') }}">
                </a>
            @endif
            @if( $contacts->telegram )
                <a href="{{ $contacts->telegram }}" class="flex items-center justify-center rounded-50 bg-gray-300 w-9 h-9">
                    <img src="{{ asset('images/services/icon/telegram.svg') }}">
                </a>
            @endif
            
        </div>
        <div class="mt-4">
            <form action="{{ route('sendContactForm')  }}" method="POST" id="sendMail">
                <h2 class="text-xl leading-8 text-gray-700 font-bold">
                    Написать нам
                </h2>

                <div class="mt-2 grid grid-cols-1 gap-3 lg:grid-cols-2 lg:w-524">
                    <div>
                        <input class="p-2 rounded-lg border-2 border-gray-400 w-full focus:border-primary-blue focus:shadow-primary-blue  focus:ring-primary-blue" id="name" name="name" type="text" placeholder="Имя">
                        <span class="text-red-600 text-sm invalid-feedback" id="name-error"></span>
                    </div>
                    <div>
                        <input class="p-2 rounded-lg border-2 border-gray-400 w-full focus:border-primary-blue focus:shadow-primary-blue  focus:ring-primary-blue" id="email" name="email"  type="email" placeholder="Адресс электронной почты">
                        <span class="text-red-600 text-sm invalid-feedback" id="email-error"></span>
                    </div>
                    <div>
                        <textarea class="p-2 rounded-lg border-2 border-gray-400 w-full focus:border-primary-blue focus:shadow-primary-blue  focus:ring-primary-blue" id="message" name="message" rows="3" placeholder="Текст сообщения"></textarea>
                        <span class="text-red-600 text-sm invalid-feedback" id="message-error"></span>
                    </div>
                </div>
                <div class="mt-2 flex">
                    <input type="checkbox" class="checked:bg-primary-blue hover:checked:bg-primary-blue focus:checked:bg-primary-blue focus:shadow-none focus:checked:outline-none" id="agree" name="agree">
                    <label for="agree"><p class="ml-2 text-sm leading-5 text-gray-700 font-bold">Согласен с <a class="text-primary" href="{-- route('policy') --}">политикой</a> обработки персональных данных</p></label>
                </div>
                <span class="text-red-600 text-sm invalid-feedback" id="agree-error"></span>
                <div class="hidden" id="preloader">
                    <div role="status">
                        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-blue" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="response"></div>
                <button type="submit" class="flex items-center justify-center mt-4 p-3 bg-primary-blue disabled:opacity-50 disabled:cursor-not-allowed text-white font-medium text-base leading-6 rounded-3xl md:w-52 md:flex md:items-center lg:justify-center lg:text-center lg:mt-6 lg:text-base lg:leading-6 lg:w-49 lg:h-50">
                    Отправить
                </button>
            </form>
        </div>
    </div>
</section>
