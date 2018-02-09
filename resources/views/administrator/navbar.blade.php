<ul class="nav nav-pills nav-stacked">
    <li role="presentation" @if ($active == 'profile') class="active" @endif>
        <a href="{{ route('administrator.profile') }}">
            Moj profil
        </a>
    </li>
    <li role="presentation" @if ($active == 'sellers') class="active" @endif>
        <a href="{{ route('administrator.sellers') }}">
            Prodajalci
        </a>
    </li>
</ul>
