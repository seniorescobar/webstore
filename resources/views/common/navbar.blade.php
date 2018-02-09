<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if ($active == 'login') class="active" @endif>
        <a href="{{ route('customer.login') }}">
            Prijava
        </a>
    </li>
    <li role="presentation" @if ($active == 'register') class="active" @endif>
        <a href="{{ route('customer.register') }}">
            Registracija
        </a>
    </li>
</ul>
