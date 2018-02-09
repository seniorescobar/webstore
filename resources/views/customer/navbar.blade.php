<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if ($active == 'profile') class="active" @endif>
        <a href="{{ route('customer.profile') }}">
            Moj profil
        </a>
    </li>
    <li role="presentation" @if ($active == 'shopping-cart') class="active" @endif>
        <a href="{{ route('shopping-cart.index') }}">
            Kosarica
        </a>
    </li>
    <li role="presentation" @if ($active == 'orders') class="active" @endif>
        <a href="{{ route('customer.orders') }}">
            Moja narocila
        </a>
    </li>
</ul>
