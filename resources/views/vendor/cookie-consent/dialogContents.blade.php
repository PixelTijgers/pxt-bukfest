<div class="js-cookie-consent cookie-consent fixed bottom-7 inset-x-0 max-w-7xl mx-auto rounded-lg ">

    <div class="flex items-center justify-between flex-wrap">

        <div class="w-0 flex-1 items-center hidden md:inline">

            <p class="ml-3 text-black cookie-consent__message">
                {!! trans('cookie-consent::texts.message') !!}
            </p>

        </div>

        <div class="mt-2 flex items-center flex-shrink-0 w-full sm:mt-0 sm:w-auto">

            <a href="{{ url('/cookie-policy') }}">Cookie Policy</a>

            <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium ml-5 btn">
                {{ trans('cookie-consent::texts.agree') }}
            </button>

        </div>

    </div>

</div>
