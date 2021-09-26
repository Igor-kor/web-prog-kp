<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <div class="antialiased max-h-content bg-gray-900">
        <div
            class="relative flex items-top justify-center bg-gray-900 sm:items-center max-h-content">
            <div>
                <p class="header-text">Курсовой проект по дисциплине: Веб-программирование</p>
                <p class="description-text">Yа тему: «Разработка веб – приложения коллекции монет/марок»</p>
                <p class="description-text">Автор: Шарангия Игорь Сергеевич</p>
                <p class="description-text">Студент: 3 курса</p>
                <p class="description-text">Группы: 19-ЗКБс-ПР1</p>
                <p class="description-text">Github проекта: <a href="https://github.com/Igor-kor/web-prog-kp">https://github.com/Igor-kor/web-prog-kp</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
