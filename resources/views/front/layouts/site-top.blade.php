<div class="{{ $cssNs }} hidden lg:block px-5 md:px-16 xl:px-0">

    <div class="mx-auto max-w-screen-xl w-full">

        <div class="flex justify-end items-center">

            <ul class="contact-details">

                <li><a href="mailto:{{ $details->email }}"><i class="fa-solid fa-envelope"></i> {{ $details->email }}</a></li>
                <li><a href="tel:{{ $details->mobile }}"><i class="fa-solid fa-phone"></i>{{ $details->mobile }}</a></li>

            </ul>

        </div>

    </div>

</div>
