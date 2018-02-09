<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if ($active == 'profile') class="active" @endif>
        <a href="{{ route('seller.profile') }}">
            Moj profil
        </a>
    </li>
    <li role="presentation" @if ($active == 'customers') class="active" @endif>
        <a href="{{ route('seller.customers') }}">
            Stranke
        </a>
    </li>
    <li role="presentation" @if ($active == 'items') class="active" @endif>
        <a href="{{ route('seller.items') }}">
            Izdelki
        </a>
    </li>
    <li role="presentation" @if ($active == 'orders') class="active" @endif>
        <a href="{{ route('seller.orders') }}">
            Narocila
        </a>
    </li>
</ul>
