<div class="footer__contacts text-gray-400">
    @if($email = $contacts_buttom->email)    
        <div class="pb-3">
            <span><a class="footer__contacts-email text-xs" href="mailto:{{ $email }}">
                <img class="inline pr-3" src="{{ asset('images/services/mail.svg') }}">{{ $email }}</a></span>
        </div>
    @endif
    @if($address = $contacts_buttom->address) 
        <div class="pb-3">
            <span class="footer__contacts-address text-xs">
                <img class="inline pr-3" src="{{ asset('images/services/address.svg') }}">
                {{ $address }}</span>
        </div>
    @endif
    @if($phone = $contacts_buttom->phone) 
        <div class="pb-3">
            <span><a class="footer__contacts-phone text-xs" href="tel:{{ $phone }}">
                <img class="inline pr-3" src="{{ asset('images/services/phone.svg') }}">
                {{ $phone }}</a></span>
        </div>
    @endif
</div>