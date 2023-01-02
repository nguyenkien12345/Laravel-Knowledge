<h1 style="text-align: center; color: red">Đa ngôn ngữ trong Laravel</h1>

{{-- Nếu ta dùng file php trong folder lang cho đa ngôn ngữ --}}
{{-- Cách 1 --}}
{{--
<h2 style="text-align: center; color: yellow">FRUIT</h2>
<ul>
    <li>{{ __('messages.fruit.avocado') }}</li>
    <li>{{ __('messages.fruit.apple') }}</li>
    <li>{{ __('messages.fruit.banana') }}</li>
    <li>{{ __('messages.fruit.orange') }}</li>
    <li>{{ __('messages.fruit.grape') }}</li>
</ul>


<h2 style="text-align: center; color: yellow">ANIMAL</h2>
<ul>
    <li>{{ __('messages.animal.dog') }}</li>
    <li>{{ __('messages.animal.cat') }}</li>
    <li>{{ __('messages.animal.camel') }}</li>
    <li>{{ __('messages.animal.fox') }}</li>
    <li>{{ __('messages.animal.lion') }}</li>
</ul>
--}}


{{-- Cách 2 --}}
<h2 style="text-align: center; color: yellow">FRUIT</h2>
<ul>
    <li>@lang('messages.fruit.avocado')</li>
    <li>@lang('messages.fruit.apple')</li>
    <li>@lang('messages.fruit.banana')</li>
    <li>@lang('messages.fruit.orange')</li>
    <li>@lang('messages.fruit.grape')</li>
</ul>

<h2 style="text-align: center; color: yellow">ANIMAL</h2>
<ul>
    <li>@lang('messages.animal.dog')</li>
    <li>@lang('messages.animal.cat')</li>
    <li>@lang('messages.animal.camel')</li>
    <li>@lang('messages.animal.fox')</li>
    <li>@lang('messages.animal.lion')</li>
</ul>


{{-- Nếu ta dùng file json trong folder lang cho đa ngôn ngữ --}}
{{--
<h2 style="text-align: center; color: yellow">FRUIT</h2>
<ul>
    <li>{{ __('fruit.avocado') }}</li>
    <li>{{ __('fruit.apple') }}</li>
    <li>{{ __('fruit.banana') }}</li>
    <li>{{ __('fruit.orange') }}</li>
    <li>{{ __('fruit.grape') }}</li>
</ul>


<h2 style="text-align: center; color: yellow">ANIMAL</h2>
<ul>
    <li>{{ __('animal.dog') }}</li>
    <li>{{ __('animal.cat') }}</li>
    <li>{{ __('animal.camel') }}</li>
    <li>{{ __('animal.fox') }}</li>
    <li>{{ __('animal.lion') }}</li>
</ul>
--}}

